<!DOCTYPE html>
<html lang="de">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="noindex,nofollow" />
    <link rel="icon" href="/theme/media/favicon.ico" type="image/x-icon">
    <title>Konzept</title>

    @include('de.css')


</head>

<body>

@include('de.nav')

@include('snippet.sectionheader', ['title' =>'Konzept'])

<section >
    <div class="container" style="padding-top:3rem;padding-bottom:3rem;">
        <h1 class="black-box"> Konzept - Mitglieder Portal</h1>
        <div class="row">
            <div class="col-md-6">
                <br><h2 class="black-box"> Problem-Solver (PS) werden </h2>
                <p class="lead mb-0">
                    Alle können PS-Mitglied werden und sich registrieren. Mindestens 3 Voll-PS-Mitglieder müssen
                    für das neue PS-Mitglied eine persönliche Empfehlung abgeben, damit dieses auch zu einem Voll-PS-Mitglied wird.
                    Alle PS-Mitglieder müssen sich untereinander kennen.
                </p>
                <h4 class="black-box">Normales PS-Mitglied</h4>
                <p class="lead mb-0">
                    Ein normales PS-Mitglied kann nur ein Profil im Mitglieder-Bereich erstellen. Kann aber keine Mitglieder des
                    Mitglieder-Bereiches sehen.
                </p>
                <h4 class="black-box">Privatsphäre</h4>
                <p class="lead mb-0">
                    Als PS-Mitglied darf man keine Privaten-Daten wie E-Mail und echten Namen im Netzwerk angeben.
                    Das Ziel ist es, dass sich jedes PS-Mitglied mit seinen wahren individuellen Talenten öffnet und
                    sich durch den Markt in keine Rolle gedrängt wird.
                </p>
                <h4 class="black-box">Kommunikation der Mitglieder</h4>
                <p class="lead mb-0">
                    Mitglieder können sich über öffentliche Treffen persönlich kennenlernen.
                    Über verschlüsselte Messanger können Voll-PS-Mitglieder kommunizieren. Aus Datenschutzgründen läuft diese Kommunikation nicht über diese Plattform.
                    Jedes Mitglied muss selbst entscheiden, ob er sein Psydonym-Name einem Vermittler oder PS-Mitglied sagt.
                </p>
                <h4 class="black-box">Zugriff</h4>
                <p class="lead mb-0">
                    Nur ein Voll-Mitglied kann alle Profile sehen und hat Zugriff auf die Vermittler und die Firmenprofile.
                </p>
            </div>
            <div class="col-md-6">
                <br><h2 class="black-box">Firmen</h2>
                <p class="lead mb-0">
                    Firmen können 3 kostenlose Job-Anzeigen schalten. Gegen Bezahlung kann ein Problem im Mitglieder-Bereich
                    publiziert werden. Die Mitglieder werden darüber informiert.
                    Gegen Bezahlung kann eine Firma die Job-Anzeigen außerhalb des Mitglieder-Bereiches sichtbar machen.
                </p>
                <h4 class="black-box">Zugriff</h4>
                <p class="lead mb-0">
                    Firmen haben keinen Zugriff auf PS-Mitglieder.
            </div>
        </div>

        <div  class="row">
            <div class="col-md-6">
                 <br><h2 class="black-box">Vermittler</h2>
                <p class="lead mb-0">
                    Alle Vermittler müssen Voll-PS-Mitglied sein.
                    Als Vermittler hat man Zugriff auf eine Extra-Datenbank mit allen Firmen-Ansprechpartnern.
                    Diesen Zugriff bekommt man nur durch eigene Aktivität im Netzwerk.
                    Um Zugriff zu erlangen, muss man zunächst selbst ein Firmen-Kontakt hinzufügen. Um sich diesen Zugriff zu behalten, muss man
                    entweder die Informationen über die Telefonate teilen für andere Vermittler oder einen neuen Kontakt hinzufügen.
                    Man verliert den Zugriff auf die Kontakte, wenn man innerhalb eines Monats keine neuen Informationen zum Netzwerk hinzugefügt hat.
                </p>
                <h4 class="black-box">Vermittlung</h4>
                <p class="lead mb-0">
                    Für die Vermittlung eines PS-Mitglieds wird bei der Firma Geld verlangt. 25 % dieses Geldes wird in den Ausbau des Netzwerkes investiert.
                    Die Firma verpflichtet sich regelmäßig alle 2 Monate an Coachings für die Vielfalt in Unternehmen (Diversity-Management) zu buchen für
                    die nächsten 2 Jahre. Dadurch soll sichergestellt werden, dass man keine Randgruppe wird im Unternehmen und alle Menschen im Unternehmen
                    akzeptiert werden.
                </p>
                <h4 class="black-box">Zugriff</h4>
                <p class="lead mb-0">
                    Nur Vermittler habe Zugriff auf alle Daten.
                </p>
            </div>
            <div class="col-md-6">
                <br><h2 class="black-box">Talent</h2>
                <p class="lead mb-0">
                    Als Mitglied kann man ein öffentliches Profil mit Bild, Slogan und Links erstellen. Ein Talent-Profil ist ein Extra-Account, der nicht mit PS-Profil verknüpft ist.
                </p>
                <h4 class="black-box">Zugriff</h4>
                <p class="lead mb-0">
                    Ein Fan hat keinen Zugriff auf PS-Profile, Firmen oder Vermittler.
                </p>
            </div>
        </div>
    </div>
</section>

@include('de.redfooter')
@include('de.footer')
@include('de.js')
</body>

</html>
