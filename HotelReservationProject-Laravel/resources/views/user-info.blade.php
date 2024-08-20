@extends('layouts.main')
@section('content')



<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Reserve a Room</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">


@section('content')


<div class="container">
<h1>Your Reservations</h1>
<h2>User Information:</h2>
<p>Name: {{ $user->name }}</p>
<p>Email: {{ $user->email }}</p>
<h2>Reservation Information:</h2>
       @foreach($reservations as $reservation)
<div class="card">
<div class="card-body">
<h5 class="card-title">Reservation ID: {{ $reservation->id }}</h5>
<p class="card-text">Room Number: {{ $reservation->room->number }}</p>
<p class="card-text">Capacity: {{ $reservation->room->capacity }}</p>
<p class="card-text">Rate: {{ $reservation->room->rate }}</p>
<p class="card-text">Facilities: {{ $reservation->room->facilities }}</p>
<p class="card-text">Check-in Date: {{ $reservation->checkin_date }}</p>
<p class="card-text">Check-out Date: {{ $reservation->checkout_date }}</p>
</div>
</div>
       @endforeach
</div>


@endsection

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>
<script>
$(document).ready(function() {
   $('#reservationForm').on('submit', function(event) {
       event.preventDefault();
       // Add JavaScript validation here
       alert('Validated!');
   });
});
</script>
</body>
</html>

@endsection