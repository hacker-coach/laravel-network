@extends('layouts.app')

@section('content')

    @include('snippet.sectionheader', ['title' =>'Kontakt erstellen'])

    @if(Auth::user()->is_user_activ AND Auth::user()->role_hunter )

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card"  style="margin-top:50px;margin-bottom: 50px;">
                    <div class="card-header">Kontakt erstellen</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('contactStore') }}"  enctype="multipart/form-data">
                            @csrf

                            @include('form.text', ['name' =>'company','title'=>__('Firma'),'value'=>$contact->company,'required'=>''])
                            @include('form.text', ['name' =>'city','title'=>__('Ort'),'value'=>$contact->city,'required'=>''])
                            @include('form.text', ['name' =>'phone','title'=>__('Telephone'),'value'=>$contact->phone,'required'=>''])
                            @include('form.text', ['name' =>'mail','title'=>__('E-mail'),'value'=>$contact->mail,'required'=>''])

                            @include('form.textarea', ['name' =>'text','title'=>__('Text'),'value'=>$contact->text,'required'=>''])
                            @include('form.textarea', ['name' =>'links','title'=>__('Links'),'value'=>$contact->links,'required'=>''])

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
