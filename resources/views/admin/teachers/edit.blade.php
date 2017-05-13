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
                <h3>ویرایش دبیر </h3>
                {!! Form::model($teachers,['method'=>'PATCH' , 'action'=>['TeachersController@update',$teachers->id]]) !!}
                <table class="table table-bordered">
                    <tbody>
                    <tr>
                        <div class="form-group">
                            <th>{!! Form::label('f_name','f_name:') !!}</th>
                            <td>{!! Form::text('f_name' ,null ,['class'=>'form-control']) !!}</td>
                        </div>
                    </tr>
                    <tr>
                        <div class="form-group">
                            <th>{!! Form::label('l_name','l_name:') !!}</th>
                            <td>{!! Form::text('l_name' ,null ,['class'=>'form-control']) !!}</td>
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
                            <th>{!! Form::label('bio','bio:') !!}</th>
                            <td>{!! Form::textarea('bio' ,null ,['class'=>'form-control']) !!}</td>
                        </div>
                    </tr>
                    <tr>
                        <div class="form-group">
                            <th>{!! Form::label('phone_number','phone_number:') !!}</th>
                            <td>{!! Form::number('phone_number' ,null ,['class'=>'form-control']) !!}</td>
                        </div>
                    </tr>
                    <tr>
                        <div class="form-group">
                            <th>{!! Form::label('home_number','home_number:') !!}</th>
                            <td>{!! Form::number('home_number' ,null ,['class'=>'form-control']) !!}</td>
                        </div>
                    </tr>

                    <tr>
                        <div class="form-group">
                            <th>{!! Form::label('max_level','max_level:') !!}</th>
                            <td>{!! Form::select('max_level' ,$mainlevel,null ,['class'=>'form-control']) !!}</td>
                        </div>
                    </tr>
                    </tbody>
                </table>
                <div class="form-group">
                        {!! Form::submit('Edit Teacher' ,['class'=>'btn btn-warning']) !!}
                </div>
                {!! Form::close() !!}

                    {!! Form::open(['method'=>'DELETE' , 'action'=>['TeachersController@destroy',$teachers->id]]) !!}
                    {!! Form::submit('Delete Sub Level' ,['class'=>'btn btn-bordred btn-danger btn-sm text-white']) !!}
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