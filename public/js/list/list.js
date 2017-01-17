/*Created by Dalia Pinto on 07 dec 2017*/


//access to tr students
var tdNumber = document.getElementsByClassName('student-number');
/**
 * Add student list number
 */
for(var i=0;i<tdNumber.length;i++){
    tdNumber[i].innerHTML = i+1;
}
/**
 * This function make a days header <th> in a table list,
 * it compare the argument month, and draw the number date about the day
 * param : dt - is the date by the month of the list (could be any day)
*/
function daysMonth(dt) {
    //console.log(dt);
    //access to tr days
    var tr = document.getElementById('tr-days');
    //obtain the month
    var month = dt.getMonth();
    //console.log(month);
    //obtain the 4 digits year
    var year = dt.getFullYear();
    //current month format
    dt = new Date(year, month, 01);
    //obtain the actual month first day
    var firstDay = dt.getDay();
    //console.log('first ' + firstDay);
    //month plus one, 'cause month format starts in 0
    var months = dt.setMonth(month + 1, 0);
    //obtain the actual month last day
    var lastDate = dt.getDate();
    //console.log('last ' + lastDate);
    //this variable will print the date in td.
    var dayDate = 1;
    //this variable will count all the days that will be sundays
    var sunday = 0;
    //compare if firstDay is 6, the loop will count itself 36 times, else just 35 times
    if (firstDay == 6) {
        var counter = 36;
    } else {
        var counter = 35;
    }
    //console.log(counter);
    //the number of td that will be create in header list attendance
    for (var i = 1; i <= counter; i++) {
        //create a new td
        var td = document.createElement('td');
        //sunday will should be a seven multiple (cause sunday starts in 0)
        sunday = i % 7;
        /*if the first day is higher than index and last day is smaller than dy var
         *   this loop draws a td elements with a day number, else, just draws a empty td element*/
        if (i >= firstDay && dayDate <= lastDate) {
            //dont show a sunday td
            if (sunday == 0) {
                td.style = 'display:none;';
                //console.log('sunday ' + dayDate);
            } else {
                //put in td the calendar number of the day
                td.innerHTML = dayDate;
                //console.log('not sunday ' + dayDate);
            }
            //number of date
            dayDate++;
        } else {
            //create an empty td
            var td = document.createElement('td');
        }
        //add in tr all the td was create
        tr.appendChild(td);
    }
    //create two th, it contains the total hours assistence or absence in the month
    var assistance = document.createElement('td');
    var absence = document.createElement('td');
    assistance.innerHTML = 'A';
    absence.innerHTML = 'F';
    tr.appendChild(assistance);
    tr.appendChild(absence);
}
/**
 * drawTdAssistance create <td> in a loop. it contains a selects with
 * options to mark assistance (just the days when the subjects are impart)
 */
function drawTdAssistence(dates, hours){
    console.log(hours);
    var trStudents = document.getElementsByClassName('tr-students');
    for(var i = 0; i<trStudents.length; i++){
        for(var j = 2;j < 38; j++){
            var sunday = j % 7;
            if (sunday != 0) {
                var tdAssistance = document.createElement('td');
                tdAssistance.className = 'td-assistance';
                trStudents[i].appendChild(tdAssistance);
                for (var h = 0; h < dates.length; h ++) {
                    if(j==dates[h].getDate()){
                        var div = document.createElement('div');
                        div.className = 'select-students';
                        showSelect(div, hours);
                        tdAssistance.appendChild(div);
                    }
                }
            }
        }
    }
}
/**
*Create a menu options, to change assistance in list
*param: div - parent to append select.
*/
function showSelect(div, hours) {
    //create select element
    var select = document.createElement('select');
    //put class attribute to select.
    select.className = 'select-status';
    //array of status
    var status = ['A', 'B', 'C', 'D', 'E','/', 'R', 'J'];
    //loop 8 times, cause are 8 options
    for(var i = 0; i<8; i++){
        //create option
        var options = document.createElement('option');
        //value is the status
        options.value = status[i];
        //put status
        options.innerHTML = status[i];
        //append options in select.
        select.appendChild(options);
    }
    //append select in div param.
    div.appendChild(select);
}


/**
* Obtain an array of days in a period of time.
 * param: dateStart - when the period starts
 * param: dateEnd - when the period ends
 * param: includeDays - an array of days about number
 *        for example: sun == 0, mon == 1, wen == 3, sat == 6.
 *        could add just one day or all the week [0], [0,1,6],
 *        or all combinations as possible
*/
function getDates(dateStart, dateEnd, includeDays) {
    var currentDate = dateStart,
        dates = [],
        weekdays = [];
    //repeat the loop while start period will be less than end period
    while(currentDate <= dateEnd){
        // append date to array
        dates.push(currentDate);
        // add one day
        // automatically rolling over to next month
        var d = new Date(currentDate.valueOf()); //console.log(d);
        d.setDate(d.getDate() + 1);
        //currentDate is rolling at the next day
        currentDate = d; //console.log(currentDate);
    }
    //cycle dates
    dates.forEach(function(day){
        //console.log(day);
        // cycle days to be included (so==0, mo==1, etc.)
        includeDays.forEach(function(include) {
            //console.log(include);
            if(day.getDay() == include) {
                weekdays.push(day);
                //console.log(day.getDay());
                //console.log(weekdays);
            }
        });
    });
    //console.log(dates);
    return weekdays;
    console.log(weekdays);
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
month.innerHTML = 'MES: ' + curMonth.toUpperCase();
//put into div the current date
var date = document.getElementById('current-day');
date.innerHTML = 'Lista de asistencia hasta el día: ' + today;
