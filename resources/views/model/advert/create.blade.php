@extends('layouts.app')

@section('content')

    @include('snippet.sectionheader', ['title' =>'Anzeige schreiben'])

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card"  style="margin-top:50px;margin-bottom: 50px;">
                    <div class="card-header">Anzeige schreiben</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('advertStore') }}" enctype="multipart/form-data">
                            @csrf

                            @include('form.checkbox', ['title' =>__('Anzeige anzeigen'),'name'=>'show_advert','value'=>$advert->show_advert])
                            @include('form.checkbox', ['title' =>__('Anzeige im WWW anzeigen'),'name'=>'show_advert_on_www','value'=>$advert->show_advert_on_www])
                            @include('form.text', ['name' =>'title','title'=>__('Title'),'value'=>$advert->title,'required'=>''])
                            @include('form.textarea', ['name' =>'teaser','title'=>__('Teaser'),'value'=>$advert->teaser,'required'=>''])
                            @include('form.textarea', ['name' =>'text','title'=>__('Text'),'value'=>$advert->text,'required'=>''])
                            @include('form.text', ['name' =>'link','title'=>__('Link'),'value'=>$advert->link,'required'=>''])
                            @include('form.upload', ['title' =>__('Image'),'name'=>'image','value'=>'/uploads/advert'.$advert->image])

                            <div class="form-group">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('speichern') }}
                                    </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
