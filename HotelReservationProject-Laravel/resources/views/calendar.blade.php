@extends('layouts.main')
@section('title', 'Availability Calendar')
@section('content')

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Availabilities</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css" />
</head>
<style>
.fc-time{
   display : none;
}
.fc-content{
    background: #98a896;
}
.fc-draggable{
  border-color:white;
}
       </style>
<body>
<div class="container mt-5">
<div id="calendar"></div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>
<script>
       $(document).ready(function() {
           $('#calendar').fullCalendar({
               events: '/events',
               header: {
                   left: 'prev,next today',
                   center: 'title',
                   right: 'month,agendaWeek,agendaDay'
               },
               defaultView: 'month',
               editable: true,
               eventLimit: true,
               eventClick: function(event) {
                   // Handle event click here
                   alert('Event: ' + event.title);
               },
               eventDrop: function(event, delta, revertFunc) {
                   // Handle event drop here
                   alert(event.title + " was dropped on " + event.start.format());
               },
               eventResize: function(event, delta, revertFunc) {
                   // Handle event resize here
                   alert(event.title + " end is now " + event.end.format());
               },
               dayClick: function(date, jsEvent, view) {
                   // Handle day click here
                   alert('Clicked on: ' + date.format());
               }
           });
       });
</script>

    </div>
</body>
</html>
@endsection