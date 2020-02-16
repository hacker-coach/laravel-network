@extends('layouts.app')

@section('content')

    @include('snippet.sectionheader', ['title' =>'Kontakt löschen'])

    @if(Auth::user()->is_user_activ AND Auth::user()->role_hunter )

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card"  style="margin-top:50px;margin-bottom: 50px;">
                    <div class="card-header">Kontakt löschen</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('contactDestroy',$contact->id) }}" >
                            @csrf

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-danger">
                                        {{ __('Kontakt komplett löschen') }}
                                    </button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endif
@endsection
