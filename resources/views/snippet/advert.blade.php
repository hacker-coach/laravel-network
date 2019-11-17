<div class="card">
    <h1 class="black-box">Anzeigen</h1>
    @foreach ($user->adverts()->get() as $advert)
        @if ($advert->show_advert==true)
            <div class="card-text text-black-50" style="padding: 0px 10px 10px 15px;">
                    <h3 class="black-box toggle-span">{{$advert->title}}</h3>

                        <p style="font-weight:bold; padding-top: 15px; font-size: 1.2rem;">
                         {{$advert->teaser}}


                        </p>

                        <p class="lead mb-0">
                            @if (isset($advert->image))
                                <div class="card float-right" style="width: 50%; margin-bottom: 5px;margin-top: 5px; margin-left:5px;">
                                  <img class="card-img-top" src="/uploads/advert{{$advert->image}}">
                                </div>
                            @endif
                            {!! $advert->getMarkdownText() !!}
                        </p>
                        <p style="font-weight:bold">
                             {{$advert->link}}
                        </p>
            </div>
        @endif
    @endforeach
</div>
