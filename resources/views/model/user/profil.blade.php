@extends('layouts.app')

@section('content')
    <header class="header-col3  text-white " style="background-color:#21c87a;min-height: 100px;" >
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2 ">
                </div>
                <div class="col-md-8 header-col3-banner">
                    <h2 class="display-4 ">Dein Profil</h2>
                </div>
                <div class="col-md-2 ">
                </div>
            </div>
        </div>
    </header>

    <!-- Page Content -->
    <div class="container" style="padding-top: 3rem; padding-bottom: 3rem;">
        <div class="row">
            <div class="col-md-12">
                @if ($user->is_activ_profil!=true)
                    <div class="alert alert-warning" role="alert">
                        Ihr Profil muss noch freigeschaltet werden!
                    </div>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <a href="{{ route('userEdit') }}"><span  class="red-edit">{{ __('Profil bearbeiten') }}</span></a><br><br>
                @include('snippet.card')

            </div>
            <div class="col-md-9">
            @if ($user->is_company === 0)
                <a href="{{ route('userEditTalent') }}"><span  class="red-edit">{{ __('Talent bearbeiten') }}</span></a>
                @include('snippet.talent')
                <br><a href="{{ route('verifyIndex') }}"><span  class="red-edit">{{ __('Referenzen bearbeiten') }}</span></a>
                @include('snippet.verify')
                <br><a href="{{ route('postIndex') }}"><span  class="red-edit"> {{ __('Artikel bearbeiten') }}</span></a>
                @include('snippet.post')
            @else
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
