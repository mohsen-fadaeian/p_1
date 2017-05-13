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
                            <th>id</th>
                            <th>en_class_id</th>
                            <th>term_start</th>
                            <th>term_end</th>
                            <th>final_date_time</th>
                            <th>main_level</th>
                            <th>sub_level</th>
                            <th>teacher_id</th>
                            <th>class_max_size</th>
                            <th>status</th>
                            <th>Show</th>
                            <th>Edit</th>

                        </tr>
                        </thead>
                        <tbody>

                        @foreach($enclass as $class)
                            @if ($class->status == 1)
                                <tr class="success">
                            @else
                                <tr class="warning">
                            @endif
                                <td>{{$class->id}}</td>
                                <td>{{$class->en_class_id}}</td>
                                <td>{{$class->term_start}}</td>
                                <td>{{$class->term_end}}</td>
                                <td>{{$class->final_date_time}}</td>
                                <td>{{$class->mainlevel->name}}</td>
                                <td>{{$class->sublevel->name}}</td>
                                <td>{{$class->teacher->l_name}}</td>
                                <td>{{$class->class_max_size}}</td>
                                @if ($class->status == 1)
                                    <td class="text-success">Active</td>
                                @elseif($class->status == 0)
                                    <td class="text-warning">Disable</td>
                                @endif

                                <td><a class="btn btn-bordred btn-success btn-sm text-white" href="{{route('class.show',$class->id)}}">Show</a></td>
                                <td><a class="btn btn-bordred btn-warning btn-sm text-white" href="{{route('class.edit',$class->id)}}">Edit</a></td>
                            </tr>

                        @endforeach
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-4">
                            {{$enclass->render()}}
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