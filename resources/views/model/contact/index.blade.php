@extends('layouts.app')

@section('content')

    @include('snippet.sectionheader', ['title' =>'Kontakt'])

    @if(Auth::user()->is_user_activ AND Auth::user()->role_hunter )

    <div class="container" style="padding-top: 3rem; padding-bottom: 3rem;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <a class="btn btn-primary" href="{{ route('contactCreate') }}" >
                    {{ __('neuen Kontakt') }}
                </a><br><br>
                @if (count($contacts))
                    <table class="table mt-3">
                        <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Ort</th>
                            <th scope="col">Title</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($contacts as $contact)
                            <tr>
                                <td>{{ $contact->id}}</td>
                                <td>{{ $contact->city }}</td>
                                <td>{{ $contact->text }}</td>
                                <td>
                                    <a class="btn btn-primary" href="{{ route('contactShow', $contact->id) }}" >
                                        {{ __('anzeigen') }}
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                                    <div class="alert alert-warning" role="alert">
                                        Keine Kontakt vorhanden!
                                    </div>
                @endif
            </div>
        </div>
    </div>

    @endif
@endsection
