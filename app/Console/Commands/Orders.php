<?php

namespace App\Console\Commands;

use App\CarHire;
use App\CatalogueOrders;
use App\Catering;
use App\Eurostar;
use App\Expenses;
use App\Flight;
use App\Hotel;
use App\KeyTravel;
use App\NoneCatalogueOrder;
use App\Notes;
use App\Stores;
use App\Train;
use App\Training;
use Illuminate\Console\Command;

class Orders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'clear:orders';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clears all orders';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        CarHire::all()->each(function ($item) {
            $item->forceDelete();
        });
        CatalogueOrders::all()->each(function ($item) {
            $item->forceDelete();
        });
        Catering::all()->each(function ($item) {
            $item->forceDelete();
        });
        Eurostar::all()->each(function ($item) {
            $item->forceDelete();
        });
        Expenses::all()->each(function ($item) {
            $item->forceDelete();
        });
        Flight::all()->each(function ($item) {
            $item->forceDelete();
        });
        Hotel::all()->each(function ($item) {
            $item->forceDelete();
        });
        KeyTravel::all()->each(function ($item) {
            $item->forceDelete();
        });
        NoneCatalogueOrder::all()->each(function ($item) {
            $item->forceDelete();
        });
        Notes::all()->each(function ($item) {
            $item->forceDelete();
        });
        Stores::all()->each(function ($item) {
            $item->forceDelete();
        });
        Train::all()->each(function ($item) {
            $item->forceDelete();
        });
        Training::all()->each(function ($item) {
            $item->forceDelete();
        });

    }
}
