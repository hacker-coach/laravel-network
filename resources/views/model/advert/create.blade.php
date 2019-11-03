@extends('layouts.app')

@section('content')

    @include('snippet.sectionheader', ['title' =>'Anzeige schreiben'])

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card"  style="margin-top:50px;margin-bottom: 50px;">
                    <div class="card-header">Anzeige schreiben</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('advertStore') }}" >
                            @csrf
                            @include('form.text', ['name' =>'title','title'=>__('Title'),'value'=>$advert->title,'required'=>''])
                            @include('form.textarea', ['name' =>'text','title'=>__('Text'),'value'=>$advert->text,'required'=>''])

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('speichern') }}
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
