@extends('layouts.app')

@section('content')

    @include('snippet.sectionheader', ['title' =>'Profi-Card bearbeiten'])

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card"  style="margin-top:50px;margin-bottom: 50px;">
                    <div class="card-header">Profil</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('userUpdate') }}" enctype="multipart/form-data">
                            @csrf

                            @include('form.checkbox', ['title' =>__('Profil aktivieren für das Netzwerk'),'name'=>'is_user_show','value'=> old('is_user_show', $user->is_user_show)])

@if ($user->role_fan)
    @include('form.checkbox', ['title' =>__('Öffentliches Profil im WWW'),'name'=>'is_user_www','value'=> old('is_user_www', $user->is_user_www)])
@endif

@if ($user->role_ps)
    @include('form.text', ['title' =>__('Pseudonym [Bitte nicht den echten Namen angeben!]'),'name'=>'name','value'=>$user->name,'required'=>'required'])
@else
    @include('form.text', ['title' =>__('Firmen-Name'),'name'=>'name','value'=>$user->name,'required'=>'required'])
@endif
    @include('form.text', ['title' =>__('Slogan'),'name'=>'slogan','value'=>$user->slogan,'required'=>'required'])
@if(Auth::user()->is_user_activ && !$user->role_ps)
    @include('form.upload', ['title' =>__('Quadrat-Image'),'name'=>'image','value'=>'/uploads/user'.$user->image])
@endif

@if ($user->role_fan)
    @include('form.text', ['title' =>__('Xing'),'name'=>'xing','value'=>old('xing', $user->xing),'required'=>''])
    @include('form.text', ['title' =>__('Linkedin'),'name'=>'linkedin','value'=>old('linkedin', $user->linkedin),'required'=>''])
    @include('form.text', ['title' =>__('www'),'name'=>'www','value'=> old('www', $user->www),'required'=>''])
@endif


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
