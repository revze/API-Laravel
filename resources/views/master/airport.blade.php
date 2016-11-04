@extends('master')

@section('content')

<h4>Airport</h4>
<table class="striped centered">
        <thead>
          <tr>
              <th>Airport Name</th>
              <th>Location</th>
              <th>Country</th>
          </tr>
        </thead>
        <tbody>
          @foreach($airports as $airport)
          <tr>
            <td>{{ $airport->airport_name }} ({{ $airport->airport_code }})</td>
            <td>{{ $airport->location_name }}</td>
            <td>{{ App\Country::where('country_id',$airport->country_id)->first()->country_name }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>

@endsection
