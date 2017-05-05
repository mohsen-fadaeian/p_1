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
                {!! Form::open(['method'=>'POST' , 'action'=>'SubsLevelController@store']) !!}
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
                    {!! Form::submit('Add main Level' ,['class'=>'btn btn-primary']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
        <div class="col-lg-7 col-md-7">
            <div class="card-box">
                <h3>لیست زیر مقاطع دانش آموزان</h3>
                @if(count($sub_lvl) > 0)
                    <table class="table table-striped">
                        <thead>
                        <tr >
                            <th>id</th>
                            <th>name</th>
                            <th>order_subs</th>
                            <th>main_lvl</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($sub_lvl as $sub)
                            <tr>
                                <td>{{$sub->id}}</td>
                                <td>{{$sub->name}}</td>
                                <td>{{$sub->order_subs}}</td>
                                <td>{{$sub->mainlevel->name}}</td>
                                <td><a class="btn btn-bordred btn-warning btn-sm text-white" href="{{route('subslvl.edit',$sub->id)}}">Edit</a></td>
                                <td>
                                    {!! Form::open(['method'=>'DELETE' , 'action'=>['SubsLevelController@destroy',$sub->id]]) !!}
                                    {!! Form::submit('Delete Sub Level' ,['class'=>'btn btn-bordred btn-danger btn-sm text-white']) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="col-lg-12 m-t-20">
                        <div class="panel panel-color panel-info">
                            <div class="panel-heading">
                                <h3 class="panel-title">Attention</h3>
                            </div>
                            <div class="panel-body">
                                <p>
                                    No Levels Record exist
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                @endif
            </div>
        </div>

    </div>

@endsection


{{-- Scripts Section --}}
@section('scripts')
@endsection