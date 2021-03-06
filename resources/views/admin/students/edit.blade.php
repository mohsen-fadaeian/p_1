@extends('layouts.admin')


{{-- Title Section --}}
@section('title')
    Admin Area (Students_Section)
@endsection


{{-- Styles Section --}}
@section('styles')
    <link href="{{asset('plugins/bootstrap-sweetalert/sweet-alert.css')}}" rel="stylesheet" type="text/css" />
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
                    {!! Form::model($student,['method'=>'PATCH' , 'action'=>['StudentsController@update',$student->id]]) !!}
                    <table class="table table-striped table-bordered">
                        <tbody>
                        <tr>
                            <th>{!! Form::label('mobile_number','mobile_number:') !!}</th>
                            <td>{!! Form::number('mobile_number' ,null ,['class'=>'form-control']) !!}</td>
                        </tr>
                        <tr>
                            <div class="form-group">
                                <th>{!! Form::label('home_tell_number','home_tell_number:') !!}</th>
                                <td>{!! Form::number('home_tell_number' ,null ,['class'=>'form-control']) !!}</td>
                            </div>
                        </tr>
                        <tr>
                            <div class="form-group">
                                <th>{!! Form::label('emergency_tell_number','emergency_tell_number:') !!}</th>
                                <td>{!! Form::number('emergency_tell_number' ,null ,['class'=>'form-control']) !!}</td>
                            </div>
                        </tr>
                        <tr>
                            <div class="form-group">
                                <th>{!! Form::label('first_name','first_name:') !!}</th>
                                <td>{!! Form::text('first_name' ,null ,['class'=>'form-control']) !!}</td>
                            </div>
                        </tr>
                        <tr>
                            <div class="form-group">
                                <th>{!! Form::label('last_name','last_name:') !!}</th>
                                <td>{!! Form::text('last_name' ,null ,['class'=>'form-control']) !!}</td>
                            </div>
                        </tr>
                        <tr>
                            <div class="form-group">
                                <th>{!! Form::label('address','address:') !!}</th>
                                <td>{!! Form::textarea('address' ,null ,['class'=>'form-control']) !!}</td>
                            </div>
                        </tr>
                        <tr>
                            <div class="form-group">
                                <th>{!! Form::label('email','email:') !!}</th>
                                <td>{!! Form::email('email' ,null ,['class'=>'form-control']) !!}</td>
                            </div>
                        </tr>
                        <tr>
                            <div class="form-group">
                                <th>{!! Form::label('school_level','school_level:') !!}</th>
                                <td>{!! Form::select('school_level' ,['L' => 'Large', 'S' => 'Small'],null,['class'=>'form-control'],['placeholder' => 'Pick a size...']) !!}</td>
                            </div>
                        </tr>
                        <tr>
                            <div class="form-group">
                                <th>{!! Form::label('sex','sex:') !!}</th>
                                <td>{!! Form::select('sex' ,['male' => 'Male', 'female' => 'Female'],null,['class'=>'form-control'],['placeholder' => 'Pick a size...']) !!}</td>
                            </div>
                        </tr>
                        <tr>
                            <div class="form-group">
                                <th>{!! Form::label('dad_name','dad_name:') !!}</th>
                                <td>{!! Form::text('dad_name' ,null ,['class'=>'form-control']) !!}</td>
                            </div>
                        </tr>
                        <tr>
                            <div class="form-group">
                                <th>{!! Form::label('birth_date','birth_date:') !!}</th>
                                <td>{!! Form::date('birth_date' ,null ,['class'=>'form-control']) !!}</td>
                            </div>
                        </tr>
                        </tbody>
                    </table>
                    <div class="form-group">
                        {!! Form::submit('Edit Student' ,['class'=>'btn btn-primary']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
                <div class="col-sm-3">
                    <div class="row">
                        <a href="{{route('students.index')}}" class="btn btn-bordred btn-lg btn-primary col-sm-4 col-sm-offset-6" > Back </a>
                    </div>
                    <div class="row" style="margin-top: 50px">
                        {!! Form::open(['method'=>'DELETE' , 'action'=>['StudentsController@destroy',$student->id]]) !!}

                            <div class="form-group">

                                {!! Form::submit('Delete Student' ,['class'=>'btn btn-danger btn-lg col-sm-6 col-sm-offset-5']) !!}
                            </div>

                        {!! Form::close() !!}
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>

    </div>

@endsection


{{-- Scripts Section --}}
@section('scripts')
    <script src="{{asset('plugins/bootstrap-sweetalert/sweet-alert.min.js')}}"></script>
    <script src="{{asset('pages/jquery.sweet-alert.init.js')}}"></script>
@endsection