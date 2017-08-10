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
        {{--<div class="col-lg-5 col-md-5">--}}
            {{--<div class="card-box">--}}
                {{--<h3>افزودن دبیر</h3>--}}
                {{--{!! Form::open(['method'=>'POST' , 'action'=>'TeachersController@store']) !!}--}}
                {{--<table class="table table-bordered">--}}
                    {{--<tbody>--}}
                    {{--<tr>--}}
                        {{--<div class="form-group">--}}
                            {{--<th>{!! Form::label('f_name','f_name:') !!}</th>--}}
                            {{--<td>{!! Form::text('f_name' ,null ,['class'=>'form-control']) !!}</td>--}}
                        {{--</div>--}}
                    {{--</tr>--}}
                    {{--<tr>--}}
                        {{--<div class="form-group">--}}
                            {{--<th>{!! Form::label('l_name','l_name:') !!}</th>--}}
                            {{--<td>{!! Form::text('l_name' ,null ,['class'=>'form-control']) !!}</td>--}}
                        {{--</div>--}}
                    {{--</tr>--}}
                    {{--<tr>--}}
                        {{--<div class="form-group">--}}
                            {{--<th>{!! Form::label('address','address:') !!}</th>--}}
                            {{--<td>{!! Form::textarea('address' ,null ,['class'=>'form-control']) !!}</td>--}}
                        {{--</div>--}}
                    {{--</tr>--}}
                    {{--<tr>--}}
                        {{--<div class="form-group">--}}
                            {{--<th>{!! Form::label('bio','bio:') !!}</th>--}}
                            {{--<td>{!! Form::textarea('bio' ,null ,['class'=>'form-control']) !!}</td>--}}
                        {{--</div>--}}
                    {{--</tr>--}}
                    {{--<tr>--}}
                        {{--<div class="form-group">--}}
                            {{--<th>{!! Form::label('phone_number','phone_number:') !!}</th>--}}
                            {{--<td>{!! Form::number('phone_number' ,null ,['class'=>'form-control']) !!}</td>--}}
                        {{--</div>--}}
                    {{--</tr>--}}
                    {{--<tr>--}}
                        {{--<div class="form-group">--}}
                            {{--<th>{!! Form::label('home_number','home_number:') !!}</th>--}}
                            {{--<td>{!! Form::number('home_number' ,null ,['class'=>'form-control']) !!}</td>--}}
                        {{--</div>--}}
                    {{--</tr>--}}

                    {{--<tr>--}}
                        {{--<div class="form-group">--}}
                            {{--<th>{!! Form::label('email','email:') !!}</th>--}}
                            {{--<td>{!! Form::email('email' ,null ,['class'=>'form-control']) !!}</td>--}}
                        {{--</div>--}}
                    {{--</tr>--}}

                    {{--<tr>--}}
                        {{--<div class="form-group">--}}
                            {{--<th>{!! Form::label('password','password:') !!}</th>--}}
                            {{--<td>{!! Form::password('password' ,['class'=>'form-control']) !!}</td>--}}
                        {{--</div>--}}
                    {{--</tr>--}}

                    {{--<tr>--}}
                        {{--<div class="form-group">--}}
                            {{--<th>{!! Form::label('status','status:') !!}</th>--}}
                            {{--<td>{!! Form::select('status' ,array('1'=>'Activated','0'=>'Disabled'),null ,['class'=>'form-control']) !!}</td>--}}
                        {{--</div>--}}
                    {{--</tr>--}}

                    {{--<tr>--}}
                        {{--<div class="form-group">--}}
                            {{--<th>{!! Form::label('max_level','max_level:') !!}</th>--}}
                            {{--<td>{!! Form::select('max_level' ,$levels,null ,['class'=>'form-control']) !!}</td>--}}
                        {{--</div>--}}
                    {{--</tr>--}}
                    {{--</tbody>--}}
                {{--</table>--}}
                {{--<div class="form-group">--}}
                    {{--{!! Form::submit('Add Teacher' ,['class'=>'btn btn-primary']) !!}--}}
                {{--</div>--}}
                {{--{!! Form::close() !!}--}}
            {{--</div>--}}
        {{--</div>--}}
        <div class="col-lg-7 col-md-7">
            <div class="card-box">
                <h3>لیست دبیر</h3>
                @if(count($a) > 0)
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>class_id</th>
                            <th>student_id</th>
                            <th>teacher_id</th>
                            <th>main_level</th>
                            <th>sub_level</th>
                            <th>term_start</th>
                            <th>term_end</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{$a['class_id']}}</td>
                                <td>{{$a['student_id']}}</td>
                                <td>{{$a['teacher_id']}}</td>
                                <td>{{$a['main_level']}}</td>
                                <td>{{$a['sub_level']}}</td>
                                <td>{{$a['term_start']}}</td>
                                <td>{{$a['term_end']}}</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="text-center">
                    {!! Form::open(['method'=>'POST' , 'action'=>'AddStToClassController@store']) !!}

                        <div class="form-group">
                            {!! Form::hidden('class_id' ,$a['class_id'] ,['class'=>'form-control']) !!}
                            {!! Form::hidden('student_id' ,$a['student_id'] ,['class'=>'form-control']) !!}
                            {!! Form::hidden('teacher_id' ,$a['teacher_id'] ,['class'=>'form-control']) !!}
                            {!! Form::hidden('main_level' ,$a['main_level'] ,['class'=>'form-control']) !!}
                            {!! Form::hidden('sub_level' ,$a['sub_level'] ,['class'=>'form-control']) !!}
                            {!! Form::hidden('term_start' ,$a['term_start'] ,['class'=>'form-control']) !!}
                            {!! Form::hidden('term_end' ,$a['term_end'] ,['class'=>'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::submit('Sing St to Class' ,['class'=>'btn btn-success btn-lg']) !!}
                        </div>


                    {!! Form::close() !!}
                    </div>
                    @endif
            </div>
        </div>
        <div class="col-lg-5 col-md-5">

            <div class="card-box">
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
                <h3>لیست دبیر</h3>
                    <p class="font-600 m-b-5">Student status sing <span class="text-danger pull-right"> Free {{$max_size - $st_exist}} of {{$max_size}}</span></p>
                    <div class="progress progress-bar-danger-alt progress-sm m-b-20">
                        <div class="progress-bar progress-bar-danger progress-animated wow animated animated" role="progressbar" aria-valuenow="{{$graph}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$graph}}%; visibility: visible; animation-name: animationProgress;">
                        </div><!-- /.progress-bar .progress-bar-warning -->
                    </div>
            </div>
        </div>

    </div>

@endsection


{{-- Scripts Section --}}
@section('scripts')
@endsection