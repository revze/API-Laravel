<style type="text/css">
@media only screen and (min-width: 993px) {
  .nav-wrapper.container {
    width: 90%;
  }
}
</style>
<nav class="blue">
  <div class="nav-wrapper container">
    <a href="{{ url('master/currency') }}" class="brand-logo">API Laravel</a>
    <ul id="nav-mobile" class="right hide-on-med-and-down">
      <li><a href="{{ url('cronGetCurrency') }}">Cron Currency</a></li>
      <li><a href="{{ url('master/currency') }}">Currency</a></li>
      <li><a href="{{ url('cronGetLang') }}">Cron Language</a></li>
      <li><a href="{{ url('master/lang') }}">Language</a></li>
      <li><a href="{{ url('cronGetCountry') }}">Cron Country</a></li>
      <li><a href="{{ url('master/country') }}">Country</a></li>
      <li><a href="{{ url('cronGetAirport') }}">Cron Airport</a></li>
      <li><a href="{{ url('master/airport') }}">Airport</a></li>
      <li><a href="{{ url('airline/flight') }}">Flight</a></li>
    </ul>
  </div>
</nav>
