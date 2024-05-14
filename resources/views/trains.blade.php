@extends('layout.main')

@section('content')

@section('title')
I Treni
@endsection

<h1>I Treni</h1>

<table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Reference</th>
        <th scope="col">Departure Station</th>
        <th scope="col">Arrival Station</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($trains as $train)
      <tr>
        <th scope="row">{{$train->id}}</th>
        <td>{{$train->reference}}</td>
        <td>{{$train->departure_station}}</td>
        <td>{{$train->arrival_station}}</td>
      </tr>
    @endforeach
    </tbody>
  </table>

@endsection
