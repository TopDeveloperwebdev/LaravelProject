<?php

namespace App\Http\Controllers;

use App\Departments;
use App\User;
use App\Security;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AccountController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('is_admin', 0)->where('partner', 0)->where('supplier', 0)->get();
        $admins = User::where('is_admin', 1)->where('partner', 0)->where('supplier', 0)->get();

        $partners = User::where('is_admin', 0)->where('partner', 1)->where('supplier', 0)->get();
        $suppliers = User::where('is_admin', 0)->where('partner', 0)->where('supplier', 1)->get();

        return view('admin.accounts.index', [
            'users' => $users,
            'admins' => $admins,
            'partners' => $partners,
            'suppliers' => $suppliers,
        ]);
    }

    /**
     *
     */
    public function createUser()
    {
        $type = ucfirst(request()->route('type'));
        $input = '';

        if ($type == "Requisitioner") {
            $input = "<input type='hidden' name='is_admin' value='0'>";
        }

        if ($type == "Admin") {
            $input = "<input type='hidden' name='is_admin' value='1'>

            ";
        }

        return view('admin.accounts.create-user', [
            'departments' => Departments::all(),
            'type' => $type,
            'input' => $input,
        ]);
    }

    /**
     *
     */
    public function createPartner()
    {
        return view('admin.accounts.create-partner');
    }

    /**
     *
     */
    public function createSupplier()
    {
        return view('admin.accounts.create-supplier');
    }

    /**
     *
     */
    public function store(Request $request)
    {

        $data = $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'project_num' => 'nullable',
            'project_name' => 'nullable',
            'is_admin' => 'required|in:0,1',
            'job_title' => 'nullable',
            'uob_alias' => 'nullable',
            'telephone' => 'nullable',
            'mobile_num' => 'nullable',
            'primary_department_location_id' => 'required|not_in:0',
            'signature' => 'nullable|file',
            'password' => 'required',
        ]);

        $data['password'] = Hash::make($data['password']);

        $file = $request->file('signature');
        unset($data['signature']);

        $user = User::create($data);

        if (!$user) {
            throw new \Exception('An error has occurred');
        }

        if ($file) {
            $file = $request->file('signature');
            $name = $file->store('files');
            $user->signature = basename($name);
            $user->save();
        }

        return redirect('/accounts?new=success');
    }

    /**
     *
     */
    public function storePartner(Request $request)
    {

        $user = $this->validate($request, [
            'email' => 'required|email|unique:users',
            'project_num' => 'nullable',
            'project_name' => 'nullable',
            'job_title' => 'nullable',
            'telephone' => 'nullable',
            'mobile_num' => 'nullable',
            'password' => 'required',
            'username' => 'nullable',
        ]);

        $partner = $this->validate($request, [
            'grant_administered_by' => 'nullable',
            'organisation_size' => 'nullable',
            'organisation_type' => 'nullable',
            'project_role' => 'nullable',
            'cost_category_type' => 'nullable',
            'organisation_name' => 'nullable',
            'address1' => 'nullable',
            'address2' => 'nullable',
            'city' => 'nullable',
            'postcode' => 'nullable',
            'direct_dial' => 'nullable',
            'project_start_date' => 'nullable'
        ]);

        $user['password'] = Hash::make($user['password']);
        $user['partner'] = 1;
        $user['name'] = $request->name;
        $user = User::create($user);
        
        if (!$user) {
            throw new \Exception('An error has occurred');
        }

        $partner = $user->partnerInfo()->create($partner);

        return redirect('/accounts');
    }

    /**
     *
     */
    public function storeSupplier(Request $request)
    {

        $user = $this->validate($request, [
            'email' => 'required|email|unique:users',
            'project_num' => 'nullable',
            'project_name' => 'nullable',
            'job_title' => 'nullable',
            'telephone' => 'nullable',
            'mobile_num' => 'nullable',
            'password' => 'required',
            'username' => 'nullable',
            'name' => 'nullable'
        ]);

        $partner = $this->validate($request, [
            'grant_administered_by' => 'nullable',
            'organisation_size' => 'nullable',
            'organisation_type' => 'nullable',
            'project_role' => 'nullable',
            'cost_category_type' => 'nullable',
            'organisation_name' => 'nullable',
            'address1' => 'nullable',
            'address2' => 'nullable',
            'city' => 'nullable',
            'postcode' => 'nullable',
            'direct_dial' => 'nullable',
        ]);

        $user['password'] = Hash::make($user['password']);
        $user['supplier'] = 1;
        $user['name'] = $partner['organisation_name'];
        $user = User::create($user);

        if (!$user) {
            throw new \Exception('An error has occurred');
        }

        $partner = $user->partnerInfo()->create($partner);

        return redirect('/accounts?new=Supplier');
    }

    /**
     *
     */
    public function show($user)
    {
        $user = User::find($user);
        return view('admin.accounts.show', ['user' => $user, 'departments' => Departments::all()]);
    }

    /**
     *
     */
    public function showPartner($user)
    {
        $user = User::find($user);
        return view('admin.accounts.show-partner', ['user' => $user]);
    }

    /**
     *
     */
    public function showSupplier($user)
    {
        $user = User::find($user);
        return view('admin.accounts.show-supplier', ['user' => $user]);
    }

    /**
     *
     */
    public function update(Request $request, $user)
    {
        $user = User::find($user);

        $data = $request->except('_token', 'password', 'signature', 'removeFile');

        if ($request->password) {
            $data['password'] = Hash::make($request->password);
        }

        if ($request->has('removeFile')) {
            Storage::disk('files')->delete($user->signature);
            $data['signature'] = null;
        }

        $user->update($data);

        if ($request->hasFile('signature')) {
            $file = $request->file('signature');
            $name = $file->store('files');
            $user->signature = basename($name);
            $user->save();
        }

        return view('admin.accounts.show', ['user' => $user, 'updated' => true, 'departments' => Departments::all()]);
    }

    /**
     *
     */
    public function updatePartner(Request $request, $user)
    {
        // $userData = $this->validate($request, [
        //     'project_num' => 'nullable',
        //     'project_name' => 'nullable',
        //     'job_title' => 'nullable',
        //     'telephone' => 'nullable',
        //     'mobile_num' => 'nullable',
        // ]);

        // $partner = $this->validate($request, [
        //     'grant_administered_by' => 'nullable',
        //     'organisation_size' => 'nullable',
        //     'organisation_type' => 'nullable',
        //     'project_role' => 'nullable',
        //     'cost_category_type' => 'nullable',
        //     'organisation_name' => 'nullable',
        //     'address1' => 'nullable',
        //     'address2' => 'nullable',
        //     'city' => 'nullable',
        //     'postcode' => 'nullable',
        //     'direct_dial' => 'nullable',
        // ]);

        $userData = $this->validate($request, [
            'email' => 'nullable',
            'project_num' => 'nullable',
            'project_name' => 'nullable',
            'job_title' => 'nullable',
            'telephone' => 'nullable',
            'mobile_num' => 'nullable',
            'username' => 'nullable',
            'name' => 'nullable'
        ]);

        $partner = $this->validate($request, [
            'grant_administered_by' => 'nullable',
            'organisation_size' => 'nullable',
            'organisation_type' => 'nullable',
            'project_role' => 'nullable',
            'cost_category_type' => 'nullable',
            'organisation_name' => 'nullable',
            'address1' => 'nullable',
            'address2' => 'nullable',
            'city' => 'nullable',
            'postcode' => 'nullable',
            'direct_dial' => 'nullable',
            'project_start_date' => 'nullable'
        ]);

        $user = User::find($user);

        if ($request->password) {
            $userData['password'] = Hash::make($request->password);
        }

        $user->update($userData);

        $user->partnerInfo->update($partner);

        return view('admin.accounts.show-partner', ['user' => $user, 'updated' => true]);
    }

    /**
     *
     */
    public function updateSupplier(Request $request, $user)
    {
        $userData = $this->validate($request, [
            'project_num' => 'nullable',
            'project_name' => 'nullable',
            'job_title' => 'nullable',
            'telephone' => 'nullable',
            'mobile_num' => 'nullable',
        ]);

        $partner = $this->validate($request, [
            'grant_administered_by' => 'nullable',
            'organisation_size' => 'nullable',
            'organisation_type' => 'nullable',
            'project_role' => 'nullable',
            'cost_category_type' => 'nullable',
            'organisation_name' => 'nullable',
            'address1' => 'nullable',
            'address2' => 'nullable',
            'city' => 'nullable',
            'postcode' => 'nullable',
            'direct_dial' => 'nullable',
        ]);

        $user = User::find($user);

        if ($request->password) {
            $userData['password'] = Hash::make($request->password);
        }

        $user->update($userData);

        $user->partnerInfo->update($partner);

        return view('admin.accounts.show-supplier', ['user' => $user, 'updated' => true]);
    }

    /**
     *
     */
    public function signature($user)
    {
        $user = User::find($user);
        return response()->file(Storage::disk('files')->path($user->signature));
    }

    /**
     *
     */
    public function req()
    {
        auth()->user()->admin_view = 0;
        auth()->user()->save();

        return redirect('/');
    }

    /**
     *
     */
    public function admin()
    {
        auth()->user()->admin_view = 1;
        auth()->user()->save();

        return redirect('/');
    }

    public function deleteUser($id)
    {
        User::where('id', $id)->first()->delete();
        Security::where('user_id', $id)->first()->delete();

        return back();
    }

}
