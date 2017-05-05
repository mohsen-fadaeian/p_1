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
                <h2>لیست رمز دانش آموزان</h2>
                @if(count($student_user) > 0)
                    @foreach($student_user as $user)
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <th>id</th>
                                <td>{{$user->id}}</td>
                            </tr>
                            <tr>
                                <th>first_name</th>
                                <td>{{$user->name}}</td>
                            </tr>
                            <tr>
                                <th>last_name</th>
                                <td>{{$user->email}}</td>
                            </tr>
                            <tr>
                                <th>Student_id</th>
                                <td>{{$user->student->student_id}}</td>
                            </tr>
                            <tr>
                                <th>Active Status</th>
                                @if($user->status == 1)
                                    <td class="text-success">Active</td>
                                @else
                                    <td class="text-warning">No Active</td>
                                @endif
                            </tr>
                        </tbody>
                    </table>
                        <a class="btn btn-bordred btn-inverse col-sm-6 btn-sm text-white" href="{{route('students_login.edit',$user->id)}}">Edit</a>
                    @endforeach
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
                <div class="clearfix"></div>
            </div>
        </div>

    </div>

@endsection


{{-- Scripts Section --}}
@section('scripts')
@endsection

