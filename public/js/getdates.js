/*Created by Dalia Pinto on 07 dec 2017*/

/**
* This function make a days header <th> in a table list.
*/

//access to tr days
var tr = document.getElementById('tr-days');
//current date
var dt= new Date();
//obtain the month
var month=dt.getMonth();
//obtain the 4 digits year
var year=dt.getFullYear();
//current format day
dt=new Date(year, month, 01);
//obtain the actual month first day
var firstDay=dt.getDay();
//month plus one, because month format starts in 0
var months = dt.setMonth(month+1,0);
//obtain the actual month last day
var lastDate=dt.getDate();
//this variable shows the empty days if month starts in day 1, 2 or others.
var dy=1;
//the number of td that will be created
for(i=0;i<=34;i++){
    //if the first day is higher than index and last day is less than dy var
    //this loop draws a td elements with a day number, else, just draws a empty td element
    if((i>= firstDay) && (dy<= lastDate) && firstDay){
        var td= document.createElement('td');
        td.innerHTML = dy;
        dy=dy+1;
    }else{
        var td= document.createElement('td');
    }
    //add in tr all the td
    tr.appendChild(td);
}
//create two th, it contains the total hours assistence or absence in the month
//about students
var assistance =  document.createElement('td');
var absence =  document.createElement('td');
assistance.innerHTML = 'A';
absence.innerHTML = 'F';
tr.appendChild(assistance);
tr.appendChild(absence);

/**
*Also td is createn in a loop. it contains a selects with
*options to mark assistance (just the days when de subjects are impart)
*/
//acces to tr students
var trStudents = document.getElementsByClassName('tr-students');
//draw td in trStudents
for(i=0;i<trStudents.length;i++){
    for(j=0;j<=36;j++){
        //create a new td and this will add in trStudents
        var tdAssistance = document.createElement('td');
        trStudents[i].appendChild(tdAssistance);
    }
}


/**
* this function count the dates in a period
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
/**
*This funciont compare the days depends the pariod
* and the number of weekday
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
var today = dayOfWeek + " " + dayOfMonth + " de " + curMonth + " del " + curYear;
var month = curMonth;

var month = document.getElementById('month-name');
month.innerHTML = 'MES: ' + curMonth;
//put into div the current date
var date = document.getElementById('current-day');
date.innerHTML = 'Lista de asistencia hasta el día: ' + today;