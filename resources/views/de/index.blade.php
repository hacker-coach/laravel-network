<!DOCTYPE html>
<html lang="de">

<head>


<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="Netzwerk für professionelle 'outside the box' - Denker">
<meta name="author" content="Micha Barthel">
<meta name="date" content="2019-11-22T19:53:33+01:00" />
<link rel="icon" href="/theme/media/favicon.ico" type="image/x-icon">
<meta name="image" content="http://problemsolvernetwork.org/theme/media/micha-barthel-netzwerk.jpg" alt="Problemlöser Netzwerk">
<meta property="og:title" content="Problemlöser Netzwerk" />
<meta property="og:type" content="website" />
<meta property="og:url" content="http://problemsolvernetwork.org/de/" />
<meta property="og:image" content="http://problemsolvernetwork.org/theme/media/micha-barthel-netzwerk.jpg" />
<meta property="og:image:alt" content="Problemlöser Netzwerk" />
<meta property="og:description" content="Problemlöser Netzwerk" />
<meta property="og:site_name" content="problemsolvernetwork" />

<title>Netzwerk für professionelle "outside the box" - Denker</title>

@include('de.css')
<style>

.masthead {
  min-height: 30rem;
  position: relative;
  display: table;
  width: 100%;
  height: auto;
  padding-top: 8rem;
  padding-bottom: 8rem;
  background-color: #ecb807!important;
  background: linear-gradient(90deg, rgba(255, 255, 255, 0.1) 0%, rgba(255, 255, 255, 0.1) 100%);
  background-position: center center;
  background-repeat: no-repeat;
  background-size: cover;
}

.masthead h1 {
  font-size: 2.8rem;
  margin: 0;
  padding: 0;
}
.masthead h3 {
  font-size: 1rem;
  margin: 0;
  padding: 0;
}
@media (min-width: 992px) {
  .masthead {
    height: 100vh;
  }
  .masthead h1 {
    font-size: 5.5rem;
  }
  .masthead h3 {
    font-size: 2rem;
  }
}
</style>
</head>

<body>

@include('de.nav')

<header class="masthead d-flex "  >
    <div class="container text-center my-auto">
        <br><h1 class="mb-1">problem solver network</h1>
        <h3 class="mb-5">
            <strong>
network of thinkers
            </strong>

        </h3>
                <div style="padding-top:5px;padding-right:25px;padding-bottom:25px;">
                    <a class="btn btn-dark btn-xl"   style="text-transform: lowercase;font-family: monospace; border: 5px solid #343a40;"  href="/kontakt/"> Kontakt </a>
                </div>
    </div>
    <div class="overlay"></div>
</header>






@include('de.footer')
@include('de.js')
</body>

</html>
