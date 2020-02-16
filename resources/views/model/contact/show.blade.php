@extends('layouts.app')

@section('content')

    @include('snippet.sectionheader', ['title' =>'Kontakt'])

    @if(Auth::user()->is_user_activ AND Auth::user()->role_hunter )
        <div class="container" style="padding-top: 3rem; padding-bottom: 3rem;">
                <div class="row">
                    <div class="col-md-1">
                        <a class="btn  btn-primary float-left" href="{{ route('contactIndex') }}" >
                            {{ __('zurück') }}
                        </a>
                    </div>
                    <div class="col-md-2">
                        <a class="btn  btn-primary float-left" href="{{ route('infoCreate',$contact->id) }}" >
                            {{ __('neue Information') }}
                        </a>
                    </div>
                    <div class="col-md-7">
                    </div>
                    <div class="col-md-2">
                        @if(Auth::user()->id ===  $contact->user_id)
                            <a class="btn btn-danger" href="{{ route('contactEdit', $contact->id) }}" >
                                {{ __('edit') }}
                            </a>
                        @endif
                    </div>
                </div>
            <h1 class="black-box">Firma</h1>
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="black-box">Name</h3>
                        <p style="font-weight:bold; padding-top: 15px; font-size: 1.2rem;">
                            {{$contact->company}}
                        </p>
                        <h3 class="black-box">Ort</h3>
                        <p style="font-weight:bold; padding-top: 15px; font-size: 1.2rem;">
                            {{$contact->city}}
                        </p>
                    </div>
                    <div class="col-md-6">
                        <h3 class="black-box">Telephone</h3>
                        <p style="font-weight:bold; padding-top: 15px; font-size: 1.2rem;">
                            {{$contact->phone}}
                        </p>
                        <h3 class="black-box">E-mail</h3>
                        <p style="font-weight:bold; padding-top: 15px; font-size: 1.2rem;">
                            {{$contact->mail}}
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="black-box">Text</h3>
                        <p style="font-weight:bold; padding-top: 15px; font-size: 1.2rem;">
                            {{$contact->text}}
                        </p>
                    </div>
                    <div class="col-md-6">
                        <h3 class="black-box">Links</h3>
                        <p style="font-weight:bold; padding-top: 15px; font-size: 1.2rem;">
                            {{$contact->links}}
                        </p>
                    </div>
                </div>
                <div class="row">
                    <h1 class="black-box">Informationen</h1>
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
                                @if(Auth::user()->id === $info->user_id OR
                                $info->show_message === 1)
                                    <tr>
                                        <td>{{ $info->id}}</td>
                                        <td>{{ $info->message }}</td>
                                        <td>{{ $info->ps }}</td>
                                        <td>
                                            @if(Auth::user()->id ===  $info->user_id)
                                                <a class="btn btn-danger" href="{{ route('infoEdit', [$info->id, $contact->id]) }}" >
                                                    {{ __('edit') }}
                                                </a>
                                            @endif
                                        </td>
                                    </tr>
                                @endif
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
