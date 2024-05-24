function clearForm(){
    $('#responsable').val('');
    $('#descripcion').val('');
}

document.addEventListener('DOMContentLoaded', function() {
    var calendarAudiTres = document.getElementById('calendarAuditorioTres');
    var calendar = new FullCalendar.Calendar(calendarAudiTres, {
        headerToolbar: {
            left: 'prev,today,next',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek'
        },
        initialView: 'dayGridMonth',
        contentHeight: 385,
        fixedWeekCount: false,
        locale: 'es',
        events:'http://127.0.0.1:8000/show-reservas-tres',
        dateClick: function(info) {

            $('#start').val(info.dateStr);
            $('#end').val(info.dateStr);

            $('#modal-create-reserve').modal('show');
            
            clearForm();
        },
        eventClick: function(info) {

            var id = info.event.id;
            window.open("http://127.0.0.1:8000/auditoriumTres/"+id+"/edit", "_self");
            
        }
    });
    
    calendar.render();
});