@extends('layouts.app')

@section('content')

    @include('snippet.sectionheader', ['title' =>'Referenzen'])

    <div class="container" style="padding-top: 3rem; padding-bottom: 3rem;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if (count($verifies))
                    <table class="table mt-3">
                        <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Anzeigen</th>
                            <th scope="col">Text</th>
                            <th scope="col">Edit</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($verifies as $verify)
                            <tr>
                                <td>{{ $verify->id}}</td>
                                <td>
                                    @if ($verify->show_verify==true)
                                        ja
                                    @else
                                        nein
                                    @endif
                                </td>
                                <td>{{ $verify->text }}</td>
                                <td>
                                    <a class="btn btn-danger" href="{{ route('verifyEditProfil', $verify->user_id_from) }}" >
                                        {{ __('edit') }}
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                            <div class="alert alert-warning" role="alert">
                                Keine Referenzen vorhanden!
                            </div>
                @endif
            </div>
        </div>
    </div>
@endsection
