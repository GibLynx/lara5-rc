<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use View;
use Input;
use Appliance;
use Redirect;
use Lang;

class ApplianceController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$data['name'] = Input::get('name');
		$saved = Appliance::saveAppliance($data);

		if ($saved) {
	 		return Redirect::to('/')->with('success', Lang::get('appliance.text_success_saved'));
	 	} else {
	 		return Redirect::to('/')->with('error', Lang::get('appliance.text_error_saved'));
	 	}
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$data['id'] = $id;
		$data['name'] = Input::get('name');
		$edited = Appliance::editAppliance($data);

		if ($edited) {
	 		return Redirect::to('/')->with('success', Lang::get('appliance.text_success_saved'));
	 	} else {
	 		return Redirect::to('/')->with('error', Lang::get('appliance.text_error_saved'));
	 	}
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


	public function addApplianceView () {
		return View::make('add_appliance');
	}

	public function editApplianceView($id) {
		$appliance = Appliance::getApplianceById($id)->toArray();
		return View::make('edit_appliance')
				->with('appliance', $appliance);
	}
}
