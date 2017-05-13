<?php

namespace App\Http\Controllers;

use App\MainLevel;
use App\SubsLevel;
use Illuminate\Http\Request;

class SubsLevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sub_lvl = SubsLevel::paginate(10);;
        $main_lvl = MainLevel::pluck('name','id')->all();
        return view('admin.levels.subslvl.index',compact('sub_lvl','main_lvl'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        SubsLevel::create($request->all());
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sub = SubsLevel::findOrfail($id);
        $main_lvl = MainLevel::pluck('name','id')->all();
        return view('admin.levels.subslvl.edit',compact('sub','main_lvl'));
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
        SubsLevel::findOrfail($id)->update($request->all());
        return redirect('admin/levels/subslvl');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        SubsLevel::findOrfail($id)->delete();
        return redirect()->back();
    }
}
