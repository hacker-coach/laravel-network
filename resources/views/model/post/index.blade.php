@extends('layouts.app')

@section('content')

    @include('snippet.sectionheader', ['title' =>'Artikel'])

    <div class="container" style="padding-top: 3rem; padding-bottom: 3rem;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <a class="btn btn-primary" href="{{ route('postCreate') }}" >
                    {{ __('neuen Artikel') }}
                </a><br><br>
                @if (count($posts))
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
                        @foreach ($posts as $post)
                            <tr>
                                <td>{{ $post->id}}</td>
                                <td>
                                    @if ($post->show_post==true)
                                        ja
                                    @else
                                        nein
                                    @endif
                                </td>
                                <td>{{ $post->title }}</td>
                                <td>
                                    <a class="btn btn-primary" href="{{ route('postShow', $post->id) }}" >
                                        {{ __('anzeigen') }}
                                    </a>
                                    <a class="btn btn-danger" href="{{ route('postEdit', $post->id) }}" >
                                        {{ __('edit') }}
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                                    <div class="alert alert-warning" role="alert">
                                        Keine Artikel vorhanden!
                                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
