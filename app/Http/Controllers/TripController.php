<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use App\Models\Driver;
use App\Models\Bus;
use App\Models\Route;
use App\Models\Helper;
use Illuminate\Http\Request;

class TripController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trip = Trip::all();
        return view('trip.index',compact('trip'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $trip = Trip::all();
        $drivers = Driver::all();
        $helpers = Helper::all();
        $buses = Bus::all();
        $routes = Route::all();
        return view('trip.create',compact('drivers','helpers','buses','routes','trip'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request,[
            'date' => 'required',
            'day' => 'required',       
            'start_time' => 'required',
            'route_id' => 'required',
            'bus_id' => 'required',
            'driver_id' => 'required',
            'helper_id' => 'required',
        ]);

        $trip = new Trip();
        $trip->date = $request->date;
        $trip->day = $request->day;
        $trip->start_time = $request->start_time;
        $trip->route_id = $request->route_id;
        $trip->bus_id = $request->bus_id;
        $trip->driver_id = $request->driver_id;
        $trip->helper_id = $request->helper_id;
        $trip->save();

        return $this->index();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    trip::where('id',$id)->delete();
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $drivers = Driver::all();
        $helpers = Helper::all();
        $buses = Bus::all();
        $routes = Route::all();
        $trip = Trip::where('id',$id)->first();
        return view('trip.edit',compact('trip','drivers','helpers','buses','routes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    $this->validate($request,[
            'date' => 'required',
            'day' => 'required',
            'start_time' => 'required',
            'route_id' => 'required',
            'bus_id' => 'required',
            'driver_id' => 'required',
            'helper_id' => 'required'
        ]);

        $trip = Trip::where('id',$id)->first();
        $trip->date = $request->date;
        $trip->day = $request->day;
         $trip->start_time = $request->start_time;
          $trip->route_id = $request->route_id;
           $trip->bus_id = $request->bus_id;
            $trip->driver_id = $request->driver_id;
             $trip->helper_id = $request->helper_id;
        $trip->save();

        return $this->index();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        dd($id);
    }
}
