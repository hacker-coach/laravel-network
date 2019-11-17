@extends('layouts.app')

@section('content')

    @include('snippet.sectionheader', ['title' =>'Artikel'])

        <div class="container" style="padding-top: 3rem; padding-bottom: 3rem;">
             @if(Auth::user()->is_activ_profil AND
             ((Auth::user()->is_company  && Auth::user()->is_company_member_access) OR (!Auth::user()->is_company)) AND
             $user->show_profil_for_company )
                <div class="row">
                    <div class="col-md-3">
                        <a class="btn  btn-primary float-left" href="{{ route('userShow', $user->id) }}" >
                            {{ __('zurück') }}
                        </a>
                        <br><br>
                        @include('snippet.card')
                    </div>
                    <div class="col-md-9">
                    <h3 class="black-box">{{$post->title}}</h3>
                        <p style="font-weight:bold; padding-top: 15px; font-size: 1.2rem;">
                            {{$post->teaser}}
                        </p>
                        <p class="lead mb-0">
                            {!! $post->getMarkdownText() !!}
                        </p>
                        <div style="font-weight:bolder;">
                            {!! $post->getMarkdownLinks() !!}
                        </div>
                    </div>
                </div>
            @endif
        </div>
@endsection
