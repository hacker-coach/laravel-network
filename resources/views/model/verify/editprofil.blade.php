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

                            @include('form.textarea', ['name' =>'text','title'=>__('text'),'value'=>$verify->text,'required'=>''])

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('speichern') }}
                                    </button>
                                    <a class="btn btn-danger float-right" href="{{ route('verifyDeleteProfil',$verify->user_id_from) }}" >
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
