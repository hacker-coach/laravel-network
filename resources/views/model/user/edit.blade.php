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

                            @include('form.checkbox', ['title' =>__('Profil aktivieren für das Netzwerk'),'name'=>'show_profil','value'=> old('show_profil', $user->show_profil)])
                            @include('form.checkbox', ['title' =>__('Öffentliches Profil im WWW'),'name'=>'show_profil_www','value'=> old('show_profil_www', $user->show_profil_www)])
@if ($user->role_company === 0)
                            @include('form.checkbox', ['title' =>__('Profil für Firmen anzeigen'),'name'=>'show_profil_for_company','value'=>old('show_profil_for_company', $user->show_profil_for_company)])
@endif
@if ($user->role_company === 0)
                            @include('form.text', ['title' =>__('Name'),'name'=>'name','value'=>$user->name,'required'=>'required'])
@else
                            @include('form.text', ['title' =>__('Firmen-Name'),'name'=>'name','value'=>$user->name,'required'=>'required'])
@endif
                            @include('form.text', ['title' =>__('Slogan'),'name'=>'slogan','value'=>$user->slogan,'required'=>'required'])
@if(Auth::user()->is_activ_profil)
                            @include('form.upload', ['title' =>__('Quadrat-Image'),'name'=>'image','value'=>'/uploads/user'.$user->image])
@endif
                            @include('form.text', ['title' =>__('Xing'),'name'=>'xing','value'=>old('xing', $user->xing),'required'=>''])
                            @include('form.text', ['title' =>__('Linkedin'),'name'=>'linkedin','value'=>old('linkedin', $user->linkedin),'required'=>''])
                            @include('form.text', ['title' =>__('www'),'name'=>'www','value'=> old('www', $user->www),'required'=>''])



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
