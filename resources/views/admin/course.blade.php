@extends("layouts.admin.main")
@section("main-section")
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Courses</h4>
                        <div class="table-responsive">
                            <table class="table table-striped text-center mb-3">
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
                                            Status
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
                                        <td class="d-flex justify-content-center">
                                            <form action="{{url('/admin/course/'.$course->id)}}" method="POST">
                                                @csrf
                                                @if($course->show_on_user)
                                                <button type="submit" class="btn btn-danger btn-icon-text btn-sm">
                                                    Inactive
                                                </button>
                                                @else
                                                <button type="submit" class="px-3 btn btn-primary btn-icon-text btn-sm">
                                                    Active
                                                </button>
                                                @endif
                                            </form>
                                            <button type="button" class="ms-2 btn btn-success btn-icon-text btn-sm">
                                                <a class="text-white text-decoration-none" href="{{url('course/'.$course->id)}}">View</a>
                                            </button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{$courses->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- partial -->
</div>
@endsection