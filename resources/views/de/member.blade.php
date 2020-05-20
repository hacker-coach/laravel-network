@include('snippet.header', ['title' => 'INNOVATIV HACKERS | Wissen neu verknüpfen'])

@include('de.nav')

@include('snippet.sectionheader', ['title' =>'Mitglieder'])


<!-- Page Content -->
<div class="container" style="padding-top: 2rem !important;  padding-bottom: 2rem;">
    <div class="row">
        @if (true)
            @guest
                <div class="alert alert-warning" role="alert">
                    Sie müssen sich registrieren, damit Sie auf öffentliche Mitglieder zugreifen können!
                </div>
            @else
                <div class="alert alert-warning" role="alert">
                    Es sind keine Profile öffentlich geschaltet!
                </div>
            @endguest
        @else
            @foreach ($users as $user)
                <div class="col-xl-3 col-md-6 mb-4">
                    @include('snippet.card')
                </div>
            @endforeach
        @endif
    </div>
    <!-- /.row -->
</div>

@include('snippet.footer')
