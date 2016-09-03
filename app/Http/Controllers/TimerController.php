<?php

class TimerController extends Controller {

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
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$data['appliance'] = Input::get('appliance');
		$data['switch'] = Input::get('switch');
		$date = Input::get('datepicker');
	 	$hour = Input::get('hour');
	 	$minute = Input::get('minute');

	 	$data['datetime'] = date("Y-m-d", strtotime($date)).' '.$hour.':'.$minute.':00';

	 	$saved = Schedule::saveToSchedule($data);
	 	if ($saved) {
	 		return Redirect::to('/')->with('success', Lang::get('timer.text_success_saved'));
	 	} else {
	 		return Redirect::to('/')->with('error', Lang::get('timer.text_error_saved'));
	 	}
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show()
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
		//
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
		$deleted = Schedule::deleteSchedule($id);

		if ($deleted) {
	 		return Redirect::to('/')->with('success', Lang::get('timer.text_success_delete'));
	 	} else {
	 		return Redirect::to('/')->with('error', Lang::get('timer.text_error_delete'));
	 	}
	}


}
