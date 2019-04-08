<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class booked_Trip extends Model
{
     protected $table  = "booked_trip";

    protected $fillable = [
    	'date', 'location', 'bus_id', 'driver_id', 'helper_id', 'start_time', 'end_time'
    ];

    public function bus(){
    	$bus =  Bus::where('id',$this->bus_id)->first();
    	if($bus){
    		return $bus->name;
    	}
    	return '';
    }

     public function driver(){
        $driver =  Driver::where('id',$this->driver_id)->first();
        if($driver){
            return $driver;
        }
        return '';
    }

    public function helper(){
        $helper =  Helper::where('id',$this->helper_id)->first();
        if($helper){
            return $helper;
        }
        return '';
    }


}
