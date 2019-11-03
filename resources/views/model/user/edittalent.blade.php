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


                            @include('form.textarea', ['name' =>'talent_anecdote_1','title'=>__('1. Anekdote'),'value'=>$user->talent_anecdote_1,'required'=>''])
                            @include('form.textarea', ['name' =>'talent_anecdote_2','title'=>__('2. Anekdote'),'value'=>$user->talent_anecdote_2,'required'=>''])
                            @include('form.textarea', ['name' =>'talent_anecdote_3','title'=>__('3. Anekdote'),'value'=>$user->talent_anecdote_3,'required'=>''])

                            @include('form.textarea', ['name' =>'talent_special','title'=>'Spezialbegabung','value'=>$user->talent_special,'required'=>''])


                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Speichern') }}
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
