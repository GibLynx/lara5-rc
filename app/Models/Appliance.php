<?php

class Appliance extends Eloquent {
	protected $fillable = [];

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'appliance';

    public $timestamps = false;

    /*
	| Get Appliances
    */
    public static function getApplianceDetails () {
     	$results = Appliance::get(['id','name']);
        return $results;
    }

    public static function saveAppliance () {

    }
}
?>