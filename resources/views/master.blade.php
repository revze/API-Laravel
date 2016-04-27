<!DOCTYPE html>
  <html>
    <head>
      <title>API Laravel</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <link type="text/css" rel="stylesheet" href="/assets/css/materialize.min.css"  media="screen,projection"/>
      <script src="/assets/js/jquery.min.js"></script>
      <script src="/assets/js/materialize.min.js"></script>
    </head>
    <body class="grey lighten-3">
      <nav class="blue">
        <div class="nav-wrapper container">
          <a href="/master/currency" class="brand-logo">API Laravel</a>
          <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a href="/cronGetCurrency">Cron Currency</a></li>
            <li><a href="/master/currency">Currency</a></li>
            <li><a href="/cronGetLang">Cron Language</a></li>
            <li><a href="/master/lang">Language</a></li>
            <li><a href="/cronGetCountry">Cron Country</a></li>
            <li><a href="/master/country">Country</a></li>
          </ul>
        </div>
      </nav>
      <div class="container">
        <div class="card-panel">
          @yield('content')
        </div>
      </div>
      <footer class="blue white-text">
        <div class="container center" style="padding:20px 0">
          Copyright &copy; 2016 Revando. All Rights Reserved.
        </div>
      </footer>
    </body>
  </html>
