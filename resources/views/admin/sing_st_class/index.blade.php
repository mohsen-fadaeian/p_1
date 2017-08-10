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
                <h3>لیست مقاطع دانش آموزان</h3>
                @if(count($st_class) > 0)
                    <table class="table table-striped">
                        <thead>
                            <tr >
                                <th>id</th>
                                <th>class_id</th>
                                <th>student name</th>
                                <th>classes_grate</th>
                                <th>final_grate</th>
                                <th>ave_grate</th>
                                <th>pass_or_fail</th>
                                <th>main_level</th>
                                <th>sub_level</th>
                                <th>term_start</th>
                                <th>term_end</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($st_class as $st)
                            <tr>
                                <td>{{$st->id}}</td>
                                <td>{{$st->class_id}}</td>
                                <td>{{$st->student->first_name.' '.$st->student->last_name}}</td>
                                <td>{{$st->classes_grate == null ? 'Empty' : $st->classes_grate}}</td>
                                <td>{{$st->final_grate == null ? 'Empty' : $st->final_grate}}</td>
                                <td>{{$st->ave_grate == null ? 'Empty' : $st->ave_grate}}</td>
                                <td>{{$st->pass_or_fail == null ? 'Empty' : $st->pass_or_fail}}</td>
                                <td>{{$st->mainlevel->name}}</td>
                                <td>{{$st->sublevel->name}}</td>
                                <td>{{$st->term_start}}</td>
                                <td>{{$st->term_end}}</td>
                                <td><a class="btn btn-bordred btn-warning btn-sm text-white" href="{{route('sing_st_class.edit',$st->id)}}">Edit</a></td>
                                {{--<td>--}}
                                    {{--{!! Form::open(['method'=>'DELETE' , 'action'=>['MainLevelController@destroy',$main->id]]) !!}--}}
                                    {{--{!! Form::submit('Delete Level' ,['class'=>'btn btn-bordred btn-danger col-sm-6 btn-sm text-white']) !!}--}}
                                    {{--{!! Form::close() !!}--}}
                                {{--</td>--}}
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