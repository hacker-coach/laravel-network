@extends('layouts.app')

@section('content')
    @include('snippet.sectionheader', ['title' =>'Profil'])

    <!-- Page Content -->
    <div class="container" style="padding-top: 3rem; padding-bottom: 3rem;">
         @if(isset($user) && $user->role_company)
            <div class="row">
                <div class="col-md-3">
                    @include('snippet.cardcompany')
                </div>
                <div class="col-md-9">
                    @include('snippet.advert')<br>
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
