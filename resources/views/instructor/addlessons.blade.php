@extends('layouts.instructor.main')
@section('main-section')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Courses</h4>
                        <div class="table-responsive">
                            <table class="table table-striped text-center">
                                <thead>
                                    <tr>
                                        <th>
                                            Image
                                        </th>
                                        <th>
                                            Course title
                                        </th>
                                        <th>
                                            Lessons
                                        </th>
                                        <th>
                                            Active
                                        </th>
                                        <th>
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($courses as $course)
                                    <tr>
                                        <td class="py-1">
                                            <img src="{{url('/storage/images/'.$course->image)}}" alt="image">
                                        </td>
                                        <td>
                                            {{$course->course_title}}
                                        </td>
                                        <td>
                                            {{$course->lessons}}
                                        </td>
                                        <td>
                                            @if($course->show_on_user)
                                            <span class="badge badge-primary">Active</span>
                                            @else
                                            <span class="badge badge-danger">Inactive</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{url('instructor/addlesson/'.$course->id)}}">
                                                <button type="button" class="btn btn-primary btn-icon-text btn-sm">
                                                    Add Lessons
                                                </button>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- partial -->
</div>
@endsection