var scheduler = '#planificador_acuerdos';

$(document).off('click','.scheduler-event-content').on('click','.scheduler-event-content', function(event) {
    console.log($(this));
    console.log($(this).text());
  });
$(document).ready(function($) {
  finiciar_scheduler();


});

function finiciar_scheduler(){
  var events = [
    {
      disabled  : true,
      content: 'Este es un acuerdo',
      endDate: new Date(2021, 2, 25, 5),
      startDate: new Date(2021, 2, 25, 1)
    },
    {
      disabled  : true,
      content: 'Otro acuerdo perdido ahi',
      endDate: new Date(2021, 2, 27, 13),
      startDate: new Date(2021, 2, 23, 12)
    },
    {
      disabled  : true,
      content: "Super largo el acuerdo",
      endDate: new Date(2021, 2, 30),
      startDate: new Date(2021, 2, 21)
    }
  ];
    
  YUI({lang: 'es-MX'}).use(
    'aui-scheduler',
    function(Y) {

      var agenda    = new Y.SchedulerAgendaView({
            isoTime   : true,
            strings: {
              noEvents  : 'No hay acuerdos registrados'
            }
          }),
          calDia    = new Y.SchedulerDayView({
            isoTime   : true,
            strings   : { allDay: 'Todo el día' }
          }),
          calSemana = new Y.SchedulerWeekView({
            isoTime   : true,
            strings   : { allDay: 'Todo el día' }
          }),
          calMes    = new Y.SchedulerMonthView({
            isoTime   : true,
            strings: {
              close   : 'Cerrar',
              show    : 'Mostrar',
              more    : 'más'
            }
          });

      new Y.Scheduler(
        {
          boundingBox : scheduler,
          activeView  : agenda,
          date        : new Date(),
          items       : events,
          render      : true,
          strings: {
            agenda  : 'Agenda',
            day     : 'Día',
            month   : 'Mes',
            today   : 'HOY',
            week    : 'Semana',
            year    : 'Año'
          },
          views         : [ agenda, calMes, calSemana, calDia ]
        }
      );
    }
  );

}