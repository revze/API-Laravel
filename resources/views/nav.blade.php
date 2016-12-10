<style type="text/css">
input:not([type]):focus:not([readonly]),
input[type=text]:focus:not([readonly]),
input[type=password]:focus:not([readonly]),
input[type=email]:focus:not([readonly]),
input[type=search]:focus:not([readonly]),
textarea.materialize-textarea:focus:not([readonly]) {
  border-bottom: 1px solid #1565c0;
  box-shadow: 0 1px 0 0 #1565c0;
}
input:not([type]):focus:not([readonly]) + label,
input[type=text]:focus:not([readonly]) + label,
input[type=password]:focus:not([readonly]) + label,
input[type=email]:focus:not([readonly]) + label,
input[type=search]:focus:not([readonly]) + label,
textarea.materialize-textarea:focus:not([readonly]) + label {
  color: #1565c0;
}
.picker__weekday-display{
  background-color: #1565c0;
}
.picker__date-display{
  background-color: #1565c0;
}
.picker__day.picker__day--today{
  color: #1565c0;
}
.picker__nav--prev:hover, .picker__nav--next:hover{
  background: #BBDEFB;
}
.picker__close, .picker__today{
  color: #1565c0;
}
.picker__day--selected, .picker__day--selected:hover, .picker--focused .picker__day--selected{
  background-color: #1565c0;
}
.picker__input.picker__input--active{
  border-color: #BBDEFB;
}
button.picker__today:focus, button.picker__clear:focus, button.picker__close:focus{
  background-color: #BBDEFB;
}
.dropdown-content li>a, .dropdown-content li>span{
  color: #1565C0;
}
.btn,.btn-flat,.btn-large{font-weight:500;padding: 0 16px}
.brand-logo {
  font-family: 'Product Sans';
  font-weight: 400;
}
.main-nav {
    text-transform: uppercase;
    font-weight: 500;
}
.margin-bottom{
  margin-bottom: 0!important;
}
@media only screen and (min-width: 993px) {
  .nav-wrapper.container {
    width: 90%;
  }
}
</style>
<script type="text/javascript">
  $(document).ready(function(){
    $('select').material_select();
  });
</script>
<ul id="cron-dropdown" class="dropdown-content">
  <li class="waves-effect waves-block"><a class="blue-text text-darken-3" href="{{ url('cronGetCurrency') }}">Cron Currency</a></li>
  <li class="waves-effect waves-block"><a class="blue-text text-darken-3" href="{{ url('cronGetLang') }}">Cron Language</a></li>
  <li class="waves-effect waves-block"><a class="blue-text text-darken-3" href="{{ url('cronGetCountry') }}">Cron Country</a></li>
  <li class="waves-effect waves-block"><a class="blue-text text-darken-3" href="{{ url('cronGetAirport') }}">Cron Airport</a></li>
</ul>
<ul id="content-dropdown" class="dropdown-content">
  <li class="waves-effect waves-block"><a class="blue-text text-darken-3" href="{{ url('master/currency') }}">Currency</a></li>
  <li class="waves-effect waves-block"><a class="blue-text text-darken-3" href="{{ url('master/lang') }}">Language</a></li>
  <li class="waves-effect waves-block"><a class="blue-text text-darken-3" href="{{ url('master/country') }}">Country</a></li>
  <li class="waves-effect waves-block"><a class="blue-text text-darken-3" href="{{ url('master/airport') }}">Airport</a></li>
  <li class="waves-effect waves-block"><a class="blue-text text-darken-3" href="{{ url('airline/flight') }}">Flight</a></li>
</ul>
<nav class="blue darken-3">
  <div class="nav-wrapper container">
    <a href="{{ url('/') }}" class="brand-logo">Tiket.com API</a>
    <ul class="right hide-on-med-and-down">
      <li><a class="dropdown-button waves-effect waves-light waves-block main-nav" href="javascript:void(0)" data-activates="cron-dropdown">Cron<i class="material-icons right">arrow_drop_down</i></a></li>
      <li><a class="dropdown-button waves-effect waves-light waves-block main-nav" href="javascript:void(0)" data-activates="content-dropdown">Content<i class="material-icons right">arrow_drop_down</i></a></li>
    </ul>
  </div>
</nav>
