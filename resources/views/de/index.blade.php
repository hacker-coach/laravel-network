<!DOCTYPE html>
<html lang="de">

<head>


  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="INNOVATIV HACKERS | Club der Denker">
  <meta name="author" content="">
  <title>INNOVATIV HACKERS | Club der Denker</title>
  <link rel="icon" href="https://innovativ-hackers.org/favicon.ico" type="image/x-icon">

  <meta name="image" content="https://innovativ-hackers.org/share.jpg" alt="INNOVATIV HACKERS | Club der Denker">
  <meta property="og:title" content="INNOVATIV HACKERS | Club der Denker" />
  <meta property="og:type" content="website" />
  <meta property="og:url" content="https://innovativ-hackers.org/de" />
  <meta property="og:image" content="https://innovativ-hackers.org/share.jpg" />
  <meta property="og:image:alt" content="INNOVATIV HACKERS | Club der Denker" />
  <meta property="og:description" content="INNOVATIV HACKERS | Club der Denker" />
  <meta property="og:site_name" content="INNOVATIV HACKERS | Club der Denker" />




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


.btn-dark {
  color: black !important;
  background-color: transparent !important;
  border: 3px solid #1D809F !important;
}
.btn-dark:hover, .btn-dark:focus, .btn-dark:active {
  background-color: black !important;
  border-color: black !important;
  color: #fff !important;
}
.btn {
  box-shadow: 0px 3px 3px 0px rgba(0, 0, 0, 0.1);
  font-weight: 700;
}
.bg-primary {
  background-color: #1D809F !important;
}

.text-primary {
  color: #1D809F !important;
}

.text-secondary {
  color: #ecb807 !important;
}

a {
  color: #1D809F;
}

a:hover, a:focus, a:active {
  color: #155d74;
}

.btn-primary {
  background-color: transparent !important;
  border: 3px solid black !important;
  xborder-color: #1D809F !important;
  color: #1D809F  !important;
}

.btn-primary:hover, .btn-primary:focus, .btn-primary:active {
  background-color: #155d74 !important;
  border-color: #155d74 !important;
  color: #fff !important;
}
</style>
</head>

<body>

@include('de.nav')

<!-- Header -->
<header class="masthead d-flex "  >
    <div class="container text-center my-auto">
        <br><h1 class="mb-1 text-center">INNOVATIV HACKERS</h1>
        <h3 class="mb-5">
            <strong>Club der Denker
            </strong>
        </h3>
        <a class="btn btn-primary btn-xl js-scroll-trigger" style="color: black !important;" href="/kontakt/">Kontakt</a>

    </div>
    <div class="overlay"></div>
</header>
<!-- Header -->
<header class="masthead d-flex "  >
    <div class="container text-center my-auto">

        <blockquote class="blockquote">
          <p class="mb-0">„Sie dürfen nicht alles glauben, was Sie denken!“</p>
          <footer class="blockquote-footer">Heinz Erhardt</footer>
        </blockquote>

        <blockquote class="blockquote">
          <p class="mb-0">„Entweder alles anzweifeln oder alles glauben, das sind zwei gleich bequeme Lösungen; die eine wie die andere erspart uns das Denken.“</p>
          <footer class="blockquote-footer">Henri Poincare</footer>
        </blockquote>

        <blockquote class="blockquote">
          <p class="mb-0">„Es ist bequem mit dem Einstein. Jedes Jahr widerruft er, was er das vorige Jahr geschrieben hat“</p>
          <footer class="blockquote-footer">Albert Einstein</footer>
        </blockquote>
    </div>
    <div class="overlay"></div>
</header>









@include('de.footer')
@include('de.js')
</body>

</html>
