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

    public static function saveAppliance ($data) {
    	$saved = DB::table('appliance')->insert(
		    [
            'name' => $data['name'],
		    ]
		);
		if ($saved) return true;

    	return false;
    }

    public static function getApplianceById($id) {
    	$results = Appliance::find($id);
        return $results;
    }

    public static function editAppliance($data) {
    	$saved = DB::table('appliance')
    			->where('id', $data['id'])
    			->update(['name' => $data['name']]);

    	if ($saved) return true;

    	return false;
    }
}
?>