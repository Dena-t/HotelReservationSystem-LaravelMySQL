@extends('layouts.main')
@section('title', 'Alpine Rooms')
@section('content')


<head>
<meta name="description" content="See Rooms List of our luxurious hotel and experience a memorable stay.">

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Reserve a Room</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
<h2>Room Reservation</h2>
<div class="mt-5">

@foreach ($paginatedItems as $room)
<div>
<p>Room Number: {{ $room['number'] }}</p>
<p>Capacity: {{ $room['capacity'] }}</p>
<p>Rate: {{ $room['rate'] }}</p>
<p>Facilities: {{ implode(', ', $room['facilities']) }}</p>
</div>
@endforeach
{{ $paginatedItems->links('pagination::bootstrap-5') }}



<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>

</body>
</html>

@endsection