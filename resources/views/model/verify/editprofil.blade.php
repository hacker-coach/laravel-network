@extends('layouts.app')

@section('content')

    @include('snippet.sectionheader', ['title' =>'Referenz bearbeiten'])

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card"  style="margin-top:50px;margin-bottom: 50px;">
                    <div class="card-header">Referenz bearbeiten</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('verifyUpdateProfil') }}">
                            @csrf
                            <input type="hidden" name="user_id_from" value="{{$verify->user_id_from}}">
                            @include('form.checkbox', ['title' =>__('Referenz anzeigen'),'name'=>'show_verify','value'=>$verify->show_verify])

                            @include('form.info', ['name' =>'text','title'=>__('Referenz-Text'),'value'=>$verify->text,'required'=>''])

                            @include('form.textarea', ['name' =>'answer_of_user','title'=>__('Antwort'),'value'=>$verify->answer_of_user,'required'=>''])

                            <div class="form-group">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('speichern') }}
                                    </button>
                                    <a class="btn btn-danger float-right" href="{{ route('verifyDeleteProfil',$verify->user_id_from) }}" >
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
