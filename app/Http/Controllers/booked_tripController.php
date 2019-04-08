<?php

namespace App\Http\Controllers;

use App\Models\Booked_Trip;
use App\Models\Driver;
use App\Models\Bus;
use App\Models\Helper;
use Illuminate\Http\Request;

class booked_tripController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $booked_trip = Booked_Trip::all();
        return view('booked_trip.index',compact('booked_trip'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $booked_trip = Booked_Trip::all();
        $drivers = Driver::all();
        $helpers = Helper::all();
        $buses = Bus::all();
        return view('booked_trip.create',compact('drivers','helpers','buses','booked_trip'));
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
            'location' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'bus_id' => 'required',
            'driver_id' => 'required',
            'helper_id' => 'required'
        ]);

        $booked_trip = new Booked_Trip();
        $booked_trip->date = $request->date;
        $booked_trip->location = $request->location;
        $booked_trip->start_time = $request->start_time;
        $booked_trip->end_time = $request->end_time;
        $booked_trip->bus_id = $request->bus_id;
        $booked_trip->driver_id = $request->driver_id;
        $booked_trip->helper_id = $request->helper_id;
        $booked_trip->save();

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
    booked_trip::where('id',$id)->delete();
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
        $booked_trip = Booked_Trip::where('id',$id)->first();
        return view('booked_trip.edit',compact('booked_trip','buses','drivers','helpers'));
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
            'location' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'bus_id' => 'required',
            'driver_id' => 'required',
            'helper_id' => 'required'
        ]);

        $booked_trip = Booked_Trip::where('id',$id)->first();
        $booked_trip->date = $request->date;
         $booked_trip->location = $request->location;
         $booked_trip->start_time = $request->start_time;
         $booked_trip->end_time = $request->end_time;
           $booked_trip->bus_id = $request->bus_id;
            $booked_trip->driver_id = $request->driver_id;
             $booked_trip->helper_id = $request->helper_id;
        $booked_trip->save();

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
