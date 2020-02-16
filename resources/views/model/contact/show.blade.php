@extends('layouts.app')

@section('content')

    @include('snippet.sectionheader', ['title' =>'Kontakt'])

    @if(Auth::user()->is_user_activ AND Auth::user()->role_hunter )
        <div class="container" style="padding-top: 3rem; padding-bottom: 3rem;">
                <div class="row">
                    <div class="col-md-3">
                        <a class="btn  btn-primary float-left" href="{{ route('contactIndex') }}" >
                            {{ __('zurück') }}
                        </a><br><br>
                        <a class="btn  btn-primary float-left" href="{{ route('infoCreate',$contact->id) }}" >
                            {{ __('neue Info') }}
                        </a>
                    </div>
                    <div class="col-md-9">

                        <p class="lead mb-0">
                            {!! $contact->text !!}
                        </p>
                    </div>
                </div>
                <div class="row">
                    @if (count($infos))
                        <table class="table mt-3">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">message</th>
                                <th scope="col">ps</th>
                                <th scope="col">Edit</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($infos as $info)
                                <tr>
                                    <td>{{ $info->id}}</td>
                                    <td>{{ $info->message }}</td>
                                    <td>{{ $info->ps }}</td>
                                    <td>
                                        <a class="btn btn-danger" href="{{ route('infoEdit', [$info->id, $contact->id]) }}" >
                                            {{ __('edit') }}
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="alert alert-warning" role="alert">
                            Keine Informationen vorhanden!
                        </div>
                    @endif
                </div>
        </div>
    @endif
@endsection
