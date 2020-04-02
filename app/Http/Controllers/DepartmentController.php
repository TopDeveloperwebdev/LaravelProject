<?php

namespace App\Http\Controllers;

use App\Departments;
use Illuminate\Http\Request;

class DepartmentController extends Controller
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
        $departments = Departments::all();
        return view('admin.departments.index', ['departments' => $departments]);
    }

    /**
     *
     */
    public function create()
    {
        return view('admin.departments.create');
    }

    /**
     *
     */
    public function store(Request $request)
    {
        $data = $request->except('_token');

        $dept = Departments::create($data);

        if (!$dept) {
            throw new \Exception('An error has occurred');
        }

        return redirect('/departments?new=success');
    }

    /**
     *
     */
    public function show($department)
    {
        $department = Departments::find($department);
        return view('admin.departments.show', ['department' => $department]);
    }

    /**
     *
     */
    public function update(Request $request, $department)
    {
        $department = Departments::find($department);
        $department->update($request->except('_token'));

        return view('admin.departments.show', ['department' => $department, 'updated' => true]);
    }

     public function delete($department)
    {
        $department = Departments::whereId($department);
        $department->delete();
       return redirect('/departments?new=success');
    }
}
