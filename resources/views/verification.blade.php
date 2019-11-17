@extends('layouts.app')

@section('content')

@include('snippet.sectionheader', ['title' =>'Verification'])

<div class="container" style="padding-top: 2rem !important;  padding-bottom: 2rem;">
    <div class="row">

                <div class="alert alert-warning" role="alert">
                    Benutzer [{{$user->email}}] wurde aktiviert!
                </div>


    </div>
    <!-- /.row -->

</div>
@endsection
