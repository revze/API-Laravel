@extends('master')

@section('content')

<h4>Language</h4>
<table class="striped centered">
        <thead>
          <tr>
              <th>Language Code</th>
              <th>Long Name</th>
              <th>Short Name</th>
          </tr>
        </thead>
        <tbody>
          @foreach($lang as $lang)
          <tr>
            <td>{{ $lang->code }}</td>
            <td>{{ $lang->name_long }}</td>
            <td>{{ $lang->name_short }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>

@endsection
