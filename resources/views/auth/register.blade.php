@extends('layouts.app')

@section('content')


@include('snippet.sectionheader', ['title' => __('m.become_member')])


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="margin-top:50px;margin-bottom: 50px;">
                <div class="card-header">{{ __('m.register_member') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">


                            <div class="col-md-12">

                                <label class="control-label" for="role">Ihre Rolle</label>
                                <select id="role" name="role" type="text" placeholder="" class="form-control input-md" required>
                                    <option value="">Bitte auswählen</option>
                                    <option value="role_fan">Unterstützer [Sie wollen Ihre Unterstützung der Öffentlichkeit zeigen]</option>
                                    <option value="role_company">Firma [Sie wollen eine kostenlose Anzeigen schalten]</option>
                                    <option value="role_ps">Mitglied [Sie sind ein Problemlöser]</option>
                                    <option value="role_hunter" selected>Vermittler [Sie wollen Diversity Manager werden]</option>
                                </select>

                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="name" >{{ __('Name') }}</label>

                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">{{ __('E-Mail Address') }}</label>

                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password">{{ __('Password') }}</label>

                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="password-confirm" >{{ __('Confirm Password') }}</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>

                        <div class="form-group ">
                            <label for="code" >{{ __('Access-Code') }}</label>

                            <input id="code" type="text" class="form-control @error('code') is-invalid @enderror" name="code" value="{{ old('code') }}" required autocomplete="code">

                            @error('code')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="control-label" for="dgsvo" required>Datenschutz</label>
                            <div class="form-group form-check">
                                <input class="form-check-input" type="checkbox" id="dgsvo" name="dgsvo" value="1" required>
                                Ich habe den <a href="http://innovativ-hackers.org/de/datenschutz" target="_blank">Datenschutzhinweis</a> zur Kenntnis genommen u.
                                erkläre mich mit der Speicherung u. Verarbeitung meiner Daten durch diese Website einverstanden.
                            </div>
                        </div>
                        <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
