<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/home', function () {
    return redirect('/');
});

// Route::get('/pi', function () {
//     return view('partner.index');
// });

Auth::routes();

Route::group(['middleware' => ['auth',]], function() {
    Route::get('/my-account', 'HomeController@myAccount')->name('my-account');
    //Route::post('/myaccount', 'AccountController@storePartner')
    Route::post('/my-account', 'HomeController@myAccountUpdate')->name('my-account.update');
});

Route::group(['middleware' => ['auth', 'partner']], function () {

    Route::get('/users/signatures/{user}', 'AccountController@signature');

    // Route::get('/my-account', 'HomeController@myAccount')->name('my-account');
    // //Route::post('/myaccount', 'AccountController@storePartner')
    // Route::post('/my-account', 'HomeController@myAccountUpdate')->name('my-account.update');

    Route::get('/', 'HomeController@index')->name('home');

    Route::get('/pending', 'OrderController@pending')->name('pending');
    Route::get('/processing', 'OrderController@processing')->name('processing');
    Route::get('/history', 'OrderController@history')->name('history');
    Route::get('/pending-orders', 'OrderController@pendingOrders');

    /**
     *
     * Catalogue
     *
     */
    Route::group(['prefix' => 'catalogue', 'as' => 'catalogue.'], function () {
        Route::get('/', 'CatalogueController@create')->name('create');
        Route::post('/', 'CatalogueController@store')->name('store');

        Route::group(['middleware' => 'catalogueOrder'], function () {
            /**
             * Orders
             */
            Route::get('/{order}', 'CatalogueController@show')->name('show');
            Route::get('/{order}/processing', 'CatalogueController@processing')->name('processing');
            Route::get('/{order}/close', 'CatalogueController@close')->name('close');

            /**
             *  Order Items
             */
            Route::group(['middleware' => 'catalogueOrderItem'], function () {
                Route::post('/{order}/{item}', 'CatalogueController@update')->name('show');
                Route::get('/{order}/{item}/delete', 'CatalogueController@destroy')->name('delete');
                Route::post('/{order}/{item}/upload', 'CatalogueController@upload')->name('upload');
                Route::get('/{order}/{item}/file', 'CatalogueController@file')->name('file');
                Route::get('/{order}/{item}/file-delete', 'CatalogueController@deletefile')->name('file.delete');
                Route::get('/{order}/{item}/notes', 'NotesController@index')->name('notes.index');
                Route::post('/{order}/{item}/notes', 'NotesController@store')->name('notes.store');
            });

        });

    });

    /**
     * Non Catalogue
     *
     */
    Route::group(['prefix' => 'none-catalogue', 'as' => 'none-catalogue.'], function () {
        Route::get('/', 'NoneCatalogueController@create')->name('create');
        Route::post('/', 'NoneCatalogueController@store')->name('store');

        /**
         * Orders
         */
        Route::get('/{order}', 'NoneCatalogueController@show')->name('show');
        Route::get('/{order}/processing', 'NoneCatalogueController@processing')->name('processing');
        Route::get('/{order}/close', 'NoneCatalogueController@close')->name('close');

        /**
         *  Order Items
         */

        Route::post('/{order}/{item}', 'NoneCatalogueController@update')->name('show');
        Route::get('/{order}/{item}/delete', 'NoneCatalogueController@destroy')->name('delete');
        Route::post('/{order}/{item}/upload', 'NoneCatalogueController@upload')->name('upload');
        Route::get('/{order}/{item}/file', 'NoneCatalogueController@file')->name('file');
        Route::get('/{order}/{item}/file-delete', 'NoneCatalogueController@deletefile')->name('file.delete');
        Route::get('/{order}/{item}/notes', 'NoneCatalogueController@notes')->name('notes.index');
        Route::post('/{order}/{item}/notes', 'NoneCatalogueController@noteSave')->name('notes.store');
        Route::get('/{order}/{item}/get-files', 'NoneCatalogueController@allFiles')->name('files.index');
        Route::get('/{order}/{item}/{file}', 'NoneCatalogueController@files')->name('files.show');
        Route::get('/{order}/{item}/{file}/delete', 'NoneCatalogueController@filesDelete')->name('files.delete');

    });

    /**
     * Key Travel
     */
    Route::group(['prefix' => 'key-travel', 'as' => 'key-travel.'], function () {

        Route::post('{order}/{item}/upload', 'KeyTravelController@store');
        Route::get('{order}/{file}/file', 'KeyTravelController@show');

        Route::group(['prefix' => 'train', 'as' => 'train.'], function () {
            Route::get('/', 'TrainController@create')->name('create');
            Route::post('/', 'TrainController@store')->name('store');

            Route::get('/{order}', 'TrainController@show')->name('show');
            Route::get('/{order}/processing', 'TrainController@processing')->name('processing');
            Route::get('/{order}/complete', 'TrainController@complete')->name('complete');
            Route::post('/{order}/{item}', 'TrainController@update')->name('update');
            Route::get('/{order}/{item}/notes', 'TrainController@notes')->name('notes');
            Route::post('/{order}/{item}/notes', 'TrainController@noteSave')->name('notes.store');
        });

        Route::group(['prefix' => 'flight', 'as' => 'flight.'], function () {
            Route::get('/', 'FlightController@create')->name('create');
            Route::post('/', 'FlightController@store')->name('store');

            Route::get('/{order}', 'FlightController@show')->name('show');
            Route::get('/{order}/processing', 'FlightController@processing')->name('processing');
            Route::get('/{order}/complete', 'FlightController@complete')->name('complete');
            Route::post('/{order}/{item}', 'FlightController@update')->name('update');
            Route::get('/{order}/{item}/notes', 'FlightController@notes')->name('notes');
            Route::post('/{order}/{item}/notes', 'FlightController@noteSave')->name('notes.store');
        });

        Route::group(['prefix' => 'hotel', 'as' => 'hotel.'], function () {
            Route::get('/', 'HotelController@create')->name('create');
            Route::post('/', 'HotelController@store')->name('store');

            Route::get('/{order}', 'HotelController@show')->name('show');
            Route::get('/{order}/processing', 'HotelController@processing')->name('processing');
            Route::get('/{order}/complete', 'HotelController@complete')->name('complete');
            Route::post('/{order}/{item}', 'HotelController@update')->name('update');
            Route::get('/{order}/{item}/notes', 'HotelController@notes')->name('notes');
            Route::post('/{order}/{item}/notes', 'HotelController@noteSave')->name('notes.store');
        });

        Route::group(['prefix' => 'eurostar', 'as' => 'eurostar.'], function () {
            Route::get('/', 'EurostarController@create')->name('create');
            Route::post('/', 'EurostarController@store')->name('store');

            Route::get('/{order}', 'EurostarController@show')->name('show');
            Route::get('/{order}/processing', 'EurostarController@processing')->name('processing');
            Route::get('/{order}/complete', 'EurostarController@complete')->name('complete');
            Route::post('/{order}/{item}', 'EurostarController@update')->name('update');
            Route::get('/{order}/{item}/notes', 'EurostarController@notes')->name('notes.index');
            Route::post('/{order}/{item}/notes', 'EurostarController@noteSave')->name('notes.store');
        });

    });

    Route::group(['prefix' => 'expenses', 'as' => 'expenses.'], function () {
        Route::get('/', 'ExpenseController@create')->name('create');
        Route::post('/', 'ExpenseController@store')->name('store');

        Route::get('/{order}', 'ExpenseController@show')->name('show');
        Route::post('/{order}', 'ExpenseController@update')->name('update');
        Route::get('/{order}/complete', 'ExpenseController@complete')->name('complete');
        Route::get('/{order}/{item}/notes', 'ExpenseController@notes')->name('notes.index');
        Route::post('/{order}/{item}/notes', 'ExpenseController@noteSave')->name('notes.store');
    });

    Route::group(['prefix' => 'car-hire', 'as' => 'car-hire.'], function () {
        Route::get('/', 'CarHireController@create')->name('create');
        Route::post('/', 'CarHireController@store')->name('store');

        Route::get('/{order}', 'CarHireController@show')->name('show');
        Route::post('/{order}', 'CarHireController@update')->name('update');
        Route::get('/{order}/processing', 'CarHireController@processing')->name('processing');
        Route::get('/{order}/complete', 'CarHireController@complete')->name('complete');
        Route::get('/{order}/{item}/notes', 'CarHireController@notes')->name('notes');
        Route::post('/{order}/{item}/notes', 'CarHireController@noteSave')->name('notes.store');

    });

    Route::group(['prefix' => 'training', 'as' => 'training.'], function () {
        Route::get('/', 'TrainingController@create')->name('create');
        Route::post('/', 'TrainingController@store')->name('store');

        Route::get('/{order}', 'TrainingController@show')->name('show');
        Route::post('/{order}', 'TrainingController@update')->name('update');
        Route::get('/{order}/processing', 'TrainingController@processing')->name('processing');
        Route::get('/{order}/complete', 'TrainingController@complete')->name('complete');
        Route::get('/{order}/{item}/notes', 'TrainingController@notes')->name('notes.index');
        Route::post('/{order}/{item}/notes', 'TrainingController@noteSave')->name('notes.store');
        Route::post('/{order}/{item}/upload', 'TrainingController@upload')->name('upload');
        Route::get('/{order}/{item}/file', 'TrainingController@file')->name('file');
        Route::get('/{order}/{item}/file-delete', 'TrainingController@deletefile')->name('file.delete');
        Route::get('/{order}/file/{file}', 'TrainingController@showFile')->name('file.show');
    });

    Route::group(['prefix' => 'stores', 'as' => 'stores.'], function () {
        Route::get('/', 'StoreController@create')->name('create');
        Route::post('/', 'StoreController@store')->name('store');

        Route::get('/{order}', 'StoreController@show')->name('show');
        Route::get('/{order}/slip', 'StoreController@slip')->name('show');
        Route::post('/{order}/{item}', 'StoreController@update')->name('update');
        Route::get('/{order}/processing', 'StoreController@processing')->name('processing');
        Route::get('/{order}/complete', 'StoreController@close')->name('complete');
        Route::get('/{order}/{item}/notes', 'StoreController@notes')->name('notes');
        Route::post('/{order}/{item}/notes', 'StoreController@noteSave')->name('notes.store');
    });

    Route::group(['prefix' => 'catering', 'as' => 'catering.'], function () {
        Route::get('/', 'CateringController@create')->name('create');
        Route::post('/', 'CateringController@store')->name('store');

        Route::get('/{order}', 'CateringController@show')->name('show');
        Route::post('/{order}/', 'CateringController@update')->name('update');
        Route::get('/{order}/processing', 'CateringController@processing')->name('processing');
        Route::get('/{order}/complete', 'CateringController@complete')->name('complete');
        Route::get('/{order}/{item}/notes', 'CateringController@notes')->name('notes');
        Route::post('/{order}/{item}/notes', 'CateringController@noteSave')->name('notes.store');
        Route::post('/{order}/{item}/upload/{type}', 'CateringController@upload')->name('upload');
        Route::get('/{order}/{item}/file/{file}', 'CateringController@file')->name('file');
        Route::get('/{order}/{item}/file/{type}/delete', 'CateringController@deleteFile')->name('file.delete');
    });

    /**
     *
     * Admin
     *
     */
    Route::group(['middleware' => 'admin'], function () {
        Route::get('/requisitioner', 'AccountController@req');
        Route::get('/administrator', 'AccountController@admin');
        Route::get('/security', 'HomeController@security');
    });

    Route::group(['prefix' => 'accounts', 'as' => 'accounts.', 'middleware' => 'admin'], function () {
        Route::get('/', 'AccountController@index')->name('index');

        Route::get('/partner/create', 'AccountController@createPartner')->name('create-partner');
        Route::post('/partner/create', 'AccountController@storePartner')->name('store-partner');
        Route::get('/supplier/create', 'AccountController@createSupplier')->name('create-supplier');
        Route::post('/supplier/create', 'AccountController@storeSupplier')->name('store-supplier');
        Route::get('{type}/create', 'AccountController@createUser')->name('create-user');
        Route::post('/', 'AccountController@store')->name('store');
        Route::get('/{user}', 'AccountController@show')->name('show');
        Route::post('/{user}', 'AccountController@update')->name('update');
        Route::get('/partner/{user}', 'AccountController@showPartner')->name('show-partner');
        Route::post('/partner/{user}', 'AccountController@updatePartner')->name('update-partner');
        Route::get('/supplier/{user}', 'AccountController@showSupplier')->name('show-supplier');
        Route::post('/supplier/{user}', 'AccountController@updateSupplier')->name('update-supplier');
    });

    Route::group(['prefix' => 'departments', 'as' => 'departments.', 'middleware' => 'admin'], function () {
        Route::get('/', 'DepartmentController@index')->name('index');
        Route::get('/create', 'DepartmentController@create')->name('create');
        Route::post('/', 'DepartmentController@store')->name('store');
        Route::get('/{department}', 'DepartmentController@show')->name('show');
        Route::post('/{department}', 'DepartmentController@update')->name('update');
        Route::any('delete/{department}', 'DepartmentController@delete')->name('delete');
    });

    Route::post('save-month-budget', 'DeptAccountController@saveMonthBudget');

    Route::group(['prefix' => 'department-accounts', 'as' => 'department-accounts.', 'middleware' => 'admin'], function () {
        Route::get('', 'DeptAccountController@index');
    });

    Route::group(['prefix' => 'reports', 'as' => 'reports.', 'middleware' => 'admin'], function () {
        Route::get('', 'ReportController@index');
    });

    Route::get('notifications', 'NotificationsController@index')->middleware('auth');

    Route::any('account/delete/{id}', 'AccountController@deleteUser');

    /** Email Templates */
    Route::group(['prefix' => 'email-templates', 'middleware' => 'admin'], function () {
        Route::get('', 'EmailTemplateController@index');
        Route::get('create', 'EmailTemplateController@create');
        Route::get('edit/{id}', 'EmailTemplateController@edit')->name('admin.emails.edit');
        Route::patch('update/{id}', 'EmailTemplateController@update');
        Route::post('store', 'EmailTemplateController@store');
    });
});

 /** Claims */
    Route::group(['prefix' => 'claim'], function () {
        Route::any('storenew', 'PartnerController@claim');
    });

/**
 *
 * PARTNER
 */
Route::group(['middleware' => ['auth']], function () {
    Route::get('/partner/{partnerID}', 'PartnerController@index');
});

