<?php

namespace App\Http\Controllers;

use App\EnClass;
use App\MainLevel;
use App\SubsLevel;
use App\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class EnClassContoller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $enclass = EnClass::all();
        return view('admin.class.index',compact('enclass'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$sub_level = SubsLevel::pluck('name','id')->all();
        $teachers = Teacher::pluck('l_name','teacher_id');
        $main_level = MainLevel::pluck('name','id');
        return view('admin.class.create',compact('main_level','teachers'));
    }

    public function ajax_1()
    {
        $state_id = Input::get('state_id');
        $subcategories = SubsLevel::where('mainlevel_id','=',$state_id)->get();
        return $subcategories;
    }

    public function ajax_2()
    {
        $main_level = Input::get('main_level');
        $teacher = Teacher::where('max_level','>=',$main_level)->get();
        return $teacher;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        EnClass::create($request->all());
        return redirect('admin/class');
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
        $class = EnClass::findOrfail($id);
        $main_level = MainLevel::pluck('name','id');
        return view('admin.class.edit',compact('class','main_level'));
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
        EnClass::findOrfail($id)->update($request->all());
        return redirect('admin/class');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        EnClass::findOrfail($id)->delete();
        return redirect('admin/class');
    }
}
