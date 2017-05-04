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
                <h2>لیست دانش آموزان</h2>
                @if(count($students) > 0)
                <table class="table table-striped">

                    <thead>
                    <tr>
                        <th>id</th>
                        <th>first_name</th>
                        <th>last_name</th>
                        <th>Student_id</th>
                        <th>show</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($students as $student)
                            <tr>
                                <td>{{$student->id}}</td>
                                <td>{{$student->first_name}}</td>
                                <td>{{$student->last_name}}</td>
                                <td>{{$student->student_id}}</td>
                                <td><a class="btn btn-bordred btn-primary btn-sm text-white" href="{{route('students.show',$student->id)}}">show</a></td>
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