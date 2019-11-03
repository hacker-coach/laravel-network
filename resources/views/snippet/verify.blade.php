<div class="card">
    <h1 class="black-box">Referenzen</h1>
    @foreach ($user->verifies()->get() as $verify)
        <div class="card-text text-black-50" style="padding: 0px 10px 10px 15px;">
            <h3 class="black-box">#</h3>
            <p class="lead mb-0">
                {{$verify->text}}
            </p>
        </div>
    @endforeach
</div>
