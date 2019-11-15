@extends('layouts.app')

@section('content')

    @include('snippet.sectionheader', ['title' =>'Artikel'])

    <div class="container" style="padding-top: 3rem; padding-bottom: 3rem;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h3 class="black-box">{{$post->title}}</h3>
                <p class="lead mb-0">
                    {!! $text !!}
                </p>
            </div>
        </div>
    </div>
@endsection
