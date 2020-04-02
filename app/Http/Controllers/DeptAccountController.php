<?php

namespace App\Http\Controllers;

use App\Budget;
use App\CarHire;
use App\CatalogueOrders;
use App\Catering;
use App\Eurostar;
use App\Expenses;
use App\Flight;
use App\Hotel;
use App\NoneCatalogueOrder;
use App\Stores;
use App\Train;
use App\Training;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DeptAccountController extends Controller
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
        if (!$request->ajax()) {
            return view('admin.department-accounts.index');
        }

        $filters = json_decode($request->filters);
        /**
         * YEAR
         */
        $year = 0;
        if (in_array('year_2', $filters)) {
            $year = 1;
        }
        if (in_array('year_3', $filters)) {
            $year = 2;
        }

        $startDate = Carbon::parse('2019-03-01 00:00:00')->addYears($year);
        $endDate = Carbon::parse($startDate)->endOfMonth()->addYear();

        /**
         * FORMAT
         */
        $format = 'total';
        if (in_array('claim', $filters)) {
            $format = "claim";
        }

        /**
         * DISPLAY
         */
        $display = "monthly";
        if (in_array('quarterly', $filters)) {
            $display = "quarterly";
        }
        if (in_array('monthly', $filters) && in_array('quarterly', $filters)) {
            $display = "month_qtr";
        }

        $rows['carhire'] = CarHire::select(\DB::raw('DATE_FORMAT(start_date,"%b-%y") as date'), \DB::raw('sum(total) as total'))->whereNotNull('completed_at')->whereRaw("date(start_date) between date('$startDate') and date('$endDate')")->groupBy('date')->get()->pluck('total', 'date')->toArray();
        $rows['catalogue'] = CatalogueOrders::select(\DB::raw('DATE_FORMAT(completed_at,"%b-%y") as date'), \DB::raw('sum(total) as total'))->whereNotNull('completed_at')->whereRaw("date(completed_at) between date('$startDate') and date('$endDate')")->groupBy('date')->get()->pluck('total', 'date')->toArray();
        $rows['catering'] = Catering::select(\DB::raw('DATE_FORMAT(completed_at,"%b-%y") as date'), \DB::raw('sum(value) as total'))->whereNotNull('completed_at')->whereRaw("date(completed_at) between date('$startDate') and date('$endDate')")->groupBy('date')->get()->pluck('total', 'date')->toArray();
        $rows['expenses'] = Expenses::select(\DB::raw('DATE_FORMAT(start_date,"%b-%y") as date'), \DB::raw('sum(total) as total'))->whereNotNull('completed_at')->whereRaw("date(start_date) between date('$startDate') and date('$endDate')")->groupBy('date')->get()->pluck('total', 'date')->toArray();
        $rows['noncatalogue'] = NoneCatalogueOrder::select(\DB::raw('DATE_FORMAT(completed_at,"%b-%y") as date'), \DB::raw('sum(total) as total'))->whereNotNull('completed_at')->whereRaw("date(completed_at) between date('$startDate') and date('$endDate')")->groupBy('date')->get()->pluck('total', 'date')->toArray();
        $rows['stores'] = Stores::select(\DB::raw('DATE_FORMAT(placed_at,"%b-%y") as date'), \DB::raw('sum(total) as total'))->whereNotNull('completed_at')->whereRaw("date(placed_at) between date('$startDate') and date('$endDate')")->groupBy('date')->get()->pluck('total', 'date')->toArray();
        $rows['training'] = Training::select(\DB::raw('DATE_FORMAT(start_date,"%b-%y") as date'), \DB::raw('sum(value) as total'))->whereNotNull('completed_at')->whereRaw("date(start_date) between date('$startDate') and date('$endDate')")->groupBy('date')->get()->pluck('total', 'date')->toArray();

        $travel = [];
        $travel[] = Train::select(\DB::raw('DATE_FORMAT(departure_date,"%b-%y") as date'), \DB::raw('sum(value) as total'))->whereNotNull('completed_at')->whereRaw("date(departure_date) between date('$startDate') and date('$endDate')")->leftJoin('key_travel', 'parent_id', 'key_travel.id')->groupBy('date')->get()->pluck('total', 'date')->toArray();
        $travel[] = Hotel::select(\DB::raw('DATE_FORMAT(checkin_date,"%b-%y") as date'), \DB::raw('sum(value) as total'))->whereNotNull('completed_at')->whereRaw("date(checkin_date) between date('$startDate') and date('$endDate')")->leftJoin('key_travel', 'parent_id', 'key_travel.id')->groupBy('date')->get()->pluck('total', 'date')->toArray();
        $travel[] = Eurostar::select(\DB::raw('DATE_FORMAT(departure_date,"%b-%y") as date'), \DB::raw('sum(value) as total'))->whereNotNull('completed_at')->whereRaw("date(departure_date) between date('$startDate') and date('$endDate')")->leftJoin('key_travel', 'parent_id', 'key_travel.id')->groupBy('date')->get()->pluck('total', 'date')->toArray();
        $travel[] = Flight::select(\DB::raw('DATE_FORMAT(departure_date,"%b-%y") as date'), \DB::raw('sum(value) as total'))->whereNotNull('completed_at')->whereRaw("date(departure_date) between date('$startDate') and date('$endDate')")->leftJoin('key_travel', 'parent_id', 'key_travel.id')->groupBy('date')->get()->pluck('total', 'date')->toArray();

        $array = [];
        foreach (collect($travel) as $t) {
            foreach ($t as $month => $total) {
                if (isset($array[$month])) {
                    $array[$month] += $total;
                } else {
                    $array[$month] = $total;
                }
            }
        }

        $rows['travel'] = $array;

        if ($format == "claim") {
            $claimArray = [
                'Consumables' => [
                    $rows['catalogue'],
                    $rows['stores'],
                    NoneCatalogueOrder::select(\DB::raw('DATE_FORMAT(completed_at,"%b-%y") as date'), \DB::raw('sum(total) as total'))->whereNotNull('completed_at')->whereRaw("date(completed_at) between date('$startDate') and date('$endDate')")->where('type_id', 1)->groupBy('date')->get()->pluck('total', 'date')->toArray(),
                ],
                'Equipment' => [
                    NoneCatalogueOrder::select(\DB::raw('DATE_FORMAT(completed_at,"%b-%y") as date'), \DB::raw('sum(total) as total'))->whereNotNull('completed_at')->whereRaw("date(completed_at) between date('$startDate') and date('$endDate')")->where('type_id', 2)->groupBy('date')->get()->pluck('total', 'date')->toArray(),
                ],
                'Travel' => [
                    $rows['travel'],
                    $rows['catering'],
                    $rows['carhire'],
                    $rows['expenses'],
                    $rows['training'],
                    NoneCatalogueOrder::select(\DB::raw('DATE_FORMAT(completed_at,"%b-%y") as date'), \DB::raw('sum(total) as total'))->whereNotNull('completed_at')->whereRaw("date(completed_at) between date('$startDate') and date('$endDate')")->where('type_id', 3)->groupBy('date')->get()->pluck('total', 'date')->toArray(),
                ],
            ];
        }

        if (in_array('committed', $filters)) {
            $rows['carhire_committed'] = CarHire::select(\DB::raw('DATE_FORMAT(start_date,"%b-%y") as date'), \DB::raw('sum(total) as total'))->whereNull('completed_at')->whereNotNull('placed_at')->whereRaw("date(start_date) between date('$startDate') and date('$endDate')")->groupBy('date')->get()->pluck('total', 'date')->toArray();
            $rows['catalogue_committed'] = CatalogueOrders::select(\DB::raw('DATE_FORMAT(placed_at,"%b-%y") as date'), \DB::raw('sum(total) as total'))->whereNull('completed_at')->whereNotNull('placed_at')->whereRaw("date(placed_at) between date('$startDate') and date('$endDate')")->groupBy('date')->get()->pluck('total', 'date')->toArray();
            $rows['catering_committed'] = Catering::select(\DB::raw('DATE_FORMAT(placed_at,"%b-%y") as date'), \DB::raw('sum(value) as total'))->whereNull('completed_at')->whereNotNull('placed_at')->whereRaw("date(placed_at) between date('$startDate') and date('$endDate')")->groupBy('date')->get()->pluck('total', 'date')->toArray();
            $rows['expenses_committed'] = Expenses::select(\DB::raw('DATE_FORMAT(start_date,"%b-%y") as date'), \DB::raw('sum(total) as total'))->whereNull('completed_at')->whereRaw("date(start_date) between date('$startDate') and date('$endDate')")->groupBy('date')->get()->pluck('total', 'date')->toArray();
            $rows['noncatalogue_committed'] = NoneCatalogueOrder::select(\DB::raw('DATE_FORMAT(placed_at,"%b-%y") as date'), \DB::raw('sum(total) as total'))->whereNull('completed_at')->whereNotNull('placed_at')->whereRaw("date(placed_at) between date('$startDate') and date('$endDate')")->groupBy('date')->get()->pluck('total', 'date')->toArray();
            $rows['stores_committed'] = Stores::select(\DB::raw('DATE_FORMAT(placed_at,"%b-%y") as date'), \DB::raw('sum(total) as total'))->whereNull('completed_at')->whereNotNull('placed_at')->whereRaw("date(placed_at) between date('$startDate') and date('$endDate')")->groupBy('date')->get()->pluck('total', 'date')->toArray();
            $rows['training_committed'] = Training::select(\DB::raw('DATE_FORMAT(start_date,"%b-%y") as date'), \DB::raw('sum(value) as total'))->whereNull('completed_at')->whereNotNull('placed_at')->whereRaw("date(start_date) between date('$startDate') and date('$endDate')")->groupBy('date')->get()->pluck('total', 'date')->toArray();

            $travel = [];
            $travel[] = Train::select(\DB::raw('DATE_FORMAT(departure_date,"%b-%y") as date'), \DB::raw('sum(value) as total'))->whereNull('completed_at')->whereNotNull('placed_at')->whereRaw("date(departure_date) between date('$startDate') and date('$endDate')")->leftJoin('key_travel', 'parent_id', 'key_travel.id')->groupBy('date')->get()->pluck('total', 'date')->toArray();
            $travel[] = Hotel::select(\DB::raw('DATE_FORMAT(checkin_date,"%b-%y") as date'), \DB::raw('sum(value) as total'))->whereNull('completed_at')->whereNotNull('placed_at')->whereRaw("date(checkin_date) between date('$startDate') and date('$endDate')")->leftJoin('key_travel', 'parent_id', 'key_travel.id')->groupBy('date')->get()->pluck('total', 'date')->toArray();
            $travel[] = Eurostar::select(\DB::raw('DATE_FORMAT(departure_date,"%b-%y") as date'), \DB::raw('sum(value) as total'))->whereNull('completed_at')->whereNotNull('placed_at')->whereRaw("date(departure_date) between date('$startDate') and date('$endDate')")->leftJoin('key_travel', 'parent_id', 'key_travel.id')->groupBy('date')->get()->pluck('total', 'date')->toArray();
            $travel[] = Flight::select(\DB::raw('DATE_FORMAT(departure_date,"%b-%y") as date'), \DB::raw('sum(value) as total'))->whereNull('completed_at')->whereNotNull('placed_at')->whereRaw("date(departure_date) between date('$startDate') and date('$endDate')")->leftJoin('key_travel', 'parent_id', 'key_travel.id')->groupBy('date')->get()->pluck('total', 'date')->toArray();

            $array = [];
            foreach (collect($travel) as $t) {
                foreach ($t as $month => $total) {
                    if (isset($array[$month])) {
                        $array[$month] += $total;
                    } else {
                        $array[$month] = $total;
                    }
                }
            }

            $rows['travel_committed'] = $array;

            if ($format == "claim") {
                $claimArray['Consumables_committed'] = [
                    $rows['catalogue_committed'],
                    $rows['stores_committed'],
                    NoneCatalogueOrder::select(\DB::raw('DATE_FORMAT(placed_at,"%b-%y") as date'), \DB::raw('sum(total) as total'))->whereNull('completed_at')->whereNotNull('placed_at')->whereRaw("date(placed_at) between date('$startDate') and date('$endDate')")->where('type_id', 1)->groupBy('date')->get()->pluck('total', 'date')->toArray(),
                ];
                $claimArray['Equipment_committed'] = [
                    NoneCatalogueOrder::select(\DB::raw('DATE_FORMAT(placed_at,"%b-%y") as date'), \DB::raw('sum(total) as total'))->whereNull('completed_at')->whereNotNull('placed_at')->whereRaw("date(placed_at) between date('$startDate') and date('$endDate')")->where('type_id', 2)->groupBy('date')->get()->pluck('total', 'date')->toArray(),
                ];
                $claimArray['Travel_committed'] = [
                    $rows['travel_committed'],
                    $rows['catering_committed'],
                    $rows['carhire_committed'],
                    $rows['expenses_committed'],
                    $rows['training_committed'],
                    NoneCatalogueOrder::select(\DB::raw('DATE_FORMAT(placed_at,"%b-%y") as date'), \DB::raw('sum(total) as total'))->whereNull('completed_at')->whereNotNull('placed_at')->whereRaw("date(placed_at) between date('$startDate') and date('$endDate')")->where('type_id', 3)->groupBy('date')->get()->pluck('total', 'date')->toArray(),
                ];
            }
        }
        if (isset($claimArray)) {

            $collection = [
                'Consumables' => [],
                'Equipment' => [],
                'Travel' => [],
                'Consumables_committed' => [],
                'Equipment_committed' => [],
                'Travel_committed' => [],
            ];

            foreach ($claimArray as $key => $a) {
                foreach ($a as $b) {
                    foreach ($b as $k => $c) {
                        if (!isset($collection[$key][$k])) {
                            $collection[$key][$k] = $c;
                        } else {
                            $collection[$key][$k] += $c;
                        }
                    }
                }
            }

        }

        $budget = Budget::all('month', 'value')->pluck('value', 'month');

        /**
         * return.
         */
        if ($format == "total" /*&& ($display == "monthly" || $display == "month_qtr")*/) {
            return view('admin.department-accounts.total', [
                'start' => $startDate,
                'end' => $endDate,
                'rows' => $rows,
                'filters' => $filters,
                'display' => $display,
                'carbon' => Carbon::class,
                'budget' => $budget,
            ]);
        }

        /**
         * return.
         */
        if ($format == "claim" /*&& ($display == "monthly" || $display == "month_qtr")*/) {
            return view('admin.department-accounts.claim', [
                'start' => $startDate,
                'end' => $endDate,
                'rows' => $collection,
                'filters' => $filters,
                'display' => $display,
                'carbon' => Carbon::class,
                'budget' => $budget,
            ]);
        }

    }

    /**
     *
     */
    public function saveMonthBudget(Request $request)
    {

        $a = Budget::where('month', $request->month)->first();

        if (!$a) {
            $a = Budget::create([
                'month' => $request->month,
                'value' => $request->val,
            ]);
        }

        $a->value = $request->val;
        $a->save();

        return $a;
    }

}