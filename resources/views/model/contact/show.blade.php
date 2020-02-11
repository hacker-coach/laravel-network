@extends('layouts.app')

@section('content')

    @include('snippet.sectionheader', ['title' =>'Kontakt'])

        <div class="container" style="padding-top: 3rem; padding-bottom: 3rem;">
         @if(Auth::user()->is_user_activ)
                <div class="row">
                    <div class="col-md-3">
                        <a class="btn  btn-primary float-left" href="{{ route('userShow', null) }}" >
                            {{ __('zurück') }}
                        </a>
                        <br><br>
                        @include('snippet.card')
                    </div>
                    <div class="col-md-9">

                        <p class="lead mb-0">
                            {!! $contact->getMarkdownText() !!}
                        </p>
                        <div style="font-weight:bolder;">
                            {!! $contact->getMarkdownLinks() !!}
                        </div>
                    </div>
                </div>
            @endif
        </div>
@endsection
