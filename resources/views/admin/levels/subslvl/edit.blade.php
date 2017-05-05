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
        <div class="col-lg-5 col-md-5">
            <div class="card-box">
                <h3>افزودن زیر مقاطع دانش آموزان</h3>
                {!! Form::model($sub,['method'=>'PATCH' , 'action'=>['SubsLevelController@update',$sub->id]]) !!}
                <table class="table table-bordered">
                    <tbody>
                    <tr>
                        <div class="form-group">
                            <th>{!! Form::label('name','name:') !!}</th>
                            <td>{!! Form::text('name' ,null ,['class'=>'form-control']) !!}</td>
                        </div>
                    </tr>
                    <tr>
                        <div class="form-group">
                            <th>{!! Form::label('order_subs','order_subs:') !!}</th>
                            <td>{!! Form::number('order_subs' ,null ,['class'=>'form-control']) !!}</td>
                        </div>
                    </tr>
                    <tr>
                        <div class="form-group">
                            <th>{!! Form::label('mainlevel_id','mainlevel_id:') !!}</th>
                            <td>{!! Form::select('mainlevel_id' , $main_lvl ,null,['class'=>'form-control']) !!}</td>
                        </div>
                    </tr>
                    </tbody>
                </table>
                <div class="form-group">
                    {!! Form::submit('Edit main Level' ,['class'=>'btn btn-warning']) !!}
                    <a class="btn btn-info" href="{{route('subslvl.index')}}">Back</a>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
        <div class="col-lg-7 col-md-7">

        </div>

    </div>

@endsection


{{-- Scripts Section --}}
@section('scripts')
@endsection