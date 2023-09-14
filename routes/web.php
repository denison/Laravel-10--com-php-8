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

    Route::group(["prefix" => "usuarios"], function () {
        Route::get("/",                               ["as" => "users.index",   "uses" => "UserController@index"]);
        Route::get("/create",                         ["as" => "users.create",  "uses" => "UserController@create"]);
        Route::post("/",                              ["as" => "users.store",   "uses" => "UserController@store"]);

        // Ajax
        Route::get("/get-users",                      ["as" => "users.get-users",     "uses" => "UserController@getUsers"]);

        Route::get("/{user_id}",                      ["as" => "users.show",    "uses" => "UserController@show"]);
        Route::match(["put", "patch"], "/{user_id}",  ["as" => "users.update",  "uses" => "UserController@update"]);
        Route::delete("/{user_id}",                   ["as" => "users.destroy", "uses" => "UserController@destroy"]);
        Route::get("/{user_id}/edit",                 ["as" => "users.edit",    "uses" => "UserController@edit"]);
        // Route::get('/{user_id}/login_as',             ['as' => 'users.login_as',   'uses' => 'UserController@loginAs']);
    });

    Route::group(["prefix" => "alunos"], function () {
        Route::get("/",                               ["as" => "users.clients",   "uses" => "UserController@clients"]);
        
        // Ajax
        Route::get("/get-clients",                     ["as" => "users.get-clients",     "uses" => "UserController@getClients"]);
    });
    Route::group(["prefix" => "escolinhas"], function () 
    {
        Route::get("/",                                 ["as" => "companies.index",      "uses" => "CompanyController@index"]);
        Route::get("/criar",                            ["as" => "companies.create",     "uses" => "CompanyController@create"]);
        Route::post("/",                                ["as" => "companies.store",      "uses" => "CompanyController@store"]);
        Route::get("/editar/{company_id}",              ["as" => "companies.edit",       "uses" => "CompanyController@edit"]);
        Route::match(["put", "patch"], "/editar/{company_id}", ["as" => "companies.update",     "uses" => "CompanyController@update"]);
        Route::delete("/destroy/{company_id}",                              ["as" => "companies.destroy",    "uses" => "CompanyController@destroy"]);

        Route::group(["prefix" => "/{company_id}/turmas"], function () {
            Route::get("/",              ["as" => "companies.all-subscriptions",     "uses" => "CompanyController@allSubscriptions"]);
            Route::get("/criar",                           ["as" => "companies.create-subscription",     "uses" => "CompanyController@create_subscription"]);
            Route::post("/criar",                           ["as" => "companies.store-subscription",      "uses" => "CompanyController@storeSubscription"]);

            Route::group(["prefix" => "{subscription_id}"], function (){
                Route::delete("/remover",                        ["as" => "companies.destroy-subscription", "uses" => "CompanyController@destroySubscription"]);
                Route::get("/editar",                       ["as" => "companies.edit-subscription",                     "uses" => "CompanyController@editSubscription"]);
                Route::match(["put", "patch"], "/atualizar",     ["as" => "companies.update-subscription",                   "uses" => "CompanyController@updateSubscription"]);
            
                Route::get("/membros",                 ["as" => "companies.all-subscriptions-members",     "uses" => "CompanyController@allSubscriptionsMembers"]);
                Route::get("/membros/adicionar",       ["as" => "companies.add-subscriptions-members",     "uses" => "CompanyController@addSubscriptionsMembers"]);
                Route::post("/membros/criar",                           ["as" => "companies.store-subscription_members",      "uses" => "CompanyController@storeSubscriptionMembers"]);
                Route::delete("/membros/remover/{subscription_id_member}",                        ["as" => "companies.destroy-subscription-members", "uses" => "CompanyController@destroySubscriptionMembers"]);
                
                
            });
        });

        


        // Route::delete("/{company_id/turmas/remover",                        ["as" => "companies.destroy-subscription", "uses" => "CompanyController@destroySubscription"]);
        //     Route::get("/{company_id/turmas/{subscription_id}/editar",                            ["as" => "companies.edit-subscription",                     "uses" => "CompanyController@editSubscription"]);
        //     


        // Ajax
        Route::get("/my-companies",                     ["as" => "companies.my-companies",     "uses" => "CompanyController@myCompanies"]);
        Route::get("/{company_id}/get/subscriptions",   ["as" => "companies.get-subscriptions",     "uses" => "CompanyController@getSubscriptions"]);
        Route::get("/{company_id}/get/subscriptions/{subscription_id}/members",   ["as" => "companies.get-subscriptions-members",     "uses" => "CompanyController@getSubscriptionsMembers"]);
    });

    Route::group(["prefix" => "turmas"], function ()
    {
        Route::get("/",                                                                  ["as" => "subscriptions.index",                    "uses" => "SubscriptionController@index"]);
        Route::get("/criar",                                                            ["as" => "subscriptions.create",                   "uses" => "SubscriptionController@create"]);
        Route::post("/",                                                                 ["as" => "subscriptions.store",                    "uses" => "SubscriptionController@store"]);

        // Ajax
        Route::get("/subscriptions",                                                     ["as" => "subscriptions.subscriptions",                   "uses" => "SubscriptionController@getSubscriptions"]);


        Route::group(["prefix" => "{subscription_id}"], function ()
        {
            Route::get("/",                                                 ["as" => "subscriptions.show",                     "uses" => "SubscriptionController@show"]);
            Route::match(["put", "patch"], "/",                             ["as" => "subscriptions.update",                   "uses" => "SubscriptionController@update"]);
            Route::delete("/",                                              ["as" => "subscriptions.destroy",                  "uses" => "SubscriptionController@destroy"]);
            Route::get("/edit",                                             ["as" => "subscriptions.edit",                     "uses" => "SubscriptionController@edit"]);
            Route::get("/duplicate",                                        ["as" => "subscriptions.duplicate",                "uses" => "SubscriptionController@duplicate"]);

            Route::group(["prefix" => "members"], function ()
            {
                Route::get("/select/{search?}",                        ["as" => "subscriptions.members.select",                     "uses" => "UserController@selectMembers"]);
                Route::post("/add",                                    ["as" => "subscriptions.members.add",              "uses" => "SubscriptionController@addMember"]);
                Route::get("/",                                        ["as" => "subscriptions.members.index",     "uses" => "SubscriptionController@members"]);

                Route::group(["prefix" => "{subscription_member_id}"], function ()
                {
                    Route::get("/edit",                        ["as" => "subscriptions.members.edit",             "uses" => "SubscriptionController@editMember"]);
                    Route::match(["put", "patch"], "/",        ["as" => "subscriptions.members.update",           "uses" => "SubscriptionController@updateMember"]);
                    Route::post("/remove",                     ["as" => "subscriptions.members.remove",           "uses" => "SubscriptionController@removeMember"]);
                    Route::get("/send_whatsapp_invitation",    ["as" => "subscriptions.members.send_whatsapp_invitation", "uses" => "SubscriptionInvitationController@sendWhatsapp"]);
                });
            });
        });
    });

    // Payment
    Route::group(["prefix" => "minhas-faturas"], function () 
    {
        Route::get("/",                                 ["as" => "payments.index",   "uses" => "PaymentController@index"]);
        Route::get("/create",                           ["as" => "payments.create",  "uses" => "PaymentController@create"]);
        Route::post("/",                                ["as" => "payments.store",   "uses" => "PaymentController@store"]);

        // Ajax
        Route::get("/get-payments",                     ["as" => "payments.get-payments",     "uses" => "PaymentController@get_payments"]);

        Route::group(["prefix" => "{payment_id}"], function ()
        {
            Route::post("/confirm",             ["as" => "payments.confirm", "uses" => "PaymentController@confirm"]);
            Route::post("/reject",              ["as" => "payments.reject",  "uses" => "PaymentController@reject"]);
            Route::get("/",                     ["as" => "payments.show",    "uses" => "PaymentController@show"]);
            Route::match(["put", "patch"], "/", ["as" => "payments.update",  "uses" => "PaymentController@update"]);
            Route::delete("/",                  ["as" => "payments.destroy", "uses" => "PaymentController@destroy"]);
            Route::get("/edit",                 ["as" => "payments.edit",    "uses" => "PaymentController@edit"]);
        });
    });

}); 