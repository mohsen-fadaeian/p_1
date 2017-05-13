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
        <div class="col-lg-7 col-md-7">
            <div class="card-box">
                <h3>ویرایش رمز دبیر </h3>
                {!! Form::model($u,['method'=>'PATCH' , 'action'=>['TeacherPasswordController@update',$u->id]]) !!}
                <table class="table table-bordered">
                    <tbody>
                    <tr>
                        <div class="form-group">
                            <th>{!! Form::label('email','email:') !!}</th>
                            <td>{!! Form::email('email' ,null ,['class'=>'form-control']) !!}</td>
                        </div>
                    </tr>
                    <tr>
                        <div class="form-group">
                            <th>{!! Form::label('password','password:') !!}</th>
                            <td>{!! Form::password('password' ,['class'=>'form-control']) !!}</td>
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
                    {!! Form::submit('Edit Teacher' ,['class'=>'btn btn-warning']) !!}
                </div>
                {!! Form::close() !!}

                <div class="clearfix"></div>
            </div>
        </div>
        <div class="col-lg-5 col-md-5">

        </div>

    </div>

@endsection


{{-- Scripts Section --}}
@section('scripts')
@endsection