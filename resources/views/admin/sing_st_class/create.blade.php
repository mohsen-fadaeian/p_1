@extends('layouts.admin')


{{-- Title Section --}}
@section('title')
    Admin Area (Students_Section)
@endsection


{{-- Styles Section --}}
@section('styles')



@endsection


{{-- Contents Section --}}
@section('content')

    <div class="row">

        @if (count($errors) > 0 )
            <div class="col-lg-12 m-t-20">
                <div class="panel panel-color panel-danger">
                    <div class="panel-heading">
                        <h3 class="panel-title">Attention</h3>
                    </div>
                    <div class="panel-body">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li class="text-danger">{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endif
        <div class="col-lg-12 col-md-12">
            <div class="card-box">
                <div>
                    @if (session()->has('status'))
                        <div class="panel panel-color panel-danger">
                            <div class="panel-heading">
                                <h3 class="panel-title">Attention</h3>
                            </div>
                            <div class="panel-body">
                                <p>
                                    {{session('status')}}
                                </p>
                            </div>
                        </div>
                    @endif
                </div>
                <h2>Adding Students</h2>
                <div class="col-lg-8 col-md-8">
                    {!! Form::open(['method'=>'POST' , 'action'=>'AddStToClassController@prestore']) !!}
                    <table class="table table-striped table-bordered">
                        <tbody>

                        <tr>
                            <th>{!! Form::label('student_id','student_id:') !!}</th>
                            <td>{!! Form::number('student_id' ,null,['placeholder' => 'Students Number','class'=>'form-control']) !!}</td>
                        </tr>


                        <tr>
                            <div class="form-group">
                                <th>{!! Form::label('main_level','main_level:') !!}</th>
                                <td>{!! Form::select('main_level' ,$mainlevel,null,['placeholder' => 'Pick a Main Level...','class'=>'form-control']) !!}</td>
                            </div>
                        </tr>

                        <tr>
                            <div class="form-group">
                                <th><label>sub_level</label></th>
                                <th>
                                    <select id="sub_level" class="form-control " name="sub_level">
                                        <option value=""></option>
                                    </select>
                                </th>
                            </div>
                        </tr>

                        <tr>
                            <div class="form-group">
                                <th><label>class_id</label></th>
                                <th>
                                    <select id="class_id" class="form-control input-sm" name="class_id">
                                        <option value=""></option>
                                    </select>
                                </th>
                            </div>
                        </tr>

                        </tbody>
                    </table>
                    <div class="form-group">
                        {!! Form::submit('Add Student To Class' ,['class'=>'btn btn-primary']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
                <div class="clearfix"></div>
            </div>
        </div>

    </div>

@endsection


{{-- Scripts Section --}}
@section('scripts')


    <script>
        $('#main_level').on('change', function(e){
            console.log(e);
            var state_id = e.target.value;

            //for sub_levels control
            $.get('http://shop.dev/admin/sing_st_class/create/ajax-state?state_id=' + state_id, function(data) {
                console.log(data);
                $('#sub_level').empty();
                $('#sub_level').append('<option value="">' + 'Select Sub Level' + '</option>');
                $.each(data, function(index,subCatObj){
                    $('#sub_level').append('<option value="' + subCatObj.id +'">' + subCatObj.name + '</option>');
                });
            });

        });

        $('#sub_level').on('change', function(e){
            console.log(e);
            var sub_level = e.target.value;

            //for teachers control
            $.get('http://shop.dev/admin/sing_st_class/create/ajax-state-2?main_level=' + sub_level, function(data) {
                console.log(data);
                $('#class_id').empty();
                $('#class_id').append('<option value="">' + 'Select Class' + '</option>');
                $.each(data, function(index,subCatObj){
                    $('#class_id').append('<option value="' + subCatObj.en_class_id +'">' + ('{'+subCatObj.class_name+'}')+' '+('{'+subCatObj.teacher_id+'}')+' '+('{'+subCatObj.term_start+'}')+' '+('{'+subCatObj.term_end+'}')+' '+('{'+subCatObj.final_date_time+'}')+' '+('{'+subCatObj.class_start_end_time_1+'}')+' '+('{'+subCatObj.class_start_end_time_2+'}')+' '+('{'+subCatObj.class_start_end_time_3+'}')+' '+('{'+subCatObj.class_start_end_time_4+'}')   + '</option>');
                });
            });

        });

</script>

@endsection