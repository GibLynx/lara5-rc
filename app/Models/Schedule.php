<?php

class Schedule extends Eloquent {
	protected $fillable = [];

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'schedule';

    public $timestamps = false;

    /*
	| Get Appliances
    */
    public static function saveToSchedule ($data) {

    	$saved = DB::table('schedule')->insert(
		    [
            'appliance_id' => $data['appliance'],
		     'when' => $data['datetime'],
		     'action' => $data['switch']
            ]
		);
		if ($saved) return true;

    	return false;
    }

    public static function getSchedule() {
    	$schedule = DB::table('schedule')
    				->select('schedule.id'
    					, 'appliance.name'
    					, 'schedule.when'
    					, 'schedule.action')
    				->leftJoin('appliance', 'appliance.id', '=', 'schedule.appliance_id')
    				->orderBy('schedule.when', 'desc')
    				->get();

    	return $schedule;
    }

    public static function deleteSchedule($id) {
		$deleted = DB::table('schedule')->where('id', '=', $id)->delete();

    	return $deleted;
    }
}
?>