@extends('layouts.app')

@section('content')

    @include('snippet.sectionheader', ['title' =>'Artikel löschen'])

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card"  style="margin-top:50px;margin-bottom: 50px;">
                    <div class="card-header">Artikel löschen</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('postDestroy',$post->id) }}" >
                            @csrf

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-danger">
                                        {{ __('Artikel komplett löschen') }}
                                    </button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
