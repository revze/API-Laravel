<!DOCTYPE html>
  <html>
    <head>
      <title>Tiket.com API</title>
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <link type="text/css" rel="stylesheet" href="{{ url('assets/css/materialize.min.css') }}"  media="screen,projection"/>
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link type="text/css" rel="stylesheet" href="{{ url('assets/css/product-sans.css') }}"/>
      <script src="{{ url('assets/js/jquery.min.js') }}"></script>
      <script src="{{ url('assets/js/materialize.min.js') }}"></script>
      <script type="text/javascript">
        function check_type() {
          var tipe = $('#type').val();
          if (tipe=='OW') {
            $('#return_date').removeClass('datepicker');
            $('#return_date').prop('disabled',true);
          }
          else {
            $('#return_date').addClass('datepicker');
            $('#return_date').prop('disabled',false);
          }
        }
        $(function(){
          $('select').material_select();
          $('.datepicker').pickadate({
            selectMonths: true,
            selectYears: 15
          });
          $('#search_flight').submit(function(e){
            $("#search_button").html('Please Wait...');
            e.preventDefault();
            $.ajax({
              url: '{{ route('ajax_search_flight') }}',
              type: 'post',
              data: $(this).serializeArray(),
              dataType: 'json',
              success:function(data){
                var hasil_depart = data.departures;
                var res_depart = hasil_depart.result;
                if(res_depart.length>0){
                              var html = '<ul class="collapsible popout" data-collapsible="accordion">';
                              //looping hasil departures
                              for(data in res_depart){
                                    //tampilkan dalam bentuk collapsible
                                    html += '<li>';
                                    html += '<div class="collapsible-header">';
                                    html += '<img src="'+res_depart[data].image+'">'
                                    html += res_depart[data].airlines_name+ ' ('+res_depart[data].full_via+') with '+res_depart[data].flight_number;
                                    html += '<div class="right">'+res_depart[data].markup_price_string+'</div>';
                                    html += '</div>';
                                    html += '<div class="collapsible-body" style="padding:10px;">';
                                    //ambil array object flight info
                                    var flights = res_depart[data].flight_infos;
                                    var flight_infos = flights.flight_info;
                                    //looping isi array flight info
                                    for(info in flight_infos){
                                          //masukkan ke dalam body collapsible
                                          html += '<h5>'+flight_infos[info].flight_number+'</h5>';
                                          html += '<div class="right">';
                                          html += flight_infos[info].arrival_city+' at '
                                                +flight_infos[info].simple_arrival_time;
                                          html += '</div>';
                                          html += '<div class="left">';
                                          html += flight_infos[info].departure_city+' at '
                                                +flight_infos[info].simple_departure_time;
                                          html += '</div>';
                                          html += '<br>';
                                          html += '<hr>';
                                    }
                                    html += '</div>';
                                    html += '</li>';
                              }
                              html += '</ul>';
                              $("#result").html(html);
                              $('.collapsible').collapsible();
                              $("#search_button").html('Search');
                            }
                else{
                  $("#result").html('<h1>No Flight Data Found</h1>');
                  $("#search_button").html('Search');
                }
              }
            });
          });
        });
      </script>
    </head>
    <body class="grey lighten-3">
      @include('nav')
      <div class="container">
        <div class="card-panel">
          @yield('content')
        </div>
      </div>
      <footer class="white">
        <div class="container center" style="padding:20px 0">
          Copyright &copy; 2016 <a href="https://facebook.com/revze" target="_blank">Revando</a>. All Rights Reserved.
        </div>
      </footer>
    </body>
  </html>
