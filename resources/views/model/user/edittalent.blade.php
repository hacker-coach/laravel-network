@extends('layouts.app')

@section('content')

    @include('snippet.sectionheader', ['title' =>'Profi-Talente bearbeiten'])

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card"  style="margin-top:50px;margin-bottom: 50px;">
                    <div class="card-header">Profil-Talente</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('userUpdateTalent') }}" >
                            @csrf

                            @include('form.text', ['title' =>__('Überschrift Spezialbegabung'),'name'=>'talent_special_header','value'=>$user->talent_special_header,'required'=>'required'])
                            @include('form.textarea', ['name' =>'talent_special','title'=>'Text Spezialbegabung','value'=>$user->talent_special,'required'=>''])

                            @include('form.text', ['title' =>__('Überschrift 1. Anekdote'),'name'=>'talent_anecdote_1_header','value'=>$user->talent_anecdote_1_header,'required'=>'required'])
                            @include('form.textarea', ['name' =>'talent_anecdote_1','title'=>__('Text 1. Anekdote'),'value'=>$user->talent_anecdote_1,'required'=>''])

                            @include('form.text', ['title' =>__('Überschrift 2. Anekdote'),'name'=>'talent_anecdote_2_header','value'=>$user->talent_anecdote_2_header,'required'=>'required'])
                            @include('form.textarea', ['name' =>'talent_anecdote_2','title'=>__('Text 2. Anekdote'),'value'=>$user->talent_anecdote_2,'required'=>''])

                            @include('form.text', ['title' =>__('Überschrift 3. Anekdote'),'name'=>'talent_anecdote_3_header','value'=>$user->talent_anecdote_3_header,'required'=>'required'])
                            @include('form.textarea', ['name' =>'talent_anecdote_3','title'=>__('Text 3. Anekdote'),'value'=>$user->talent_anecdote_3,'required'=>''])


                            <div class="form-group">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Speichern') }}
                                    </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
