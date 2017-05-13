<?php

namespace App\Http\Controllers;

use App\MainLevel;
use App\Teacher;
use App\User;
use Illuminate\Http\Request;
use MongoDB\Driver\Query;

class TeachersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = Teacher::paginate(10);
        $levels = MainLevel::pluck('name','id')->all();
        return view('admin.teachers.index',compact('teachers','levels'));
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
        $user_data = [
            'name'=>($request->f_name).'_'.($request->l_name),
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
            'access'=>2,
            'status'=>$request->status,
        ];
        $user = User::create($user_data);

        $teacher_data = [
            'teacher_id'=>rand('100','999'),
            'user_id'=>$user->id,
            'f_name'=>$request->f_name,
            'l_name'=>$request->l_name,
            'address'=>$request->address,
            'bio'=>$request->bio,
            'phone_number'=>$request->phone_number,
            'home_number'=>$request->home_number,
            'max_level'=>$request->max_level,
        ];
        $t2 = Teacher::create($teacher_data);
        $user_data2 = [
            'teacher_id'=>$t2->teacher_id
        ];
        User::findOrfail($user->id)->update($user_data2);
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
        $teachers = Teacher::whereId($id)->get();
        return view('admin.teachers.show',compact('teachers'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $teachers = Teacher::findOrfail($id);

        $mainlevel = MainLevel::pluck('name','id')->all();
        return view('admin.teachers.edit',compact('teachers','mainlevel'));
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
        $var1 = ($request->f_name).'_'.($request->l_name);
        $t = Teacher::findOrfail($id);
        User::findOrfail($t->user_id)->update(['name'=>$var1]);
        $t->update($request->all());
        return redirect('admin/teachers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Teacher::findOrfail($id)->delete();
        return redirect('admin/teachers');
    }
}
