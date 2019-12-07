@extends('layouts.app', ['activePage' => 'icons', 'titlePage' => __('Icons')])

@section('content')
<div class="content text-center">
  <h2 class="text-center">
    {{ $error }}
  </h2>
  <button type="btn btn-primary" onclick="history.back();">Back</button>

</div>
@endsection