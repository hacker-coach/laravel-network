<div class="card">
    <h1 class="black-box">Talente</h1>
    @if (strlen($user->talent_special) > 2)
        <div class="card-text text-black-50" style="padding: 0px 10px 10px 15px;">
            <h3 class="black-box">Spezialbegabung: {{$user->talent_special_header}} </h3>
            <p class="lead mb-0">
                {{$user->talent_special}}
            </p>
        </div>
    @endif
    @if (strlen($user->talent_anecdote_1) > 2)
        <div class="card-text text-black-50" style="padding: 0px 10px 10px 15px;">
        <h3 class="black-box">1. Anekdote: {{$user->talent_anecdote_2_header}}</h3>
        <p class="lead mb-0">
            {{$user->talent_anecdote_1}}
        </p>
        </div>
    @endif
    @if (strlen($user->talent_anecdote_2) > 2)
        <div class="card-text text-black-50" style="padding: 0px 10px 10px 15px;">
        <h3 class="black-box">2. Anekdote: {{$user->talent_anecdote_2_header}}</h3>
        <p class="lead mb-0">
            {{$user->talent_anecdote_2}}
        </p>
        </div>
    @endif
    @if (strlen($user->talent_anecdote_3) > 2)
        <div class="card-text text-black-50" style="padding: 0px 10px 10px 15px;">
        <h3 class="black-box">3. Anekdote: {{$user->talent_anecdote_3_header}}</h3>
        <p class="lead mb-0">
            {{$user->talent_anecdote_3}}
        </p>
        </div>
    @endif
</div>
