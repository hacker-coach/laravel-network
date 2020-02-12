@extends('layouts.app')

@section('content')

    @include('snippet.sectionheader', ['title' =>'Kontakt'])

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
                            <th scope="col">Anzeigen</th>
                            <th scope="col">Title</th>
                            <th scope="col">Edit</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($contacts as $contact)
                            <tr>
                                <td>{{ $contact->id}}</td>
                                <td>
                                    @if ($contact->show_contact==true)
                                        ja
                                    @else
                                        nein
                                    @endif
                                </td>
                                <td>{{ $contact->title }}</td>
                                <td>
                                    <a class="btn btn-primary" href="{{ route('contactShow', $contact->id) }}" >
                                        {{ __('anzeigen') }}
                                    </a>
                                    <a class="btn btn-danger" href="{{ route('contactEdit', $contact->id) }}" >
                                        {{ __('edit') }}
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
@endsection