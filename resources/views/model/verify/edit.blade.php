@extends('layouts.app')

@section('content')

    @include('snippet.sectionheader', ['title' =>'Referenz bearbeiten'])

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card"  style="margin-top:50px;margin-bottom: 50px;">
                    <div class="card-header">Referenz bearbeiten</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('verifyUpdate') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="user_id" value="{{$verify->user_id}}">
                            @if ($verify->show_verify==true)
                                @include('form.info', ['name' =>'text','title'=>__('Referenz-Text'),'value'=>$verify->text,'required'=>''])
                            @else
                                @include('form.textarea', ['name' =>'text','title'=>__('Referenz-Text'),'value'=>$verify->text,'required'=>''])
                            @endif


                            @include('form.info', ['name' =>'answer_of_user','title'=>__('Antwort'),'value'=>$verify->answer_of_user,'required'=>''])

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    @if ($verify->show_verify==true)
                                        <a class="btn btn-primary" href="{{ route('home') }}" >
                                            {{ __('schließen') }}
                                        </a>
                                    @else
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('speichern') }}
                                        </button>
                                    @endif
                                    <a class="btn btn-danger float-right" href="{{ route('verifyDelete',$verify->user_id) }}" >
                                        {{ __('löschen') }}
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
