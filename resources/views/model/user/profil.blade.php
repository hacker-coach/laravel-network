@extends('layouts.app')

@section('content')

    @include('snippet.sectionheader', ['title' =>'Profil'])

    <!-- Page Content -->
    <div class="container" style="padding-top: 3rem; padding-bottom: 3rem;">
        <div class="row">
            <div class="col-md-12">
                @if ($user->is_user_activ!=true)
                    <div class="alert alert-warning" role="alert">
                        Ihr Profil muss noch freigeschaltet werden!
                    </div>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <a href="{{ route('userEdit') }}"><span  class="red-edit">{{ __('Profil bearbeiten') }}</span></a><br><br>
                @if ($user->role_ps  OR $user->role_hunter)
                    @include('snippet.card')
                @endif
                @if ($user->role_fan )
                    @include('snippet.cardfan')
                @endif
                @if ($user->role_company)
                    @include('snippet.cardcompany')
                @endif
            </div>
            <div class="col-md-9">
            @if ($user->role_ps)
                <a href="{{ route('userEditTalent') }}"><span  class="red-edit">{{ __('Talent bearbeiten') }}</span></a>
                @include('snippet.talent')
                <br><a href="{{ route('verifyIndex') }}"><span  class="red-edit">{{ __('Referenzen bearbeiten') }}</span></a>
                @include('snippet.verify')
                @if(Auth::user()->is_user_activ)
                    <br><a href="{{ route('postIndex') }}"><span  class="red-edit"> {{ __('Artikel bearbeiten') }}</span></a>
                    @include('snippet.post')
                @endif
            @endif
            @if ($user->role_company)
                <br><a href="{{ route('advertIndex') }}"><span  class="red-edit">{{ __('Anzeigen bearbeiten') }}</span></a>
                @include('snippet.advert')
            @endif
            </div>
        </div>
    </div>
    <div class="container" style="padding-top: 3rem; padding-bottom: 3rem;">
        <div class="row">
            <div class="col-md-10">

            </div>
            <div class="col-md-2">
                <a class="btn btn-danger" href="{{ route('userDelete') }}" >
                    {{ __('Account löschen') }}
                </a>
            </div>
        </div>
        <!-- /.row -->

    </div>
@endsection
