<?php

namespace App\Http\Controllers;

use App\Models\Helper;
use Illuminate\Http\Request;
class HelperController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $helper = Helper::all();
        return view('helper.index',compact('helper'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $helper = Helper::all();
        return view('helper.create',compact('helper'));
      
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
            'nid' => 'required',
            'address' => 'required'
        ]);

        $helper = new Helper();
        $helper->name = $request->name;
         $helper->contact = $request->contact;
          $helper->nid = $request->nid;
           $helper->address = $request->address;
        $helper->save();

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
      Helper::where('id',$id)->delete();
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
      $helper = Helper::where('id',$id)->first();
        return view('helper.edit',compact('helper'));
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
            'nid' => 'required',
            'address' => 'required'
        ]);

        $helper = Helper::where('id',$id)->first();
        $helper->name = $request->name;
        $helper->contact = $request->contact;
          $helper->nid = $request->nid;
           $helper->address = $request->address;
        $helper->save();

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
