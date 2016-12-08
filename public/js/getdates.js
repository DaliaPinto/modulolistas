/*Created by Dalia Pinto on 07 dec 2017*/

/*
* get
*/
function getDates(dateStart, dateEnd) {
    var currentDate = dateStart,
        dates = [];
    while(currentDate <= dateEnd) {

        // append date to array
        dates.push(currentDate);

        // add one day
        // automatically rolling over to next month
        var d = new Date(currentDate.valueOf());
        d.setDate(d.getDate() + 1);
        currentDate = d;

    }
    return dates;
}
/*
*
*
*/
function filterWeekDays(dates, includeDays) {
    var weekdays = [];

    // cycle dates
    dates.forEach(function(day){

        // cycle days to be included (so==0, mo==1, etc.)
        includeDays.forEach(function(include) {
            if(day.getDay() == include) {
                weekdays.push(day);
            }
        });
    });
    return weekdays;
}
/**
 * Obtain the current date in
 *      current-day div
 */
var objToday = new Date(),
    weekday = new Array('Domingo',
                        'Lunes',
                        'Martes',
                        'Miércoles',
                        'Jueves',
                        'Viernes',
                        'Sábado'),
    dayOfWeek = weekday[objToday.getDay()],
    dayOfMonth = today + ( objToday.getDate() < 10) ? '0' + objToday.getDate(): objToday.getDate(),
    months = new Array('Enero',
                        'Febrero',
                        'Marzo',
                        'Abril',
                        'Mayo',
                        'Junio',
                        'Julio',
                        'Agosto',
                        'Septiembre',
                        'Octubre',
                        'Noviembre',
                        'Diciembre'),
    curMonth = months[objToday.getMonth()],
    curYear = objToday.getFullYear();
var today = dayOfWeek + " " + dayOfMonth + " de " + curMonth + ", " + curYear;

//put into div the current date
var date = document.getElementById('current-day');
date.innerHTML = 'Lista de asistencia hasta el día: ' + today;