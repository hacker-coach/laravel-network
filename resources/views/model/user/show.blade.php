@extends('layouts.app')

@section('content')
    @include('snippet.sectionheader', ['title' =>'Profil'])

    <!-- Page Content -->
    <div class="container" style="padding-top: 3rem; padding-bottom: 3rem;">
         @if(Auth::user()->is_user_activ AND Auth::user()->role_ps )
            <div class="row">
                <div class="col-md-3">
                    @if ($user->role_ps)
                        @include('snippet.card')
                    @endif
                    @if ($user->role_company)
                        @include('snippet.cardcompany')
                    @endif
                </div>
                <div class="col-md-9">
                @if ($user->role_ps === 1)
                    @include('snippet.talent')<br>
                    @include('snippet.verify')<br>
                    @include('snippet.post')<br>
                @endif
                @if ($user->role_company)
                    @include('snippet.advert')<br>
                @endif
                </div>
            </div>
        @endif
    </div>
    <div class="container" style="padding-top: 3rem; padding-bottom: 3rem;">
        <div class="row">
            <div class="col-md-10">

            </div>
            <div class="col-md-2">

            </div>
        </div>
        <!-- /.row -->

    </div>
@endsection
