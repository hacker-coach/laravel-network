@extends('layouts.app')

@section('content')

    @include('snippet.sectionheader', ['title' =>'Kontakt'])

    @if(Auth::user()->is_user_activ AND Auth::user()->role_hunter )

    <div class="container" style="padding-top: 3rem; padding-bottom: 3rem;">
        <div class="row justify-content-center">
            <div class="col-md-8">
				@if ($contactsFetchedCount != $contactsCount)
					<div class="alert alert-warning" role="alert">
						Es können nur {{$contactsFetchedCount}}/{{$contactsCount}} Kontakte angezeigt werden. Sie erhalten den Zugriff auf alle Kontakte,
						wenn Sie innerhalb der letzten 30 Tage neue Informationen hinzugefügt haben.
					</div>
                @endif

                <a class="btn btn-primary" href="{{ route('contactCreate') }}" >
                    {{ __('neuen Kontakt') }}
                </a>
                <br><br>
                <h1 class="black-box">Firmen Kontakte</h1>


                @if (!is_null($contacts) AND count($contacts))
                    <table class="table mt-3">
                        <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Firma</th>
                            <th scope="col">Ort</th>

                            <th scope="col">Anzahl: {{$contactsFetchedCount}}/{{$contactsCount}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($contacts as $contact)
                            @if(Auth::user()->id === $contact->user_id OR $contact->show === 1)
                                <tr>
                                    <td>{{ $contact->id}}</td>
                                    <td>{{ $contact->company }}</td>
                                    <td>{{ $contact->city }}</td>

                                    <td>
                                        <a class="btn btn-primary" href="{{ route('contactShow', $contact->id) }}" >
                                            {{ __('anzeigen') }}
                                        </a>
                                    </td>
                                </tr>
                            @endif
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
