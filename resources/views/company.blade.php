@extends('layouts.app')

@section('content')

@include('snippet.sectionheader', ['title' =>'Firmen'])

<div class="container" style="padding-top: 2rem !important;  padding-bottom: 2rem;">
    <div class="row">




         @if (count($users))
            @foreach ($users as $user)
                <div class="col-xl-3 col-md-6 mb-4">
                @include('snippet.cardcompany')
                </div>
            @endforeach
         @else
            <div class="col-12">
                <div class="alert alert-warning" role="alert">
                     Keine Firmen zur Ansicht!
                </div>
            </div>
         @endif


    </div>
    <!-- /.row -->

</div>
@endsection
