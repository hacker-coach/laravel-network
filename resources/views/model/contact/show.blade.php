@extends('layouts.app')

@section('content')

    @include('snippet.sectionheader', ['title' =>'Kontakt'])

        <div class="container" style="padding-top: 3rem; padding-bottom: 3rem;">
         @if(Auth::user()->is_user_activ && Auth::user()->role_hunter)
                <div class="row">
                    <div class="col-md-3">
                        <a class="btn  btn-primary float-left" href="{{ route('contactIndex') }}" >
                            {{ __('zurück') }}
                        </a>
                    </div>
                    <div class="col-md-9">

                        <p class="lead mb-0">
                            {!! $contact->text !!}
                        </p>
                    </div>
                </div>
            @endif
        </div>
@endsection
