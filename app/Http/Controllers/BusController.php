<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use App\Models\Driver;
use App\Models\Bus;
use App\Models\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class BusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bus = Bus::all();
        return view('bus.index',compact('bus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     $bus = Bus::all();
        return view('bus.create',compact('bus'));
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
            'name' => 'required',
            'seat' => 'required'
        ]);

        $bus = new Bus();
        $bus->name = $request->name;
        $bus->ac = $request->ac?'Yes':'No';
        $bus->seat = $request->seat;
        $bus->save();

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
        Bus::where('id',$id)->delete();
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
        $bus = Bus::where('id',$id)->first();
        return view('bus.edit',compact('bus'));
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
            'name' => 'required',
            'seat' => 'required'
        ]);

        $bus = Bus::where('id',$id)->first();
        $bus->name = $request->name;
        $bus->ac = $request->ac?'Yes':'No';
        $bus->seat = $request->seat;
        $bus->save();

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

       public function search(Request $request){
        $trip=null;$data=array();
         $option_name=$request->input('option_name');
         $search_info=$request->input('search');

         if ($option_name == 'Driver') {
            $infos=DB::table('driver')->where('name','like','%'.$search_info.'%')->get();
            if ($infos) {
                foreach ($infos as $info) {
                    $data[]=$info->id;
                }
                 $trip = Trip::whereIn('driver_id',$data)->get();
                 
            }
            return view('driver.search',compact('trip'));
           
         }
         else if ($option_name == 'Helper') {
            $infos=DB::table('helper')->where('name','like','%'.$search_info.'%')->get();
            if ($infos) {
                foreach ($infos as $info) {
                    $data[]=$info->id;
                }
                 $trip = Trip::whereIn('helper_id',$data)->get();
                 
            }//return dd($trip);
           
            return view('driver.search',compact('trip'));
         }
         else if ($option_name == 'Bus') {
            $infos=DB::table('bus')->where('name','like','%'.$search_info.'%')->get();
            if ($infos) {
                foreach ($infos as $info) {
                    $data[]=$info->id;
                }
                 $trip = Trip::whereIn('bus_id',$data)->get();
                 
            } 

            return view('driver.search',compact('trip'));
         }
         else if ($option_name == 'Trip') {
            $infos=DB::table('Trip')->where('day','like','%'.$search_info.'%')->get();
            if ($infos) {
                foreach ($infos as $info) {
                    $data[]=$info->id;
                }
                 $trip = Trip::whereIn('id',$data)->get();
                 
            } 

            return view('driver.search',compact('trip'));
         }
         else{
            return view('driver.search',compact('trip'));
         }

    }
}
