<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $driver = Driver::all();
        return view('driver.index',compact('driver'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $driver = Driver::all();
        return view('driver.create',compact('driver'));
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
            'contact' => 'required',
            'license' => 'required',
            'address' => 'required',
            'nid' => 'required'
        ]);

        $driver = new Driver();
        $driver->name = $request->name;
        $driver->contact  = $request->contact;
        $driver->license = $request->license;
        $driver->address = $request->address;
        $driver->nid = $request->nid;
        $driver->save();

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
        Driver::where('id',$id)->delete();
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
        $driver = Driver::where('id',$id)->first();
        return view('driver.edit',compact('driver'));
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
            'contact' => 'required',
            'license' => 'required',
            'address' => 'required',
            'nid' => 'required'
        ]);
         
         
       $driver = Driver::where('id',$id)->first();
        $driver->name = $request->name;
        $driver->contact = $request->contact;
        $driver->license = $request->license;
        $driver->address = $request->address;
        $driver->nid = $request->nid;
        $driver->save();

        return $this->index();
       // return $request->contact;
         
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
