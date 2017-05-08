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
            <div class="card-box ">
                @if(count($teachers) > 0)
                    @foreach($teachers as $teacher)
                        <h2>Student Details</h2>
                        <div class="col-sm-8">
                            <h4 class="text-danger">({{$teacher->f_name . ' '.$teacher->l_name}})</h4>
                            <table class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>Atrebiutes</th>
                                    <th>Data</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th class="col-sm-3">id :</th>
                                    <td>{{$teacher->id}}</td>
                                </tr>
                                <tr>
                                    <th class="col-sm-3">f_name :</th>
                                    <td>{{$teacher->f_name}}</td>
                                </tr>
                                <tr>
                                    <th class="col-sm-3">l_name :</th>
                                    <td>{{$teacher->l_name}}</td>
                                </tr>
                                <tr>
                                    <th class="col-sm-3">address :</th>
                                    <td>{{$teacher->address}}</td>
                                </tr>
                                <tr>
                                    <th class="col-sm-3">bio :</th>
                                    <td>{{$teacher->bio}}</td>
                                </tr>
                                <tr>
                                    <th class="col-sm-3">phone_number :</th>
                                    <td>{{$teacher->phone_number}}</td>
                                </tr>
                                <tr>
                                    <th class="col-sm-3">home_number :</th>
                                    <td>{{$teacher->home_number}}</td>
                                </tr>
                                <tr>
                                    <th class="col-sm-3">teacher_id :</th>
                                    <td>{{$teacher->teacher_id}}</td>
                                </tr>
                                <tr>
                                    <th class="col-sm-3">max_level :</th>
                                    <td>{{$teacher->mainlevel->name}}</td>
                                </tr>
                                <tr>
                                    <th class="col-sm-3">Created :</th>
                                    <td>{{$teacher->created_at->diffForHumans()}}</td>
                                </tr>
                                <tr>
                                    <th class="col-sm-3">Updated :</th>
                                    <td>{{$teacher->updated_at->diffForHumans()}}</td>
                                </tr>

                                </tbody>
                            </table>
                        </div>
                        <div class="col-sm-3 m-t-30">
                            <div class="row text-center">
                                <a href="{{route('teachers.edit',$teacher->id)}}" class="btn btn-bordred btn-lg btn-warning col-lg-4 col-sm-offset-2" > Edit! </a>
                                <a href="{{route('teachers.index')}}" class="btn btn-bordred btn-lg btn-primary col-lg-4 col-sm-offset-2" > Back </a>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    @endforeach
                @else
                    <div class="col-lg-12 m-t-20">
                        <div class="panel panel-color panel-info">
                            <div class="panel-heading">
                                <h3 class="panel-title">Attention</h3>
                            </div>
                            <div class="panel-body">
                                <p>
                                    No Students Details exist
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