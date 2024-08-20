@extends('layouts.main')
@section('title', 'Welcome to AlpineHotel')

@section('content')
<!-- Background image -->
<div
    id="intro-example"
    class="p-5 text-center bg-image"
    style="background-image: url('https://mdbcdn.b-cdn.net/img/new/slides/041.webp');"
>
    <div class="mask" style="background-color: rgba(0, 0, 0, 0.7);">
      <div class="d-flex justify-content-center align-items-center h-100">
        <div class="text-white">
          <h1 class="mb-3">Welcome to AlpineHotel</h1>
          <h5 class="mb-4">Start your Alpine Journey</h5>
          <a
            data-mdb-ripple-init
            class="btn btn-outline-light btn-lg m-2"
            href="/reserve"
            role="button"
            rel="nofollow"
            target="_blank"
          >Book</a
          >
          <a
            data-mdb-ripple-init
            class="btn btn-outline-light btn-lg m-2"
            href="/calendar"
            target="_blank"
            role="button"
          >Availabilities</a
          >
        </div>
      </div>
    </div>
  </div>
  <!-- Background image -->
@endsection
