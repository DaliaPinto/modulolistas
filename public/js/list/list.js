/**
 * fileoverview: list.js contains all the details in
 * showlist.blade.php view
 * Author: Dalia Patricia Pinto Islas
 * 2016-07-12
 */


/*Created by Dalia Pinto on 07 dec 2017*/

//Global status variable
//STATUS = [];

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
    //console.log('dt: '+dt);
    //put month date in div.
    monthName(dt);
    //access to tr days
    var tr = document.getElementById('tr-days');
    //obtain the month
    var month = dt.getMonth();
    //console.log('month: ' + month);
    //obtain the 4 digits year
    var year = dt.getFullYear();
    //console.log('year: '+year);
    //obtain the first day of dt
    dt = new Date(year, month, 01);
    //console.log('dt format :' + dt);
    //obtain the dayweek number of dt
    var firstDay = dt.getDay();
    //console.log('first: ' + firstDay);
    //month plus one, 'cause month format starts in 0
    var months = dt.setMonth(month + 1, 0);
    //console.log('month: '+months);
    //obtain the dt last day
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
    //if first day is 0 = dom, counter need to start in 0, else in 1
    if(firstDay == 0){
        var init = 0;
    }else{
        var init = 1;
    }
    //console.log(counter);
    //the number of td that will be create in header list attendance
    for (var i = init; i <= counter; i++) {
        //create a new td
        var td = document.createElement('td');
        //sunday will should be a seven multiple (cause sunday starts in 0)
        sunday = i % 7;
        /*if the first day is higher than index and last day is smaller than dy var
         *   this loop draws a td elements with a day number, else, just draws a empty td element*/
        if (i >= firstDay && dayDate <= lastDate) {
            //console.log('i: '+i + ' firstDay: '+ firstDay+ ' dayDate: '+dayDate+' lastDate: '+lastDate);
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
            //console.log('dayDate: '+dayDate);
        }
        //add in tr all the td was create
        tr.appendChild(td);
    }
    //create two th, it contains the total hours assistance or absence in the month
    var assistance = document.createElement('td');
    var absence = document.createElement('td');
    assistance.innerHTML = 'A';
    absence.innerHTML = 'F';
    tr.appendChild(assistance);
    tr.appendChild(absence);
}

/**
* Obtain an array of days in a period of time.
 * param: dateStart - when the period starts
 * param: dateEnd - when the period ends
 * param: includeDays - an array of days about number
 *        for example: sun == 0, mon == 1, wen == 3, sat == 6.
 *        it can add just one day or all the week [0], [0,1,6],
 *        or all combinations as possible
 * @return: Array of days in the includeDays array
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
        // cycle days to be included (so==0, mo==1, etc.)
        includeDays.forEach(function(include) {
            //console.log(include);
            if(day.getDay() == include.day) {
                weekdays.push({date : day, number_day : include.day, day_id : include.id});
                //weekdays.push(day);
                //console.log(day.getDay());
                //console.log(weekdays);
            }
        });
    });
    return weekdays;
}
/**
 * Obtain the current date in
 *      current-day div
 */
function monthName(dt){
    var month = moment(new Date(dt));
    var today = moment(new Date());
    $('#month-name').text('MES: '+ month.format("MMMM").toUpperCase());
    $('#cur-date').text('Ultima Actualización: ' + today.format('dddd, D MMMM YYYY, h:mm:ss a'));
}
/*Updated by Dalia Pinto on 26 jan 2017*/
/**
 * drawTdAssistance create <td> in a loop. it contains a selects with
 * options to mark assistance (just the days when the subjects are impart)
 */
