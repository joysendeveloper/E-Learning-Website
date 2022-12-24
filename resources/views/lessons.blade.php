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
                <div class="local_video">
                    <video class="w-100" src="" controls></video>
                    <h4 class="py-3 title">Title Of The Video</h4>
                </div>
                <div class="youtube_video">
                    <iframe src="https://www.youtube.com/embed/2WGJpeJi_VY" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
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
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('script')
<script>
    $(document).ready(function() {
        var main_video = $(".main-video video");
        var main_title = $(".main-video .title");
        var video_playlist = $(".video-playlist .videos");
        var iframe = $('.youtube_video iframe');
        var videosContainer = '';

        $(".youtube_video").hide();

        $.ajax({
            url: "api/getLessons",
            type: "GET",
            success: function(response) {
                let data = response;
                var counter = 1;
                console.log(data);

                // Display the lessons Playlist 
                data.forEach((video, i) => {
                    let video_element = `
                    <div class="video" data-id="${video.id}">
                        <div class="d-flex content">
                            <img class="img-fluid" src="{{asset('asset/img/play.png')}}" alt="">
                            <p>${counter}</p>
                            <h4 class="">${video.lesson_title}</h4>
                        </div>
                        <p class="time">3.46</p>
                    </div>`;
                    counter++;
                    videosContainer += video_element;
                });
                video_playlist.html(videosContainer);


                // Play First Video By Default
                if (data[0].video_from == "youtube") {
                    $(".local_video").hide();
                    $(".youtube_video").show();
                    var iframe = $('.youtube_video iframe');
                    iframe[0].src = `${data[0].video_path}`;
                    main_title.html(data[0].lesson_title);
                } else {
                    $(".local_video").show();
                    $(".youtube_video").hide();
                    main_video[0].src = `${data[0].video_path}`;
                    main_title.html(data[0].lesson_title);
                }

                // Onclick Playlist item Video will play 
                let videos = document.querySelectorAll(".video");
                videos[0].classList.add("active");
                videos[0].querySelector("img").src = "{{asset('asset/img/pause.png')}}";

                videos.forEach((selected_video) => {
                    selected_video.addEventListener("click", () => {
                        playVideo();
                    });

                    function playVideo() {
                        videos.forEach((selected_video) => {
                            selected_video.classList.remove("active");
                            selected_video.querySelector("img").src = "{{asset('asset/img/play.png')}}";
                        });
                        selected_video.classList.add("active");
                        selected_video.querySelector("img").src = "{{asset('asset/img/pause.png')}}";

                        let match_video = data.find(
                            (video) => video.id == selected_video.dataset.id
                        );
                        if (match_video.video_from == "youtube") {
                            $(".local_video").hide();
                            $(".youtube_video").show();
                            iframe[0].src = `${match_video.video_path}`;
                            main_title.html(match_video.lesson_title);
                            console.log(iframe);
                        } else {
                            $(".local_video").show();
                            $(".youtube_video").hide();
                            main_video[0].src = `${match_video.video_path}`;
                            main_title.html(match_video.lesson_title);
                            console.log("Video Form Local Disk");
                        }
                    }
                });

            }
        });
    });
</script>
@endsection