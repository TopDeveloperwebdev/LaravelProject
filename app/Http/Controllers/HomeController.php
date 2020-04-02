<?php

namespace App\Http\Controllers;

use App\CarHire;
use App\CatalogueOrders;
use App\Catering;
use App\Expenses;
use App\KeyTravel;
use App\NoneCatalogueOrder;
use App\Security;
use App\Stores;
use App\Training;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
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

        /**
         *
         * Admin
         */
        if (auth()->user()->is_admin && auth()->user()->admin_view) {

            //pending.
            $catPending = CatalogueOrders::whereNull('placed_at')->orderBy('id', 'desc')->get()->groupBy('order_id');
            $noneCatPending = NoneCatalogueOrder::whereNull('placed_at')->orderBy('id', 'desc')->get()->groupBy('order_id');
            $keyTravelPending = KeyTravel::whereNull('placed_at')->orderBy('id', 'desc')->get();
            $expensePending = Expenses::whereNull('completed_at')->orderBy('id', 'desc')->get()->groupBy('order_id');
            $carHirePending = CarHire::whereNull('placed_at')->orderBy('id', 'desc')->get();
            $trainingPending = Training::whereNull('placed_at')->orderBy('id', 'desc')->get();
            $storesPending = Stores::whereNull('placed_at')->orderBy('id', 'desc')->get()->groupBy('order_id');
            $cateringPending = Catering::whereNull('placed_at')->orderBy('id', 'desc')->get();

            //processing.
            $catProcessing = CatalogueOrders::whereNotNull('placed_at')->whereNull('completed_at')->orderBy('id', 'desc')->get()->groupBy('order_id');
            $noneCatProcessing = NoneCatalogueOrder::whereNotNull('placed_at')->whereNull('completed_at')->orderBy('id', 'desc')->get()->groupBy('order_id');
            $keyTravelProcessing = KeyTravel::whereNotNull('placed_at')->whereNull('completed_at')->orderBy('id', 'desc')->get();
            $expenseProcessing = Expenses::whereNotNull('completed_at')->whereNull('completed_at')->orderBy('id', 'desc')->get()->groupBy('order_id');
            $carHireProcessing = CarHire::whereNotNull('placed_at')->whereNull('completed_at')->orderBy('id', 'desc')->get();
            $trainingProcessing = Training::whereNotNull('placed_at')->whereNull('completed_at')->orderBy('id', 'desc')->get();
            $storesProcessing = Stores::whereNotNull('placed_at')->whereNull('completed_at')->orderBy('id', 'desc')->get()->groupBy('order_id');
            $cateringProcessing = Catering::whereNotNull('placed_at')->whereNull('completed_at')->orderBy('id', 'desc')->get();

            return view('admin.home', [
                'catPending' => $catPending,
                'noneCatPending' => $noneCatPending,
                'keyTravelPending' => $keyTravelPending,
                'expensePending' => $expensePending,
                'carHirePending' => $carHirePending,
                'trainingPending' => $trainingPending,
                'storesPending' => $storesPending,
                'cateringPending' => $cateringPending,
                'catProcessing' => $catProcessing,
                'noneCatProcessing' => $noneCatProcessing,
                'keyTravelProcessing' => $keyTravelProcessing,
                'expenseProcessing' => $expenseProcessing,
                'carHireProcessing' => $carHireProcessing,
                'trainingProcessing' => $trainingProcessing,
                'storesProcessing' => $storesProcessing,
                'cateringProcessing' => $cateringProcessing,
            ]);
        }

        /**
         *
         * User
         */
        //pending.
        $catPending = auth()->user()->catalogueOrders()->whereNull('placed_at')->orderBy('id', 'desc')->get()->groupBy('order_id');
        $noneCatPending = auth()->user()->noneCatalogueOrders()->whereNull('placed_at')->orderBy('id', 'desc')->get()->groupBy('order_id');
        $keyTravelPending = auth()->user()->keyTravel()->whereNull('placed_at')->orderBy('id', 'desc')->get();
        $expensePending = auth()->user()->expenses()->whereNull('completed_at')->orderBy('id', 'desc')->get()->groupBy('order_id');
        $carHirePending = auth()->user()->carHire()->whereNull('placed_at')->orderBy('id', 'desc')->get();
        $trainingPending = auth()->user()->training()->whereNull('placed_at')->orderBy('id', 'desc')->get();
        $storesPending = auth()->user()->stores()->whereNull('placed_at')->orderBy('id', 'desc')->get()->groupBy('order_id');
        $cateringPending = auth()->user()->catering()->whereNull('placed_at')->orderBy('id', 'desc')->get();

        //processing.
        $catProcessing = auth()->user()->catalogueOrders()->whereNotNull('placed_at')->whereNull('completed_at')->orderBy('id', 'desc')->get()->groupBy('order_id');
        $noneCatProcessing = auth()->user()->noneCatalogueOrders()->whereNotNull('placed_at')->whereNull('completed_at')->orderBy('id', 'desc')->get()->groupBy('order_id');
        $keyTravelProcessing = auth()->user()->keyTravel()->whereNotNull('placed_at')->whereNull('completed_at')->orderBy('id', 'desc')->get();
        $expenseProcessing = auth()->user()->expenses()->whereNotNull('completed_at')->whereNull('completed_at')->orderBy('id', 'desc')->get()->groupBy('order_id');
        $carHireProcessing = auth()->user()->carHire()->whereNotNull('placed_at')->whereNull('completed_at')->orderBy('id', 'desc')->get();
        $trainingProcessing = auth()->user()->training()->whereNotNull('placed_at')->whereNull('completed_at')->orderBy('id', 'desc')->get();
        $storesProcessing = auth()->user()->stores()->whereNotNull('placed_at')->whereNull('completed_at')->orderBy('id', 'desc')->get()->groupBy('order_id');
        $cateringProcessing = auth()->user()->catering()->whereNotNull('placed_at')->whereNull('completed_at')->orderBy('id', 'desc')->get();

        $catHistory = auth()->user()->catalogueOrders()->whereNotNull('placed_at')->whereNotNull('completed_at')->orderBy('id', 'desc')->get()->groupBy('order_id');
        $noneCatHistory = auth()->user()->noneCatalogueOrders()->whereNotNull('placed_at')->whereNotNull('completed_at')->orderBy('id', 'desc')->get()->groupBy('order_id');
        $keyTravelHistory = auth()->user()->keyTravel()->whereNotNull('placed_at')->whereNotNull('completed_at')->orderBy('id', 'desc')->get();
        $expenseHistory = auth()->user()->expenses()->whereNotNull('completed_at')->whereNotNull('completed_at')->orderBy('id', 'desc')->get()->groupBy('order_id');
        $carHireHistory = auth()->user()->carHire()->whereNotNull('placed_at')->whereNotNull('completed_at')->orderBy('id', 'desc')->get();
        $trainingHistory = auth()->user()->training()->whereNotNull('placed_at')->whereNotNull('completed_at')->orderBy('id', 'desc')->get();
        $storesHistory = auth()->user()->stores()->whereNotNull('placed_at')->whereNotNull('completed_at')->orderBy('id', 'desc')->get()->groupBy('order_id');
        $cateringHistory = auth()->user()->catering()->whereNotNull('placed_at')->whereNotNull('completed_at')->orderBy('id', 'desc')->get();

        return view('home', [
            'catPending' => $catPending,
            'noneCatPending' => $noneCatPending,
            'keyTravelPending' => $keyTravelPending,
            'expensePending' => $expensePending,
            'carHirePending' => $carHirePending,
            'trainingPending' => $trainingPending,
            'storesPending' => $storesPending,
            'cateringPending' => $cateringPending,
            'catProcessing' => $catProcessing,
            'noneCatProcessing' => $noneCatProcessing,
            'keyTravelProcessing' => $keyTravelProcessing,
            'expenseProcessing' => $expenseProcessing,
            'carHireProcessing' => $carHireProcessing,
            'trainingProcessing' => $trainingProcessing,
            'storesProcessing' => $storesProcessing,
            'cateringProcessing' => $cateringProcessing,
            'catHistory' => $catHistory,
            'noneCatHistory' => $noneCatHistory,
            'keyTravelHistory' => $keyTravelHistory,
            'expenseHistory' => $expenseHistory,
            'carHireHistory' => $carHireHistory,
            'trainingHistory' => $trainingHistory,
            'storesHistory' => $storesHistory,
            'cateringHistory' => $cateringHistory,
        ]);
    }

    /**
     *
     */
    public function myAccount()
    {
        return view('my-account');
    }

    /**
     *
     */
    public function myAccountUpdate(Request $request)
    {

        $data = $request->except('_token', 'old_password', 'password', 'password_confirm', 'signature', 'removeFile');


        $error = false;

        if ($request->password && $request->password_confirm) {
            if (Hash::check($request->old_password, auth()->user()->password)) {
                if ($request->password == $request->password_confirm) {
                    $data['password'] = Hash::make($request->password);
                } else {
                    $error = true;
                }
            } else {
                $error = true;
            }
        }

        $success = false;
        if (!$error) {

            if ($request->has('removeFile')) {
                Storage::disk('files')->delete(auth()->user()->signature);
                $data['signature'] = null;
            }

            $success = auth()->user()->update($data);
        }

        if ($request->hasFile('signature')) {
            $file = $request->file('signature');
            $name = $file->store('files');
            auth()->user()->signature = basename($name);
            auth()->user()->save();
        }

        return view('my-account', [
            'success' => $success,
            'error' => $error,
        ]);
    }

    /**
     *
     */
    public function security()
    {
        $rows = Security::orderBy('id', 'desc')->paginate(15);

        return view('admin.security', ['rows' => $rows]);
    }

}
