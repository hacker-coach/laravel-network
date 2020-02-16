@extends('layouts.app')

@section('content')

@include('snippet.sectionheader', ['title' =>'Mitglieder'])

<div class="container" style="padding-top: 2rem !important;  padding-bottom: 2rem;">
    <div class="row">
         @if (!is_null($users))
            @foreach ($users as $user)
                <div class="col-xl-3 col-md-6 mb-4">
                @include('snippet.card')
                </div>
            @endforeach
         @endif

    </div>
    <!-- /.row -->

</div>
@endsection