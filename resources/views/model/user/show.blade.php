@extends('layouts.app')

@section('content')
    @include('snippet.sectionheader', ['title' =>'Profil'])

    <!-- Page Content -->
    <div class="container" style="padding-top: 3rem; padding-bottom: 3rem;">
         @if(Auth::user()->is_activ_profil AND
         ((Auth::user()->is_company  && Auth::user()->is_company_member_access && $user->show_profil_for_company) OR
         (!Auth::user()->is_company)))
            <div class="row">
                <div class="col-md-3">
                    @if ($user->is_company === 0)
                        @include('snippet.card')
                    @else
                        @include('snippet.cardcompany')
                    @endif
                </div>
                <div class="col-md-9">
                @if ($user->is_company === 0)
                    @include('snippet.talent')<br>
                    @include('snippet.verify')<br>
                    @include('snippet.post')<br>
                @else
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
