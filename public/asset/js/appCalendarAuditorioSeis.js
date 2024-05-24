document.addEventListener('DOMContentLoaded', function() {
    var calendarAudiSeis = document.getElementById('calendarAuditorioSeis');
    var calendar = new FullCalendar.Calendar(calendarAudiSeis, {
        headerToolbar: {
            left: 'prev,today,next',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek'
        },
        initialView: 'dayGridMonth',
        contentHeight: 385,
        fixedWeekCount: false,
        locale: 'es',
        events:'http://127.0.0.1:8000/show-reservas-seis',
        dateClick: function(info) {

            $('#start').val(info.dateStr);
            $('#end').val(info.dateStr);

            $('#modal-create-reserve').modal('show');
            
            clearForm();
        },
        eventClick: function(info) {
            
            var id = info.event.id;
            window.open("http://127.0.0.1:8000/auditoriumSeis/"+id+"/edit", "_self");
            
        }
    });
    calendar.render();
});