<?php

namespace App\Http\Controllers;

use App\CarHire;
use App\CatalogueOrders;
use App\Catering;
use App\Expenses;
use App\KeyTravel;
use App\NoneCatalogueOrder;
use App\Stores;
use App\Training;
use Illuminate\Http\Request;

class ReportController extends Controller
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
    public function index(Request $request)
    {
        if ($request->ajax()) {

            return $this->search($request);

        }

        return view('admin.reports.index');
    }

    /**
     *
     */
    public function search(Request $request)
    {

        $startDate = $request->from ? $request->from : '2010-01-01';
        $endDate = $request->to ? $request->to : now()->format('Y-m-d');

        $rows = [
            'carhire' => collect(),
            'catering' => collect(),
            'expenses' => collect(),
            'training' => collect(),
            'travel' => collect(),
            'noncatalogue' => collect(),
            'catalogue' => collect(),
            'stores' => collect(),
        ];

        // $request->field;
        // $request->search;

        if ($request->type == "all" || $request->type == "travel") {
            $rows['carhire'] = CarHire::whereNotNull('completed_at')->whereRaw("date(start_date) between date('$startDate') and date('$endDate')")->get();
            $rows['catering'] = Catering::whereNotNull('completed_at')->whereRaw("date(completed_at) between date('$startDate') and date('$endDate')")->get();
            $rows['expenses'] = Expenses::whereNotNull('completed_at')->whereRaw("date(start_date) between date('$startDate') and date('$endDate')")->get();
            $rows['training'] = Training::whereNotNull('completed_at')->whereRaw("date(start_date) between date('$startDate') and date('$endDate')")->get();
            $rows['travel'] = KeyTravel::whereNotNull('completed_at')->whereRaw("date(completed_at) between date('$startDate') and date('$endDate')")->get();

            if ($request->type == "travel") {
                $rows['noncatalogue'] = NoneCatalogueOrder::whereNotNull('completed_at')->whereRaw("date(completed_at) between date('$startDate') and date('$endDate')")->where('type_id', 3)->get();
            }

        }

        if ($request->type == "all" || $request->type == "consumables") {
            $rows['catalogue'] = CatalogueOrders::whereNotNull('completed_at')->whereRaw("date(completed_at) between date('$startDate') and date('$endDate')")->get();
            $rows['stores'] = Stores::whereNotNull('completed_at')->whereRaw("date(placed_at) between date('$startDate') and date('$endDate')")->get();

            if ($request->type == "consumables") {
                $rows['noncatalogue'] = NoneCatalogueOrder::whereNotNull('completed_at')->whereRaw("date(completed_at) between date('$startDate') and date('$endDate')")->where('type_id', 1)->get();
            }
        }

        if ($request->type = "all") {
            $rows['noncatalogue'] = NoneCatalogueOrder::whereNotNull('completed_at')->whereRaw("date(completed_at) between date('$startDate') and date('$endDate')")->get();
        }

        if ($request->type = "equipment") {
            $rows['noncatalogue'] = NoneCatalogueOrder::whereNotNull('completed_at')->whereRaw("date(completed_at) between date('$startDate') and date('$endDate')")->where('type_id', 2)->get();
        }

        $this->filter($request, $rows);

        return view('admin.reports.rows', ['rows' => $rows]);

    }

    /**
     *
     */
    private function filter(Request $request, &$rows)
    {
        if (!$request->search) {
            return false;
        }

        $filters = [
            'requisition_no' => 'requisition_no',
            'requisitioner' => 'requisitioner.name',
            'administrator' => 'admin.name',
            'department' => 'requisitioner.department.name',
        ];

        $rows['catalogue'] = $rows['catalogue']->where($filters[$request->field], $request->search);
        $rows['noncatalogue'] = $rows['noncatalogue']->where($filters[$request->field], $request->search);
        $rows['carhire'] = $rows['carhire']->where($filters[$request->field], $request->search);
        $rows['catering'] = $rows['catering']->where($filters[$request->field], $request->search);
        $rows['expenses'] = $rows['expenses']->where($filters[$request->field], $request->search);
        $rows['training'] = $rows['training']->where($filters[$request->field], $request->search);
        $rows['travel'] = $rows['travel']->where($filters[$request->field], $request->search);
        $rows['stores'] = $rows['stores']->where($filters[$request->field], $request->search);

    }
}
