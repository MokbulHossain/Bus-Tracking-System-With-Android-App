<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Trip extends Model
{
     protected $table  = "trip";

    protected $fillable = [
    	'date','day', 'start_time', 'route_id', 'bus_id', 'driver_id', 'helper_id'
    ];

    public function route(){
    	$route =  Route::where('id',$this->route_id)->first();
    	if($route){
    		return $route;
    	}
    	return '';
    }

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
