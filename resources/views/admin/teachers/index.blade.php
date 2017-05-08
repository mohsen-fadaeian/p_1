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
                <h3>افزودن دبیر</h3>
                {!! Form::open(['method'=>'POST' , 'action'=>'TeachersController@store']) !!}
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
                            <th>{!! Form::label('teacher_id','teacher_id:') !!}</th>
                            <td>{!! Form::number('teacher_id' ,null ,['class'=>'form-control']) !!}</td>
                        </div>
                    </tr>

                    <tr>
                        <div class="form-group">
                            <th>{!! Form::label('max_level','max_level:') !!}</th>
                            <td>{!! Form::select('max_level' ,$levels,null ,['class'=>'form-control']) !!}</td>
                        </div>
                    </tr>
                    </tbody>
                </table>
                <div class="form-group">
                    {!! Form::submit('Add Teacher' ,['class'=>'btn btn-primary']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
        <div class="col-lg-7 col-md-7">
            <div class="card-box">
                <h3>لیست دبیر</h3>
                @if(count($teachers) > 0)
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>f_name</th>
                            <th>l_name</th>
                            <th>teacher_id</th>
                            <th>max_level</th>
                            <th>Show</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($teachers as $teacher)
                            <tr>
                                <td>{{$teacher->id}}</td>
                                <td>{{$teacher->f_name}}</td>
                                <td>{{$teacher->l_name}}</td>
                                <td>{{$teacher->teacher_id}}</td>
                                <td>{{$teacher->mainlevel->name}}</td>
                                <td><a class="btn btn-bordred btn-info col-sm-6 btn-sm text-white" href="{{route('teachers.show',$teacher->id)}}">Show</a></td>
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
                                    No Teacher Record exist
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