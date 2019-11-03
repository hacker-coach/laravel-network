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

                            @include('form.textarea', ['name' =>'text','title'=>__('Text'),'value'=>$verify->text,'required'=>''])

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('speichern') }}
                                    </button>
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
