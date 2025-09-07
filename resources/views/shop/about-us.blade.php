@extends('layouts.app')

@section('title', 'About Us')

@section('content')
  <h1>{{ $title }}</h1>
  <p>{{ $description }}</p>
 
  {!! $rawHtml !!}

  @php
    $team = ['Lina', 'Omar', 'Sara'];
    $teamCount = count($team);
  @endphp

  <p>We currently have {{ $teamCount }} team members.</p>
  <ul>
    @foreach($team as $member)
      <li>{{ $member }}</li>
    @endforeach
  </ul>
@endsection
