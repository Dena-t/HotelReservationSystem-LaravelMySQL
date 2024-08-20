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
