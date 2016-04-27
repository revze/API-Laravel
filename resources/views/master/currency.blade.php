@extends('master')

@section('content')

<h4>Currency</h4>
<table class="striped centered">
        <thead>
          <tr>
              <th>Currency Code</th>
              <th>Currency Name</th>
          </tr>
        </thead>
        <tbody>
          @foreach($currency as $currency)
          <tr>
            <td>{{ $currency->code }}</td>
            <td>{{ $currency->name }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>

@endsection
