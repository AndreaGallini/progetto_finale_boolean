@extends('layouts.admin')

@section('content')

<h1>{{ $apartment->title }}</h1>
<span>{{ $apartment }}</span>
<h1>{{ $sponsor->name }}</h1>
<span>{{ $sponsor }}</span>
@endsection
