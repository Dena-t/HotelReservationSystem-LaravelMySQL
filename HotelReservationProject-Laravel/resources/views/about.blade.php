@extends('layouts.main')
@section('title', 'About AlpineHotel')
@section('content')
<meta name="description" content="About luxurious Alpine Hotel.">

<body>
    <div class="container mt-5">
        <h2>About the Hotel</h2>
        <div class="mt-5">
            <!-- Hotel Description -->
            <p>Welcome to AlpineHotel, a luxurious retreat nestled in the heart of the majestic Alps. Our hotel offers unparalleled views of snow-capped mountains and serene landscapes, providing the perfect escape for nature enthusiasts and adventure seekers alike.</p>

            <!-- Image Gallery -->
            <!-- Image Gallery -->
            <div class="row">
                <div class="col-md-4 mb-4 d-flex justify-content-center align-items-center">
                    <img src="{{ asset('img/hotel.jpeg') }}" class="img-fluid" alt="Hotel Drawing">
                </div>
                <div class="col-md-6 mb-6 d-flex justify-content-center align-items-center">
                    <img src="{{ asset('img/snow.jpeg') }}" class="img-fluid" alt="Hotel Sports">
                </div>
                <!-- Add more image columns if needed -->
            </div>
            <!-- Enter Location Form -->
            <div class="row">
                <div class="col">
            <h3>Check the Weather</h3>
            <form method="POST" action="{{ route('weather.get') }}">
                @csrf
                <div class="form-group col-md-4 mb-4">
                    <label for="location">Enter Location:</label>
                    <input type="text" id="location" name="location" value="Innsbruck" required>               
                </div>
                <div class="">
                <button type="submit" class="btn btn-outline mb-4">Get Weather</button>
                </div>
            </form>
        </div>
        <div class="col">
            <!-- Display weather information -->
            @if(session('location'))
            <h3>Weather in {{ ucfirst(session('location')) }}</h3>
            <p>Temperature: {{ session('temperature') }}°C</p>
            <p>Weather: {{ session('description') }}</p>
            <img src="http://openweathermap.org/img/wn/{{ session('icon') }}.png" alt="Weather Icon">
            @elseif(session('error'))
            <p>{{ session('error') }}</p>
            @endif
        </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>
</body>
@endsection
