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

Route::get('/', function()
{
	$appliancesDetails = array();
	$appliancesDetails[0] = '-- Select --';
	$appliances = Appliance::getApplianceDetails();

	// for select options
	foreach ($appliances as $key => $value) {
		$appliancesDetails[$appliances[$key]->id] = $appliances[$key]->name;
	}

	$schedule = Schedule::getSchedule();

	return View::make('index')
			->with('appliancesSelection', $appliancesDetails) // for select options
			->with('appliances', $appliances)
			->with('schedule', $schedule);
});
Route::post('/save/timer', 'TimerController@store');
Route::post('/save/remote', 'RemoteController@store');
Route::get('/delete/schedule/{id}', 'TimerController@destroy');
Route::get('/add/appliance', 'ApplianceController@addApplianceView');
Route::post('/add/appliance', 'ApplianceController@create');
Route::get('/edit/appliance/{id}', 'ApplianceController@editApplianceView');
Route::post('/edit/appliance/{id}', 'ApplianceController@edit');