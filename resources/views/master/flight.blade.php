@extends('master')

@section('content')

<div class="row margin-bottom">
    <form id="search_flight">
      <div class="col s12">
        <div class="row">
          <div class="col s6">
            <select class="browser-default" type="text" name="from" id="from">
              @foreach($airport as $key)
                <option value="{{ $key->airport_code }}">{{ $key->airport_name }} {{ $key->airport_code }}</option>
              @endforeach
            </select>
          </div>
          <div class="col s6">
            <select class="browser-default" type="text" name="to" id="to">
              @foreach($airport as $key)
                <option value="{{ $key->airport_code }}">{{ $key->airport_name }} {{ $key->airport_code }}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="row">
          <div class="col s2">
            <select class="browser-default" name="type" id="type">
              <option value="OW">Oneway</option>
              <option value="RT">Roundtrip</option>
            </select>
          </div>
          <div class="col s2">
            <input type="text" name="depart_date" class="for_date datepicker" id="depart_date">
          </div>
          <div class="col s2">
            <input type="text" name="return_date" class="for_date datepicker" id="return_date">
          </div>
          <div class="col s1">
            <select class="browser-default" name="adult" id="adult">
              @for($i=1; $i<5; $i++)
                <option value="{{ $i }}">{{ $i }}</option>
              @endfor
            </select>
          </div>
           <div class="col s1">
             <select class="browser-default" name="child" id="child">
               @for($i=0; $i<5; $i++)
                <option value="{{ $i }}">{{ $i }}</option>
               @endfor
             </select>
           </div>
           <div class="col s1">
             <select class="browser-default" name="infant" id="infant">
               @for($i=0; $i<5; $i++)
                <option value="{{ $i }}">{{ $i }}</option>
               @endfor
             </select>
           </div>
           <div class="col s3">
             <button type="submit" class="btn blue waves-effect waves-light">Search</button>
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
