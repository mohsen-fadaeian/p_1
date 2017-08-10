<?php

namespace App\Http\Controllers;

use App\EnClass;
use App\MainLevel;
use App\SingStClass;
use App\Student;
use App\SubsLevel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use PhpParser\Builder\Class_;

class AddStToClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $st_class = SingStClass::all();
        $classes = EnClass::all();
        return view('admin.sing_st_class.index',compact('st_class','classes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $classes = EnClass::all();
        $mainlevel = MainLevel::pluck('name','id');
        return view('admin.sing_st_class.create',compact('classes','mainlevel','st'));
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
        $a = EnClass::where('sub_level','=',$main_level)->where('status','=',1)->get();
        return $a;
    }


    public function prestore(Request $request)
    {
        $enclass = EnClass::where('en_class_id','=',$request->class_id)->get();
        $enclass = $enclass->first();
        $max_size = $enclass->class_max_size;
        $st_exist = SingStClass::where('class_id','=',$request->class_id)->count();
        $student = Student::where('student_id','=',$request->student_id)->first();
        $exist_st = SingStClass::where('student_id','=',$request->student_id)->first();
        $graph = ($st_exist * 100)/($max_size) ;
        $a = [
            'class_id'=>$request->class_id,
            'student_id'=>$request->student_id,
            'teacher_id'=>$enclass->teacher_id,
            'main_level'=>$request->main_level,
            'sub_level'=>$request->sub_level,
            'term_start'=>$enclass->term_start,
            'term_end'=>$enclass->term_end,
        ];
        if ($enclass->status == 1)
        {
            if ($student)
            {
                if (empty($exist_st))
                {
                        if ($max_size >= $st_exist)
                        {
                            return view('admin.sing_st_class.preview',compact('a','st_exist','max_size','graph'));
                        }else{session()->flash('status', 'Class is Full'); return redirect('admin/sing_st_class/create');}
                }else{session()->flash('status', 'Student Already take this class'); return redirect('admin/sing_st_class/create');}
            }else{session()->flash('status', 'No such student'); return redirect('admin/sing_st_class/create');}
        }else{session()->flash('status', 'Class Not Active'); return redirect('admin/sing_st_class/create');}


    $aa = $this->brain($request->student_id,$request->main_level,$request->sub_level);
    return dd($aa);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        SingStClass::create($request->all());
        return redirect('admin/sing_st_class');
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
        $mainlevel = MainLevel::pluck('name','id');
        $edit_st_to_class = SingStClass::findOrfail($id);
        return view('admin/sing_st_class/edit',compact('edit_st_to_class','mainlevel'));
    }


    public function preupdate(Request $request, $id)
    {
        $enclass = EnClass::where('en_class_id','=',$request->class_id)->get();
        $enclass = $enclass->first();
        $max_size = $enclass->class_max_size;
        $st_exist = SingStClass::where('class_id','=',$request->class_id)->count();
        $student = Student::where('student_id','=',$request->student_id)->first();
        $exist_st = SingStClass::where('student_id','=',$request->student_id)->first();
        $graph = ($st_exist * 100)/($max_size) ;
        $a = [
            'class_id'=>$request->class_id,
            'student_id'=>$request->student_id,
            'teacher_id'=>$enclass->teacher_id,
            'main_level'=>$request->main_level,
            'sub_level'=>$request->sub_level,
            'term_start'=>$enclass->term_start,
            'term_end'=>$enclass->term_end,
        ];
        if ($enclass->status == 1)
        {
            if ($student)
            {
                if (empty($exist_st))
                {
                    if ($max_size >= $st_exist)
                    {
                        return view('admin.sing_st_class.preview',compact('a','st_exist','max_size','graph'));
                    }else{session()->flash('status', 'Class is Full'); return redirect('admin/sing_st_class/create');}
                }else{session()->flash('status', 'Student Already take this class'); return redirect('admin/sing_st_class/create');}
            }else{session()->flash('status', 'No such student'); return redirect('admin/sing_st_class/create');}
        }else{session()->flash('status', 'Class Not Active'); return redirect('admin/sing_st_class/create');}


        $bb = $this->brain($request->student_id,$request->main_level,$request->sub_level);
        return dd($bb);
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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        SingStClass::findOrfail($id)->delete();
        return redirect('admin/sing_st_class');
    }


    public function brain($st_num,$st_main,$st_sub)
    {
        $mainlvl = MainLevel::all();
        $universe = array();
        foreach ($mainlvl as $main)
        {
            $subwithmain = SubsLevel::where('mainlevel_id','=',$main->id)->get();
            foreach ($subwithmain as $sub)
            {
                $universe[$main->order_lvl][$sub->order_subs] = $sub->name;
            }
        }
        $st_uni = array();
        $st_uni[$st_main][$st_sub] = $st_num ;
        /*if () {

        }else{

        }*/



        return $universe;
    }
}
