@extends('layouts.app')

@section('content')

@foreach ($LessonDetails as $LessonDetail)

<div class="sing_lesson p-3 p-md-5" style="background-image: url('{{ asset('/lesson/img/' . $LessonDetail->background_image) }}');">
    @if(($LessonDetail -> audio) == !null)
    <audio id="bgMusic" src="{{ asset('/lesson/audio/' . $LessonDetail->audio) }}" loop></audio>
    <div class="pl_btn">
        <button id="toggleBtn" class="btn btn-lg btn-primary rounded-circle"><i class="bi bi-play-fill"></i></button>
    </div>
    @endif
    <div class="container bg-tpdark p-3 p-md-5 rounded">
        <div class="row">
            <div class="col-md-12">
                @if(($LessonDetail -> video_link) == !null)
                <iframe id="youtubeVideo" width="100%" height="300" src="{{ $LessonDetail -> video_link}}?rel=0&amp;modestbranding=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                <div class="text-center">
                    <h1 class="text-light py-2">{{ $LessonDetail -> video_title}}</h1>
                    @if(($LessonDetail -> video_description) == !null)
                    <p class="text-light py-2">{{ $LessonDetail -> video_description}}</p>
                    @endif
                </div>
                @elseif(($LessonDetail -> video_link) == null && ($LessonDetail -> live_link) == !null)
                @if(($LessonDetail -> thumbnail) == !null)
                <a href="{{ $LessonDetail -> live_link}}" class="livesec">
                    <img class="w-100 thumb" src="{{ asset('/lesson/thumbnail/' . $LessonDetail->thumbnail) }}" alt="">
                </a>
                @endif
                <div class="text-center">
                    <h1 class="text-light py-2">{{ $LessonDetail -> live_title}}</h1>
                    @if(($LessonDetail -> live_description) == !null)
                    <p class="text-light py-2">{{ $LessonDetail -> live_description}}</p>
                    @endif
                </div>
                @endif


            </div>
            <div class="col-md-12 mt-3">
                @if( ($LessonDetail -> video_link) == !null && ($LessonDetail -> live_link) == !null)
                <div class="text-center">
                    <a class="btn btn-lg btn-info btn-lg infinite-zoom hover-3d mb-4" target="_blank" href="{{ $LessonDetail -> live_link}}">Join {{ $LessonDetail -> live_title}}</a>
                </div>
                @endif
                <div class="btn_sec p-3">
                    <div class="row text-center">
                        @if(($LessonDetail -> extra_video) == !null)
                        <div class="col-lg-6">
                            <a target="_blank" href="{{ $LessonDetail -> extra_video}}" class="btn btn-lg btn-primary w-100 mb-3">Discuss Addtional Questions</a>
                        </div>
                        @endif
                        @if(($LessonDetail -> audio) == !null)
                        <div class="col-lg-6">
                            <a target="_blank" href="{{ asset('/lesson/audio/' . $LessonDetail->audio) }}" class="btn btn-lg btn-secondary w-100 mb-3">Download Audio Files</a>
                        </div>
                        @endif
                        @if(($LessonDetail -> tute) == !null)
                        <div class="col-lg-6">
                            <a target="_blank" href="{{ asset('/lesson/tute/' . $LessonDetail->tute) }}" class="btn btn-lg btn-success w-100 mb-3">Tutes About Weather</a>
                        </div>
                        @endif
                        @if(($LessonDetail -> extra_youtube) == !null)
                        <div class="col-lg-6">
                            <a target="_blank" href="{{ $LessonDetail -> extra_youtube}}" class="btn btn-lg btn-danger w-100 mb-3">Additional Youtube Lessons</a>
                        </div>
                        @endif
                        <!-- <div class="col-lg-6">
                            <a target="_blank" href="https://www.pexels.com/search/mobile%20wallpaper/  " class="btn btn-lg btn-secondary w-100 mb-3">Seasons Wallpapers</a>
                        </div> -->
                        @if(($LessonDetail -> paper) == !null)
                        <div class="col-lg-6">
                            <a target="_blank" href="{{ $LessonDetail -> paper}}" class="btn btn-lg btn-info w-100 mb-3">Paper Exam</a>
                        </div>
                        @endif
                        @if(($LessonDetail -> mcq_id) == !null)
                        <div class="col-lg-6">
                            <a target="_blank" href="{{ route('mcq', ['id' => $LessonDetail->mcq_id]) }}" class="btn btn-lg btn-warning w-100 mb-3">MCQ Exam</a>
                        </div>
                        @endif
                        @if(($LessonDetail -> homework) == !null)
                        <div class="col-lg-6">
                            <a target="_blank" href="{{ $LessonDetail -> homework}}" class="btn btn-lg btn-dark w-100 mb-3">Upload Today HomeWork</a>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- {{ $LessonDetail}} -->

    <script>
        var bgMusic = document.getElementById('bgMusic');
        var toggleBtn = document.getElementById('toggleBtn');
        var isPlaying = false;

        toggleBtn.addEventListener('click', function() {
            if (isPlaying) {
                bgMusic.pause();
                toggleBtn.innerHTML = '<i class="bi bi-play-fill"></i>';
            } else {
                bgMusic.play();
                toggleBtn.innerHTML = '<i class="bi bi-pause-fill"></i>';
            }
            isPlaying = !isPlaying;
        });
        document.addEventListener('DOMContentLoaded', function() {
            toggleBtn.click();
        });
    </script>
</div>

<!-- Display lesson information -->

<!-- Add more fields as needed -->
@endforeach


@endsection