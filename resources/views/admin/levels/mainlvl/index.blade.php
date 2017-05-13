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
                <h3>افزودن مقاطع دانش آموزان</h3>
                {!! Form::open(['method'=>'POST' , 'action'=>'MainLevelController@store']) !!}
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
                            <th>{!! Form::label('order_lvl','order_lvl:') !!}</th>
                            <td>{!! Form::number('order_lvl' ,null ,['class'=>'form-control']) !!}</td>
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
                <h3>لیست مقاطع دانش آموزان</h3>
                @if(count($main_lvl) > 0)
                    <table class="table table-striped">
                        <thead>
                        <tr >
                            <th>id</th>
                            <th>name</th>
                            <th>order_lvl</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($main_lvl as $main)
                            <tr>
                                <td>{{$main->id}}</td>
                                <td>{{$main->name}}</td>
                                <td>{{$main->order_lvl}}</td>
                                <td><a class="btn btn-bordred btn-warning col-sm-6 btn-sm text-white" href="{{route('mainlvl.edit',$main->id)}}">Edit</a></td>
                                <td>
                                    {!! Form::open(['method'=>'DELETE' , 'action'=>['MainLevelController@destroy',$main->id]]) !!}
                                            {!! Form::submit('Delete Level' ,['class'=>'btn btn-bordred btn-danger col-sm-6 btn-sm text-white']) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-4">
                        {{$main_lvl->render()}}
                        </div>
                    </div>
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