function drawTdAssistence(dates, data, dt){
    var month = dt.getMonth(),
        year = dt.getFullYear();
        dt = new Date(year, month, 01);
    var firstDay = dt.getDay(),
        months = dt.setMonth(month + 1, 0),
        lastDate = dt.getDate(),
        dayDate = 1,
        sunday = 0,
        counter = 0,
        init = 0;
    if (firstDay == 6) {
        counter = 36;
    } else {
        counter = 35;
    }
    if(firstDay == 0){
        init = 0;
    }else{
        init = 1;
    }
    var trStudents = document.getElementsByClassName('tr-students'),
        today = moment(new Date());
    for(var i = 0; i<trStudents.length; i++) {
        for (var j = init; j <= counter; j++) {
            var tdAssistance = document.createElement('td');
            sunday = j % 7;
            if (j >= firstDay && dayDate <= lastDate) {
                 if (sunday != 0) {
                     $.each( dates, function(key, value ) {
                         var date = moment(new Date(value.date));
                         if(dayDate == value.date.getDate()){
                             if(date.format('YYYY-MM-DD') <= today.format('YYYY-MM-DD')){
                                 var div = document.createElement('div');
                                 div.className = 'select-students';
                                 showSelect(div, dates, data);
                                 tdAssistance.appendChild(div);
                             }
                         }
                     });
                 }else {
                     tdAssistance.style = 'display:none;';
                 }
                dayDate++;
             }
            trStudents[i].appendChild(tdAssistance);
        }
    }


    //console.log(dates);
    //var trStudents = document.getElementsByClassName('tr-students');
    /*for(var i = 0; i<trStudents.length; i++){
        for(var j = init;j < counter; j++){
            sunday = j % 7;
            if (sunday != 0) {
                var tdAssistance = document.createElement('td');
                tdAssistance.className = 'td-assistance';
                trStudents[i].appendChild(tdAssistance);
                for (var h = 0; h < dates.length; h ++) {
                    if(j==dates[h].date.getDate()){
                        var div = document.createElement('div');
                        div.className = 'select-students';
                        showSelect(div, dates[h], data);
                        tdAssistance.appendChild(div);
                    }
                }
            }
        }
    }*/
}
/**
 *Create a menu options, to change assistance in list
 *param: div - parent to append select.
 */
function showSelect(div, dates, data) {
    //console.log(dates[1].date);
    //console.log(dates);
    //create select element
    var select = document.createElement('select');
    //put class attribute to select.
    select.className = 'select-status';
    //Add function
    select.onchange = function () {
        obtainValue(this, dates, data);
    };
    //put days array to validate status in options
    validateStatus(select, data);
    //append select in div param.
    div.appendChild(select);
}
/**
 * Compare de hours to put the status values in combo
 * @param: data - is an objects of days
*/
function validateStatus(element, data){
    var STATUS =[];
    //console.log(data);
    for(var i = 0; i<data.length; i++){
        var totalHours = data[i].hours.length;
        switch(totalHours){
            case 1:
                STATUS = ['/','R','J'];
                STATUS.splice(0, 0, 'A');
                break;
            case 2:
                STATUS = ['/','R','J'];
                STATUS.splice(0, 0, 'B', 'A');
                break;
            case 3:
                STATUS = ['/','R','J'];
                STATUS.splice(0,0, 'C', 'B', 'A');
                break;
            case 4:
                STATUS = ['/','R','J'];
                STATUS.splice(0,0, 'D', 'C', 'B', 'A');
                break;
            case 5:
                STATUS = ['/','R','J'];
                STATUS.splice(0,0, 'E', 'D', 'C', 'B', 'A');
                break
        }
    }
    for(var j = 0; j<STATUS.length; j++){
        //create option
        var options = document.createElement('option');
        //value is the status
        options.value = STATUS[j];
        //put status
        options.innerHTML = STATUS[j];
        //append options in select.
        element.appendChild(options);
    }
}
/**
 * Convert in correct format day
 * @param: date - obviously is the date
 * @param: days - the number of days that should to add at the @date
*/
function addDays(date, days) {
    var result = new Date(date);
    result.setDate(date.getDate() + days);
    return result;
}