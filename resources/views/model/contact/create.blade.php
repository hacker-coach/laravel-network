@extends('layouts.app')

@section('content')

    @include('snippet.sectionheader', ['title' =>'Artikel schreiben'])

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card"  style="margin-top:50px;margin-bottom: 50px;">
                    <div class="card-header">Artikel schreiben</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('postStore') }}"  enctype="multipart/form-data">
                            @csrf
                            @include('form.checkbox', ['title' =>__('Artikel anzeigen'),'name'=>'show_post','value'=>$post->show_post])
                            @include('form.checkbox', ['title' =>__('Artikel im WWW anzeigen'),'name'=>'show_post_on_www','value'=>$post->show_post_on_www])
                            @include('form.upload', ['title' =>__('[[1]] - Image'),'name'=>'image1','value'=>'/uploads/post'.$post->image1])
                            @include('form.text', ['name' =>'image1title','title'=>__('Title [[1]] - Image'),'value'=>$post->image1title,'required'=>''])
                            @include('form.upload', ['title' =>__('[[2]] - Image'),'name'=>'image2','value'=>'/uploads/post'.$post->image3])
                            @include('form.text', ['name' =>'image2title','title'=>__('Title [[2]] - Image'),'value'=>$post->image2title,'required'=>''])
                            @include('form.upload', ['title' =>__('[[3]] - Image'),'name'=>'image3','value'=>'/uploads/post'.$post->image3])
                            @include('form.text', ['name' =>'image3title','title'=>__('Title [[3]] - Image'),'value'=>$post->image3title,'required'=>''])
                            @include('form.text', ['name' =>'title','title'=>__('Title'),'value'=>$post->title,'required'=>''])
                            @include('form.textarea', ['name' =>'teaser','title'=>__('Teaser'),'value'=>$post->teaser,'required'=>''])
                            @include('form.textarea', ['name' =>'text','title'=>__('Text'),'value'=>$post->text,'required'=>''])
                            @include('form.textarea', ['name' =>'links','title'=>__('Links'),'value'=>$post->links,'required'=>''])

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
