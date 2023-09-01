<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

// Address
Route::group(['prefix' => 'address'], function () {
    Route::get('/find-by-zipcode/{zipcode}', ['as' => 'address.findByZipcode', 'uses' => 'AddressController@findByZipcode']);
});

Route::group(["middleware" => ["auth"]], function () 
{
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::group(["prefix" => "escolinhas"], function () 
    {
        Route::get("/",                                 ["as" => "companies.index",      "uses" => "CompanyController@index"]);
        Route::get("/create",                           ["as" => "companies.create",     "uses" => "CompanyController@create"]);
        Route::post("/",                                ["as" => "companies.store",      "uses" => "CompanyController@store"]);
        Route::get("/{company_id}/turmas",              ["as" => "companies.all-subscriptions",     "uses" => "CompanyController@allSubscriptions"]);
        Route::get("/{company_id}/turmas/{subscription_id}/membros",       ["as" => "companies.all-subscriptions-members",     "uses" => "CompanyController@allSubscriptionsMembers"]);
        
        Route::get("/{company_id}/turmas/criar",                           ["as" => "companies.create-subscription",     "uses" => "CompanyController@create_subscription"]);
        Route::post("/{company_id}/turmas/criar",                           ["as" => "companies.store-subscription",      "uses" => "CompanyController@storeSubscription"]);

        // Ajax
        Route::get("/my-companies",                     ["as" => "companies.my-companies",     "uses" => "CompanyController@myCompanies"]);
        Route::get("/{company_id}/get/subscriptions",   ["as" => "companies.get-subscriptions",     "uses" => "CompanyController@getSubscriptions"]);
        Route::get("/{company_id}/get/subscriptions/{subscription_id}/members",   ["as" => "companies.get-subscriptions-members",     "uses" => "CompanyController@getSubscriptionsMembers"]);


    });

}); 