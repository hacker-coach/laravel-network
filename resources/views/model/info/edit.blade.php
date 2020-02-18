@extends('layouts.app')

@section('content')

    @include('snippet.sectionheader', ['title' =>'Information bearbeiten'])

    @if(Auth::user()->is_user_activ AND Auth::user()->role_hunter )

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card"  style="margin-top:50px;margin-bottom: 50px;">
                    <div class="card-header">Information bearbeiten</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('infoUpdate',$info->id) }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="contact_id" value="{{$contact_id}}">
                            @include('form.checkbox', ['title' =>__('Information anzeigen'),'name'=>'show','value'=>$info->show])

                            @include('form.textarea', ['name' =>'message','title'=>__('Nachricht'),'value'=>$info->message,'required'=>''])
                            @include('form.textarea', ['name' =>'ps','title'=>__('Problemlöser'),'value'=>$info->ps,'required'=>''])

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

    @endif
@endsection
