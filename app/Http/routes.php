<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


// User Side------------------------------------------------------------------------
Route::get('/' , 'PagesController@home')->name('home');

Route::get('/alerts-view/{id}' , 'PagesController@alertView')->name('alerts-view');

Route::get('disaster/{type}' , 'PagesController@disaster')->name('disaster-page');
Route::get('/evacuation-map' , 'MapController@viewMap')->name('evacuation-map');

// Resources
Route::get('/directory-list' , 'PagesController@directory')->name('directory-list');
Route::get('/evacuation-centers' , 'PagesController@evacuationCenters')->name('evacuation-centers');

// Prepare
Route::get('/build-a-kit' , 'PagesController@kit')->name('build-a-kit');
Route::get('/plan-ahead' , 'PagesController@planAhead')->name('plan-ahead');
Route::get('/safety-skills' , 'PagesController@safetySkills')->name('safety-skills');

// Donate
Route::get('/donate' , 'PagesController@donate')->name('donate');
Route::get('/donate/view/{id}' , 'PagesController@donateView')->name('donate-view');

Route::post('donations-store' , 'DonationsController@store')->name('donations-store');



//Admin Side------------------------------------------------------------------------
Route::auth();
Route::get('/logout', 'PagesController@logout')->name('logout');

Route::group(['middleware' => ['auth']], function() {

    Route::get('/dashboard' , 'PagesController@dashboard')->name('dashboard');
    Route::get('map' , 'PagesController@adminMap')->name('map');
    Route::resource('disasters' , 'DisastersController');
    
    
    // Evacuation Centers
    Route::resource('centers' , 'EvacuationCentersController');
    Route::get('set-active/{id}' , 'EvacuationCentersController@setActive')->name('set-active');
    Route::get('set-inactive/{id}' , 'EvacuationCentersController@setInactive')->name('set-inactive');
    Route::get('centers-delete/{id}' , 'EvacuationCentersController@delete')->name('centers-delete');
    
    // Hotline Directory
    Route::resource('directory' , 'DirectoryController');
    Route::get('directory-delete/{id}' , 'DirectoryController@delete')->name('directory-delete');
    
    // Alerts
    Route::resource('alerts' , 'AlertsController');
    Route::get('alert-active/{id}' , 'AlertsController@setActive')->name('alert-active');
    Route::get('alert-inactive/{id}' , 'AlertsController@setInactive')->name('alert-inactive');
    Route::get('alert-delete/{id}' , 'AlertsController@delete')->name('alert-delete');

    // Kit
    Route::resource('kit' , 'KitController');
    Route::get('kit-delete/{id}' , 'KitController@delete')->name('kit-delete');

    Route::resource('supplies' , 'SuppliesController');
    Route::get('supplies-create/{id}' , 'SuppliesController@create')->name('supplies-create');
    Route::get('supplies-delete/{id}' , 'SuppliesController@delete')->name('supplies-delete');
    
    // Donations
    Route::get('/donations/list' , 'DonationsController@index')->name('donations-list');
    Route::get('/donations/drives' ,  'DonationsController@drivesIndex')->name('donation-drives'); 
    Route::get('/donations-create' , 'DonationsController@create')->name('donations-create');
    Route::post('/donations-drives/store' , 'DonationsController@drivesStore')->name('donation-drives-store');
    Route::get('/end-donation/{id}' , 'DonationsController@endDonation')->name('end-donation');
    Route::get('/start-donation/{id}' , 'DonationsController@startDonation')->name('start-donation');
});
