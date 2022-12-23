@extends('layouts.instructor.main')
@section('main-section')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="card-body">
                            <h4 class="card-title">Add Lessons</h4>

                            <div class="row pt-2 pb-4">
                                <div class="col-md-6 mb-2">
                                    <button id="local_video_btn" class="btn btn-primary btn-block w-100">Add Local Video</button>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <button id="youtube_video_btn" class="btn btn-danger btn-block w-100">Add Youtube Video</button>
                                </div>
                            </div>

                            <!-- Show how many lessons i can add  -->
                            <div class="alert alert-success" role="alert">
                                Total lesson <strong>{{$total_lesson}}</strong>. <br>
                                <strong>{{$lesson_added}}</strong> added, <strong>{{$total_lesson - $lesson_added}}</strong> remaining.
                            </div>
                            @if (Session::has('success'))
                            <div class="alert alert-success success" role="alert">
                                <strong>{{Session::get('success')}}</strong>
                            </div>
                            @endif

                            @if($lesson_added < $total_lesson) <!-- Local Video -->
                                <form method="POST" action="{{url('instructor/addlesson')}}" class="form-inline" enctype="multipart/form-data" id="local_video">
                                    @csrf
                                    <input hidden type="hidden" name="course_id" value="{{$id}}">
                                    <div class="form-group">
                                        <label class="sr-only" for="lesson_title">Lesson Title</label>
                                        <input type="text" name="lesson_title" class="form-control mb-2 mr-sm-2 border border-primary" id="lesson_title" placeholder="Give a title of your course">
                                    </div>

                                    <div class="form-group">
                                        <label class="sr-only" for="File">Add Lesson Video</label>
                                        <div style="border-radius: 5px;" class="custom-file border border-primary pt-1 ps-1">
                                            <input name="lesson_video" type="file" class="custom-file-input" id="validatedCustomFile">
                                            <label class="custom-file-label" for="validatedCustomFile">Choose video...</label>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-icon-text">
                                        <i class="ti-file btn-icon-prepend"></i>
                                        Add Lesson
                                    </button>
                                </form>

                                <!-- Youtube Video  -->
                                <form method="POST" action="{{url('instructor/addlesson')}}" class="form-inline" enctype="multipart/form-data" id="youtube_video">
                                    @csrf
                                    <input hidden type="hidden" name="course_id" value="{{$id}}">
                                    <div class="form-group">
                                        <label class="sr-only" for="lesson_title">Lesson Title</label>
                                        <input type="text" name="lesson_title" class="form-control mb-2 mr-sm-2 border border-danger" id="lesson_title" placeholder="Give a title of your course">
                                    </div>

                                    <div class="form-group">
                                        <label class="sr-only" for="lesson_title">Add youtube link</label>
                                        <input type="text" name="lesson_video_link" class="form-control mb-2 mr-sm-2 border border-danger" id="lesson_title" placeholder="https://youtbe.com/123456">
                                    </div>

                                    <button type="submit" class="btn btn-social-icon-text btn-youtube"><i class="ti-youtube"></i>Add Lesson</button>
                                </form>
                                @else
                                <div class="alert alert-danger" role="alert">
                                    <strong>All Lessons Added.</strong>
                                    If you want to add lesson go to course page, <br>
                                    Update the lesson. <a href="{{url('instructor/course')}}">Go Back <- </a>
                                </div>
                                @endif
                        </div>


                        <!-- testing Purpose Video -->
                        <!-- <div class="row">
                            <div class="col-md-6">
                                <iframe width="100%" height="315" src="https://www.youtube.com/embed/iVRvBA4Ep-o" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                            <div class="col-md-6">
                                <iframe width="100%" height="315" src="{{url('storage/videos/video-1671742103.mp4')}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- partial -->
</div>
@endsection
@section('script')
<script>
    $(document).ready(() => {
        $("#youtube_video").hide();

        $('#local_video_btn').click(() => {
            $('#local_video').show();
            $("#youtube_video").hide();
        });
        $('#youtube_video_btn').click(() => {
            $('#youtube_video').show();
            $("#local_video").hide();
        });

        $(".success").alert('close');
    })
</script>

@endsection