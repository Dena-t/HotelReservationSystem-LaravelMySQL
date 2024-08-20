@extends('layouts.main')
@section('title', 'Make a Reservation')
@section('content')



<!-- Meta Tags -->
<meta name="description" content="Make a reservation for a room at our luxurious hotel and experience a memorable stay.">
<style>
  /* Custom CSS for the specific height carousel */
  .carousel-item img {
    height: 600px; 
    width: 100%; 
    object-fit: cover; 
    padding: 0px;
    margin: 0px;
  }
</style>

<body>

<!--CHanges for Seo: Meta Tags, ImageAlts-->

<!-- <-- begin carousel -->
<div class="background-image">
  <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="https://alpinekpk.com/wp-content/uploads/2022/05/deluxe-1024x683.jpg" class="d-block w-100" alt="Deluxe Room">
      </div>
      <div class="carousel-item">
        <img src="https://alpinekpk.com/wp-content/uploads/2023/03/villa5-room-4.jpg" class="d-block w-100" alt="Villa Room">
      </div>
      <div class="carousel-item">
        <img src="https://alpinekpk.com/wp-content/uploads/2022/05/vip-suite-alpine-hotel.jpg
" class="d-block w-100" alt="VIP Suite Room">
      </div>
      <!-- more image URLs -->
    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>

<!-- End carousel -->
<!--Showing Errors-->
@if($errors->any())
<div class="alert alert-danger">
  <ul>
    @foreach($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
</ul>
</div>
@endif


<div class="container mt-5">
<h2>Room Reservation</h2>
<form  id="reservationForm" action="{{ url('/reserve') }}" method="POST">
       @csrf
<!-- Form fields for name, email, etc. -->
<div class="form-group">
<div class="form-group">
<label for="name">Name:</label>
<input type="text" name="name" id="name" class="form-control" value="{{old('name')}}" >
</div>


<label for="email">Email:</label>
<input type="email" class="form-control" id="email" name="email" value="{{old('email')}}" required>


<label for="phone">Phone:</label>
<input type="text" class="form-control" id="phone" name="phone" value="{{old('phone')}}">


</div>
<!-- Include other fields similarly -->

<!-- Room Selection -->
<h3>Select a Room:</h3>

@if(count($available)>0)
       @foreach ($rooms as $room)
       @if(in_array($room['number'],$available))
     

          
<div class="form-check">
<input type="checkbox" name="room" id="room{{ $room['number'] }}" value="{{ $room['number'] }}" class="form-check-input">
<label for="room{{ $room['id'] }}" class="form-check-label">
                   Room {{ $room['number'] }} (Capacity: {{ $room['capacity'] }}, Rate: {{ $room['rate'] }}/night)
</label>
</div>


@endif
       @endforeach

       @else 
       <p> No Available Rooms.</p>
       @endif 

<!-- Check-in and Check-out Dates -->
<div class="form-group">
<label for="checkin_date">Check-in Date:</label>
<input type="date" name="checkin_date" id="checkin_date" class="form-control" value="{{old('checkin_date')}}" required>
</div>
<div class="form-group">
<label for="checkout_date">Check-out Date:</label>
<input type="date" name="checkout_date" id="checkout_date" class="form-control" value="{{old('checkout_date')}}" required>
</div>
<!-- Submit Button -->
<button type="submit" class="btn btn-primary">Submit</button>
</form>

</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>



<!--Front-end validation-->

<script>
document.addEventListener("DOMContentLoaded", function() {
 document.getElementById('reservationForm').addEventListener('submit', function(event) {
   let isValid = true;
   let messages = [];

   // Fetching form values
       const name = document.getElementById('name').value.trim();
       const email = document.getElementById('email').value.trim();
       const phone = document.getElementById('phone').value.trim();
       const room = document.querySelector('input[name="room"]:checked');
       const checkinDate = document.getElementById('checkin_date').value;
       const checkoutDate = document.getElementById('checkout_date').value;

       
    // Name validation
    if (!name) {
           isValid = false;
           messages.push("Name is required.");
       }
       // Email validation
       if (!email || !/\S+@\S+\.\S+/.test(email)) {
           isValid = false;
           messages.push("A valid email is required.");
       }

       // Phone validation (simple numeric check, consider more complex patterns for actual use)
       if (!phone || !/^\d+$/.test(phone)) {
           isValid = false;
           messages.push("A valid phone number is required.");
       }

        // Room selection validation
        if (!room) {
           isValid = false;
           messages.push("Please select a room.");
       }
       // Check-in and Check-out dates validation
       if (!checkinDate) {
           isValid = false;
           messages.push("Check-in date is required.");
       }
       if (!checkoutDate) {
           isValid = false;
           messages.push("Check-out date is required.");
       }
       if (checkinDate && checkoutDate && checkinDate >= checkoutDate) {
           isValid = false;
           messages.push("Check-out date must be after the check-in date.");
       }


        // If validation fails, show alerts and prevent form from submitting
        if (!isValid) {
           alert("Please correct the following errors before submitting:\n" + messages.join("\n"));
           event.preventDefault();
       } 
   });
});
   

</script> 

</body>
</html>

@endsection