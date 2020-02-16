<div class="card border-0 shadow rounded" style="margin-top: 85px;">
    <span style="text-align: center;">
        @if (strlen($user->image) > 10)
            <img src="/uploads/user{{ $user->image }}" class="card-img-top shadow" style="margin-top:-84px; width:210px;height:210px;border-radius:100%;" alt="{{ $user->name }}">
        @else
            <img src="/theme/quad.jpg" class="card-img-top shadow" style="margin-top:-84px; width:210px;height:210px;border-radius:100%;" alt="{{ $user->name }}">
        @endif
    </span>

    <div class="card-body text-center">
        <h5 class="card-title mb-0">{{ $user->name }} </h5>

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

    </div>
</div>
