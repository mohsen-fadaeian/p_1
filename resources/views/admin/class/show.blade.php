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
                <h2>لیست کلاس ها</h2>
                @if(count($enclass) > 0)
                    <table class="table table-striped">

                        <thead>
                        <tr>
                            <th>Atrebiutes</th>
                            <th>Data</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($enclass as $class)

                                <tr>
                                    <th>id</th>
                                    <td>{{$class->id}}</td>
                                </tr>
                                <tr>
                                    <th>en_class_id</th>
                                    <td>{{$class->en_class_id}}</td>
                                </tr>
                                <tr>
                                    <th>term_start</th>
                                    <td>{{$class->term_start}}</td>
                                </tr>
                                <tr>
                                    <th>term_end</th>
                                    <td>{{$class->term_end}}</td>
                                </tr>
                                <tr>
                                    <th>final_date_time</th>
                                    <td>{{$class->final_date_time}}</td>
                                </tr>
                                <tr>
                                    <th>class_start_end_time_1</th>
                                    <td>{{$class->class_start_end_time_1}}</td>
                                </tr>
                                <tr>
                                    <th>class_start_end_time_2</th>
                                    <td>{{$class->class_start_end_time_2}}</td>
                                </tr>
                                <tr>
                                    <th>class_start_end_time_3</th>
                                    <td>{{$class->class_start_end_time_3}}</td>
                                </tr>
                                <tr>
                                    <th>class_start_end_time_4</th>
                                    <td>{{$class->class_start_end_time_4}}</td>
                                </tr>
                                <tr>
                                    <th>mainlevel</th>
                                    <td>{{$class->mainlevel->name}}</td>
                                </tr>
                                <tr>
                                    <th>sublevel</th>
                                    <td>{{$class->sublevel->name}}</td>
                                </tr>
                                <tr>
                                    <th>teacher</th>
                                    <td>{{$class->teacher->l_name}}</td>
                                </tr>
                                <tr>
                                    <th>class_max_size</th>
                                    <td>{{$class->class_max_size}}</td>
                                </tr>
                                <tr>
                                    <th>status</th>
                                    @if ($class->status == 1)
                                        <td class="text-success">Active</td>
                                    @elseif($class->status == 0)
                                        <td class="text-warning">Disable</td>
                                    @endif
                                </tr>
                                <tr>
                                    <th>Edit</th>
                                    <td><a class="btn btn-bordred btn-warning btn-sm text-white" href="{{route('class.edit',$class->id)}}">Edit</a></td>
                                </tr>

                                @endforeach
                        </tbody>
                    </table>
                    <div class="row text-center">
                        <a href="{{route('class.index')}}" class="btn btn-primary col-sm-2 col-sm-offset-5">Back</a>

                    </div>
                @else
                    <div class="col-lg-12 m-t-20">
                        <div class="panel panel-color panel-info">
                            <div class="panel-heading">
                                <h3 class="panel-title">Attention</h3>
                            </div>
                            <div class="panel-body">
                                <p>
                                    No Students Record exist
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