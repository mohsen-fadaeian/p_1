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
                @if(count($studentss) > 0)
                @foreach($studentss as $student)
                    <h2>Student Details</h2>
                    <div class="col-sm-8">
                        <h4 class="text-danger">({{$student->first_name . ' '.$student->last_name}})</h4>
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
                        <td>{{$student->id}}</td>
                    </tr>
                    <tr>
                        <th class="col-sm-3">home_tell_number :</th>
                        <td>{{$student->home_tell_number}}</td>
                    </tr>
                    <tr>
                        <th class="col-sm-3">emergency_tell_number :</th>
                        <td>{{$student->emergency_tell_number}}</td>
                    </tr>
                    <tr>
                        <th class="col-sm-3">mobile_number :</th>
                        <td>{{$student->mobile_number}}</td>
                    </tr>
                    <tr>
                        <th class="col-sm-3">first_name :</th>
                        <td>{{$student->first_name}}</td>
                    </tr>
                    <tr>
                        <th class="col-sm-3">last_name :</th>
                        <td>{{$student->last_name}}</td>
                    </tr>
                    <tr>
                        <th class="col-sm-3">address :</th>
                        <td>{{$student->address}}</td>
                    </tr>
                    <tr>
                        <th class="col-sm-3">email :</th>
                        <td>{{$student->email}}</td>
                    </tr>
                    <tr>
                        <th class="col-sm-3">school_level :</th>
                        <td>{{$student->school_level}}</td>
                    </tr>
                    <tr>
                        <th class="col-sm-3">sex :</th>
                        <td>{{$student->sex}}</td>
                    </tr>
                    <tr>
                        <th class="col-sm-3">dad_name :</th>
                        <td>{{$student->dad_name}}</td>
                    </tr>
                    <tr>
                        <th class="col-sm-3">birth_date :</th>
                        <td>{{$student->birth_date}}</td>
                    </tr>
                    <tr>
                        <th class="col-sm-3">Created :</th>
                        <td>{{$student->created_at->diffForHumans()}}</td>
                    </tr>
                    <tr>
                        <th class="col-sm-3">Updated :</th>
                        <td>{{$student->updated_at->diffForHumans()}}</td>
                    </tr>

                    </tbody>
                </table>
                    </div>
                    <div class="col-sm-3 m-t-30">
                        <div class="row text-center">
                            <a href="{{route('students.edit',$student->id)}}" class="btn btn-bordred btn-lg btn-warning col-lg-4 col-sm-offset-2" > Edit! </a>
                            <a href="{{route('students.index')}}" class="btn btn-bordred btn-lg btn-primary col-lg-4 col-sm-offset-2" > Back </a>
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