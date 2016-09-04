<?php
namespace App\Http\Controllers;
use Input;
use Config;
use Redirect;
use Lang;
class RemoteController extends Controller {

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
		$applianceID = Input::get('appliance');
		$switch = Input::get('switch');

		$jsonData = '{
		    "id": '.$applianceID.',
		    "switch": '.$switch.'
		}';

		$response = Self::callAPI($jsonData);
		if ($response) {
	 		return Redirect::to('/')->with('success', Lang::get('remote.text_success_api'));
	 	} else {
	 		return Redirect::to('/')->with('error', Lang::get('remote.text_error_api'));
	 	}
	}


	/**
	 * Call API
	 */
	public function callAPI($data)
	{
		$url = Config::get('constants.url');

		$ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HEADER, true);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

		$result = curl_exec($ch);

        if ($result) {
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

            if ($httpCode != 200) return false;

            return true;
        }

        curl_close($ch);
	}

}
