@extends('app_flight')

@section('content')

<div class="row margin-bottom">
    <!-- <form action="{{ route('ajax_search_flight') }}" method="post"> -->
    <form id="search_flight">
      {!! csrf_field() !!}
      <div class="col s12">
        <div class="row margin-bottom">
          <div class="input-field col s6">
            <select type="text" name="from" id="from">
              <option value="" disabled selected>From Airport</option>
              @foreach($airport as $key)
                <option value="{{ $key->airport_code }}">{{ $key->airport_name }} {{ $key->airport_code }}</option>
              @endforeach
            </select>
          </div>
          <div class="input-field col s6">
            <select type="text" name="to" id="to">
              <option value="" disabled selected>To Airport</option>
              @foreach($airport as $key)
                <option value="{{ $key->airport_code }}">{{ $key->airport_name }} {{ $key->airport_code }}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s2">
            <select name="type" id="type" onchange="check_type()">
              <option value="OW">Oneway</option>
              <option value="RT">Roundtrip</option>
            </select>
          </div>
          <div class="input-field col s2">
            <input type="text" name="depart_date" class="datepicker" id="depart_date">
            <label for="depart_date">Depart Date</label>
          </div>
          <div class="input-field col s2">
            <input type="text" name="return_date" class="datepicker" id="return_date" disabled>
            <label for="return_date">Return Date</label>
          </div>
          <div class="input-field col s1">
            <select name="adult" id="adult">
              <option value selected disabled>Dewasa</option>
              @for($i=1; $i<5; $i++)
                <option value="{{ $i }}">{{ $i }}</option>
              @endfor
            </select>
          </div>
           <div class="input-field col s1">
             <select name="child" id="child">
               <option value selected disabled>Anak - anak</option>
               @for($i=0; $i<5; $i++)
                <option value="{{ $i }}">{{ $i }}</option>
               @endfor
             </select>
           </div>
           <div class="input-field col s1">
             <select name="infant" id="infant">
               <option value selected disabled>Bayi</option>
               @for($i=0; $i<5; $i++)
                <option value="{{ $i }}">{{ $i }}</option>
               @endfor
             </select>
           </div>
           <div class="input-field col s3">
             <button type="submit" class="btn blue darken-3 waves-effect waves-light">Search</button>
           </div>
        </div>
      </div>
    </form>
</div>
<div class="row">
  <div class="col s12">
    <div id="result">
    </div>
  </div>
</div>

@endsection
