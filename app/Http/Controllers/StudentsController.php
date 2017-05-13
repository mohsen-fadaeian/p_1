<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentsRequest;
use App\Student;
use App\User;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::paginate();
        return view('admin.students.index',compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.students.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentsRequest $request)
    {
        $user_data = [
            'name'=>($request->first_name).'_'.($request->last_name),
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
            'access'=>1,
        ];
        $user = User::create($user_data);

        $student_data = [
            'user_id'=>$user->id,
            'home_tell_number'=>$request->home_tell_number,
            'emergency_tell_number'=>$request->emergency_tell_number,
            'mobile_number'=>$request->mobile_number,
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'address'=>$request->address,
            'email'=>$request->email,
            'school_level'=>$request->school_level,
            'sex'=>$request->sex,
            'dad_name'=>$request->dad_name,
            'birth_date'=>$request->birth_date,
            'student_id'=>rand(100000, 999999)
        ];
        $st = Student::create($student_data);

        $user_data2 = [
            'student_id'=>$st->student_id
        ];
        User::findOrfail($user->id)->update($user_data2);

        return redirect('admin/students');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $studentss = Student::whereId($id)->get();
        return view('admin.students.show',compact('studentss'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::findOrFail($id);
        return view('admin.students.edit',compact('student'));
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
        $user_data = [
            'name'=>($request->first_name).'_'.($request->last_name),
            'email'=>$request->email,
        ];
        User::findOrfail(Student::findOrfail($id)->user_id)->update($user_data);

        $student_data = [
            'home_tell_number'=>$request->home_tell_number,
            'emergency_tell_number'=>$request->emergency_tell_number,
            'mobile_number'=>$request->mobile_number,
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'address'=>$request->address,
            'school_level'=>$request->school_level,
            'sex'=>$request->sex,
            'dad_name'=>$request->dad_name,
            'birth_date'=>$request->birth_date,
        ];
        Student::findOrfail($id)->update($student_data);

        return redirect('admin/students');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Student::findOrfail($id)->delete();
        return redirect('admin/students');
    }
}
