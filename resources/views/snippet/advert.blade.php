<div class="card">
    <h1 class="black-box">Anzeigen</h1>
    @foreach ($user->adverts()->get() as $advert)
        <div class="card-text text-black-50" style="padding: 0px 10px 10px 15px;">
            <h3 class="black-box">{{$advert->title}}</h3>
            <p class="lead mb-0">
                {{$advert->text}}
            </p>
        </div>
    @endforeach
</div>
