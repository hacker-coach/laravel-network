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

@include('form.2checkbox', [
'title1' =>__('contact_real_friend_or_online'),'name1'=>'contact_real_friend_or_online','value1'=>$verify->contact_real_friend_or_online,
'title2' =>__('has_super_special_talent'),'name2'=>'has_super_special_talent','value2'=>$verify->has_super_special_talent
])
@include('form.2checkbox', [
'title1' =>__('has_extrem_iq'),'name1'=>'has_extrem_iq','value1'=>$verify->has_extrem_iq,
'title2' =>__('has_super_extrem_iq'),'name2'=>'has_super_extrem_iq','value2'=>$verify->has_super_extrem_iq
])
@include('form.2checkbox', [
'title1' =>__('has_extrem_creative'),'name1'=>'has_extrem_creative','value1'=>$verify->has_extrem_creative,
'title2' =>__('has_super_extrem_creative'),'name2'=>'has_super_extrem_creative','value2'=>$verify->has_super_extrem_creative
])
@include('form.2checkbox', [
'title1' =>__('has_extrem_thinker'),'name1'=>'has_extrem_thinker','value1'=>$verify->has_extrem_thinker,
'title2' =>__('has_super_extrem_thinker'),'name2'=>'has_super_extrem_thinker','value2'=>$verify->has_super_extrem_thinker
])
@include('form.2checkbox', [
'title1' =>__('has_extrem_language'),'name1'=>'has_extrem_language','value1'=>$verify->has_extrem_language,
'title2' =>__('has_super_extrem_language'),'name2'=>'has_super_extrem_language','value2'=>$verify->has_super_extrem_language
])
@include('form.2checkbox', [
'title1' =>__('has_extrem_eq'),'name1'=>'has_extrem_eq','value1'=>$verify->has_extrem_eq,
'title2' =>__('has_super_extrem_eq'),'name2'=>'has_super_extrem_eq','value2'=>$verify->has_super_extrem_eq
])
@include('form.2checkbox', [
'title1' =>__('has_extrem_speaker'),'name1'=>'has_extrem_speaker','value1'=>$verify->has_extrem_speaker,
'title2' =>__('has_super_extrem_speaker'),'name2'=>'has_super_extrem_speaker','value2'=>$verify->has_super_extrem_speaker
])
@include('form.2checkbox', [
'title1' =>__('has_extrem_writer'),'name1'=>'has_extrem_writer','value1'=>$verify->has_extrem_writer,
'title2' =>__('has_super_extrem_writer'),'name2'=>'has_super_extrem_writer','value2'=>$verify->has_super_extrem_writer
])
@include('form.2checkbox', [
'title1' =>__('has_extrem_logic'),'name1'=>'has_extrem_logic','value1'=>$verify->has_extrem_logic,
'title2' =>__('has_super_extrem_logic'),'name2'=>'has_super_extrem_logic','value2'=>$verify->has_super_extrem_logic
])
@include('form.2checkbox', [
'title1' =>__('has_extrem_imagine'),'name1'=>'has_extrem_imagine','value1'=>$verify->has_extrem_imagine,
'title2' =>__('has_super_extrem_imagine'),'name2'=>'has_super_extrem_imagine','value2'=>$verify->has_super_extrem_imagine
])

                            <div class="form-group">
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
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
