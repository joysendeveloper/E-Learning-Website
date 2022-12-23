@extends("layouts.user.main")
@section("title", "Course Lessons")
@section("main-section")
<!-- header Section -->
<div class="jumbotron jumbotron-fluid page-header position-relative overlay-bottom" style="margin-bottom: 90px;">
    <div class="container text-center py-5">
        <h1 class="text-white display-1">Video Content</h1>
    </div>
</div>

<!-- Video Content  -->
<section>
    <div class="container-fluid py-5">
        <div class="row">
            <div class="col-lg-8 main-video mb-5 mb-xs-2 mb-lg-0">
                <video class="w-100" src="{{url('/storage/videos/video-1671742103.mp4')}}" controls></video>
                <h4 class="py-3">Title Of The Video</h4>
            </div>
            <div class="col-lg-4 video-playlist mt-5 mt-xs-2 mt-lg-0">
                <h3 class="">Title of Video Playlist</h3>
                <div class="d-flex justify-content-between">
                    <p>10 Lessons</p>
                    <p>50m 40s</p>
                </div>
                <div class="videos">
                    <div class="video">
                        <div class="d-flex content">
                            <img class="img-fluid" src="{{asset('asset/img/play.png')}}" alt="">
                            <p>01.</p>
                            <h4 class="">This is a Video Introduction</h4>
                        </div>
                        <p class="time">3.46</p>
                    </div>
                    <div class="video">
                        <div class="d-flex content">
                            <img class="img-fluid" src="{{asset('asset/img/play.png')}}" alt="">
                            <p>01.</p>
                            <h4 class="">This is a Video Introduction</h4>
                        </div>
                        <p class="time">3.46</p>
                    </div>
                    <div class="video">
                        <div class="d-flex content">
                            <img class="img-fluid" src="{{asset('asset/img/play.png')}}" alt="">
                            <p>01.</p>
                            <h4 class="">This is a Video Introduction</h4>
                        </div>
                        <p class="time">3.46</p>
                    </div>
                    <div class="video">
                        <div class="d-flex content">
                            <img class="img-fluid" src="{{asset('asset/img/play.png')}}" alt="">
                            <p>01.</p>
                            <h4 class="">This is a Video Introduction</h4>
                        </div>
                        <p class="time">3.46</p>
                    </div>
                    <div class="video">
                        <div class="d-flex content">
                            <img class="img-fluid" src="{{asset('asset/img/play.png')}}" alt="">
                            <p>01.</p>
                            <h4 class="">This is a Video Introduction</h4>
                        </div>
                        <p class="time">3.46</p>
                    </div>
                    <div class="video">
                        <div class="d-flex content">
                            <img class="img-fluid" src="{{asset('asset/img/play.png')}}" alt="">
                            <p>01.</p>
                            <h4 class="">This is a Video Introduction</h4>
                        </div>
                        <p class="time">3.46</p>
                    </div>
                    <div class="video">
                        <div class="d-flex content">
                            <img class="img-fluid" src="{{asset('asset/img/play.png')}}" alt="">
                            <p>01.</p>
                            <h4 class="">This is a Video Introduction</h4>
                        </div>
                        <p class="time">3.46</p>
                    </div>
                    <div class="video">
                        <div class="d-flex content">
                            <img class="img-fluid" src="{{asset('asset/img/play.png')}}" alt="">
                            <p>01.</p>
                            <h4 class="">This is a Video Introduction</h4>
                        </div>
                        <p class="time">3.46</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection