@extends('layouts.app')

@section('content')

    @include('snippet.sectionheader', ['title' =>'Information bearbeiten'])

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card"  style="margin-top:50px;margin-bottom: 50px;">
                    <div class="card-header">Information bearbeiten</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('infoUpdate',$info->id) }}" enctype="multipart/form-data">
                            @csrf
                            @include('form.checkbox', ['title' =>__('Information anzeigen'),'name'=>'show_message','value'=>$info->show_message])

                            @include('form.textarea', ['name' =>'message','title'=>__('message'),'value'=>$info->message,'required'=>''])
                            @include('form.textarea', ['name' =>'ps','title'=>__('ps'),'value'=>$info->ps,'required'=>''])

                            <div class="form-group">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('speichern') }}
                                    </button>
                                    <a class="btn btn-danger float-right" href="{{ route('infoDelete',$info->id) }}" >
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
