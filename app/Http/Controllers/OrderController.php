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
use Illuminate\Support\Facades\Artisan;

class OrderController extends Controller
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

            $catPending = CatalogueOrders::where('placed', 0)->get()->groupBy('order_id');

            return view('admin.home', ['catPending' => $catPending]);
        }

        /**
         *
         * User
         */
        $catPending = auth()->user()->catalogueOrders()->where('placed', 0)->get()->groupBy('order_id');

        return view('home', ['catPending' => $catPending]);

    }

    /**
     *
     */
    public function pendingOrders()
    {
        return Artisan::call('clean:all');
    }

    /**
     *
     */
    public function pending()
    {

        if (auth()->user()->is_admin && auth()->user()->admin_view) {

            $catPending = CatalogueOrders::whereNull('placed_at')->orderBy('id', 'desc')->get()->groupBy('order_id');
            $noneCatPending = NoneCatalogueOrder::whereNull('placed_at')->orderBy('id', 'desc')->get()->groupBy('order_id');
            $keyTravelPending = KeyTravel::whereNull('placed_at')->orderBy('id', 'desc')->get();
            $expensePending = Expenses::whereNull('completed_at')->orderBy('id', 'desc')->get()->groupBy('order_id');
            $carHirePending = CarHire::whereNull('placed_at')->orderBy('id', 'desc')->get();
            $trainingPending = Training::whereNull('placed_at')->orderBy('id', 'desc')->get();
            $storesPending = Stores::whereNull('placed_at')->orderBy('id', 'desc')->get()->groupBy('order_id');
            $cateringPending = Catering::whereNull('placed_at')->orderBy('id', 'desc')->get();

            return view('admin.pending', [
                'catPending' => $catPending,
                'noneCatPending' => $noneCatPending,
                'keyTravelPending' => $keyTravelPending,
                'expensePending' => $expensePending,
                'carHirePending' => $carHirePending,
                'trainingPending' => $trainingPending,
                'storesPending' => $storesPending,
                'cateringPending' => $cateringPending,
            ]);
        }

        //pending.
        $catPending = auth()->user()->catalogueOrders()->whereNull('placed_at')->orderBy('id', 'desc')->get()->groupBy('order_id');
        $noneCatPending = auth()->user()->noneCatalogueOrders()->whereNull('placed_at')->orderBy('id', 'desc')->get()->groupBy('order_id');
        $keyTravelPending = auth()->user()->keyTravel()->whereNull('placed_at')->orderBy('id', 'desc')->get();
        $expensePending = auth()->user()->expenses()->whereNull('completed_at')->orderBy('id', 'desc')->get()->groupBy('order_id');
        $carHirePending = auth()->user()->carHire()->whereNull('placed_at')->orderBy('id', 'desc')->get();
        $trainingPending = auth()->user()->training()->whereNull('placed_at')->orderBy('id', 'desc')->get();
        $storesPending = auth()->user()->stores()->whereNull('placed_at')->orderBy('id', 'desc')->get()->groupBy('order_id');
        $cateringPending = auth()->user()->catering()->whereNull('placed_at')->orderBy('id', 'desc')->get();

        return view('pending', [
            'catPending' => $catPending,
            'noneCatPending' => $noneCatPending,
            'keyTravelPending' => $keyTravelPending,
            'expensePending' => $expensePending,
            'carHirePending' => $carHirePending,
            'trainingPending' => $trainingPending,
            'storesPending' => $storesPending,
            'cateringPending' => $cateringPending,
        ]);
    }

    /**
     *
     */
    public function processing()
    {

        if (auth()->user()->is_admin && auth()->user()->admin_view) {
            $catProcessing = CatalogueOrders::whereNotNull('placed_at')->whereNull('completed_at')->orderBy('id', 'desc')->get()->groupBy('order_id');
            $noneCatProcessing = NoneCatalogueOrder::whereNotNull('placed_at')->whereNull('completed_at')->orderBy('id', 'desc')->get()->groupBy('order_id');
            $keyTravelProcessing = KeyTravel::whereNotNull('placed_at')->whereNull('completed_at')->orderBy('id', 'desc')->get();
            $expenseProcessing = Expenses::whereNotNull('completed_at')->whereNull('completed_at')->orderBy('id', 'desc')->get()->groupBy('order_id');
            $carHireProcessing = CarHire::whereNotNull('placed_at')->whereNull('completed_at')->orderBy('id', 'desc')->get();
            $trainingProcessing = Training::whereNotNull('placed_at')->whereNull('completed_at')->orderBy('id', 'desc')->get();
            $storesProcessing = Stores::whereNotNull('placed_at')->whereNull('completed_at')->orderBy('id', 'desc')->get()->groupBy('order_id');
            $cateringProcessing = Catering::whereNotNull('placed_at')->whereNull('completed_at')->orderBy('id', 'desc')->get();

            return view('processing', [
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

        //pending.
        $catProcessing = auth()->user()->catalogueOrders()->whereNotNull('placed_at')->whereNull('completed_at')->orderBy('id', 'desc')->get()->groupBy('order_id');
        $noneCatProcessing = auth()->user()->noneCatalogueOrders()->whereNotNull('placed_at')->whereNull('completed_at')->orderBy('id', 'desc')->get()->groupBy('order_id');
        $keyTravelProcessing = auth()->user()->keyTravel()->whereNotNull('placed_at')->whereNull('completed_at')->orderBy('id', 'desc')->get();
        $expenseProcessing = auth()->user()->expenses()->whereNotNull('completed_at')->whereNull('completed_at')->orderBy('id', 'desc')->get()->groupBy('order_id');
        $carHireProcessing = auth()->user()->carHire()->whereNotNull('placed_at')->whereNull('completed_at')->orderBy('id', 'desc')->get();
        $trainingProcessing = auth()->user()->training()->whereNotNull('placed_at')->whereNull('completed_at')->orderBy('id', 'desc')->get();
        $storesProcessing = auth()->user()->stores()->whereNotNull('placed_at')->whereNull('completed_at')->orderBy('id', 'desc')->get()->groupBy('order_id');
        $cateringProcessing = auth()->user()->catering()->whereNotNull('placed_at')->whereNull('completed_at')->orderBy('id', 'desc')->get();

        return view('processing', [
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
     */
    public function history()
    {
        if (auth()->user()->is_admin && auth()->user()->admin_view) {

            $catHistory = CatalogueOrders::whereNotNull('placed_at')->whereNotNull('completed_at')->orderBy('id', 'desc')->get()->groupBy('order_id');
            $noneCatHistory = NoneCatalogueOrder::whereNotNull('placed_at')->whereNotNull('completed_at')->orderBy('id', 'desc')->get()->groupBy('order_id');
            $keyTravelHistory = KeyTravel::whereNotNull('placed_at')->whereNotNull('completed_at')->orderBy('id', 'desc')->get();
            $expenseHistory = Expenses::whereNotNull('completed_at')->whereNotNull('completed_at')->orderBy('id', 'desc')->get()->groupBy('order_id');
            $carHireHistory = CarHire::whereNotNull('placed_at')->whereNotNull('completed_at')->orderBy('id', 'desc')->get();
            $trainingHistory = Training::whereNotNull('placed_at')->whereNotNull('completed_at')->orderBy('id', 'desc')->get();
            $storesHistory = Stores::whereNotNull('placed_at')->whereNotNull('completed_at')->orderBy('id', 'desc')->get()->groupBy('order_id');
            $cateringHistory = Catering::whereNotNull('placed_at')->whereNotNull('completed_at')->orderBy('id', 'desc')->get();

            $view = 'admin.history';

        } else {
            $catHistory = auth()->user()->catalogueOrders()->whereNotNull('placed_at')->whereNotNull('completed_at')->orderBy('id', 'desc')->get()->groupBy('order_id');
            $noneCatHistory = auth()->user()->noneCatalogueOrders()->whereNotNull('placed_at')->whereNotNull('completed_at')->orderBy('id', 'desc')->get()->groupBy('order_id');
            $keyTravelHistory = auth()->user()->keyTravel()->whereNotNull('placed_at')->whereNotNull('completed_at')->orderBy('id', 'desc')->get();
            $expenseHistory = auth()->user()->expenses()->whereNotNull('completed_at')->whereNotNull('completed_at')->orderBy('id', 'desc')->get()->groupBy('order_id');
            $carHireHistory = auth()->user()->carHire()->whereNotNull('placed_at')->whereNotNull('completed_at')->orderBy('id', 'desc')->get();
            $trainingHistory = auth()->user()->training()->whereNotNull('placed_at')->whereNotNull('completed_at')->orderBy('id', 'desc')->get();
            $storesHistory = auth()->user()->stores()->whereNotNull('placed_at')->whereNotNull('completed_at')->orderBy('id', 'desc')->get()->groupBy('order_id');
            $cateringHistory = auth()->user()->catering()->whereNotNull('placed_at')->whereNotNull('completed_at')->orderBy('id', 'desc')->get();

            $view = 'history';
        }

        return view($view, [
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

}
