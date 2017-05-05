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

        <div class="col-lg-12 col-md-12">
            <div class="card-box">
                <h2>لیست رمز دانش آموزان</h2>
                {!! Form::model($user,['method'=>'PATCH' , 'action'=>['StudentsLoginController@update',$user->id]]) !!}
                        <table class="table table-striped">
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
                                        <td>{!! Form::password('password'  ,['class'=>'form-control']) !!}</td>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="form-group">
                                        <th>{!! Form::label('status','status:') !!}</th>
                                        <td>{!! Form::select('status' ,['1' => 'Active', '0' => 'Not Active'],null,['class'=>'form-control']) !!}</td>
                                    </div>
                                </tr>
                            </tbody>
                        </table>
                            <div class="form-group">
                                {!! Form::submit('Edit Student Login' ,['class'=>'btn btn-primary']) !!}
                            </div>
                {!! Form::close() !!}
                <div class="clearfix"></div>
            </div>
        </div>

    </div>

@endsection


{{-- Scripts Section --}}
@section('scripts')
@endsection

