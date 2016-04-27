@extends('master')

@section('content')

<h4>Country</h4>
<table class="striped centered">
        <thead>
          <tr>
              <th>Name Country</th>
              <th>Code Area</th>
          </tr>
        </thead>
        <tbody>
          @foreach($country as $country)
          <tr>
            <td>{{ $country->country_name }}</td>
            <td>{{ $country->country_areacode }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>

@endsection
