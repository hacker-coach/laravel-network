@extends('layouts.app')

@section('content')

    @include('snippet.sectionheader', ['title' =>'Information bearbeiten'])

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card"  style="margin-top:50px;margin-bottom: 50px;">
                    <div class="card-header">Information bearbeiten</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('informationUpdate',$information->id) }}" enctype="multipart/form-data">
                            @csrf
                            @include('form.checkbox', ['title' =>__('Information anzeigen'),'name'=>'show_message','value'=>$information->show_message])

                            @include('form.textarea', ['name' =>'message','title'=>__('message'),'value'=>$information->message,'required'=>''])
                            @include('form.textarea', ['name' =>'ps','title'=>__('ps'),'value'=>$information->ps,'required'=>''])

                            <div class="form-group">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('speichern') }}
                                    </button>
                                    <a class="btn btn-danger float-right" href="{{ route('informationDelete',$information->id) }}" >
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
