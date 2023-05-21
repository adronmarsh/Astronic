@extends('layout')

@section('title')
    Noticias
@endsection

@section('content')
    <div class="row d-flex justify-content-center">
        <div class="mt-5 col-md-8">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <ol class="carousel-indicators">
                    @foreach ($notices as $key => $notice)
                        <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $key }}"
                            @if ($loop->first) class="active" @endif></li>
                    @endforeach
                </ol>
                <div class="carousel-inner h-100">
                    @foreach ($notices as $key => $notice)
                    <div class="carousel-item @if ($loop->first) active @endif">
                        @if (pathinfo($notice->media, PATHINFO_EXTENSION) === 'mp4')
                            <div class="video-container">
                                <video class="embed-responsive-item" controls autoplay>
                                    <source src="{{ $notice->media }}" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            </div>
                        @else
                            <img class="img-fluid" src="{{ $notice->media }}" alt="Slide {{ $key }}">
                        @endif
                        <div class="carousel-caption">
                            <h5>{{ $notice->user->user }}</h5>
                        </div>
                    </div>

                    @endforeach
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </a>
            </div>
        </div>
    </div>
@endsection
