<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('register', 'API\PassportController@register');
Route::post('login', 'API\PassportController@login');
Route::group(['middleware' => 'auth:api'], function() {
    //logout user-> revoke token
    Route::post('logout', 'API\PassportController@logout');
    //get logged in user info
    Route::get('me', 'API\PassportController@getAuthenticatedUser');

    // List all rentals
    Route::get('rentals', 'RentalsController@index');
    // List single rental
    Route::get('rental/{id}', 'RentalsController@show');
    // Create new rental
    Route::post('rental', 'RentalsController@store');
    // Update rental
    Route::put('rental/{id}', 'RentalsController@update');
    // Delete rental
    Route::delete('rental/{id}', 'RentalsController@destroy');

    // List all customers
    Route::get('customers', 'CustomersController@index');
    // List single customer
    Route::get('customer/{id}', 'CustomersController@show');
    // Create new customer
    Route::post('customer', 'CustomersController@store');
    // Update customer
    Route::put('customer/{id}', 'CustomersController@update');
    // Delete customer
    Route::delete('customer/{id}', 'CustomersController@destroy');

    // List all cars
    Route::get('cars', 'CarsController@index');
    // List single car
    Route::get('car/{id}', 'CarsController@show');
    // Create new car
    Route::post('car', 'CarsController@store');
    // Update car
    Route::put('car/{id}', 'CarsController@update');
    // Delete car
    Route::delete('car/{id}', 'CarsController@destroy');

    // List all colors
    Route::get('colors', 'ColorsController@index');
    // List single color
    Route::get('color/{id}', 'ColorsController@show');
    // Create new color
    Route::post('color', 'ColorsController@store');
    // Update color
    Route::put('color/{id}', 'ColorsController@update');
    // Delete color
    Route::delete('color/{id}', 'ColorsController@destroy');

    // List all fuels
    Route::get('fuels', 'FuelsController@index');
    // List single fuel
    Route::get('fuel/{id}', 'FuelsController@show');
    // Create new fuel
    Route::post('fuel', 'FuelsController@store');
    // Update fuel
    Route::put('fuel/{id}', 'FuelsController@update');
    // Delete fuel
    Route::delete('fuel/{id}', 'FuelsController@destroy');

    // List all makes
    Route::get('makes', 'MakesController@index');
    // List single make
    Route::get('make/{id}', 'MakesController@show');
    // Create new make
    Route::post('make', 'MakesController@store');
    // Update make
    Route::put('make/{id}', 'MakesController@update');
    // Delete make
    Route::delete('make/{id}', 'MakesController@destroy');

    // List all models
    Route::get('models', 'ModelsController@index');
    // List single model
    Route::get('model/{id}', 'ModelsController@show');
    // Create new model
    Route::post('model', 'ModelsController@store');
    // Update model
    Route::put('model/{id}', 'ModelsController@update');
    // Delete model
    Route::delete('model/{id}', 'ModelsController@destroy');

    // List all rentalrates
    Route::get('rentalrates', 'RentalratesController@index');
    // List single rentalrate
    Route::get('rentalrate/{id}', 'RentalratesController@show');
    // Create new rentalrate
    Route::post('rentalrate', 'RentalratesController@store');
    // Update rentalrate
    Route::put('rentalrate/{id}', 'RentalratesController@update');
    // Delete rentalrate
    Route::delete('rentalrate/{id}', 'RentalratesController@destroy');

    // List all rentaltypes
    Route::get('rentaltypes', 'RentaltypesController@index');
    // List single rentaltype
    Route::get('rentaltype/{id}', 'RentaltypesController@show');
    // Create new rentaltype
    Route::post('rentaltype', 'RentaltypesController@store');
    // Update rentaltype
    Route::put('rentaltype/{id}', 'RentaltypesController@update');
    // Delete rentalrate
    Route::delete('rentaltype/{id}', 'RentaltypesController@destroy');

    // List all statuses
    Route::get('statuses', 'StatusesController@index');
    // List single status
    Route::get('status/{id}', 'StatusesController@show');
    // Create new status
    Route::post('status', 'StatusesController@store');
    // Update status
    Route::put('status/{id}', 'StatusesController@update');
    // Delete status
    Route::delete('status/{id}', 'StatusesController@destroy');

    // List all types
    Route::get('types', 'TypesController@index');
    // List single type
    Route::get('type/{id}', 'TypesController@show');
    // Create new type
    Route::post('type', 'TypesController@store');
    // Update type
    Route::put('type/{id}', 'TypesController@update');
    // Delete type
    Route::delete('type/{id}', 'TypesController@destroy');
});
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
