@extends('layouts.app')

@section('content')

    @include('snippet.sectionheader', ['title' =>'Artikel'])

    <div class="container" style="padding-top: 3rem; padding-bottom: 3rem;">
        <div class="row justify-content-center">
                <div class="col-md-8">
                    <h3 class="black-box">{{$advert->title}}</h3>
                    <p style="font-weight:bold; padding-top: 15px; font-size: 1.2rem;">
                        {{$advert->teaser}}
                    </p>
                    <p class="lead mb-0">
                        @if (isset($advert->image))
                            <div class="card float-right" style="width: 50%; margin-bottom: 5px;margin-top: 5px; ">
                            <img class="card-img-top" src="/uploads/advert{{$advert->image}}">
                            </div>
                        @endif
                        {!! $advert->getMarkdownText() !!}
                    </p>
                    <p style="font-weight:bold">
                         {{$advert->link}}
                    </p>
                </div>
        </div>
    </div>
@endsection
