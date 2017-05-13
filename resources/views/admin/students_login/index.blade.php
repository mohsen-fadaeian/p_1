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
                    <table class="table table-striped">

                        <thead>
                        <tr >
                            <th>id</th>
                            <th>first_name</th>
                            <th>last_name</th>
                            <th>Student_id</th>
                            <th>Active Status</th>
                            <th>show</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($student_user as $user)
                            <tr class="{{$user->status == 1 ? 'success' : 'warning'}}">
                                <td>{{$user->student->id}}</td>
                                <td>{{$user->student->first_name}}</td>
                                <td>{{$user->student->last_name}}</td>
                                <td>{{$user->student->student_id}}</td>
                                @if($user->status == 1)
                                    <td class="text-success">Active</td>
                                    @else
                                        <td class="text-warning">No Active</td>
                                @endif
                                <td><a class="btn btn-bordred btn-inverse col-sm-6 btn-sm text-white" href="{{route('students_login.show',$user->id)}}">show</a></td>
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