@extends('layouts.app')

@section('content')

    @include('snippet.sectionheader', ['title' =>'Artikel bearbeiten'])

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card"  style="margin-top:50px;margin-bottom: 50px;">
                    <div class="card-header">Anzeige bearbeiten</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('advertUpdate',$advert->id) }}" enctype="multipart/form-data">
                            @csrf
                            @include('form.checkbox', ['title' =>__('Anzeige anzeigen'),'name'=>'show_advert','value'=>$advert->show_advert])
                            @include('form.text', ['name' =>'title','title'=>__('Title'),'value'=>$advert->title,'required'=>''])
                            @include('form.textarea', ['name' =>'text','title'=>__('Text'),'value'=>$advert->text,'required'=>''])
                            @include('form.upload', ['title' =>__('Image'),'name'=>'image'])

                            <div class="form-group">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('speichern') }}
                                    </button>
                                    <a class="btn btn-danger float-right" href="{{ route('advertDelete',$advert->id) }}" >
                                        {{ __('löschen') }}
                                    </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
