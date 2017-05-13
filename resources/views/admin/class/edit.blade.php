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
                <h2>Adding Students</h2>
                <div class="col-lg-8 col-md-8">
                    {!! Form::model($class,['method'=>'PATCH' , 'action'=>['EnClassContoller@update',$class->id]]) !!}
                    <table class="table table-striped table-bordered">
                        <tbody>
                        <tr>
                            <div class="form-group">
                                <th>{!! Form::label('class_name','class_name:') !!}</th>
                                <td>{!! Form::text('class_name' ,null ,['class'=>'form-control']) !!}</td>
                            </div>
                        </tr>
                        <tr>
                            <div class="form-group">
                                <th>{!! Form::label('en_class_id','en_class_id:') !!}</th>
                                <td>{!! Form::number('en_class_id' ,null ,['class'=>'form-control']) !!}</td>
                            </div>
                        </tr>
                        <tr>
                            <div class="form-group">
                                <th>{!! Form::label('term_start','term_start:') !!}</th>
                                <td>{!! Form::date('term_start' ,null ,['class'=>'form-control']) !!}</td>
                            </div>
                        </tr>
                        <tr>
                            <div class="form-group">
                                <th>{!! Form::label('term_end','term_end:') !!}</th>
                                <td>{!! Form::date('term_end' ,null ,['class'=>'form-control']) !!}</td>
                            </div>
                        </tr>
                        <tr>
                            <div class="form-group">
                                <th>{!! Form::label('main_level','main_level:') !!}</th>
                                <td>{!! Form::select('main_level' ,$main_level ,null,['placeholder' => 'Select Main Level','id'=>'main_level','class'=>'form-control']) !!}</td>
                            </div>
                        </tr>

                        <tr>
                            <div class="form-group">
                                <th><label>final_date_time</label></th>
                                <th>
                                    <input type="datetime-local" name="final_date_time" class="form-control" value="{{$class->final_date_time}}">
                                </th>
                            </div>
                        </tr>
                        <tr>
                            <div class="form-group">
                                <th><label>sub_level</label></th>
                                <th>
                                    <select id="sub_level" class="form-control input-sm" name="sub_level">
                                        <option value="{{$class->sub_level}}">{{$class->sublevel->name}}</option>
                                    </select>
                                </th>
                            </div>
                        </tr>

                        <tr>
                            <div class="form-group">
                                <th><label>teacher_id</label></th>
                                <th>
                                    <select id="teacher_id" class="form-control input-sm" name="teacher_id">
                                        <option value="{{$class->teacher_id}}">{{$class->teacher->l_name}}</option>
                                    </select>
                                </th>
                            </div>
                        </tr>

                        <tr>
                            <div class="form-group">
                                <th>{!! Form::label('class_start_end_time_1','class_start_end_time_1:') !!}</th>
                                <td>{!! Form::text('class_start_end_time_1' ,null ,['class'=>'form-control']) !!}</td>
                            </div>
                        </tr>
                        <tr>
                            <div class="form-group">
                                <th>{!! Form::label('class_start_end_time_2','class_start_end_time_2:') !!}</th>
                                <td>{!! Form::text('class_start_end_time_2' ,null ,['class'=>'form-control']) !!}</td>
                            </div>
                        </tr>
                        <tr>
                            <div class="form-group">
                                <th>{!! Form::label('class_start_end_time_3','class_start_end_time_3:') !!}</th>
                                <td>{!! Form::text('class_start_end_time_3' ,null ,['class'=>'form-control']) !!}</td>
                            </div>
                        </tr>
                        <tr>
                            <div class="form-group">
                                <th>{!! Form::label('class_start_end_time_4','class_start_end_time_4:') !!}</th>
                                <td>{!! Form::text('class_start_end_time_4' ,null ,['class'=>'form-control']) !!}</td>
                            </div>
                        </tr>
                        <tr>
                            <div class="form-group">
                                <th>{!! Form::label('class_max_size','class_max_size:') !!}</th>
                                <td>{!! Form::number('class_max_size' ,null ,['class'=>'form-control']) !!}</td>
                            </div>
                        </tr>


                        <tr>
                            <div class="form-group">
                                <th>{!! Form::label('status','status:') !!}</th>
                                <td>{!! Form::select('status' ,['1'=>'Activated','0'=>'Disabled'],null ,['class'=>'form-control']) !!}</td>
                            </div>
                        </tr>

                        </tbody>
                    </table>
                    <div class="form-group">
                        {!! Form::submit('Edit Class' ,['class'=>'btn btn-warning']) !!}
                        <a href="{{route('class.index')}}" class="btn btn-primary">Back</a>
                    </div>
                    {!! Form::close() !!}

                    {!! Form::open(['method'=>'DELETE' , 'action'=>['EnClassContoller@destroy',$class->id]]) !!}
                    {!! Form::submit('Delete Class' ,['class'=>'btn btn-bordred btn-danger btn-sm text-white']) !!}
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
            $.get('http://shop.dev/admin/class/create/ajax-state?state_id=' + state_id, function(data) {
                console.log(data);
                $('#sub_level').empty();
                $.each(data, function(index,subCatObj){
                    $('#sub_level').append('<option value="' + subCatObj.id +'">' + subCatObj.name + '</option>');
                });
            });

            //for teachers control
            $.get('http://shop.dev/admin/class/create/ajax-state-2?main_level=' + state_id, function(data) {
                console.log(data);
                $('#teacher_id').empty();
                $.each(data, function(index,subCatObj){
                    $('#teacher_id').append('<option value="' + subCatObj.teacher_id +'">' + subCatObj.f_name + '</option>');
                });
            });


        });


    </script>
@endsection