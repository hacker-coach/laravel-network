<div class="card">
    <h1 class="black-box">Artikel</h1>
    @foreach ($user->posts()->get() as $post)
        @if ($post->show_post==true)
            <div class="card-text text-black-50"  style="padding: 0px 10px 10px 15px;">
                <h3 class="black-box">{{$post->title}}</h3>
                <p style="font-weight:bold; padding-top: 15px; font-size: 1.2rem;">
                    {{$post->teaser}}
                </p>
                <p class="lead mb-0">
                    {!! $post->getMarkdownText() !!}
                </p>
                <p style="font-weight:bold">
                    {!! $post->getMarkdownLinks() !!}
                </p>
            </div>
        @endif
    @endforeach
</div>
