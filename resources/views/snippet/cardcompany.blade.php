<div class="card border-0 shadow rounded" style="margin-top: 85px;">
    <span style="text-align: center;">
        @if (strlen($user->image) > 10)
            <img src="/uploads/user{{ $user->image }}" class="card-img-top shadow" style="margin-top:-84px; width:210px;height:210px;" alt="{{ $user->name }}">
        @else
            <img src="/theme/quad.jpg" class="card-img-top shadow" style="margin-top:-84px; width:210px;height:210px;" alt="{{ $user->name }}">
        @endif
    </span>

    <div class="card-body text-center">
        <h5 class="card-title mb-0">{{ $user->name }} </h5>

        @if ($user->is_activ_member === 1)
            <div class="card-text text-black-50" style="padding:15px 0px 5px 0px; ">
                @if (isset($user->xing))
                    <a href="{{ $user->xing }}" target="_blank" style="text-decoration: none;">
                        <span class="fab fa-xing fa-2x fa-fw"  style="color:rgba(0,0,0,.5);"></span>
                    </a>
                @endif
                @if (isset($user->linkedin))
                    <a href="{{ $user->linkedin }}" target="_blank" style="text-decoration: none;">
                        <span class="fab fa-linkedin-in fa-2x fa-fw"  style="color:rgba(0,0,0,.5);"></span>
                    </a>
                @endif
            </div>
            <div class="card-text text-black-50">
                @if (isset($user->www))
                    <a href="{{ $user->www }}" target="_blank"  style="text-decoration: none; color:rgba(0,0,0,.5);">{{ $user->slogan }}</a>
                @else
                    <span>{{ $user->slogan }}</span>
                @endif
            </div>
        @else
            <div class="card-text text-black-50" style="padding:15px 0px 5px 0px; min-height: 55px;"> </div>
            <div class="card-text text-black-50">
                <span>{{ $user->slogan }}</span>
            </div>
        @endif
        @if (Auth::user() && isset($isList))
            <div class="card-text text-black-50" style="padding:15px 0px 5px 0px;">
                <a class="btn  btn-primary float-left" href="{{ route('userShow', $user->id) }}" >
                    {{ __('Profil') }}
                </a>
                @if (Auth::user()->id != $user->id)
                    <a class="btn btn-danger float-right" href="{{ route('verifyCreateedit', $user->id) }}" >
                        {{ __('Referenz') }}
                    </a>
                @endif
            </div>
        @endif
    </div>
</div>
