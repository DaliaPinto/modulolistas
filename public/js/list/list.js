/**
 * fileoverview: list.js contains all the details in
 * showlist.blade.php view
 * Author: Dalia Patricia Pinto Islas
 * 2016-07-12
 */


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
function drawThAssistence(dt) {
    //put month date in div.
    var monthName = moment(new Date(dt));
    $monthDiv = $('#month-name');
    $monthDiv.append('<i class="fa fa-calendar-check-o" aria="true"></i> '+ ' MES: '+ monthName.format("MMMM").toUpperCase());
    //access to tr days
    var tr = document.getElementById('tr-days');
    //obtain the month
    var month = dt.getMonth();
    //obtain the 4 digits year
    var year = dt.getFullYear();
    //obtain the first day of dt
    dt = new Date(year, month, 01);
    //obtain the dayweek number of dt
    var firstDay = dt.getDay();
    //month plus one, 'cause month format starts in 0
    var months = dt.setMonth(month + 1, 0);
    //obtain the dt last day
    var lastDate = dt.getDate();
    //this variable will print the date in td.
    var dayDate = 1;
    //this variable will count all the days that will be sundays
    var sunday = 0;
    var counter = 0;
    var init = 0;
    //compare if firstDay is 6, the loop will count itself 36 times, else just 35 times
    if (firstDay == 6) {
        counter = 36;
    } else {
        counter = 35;
    }
    //if first day is 0 = dom, counter need to start in 0, else in 1
    if(firstDay == 0){
        init = 0;
    }else{
        init = 1;
    }
    //the number of td that will be create in header list attendance
    for (var i = init; i <= counter; i++) {
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
            } else {
                //put in td the calendar number of the day
                td.innerHTML = dayDate;
            }
            //number of date
            dayDate++;
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
                weekdays.push({date : day, number_day : include.day});
                //weekdays.push(day);
                //console.log(day.getDay());
            }
        });
    });
    //console.log(weekdays);
    return weekdays;
}
/**
 * Obtain the current date in
 *      current-day div
 */
function curDate(){
    var today = moment(new Date());
    $('#is-today').text('Hoy es: '+today.format('dddd, D MMMM YYYY, h:mm:ss a'));
}
/*Updated by Dalia Pinto on 26 jan 2017*/
/**
 * drawTdAssistance create <td> in a loop. it contains a selects with
 * options to mark assistance (just the days when the subjects are impart)
 * and select don't can be show after the current date.
 * @param: dates - object of dates and days
 * @param: data - object of days
 * @param: dt - the month date.
 */
function drawTdAssistence(dates, data, dt){
    //format date
    dt = new Date(dt.getFullYear(), dt.getMonth(), 01);
    //obtain the first number weekday of the month
    var firstDay = dt.getDay(),
        //month format
        months = dt.setMonth(dt.getMonth() + 1, 0),
        //the last day in the month
        lastDate = dt.getDate(),
        //increment and count all the days
        dayDate = 1,
        //no count sundays day
        sunday = 0,
        //the limit of loop
        counter = 0,
        //when the loop starts
        init = 0,
        //A sum of hours in the month
        hours = 0,
        //access to tr-students
        trStudents = document.getElementsByClassName('tr-students'),
        //current day to compare with the date assistance
        today = moment(new Date());

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

    //Access to row
    for(var i = 0; i<trStudents.length; i++) {
        //create new td's
        for (var j = init; j <= counter; j++) {
            var tdAssistance = document.createElement('td');
            //if weekday is 0 (sunday), it doesn't show td
            sunday = j % 7;
            //compare if index is higher than first weekday month
            //and counter days is less than last day date
            if (j >= firstDay && dayDate <= lastDate) {
                //if day isn't sunday
                 if (sunday != 0) {
                     //count the array of date in the month when teacher imparts a class
                     $.each( dates, function(key, value ) {
                         var hour = value.total_hours;
                         //format date class
                         var date = moment(new Date(value.date));
                         //if counter days is the same with date class
                         //and date is less than current day
                         if(dayDate == value.date.getDate() && date.format('YYYY-MM-DD') <= today.format('YYYY-MM-DD')){
                             //create div to put select options
                             var div = document.createElement('div');
                             div.className = 'select-students';
                             //compare if number days is the same between data
                             // array and dates array
                             $.each( data, function(key, valueData ){
                                if(value.number_day == valueData.day){
                                    studentHours(valueData);
                                    showSelect(div, valueData, date.format('YYYY-MM-DD'));
                                }
                             });
                             tdAssistance.appendChild(div);
                         }
                     });
                 }else {
                     //if day is sunday, hide the cell
                     tdAssistance.style = 'display:none;';
                 }
                //increment the counter days in the month
                dayDate++;
             }
             //append td in tr parent node
            trStudents[i].appendChild(tdAssistance);
        }
        //clean dayDate
        dayDate = 1;

    }
}

/**
 *
 * @param hours array hours
 */
function studentHours(data) {

    $.each(data, function (key, value) {
        //console.log(value);
    });
    //$('.tr-students').append('<td class="absence"></td>' + '<td class="attendance"></td>');
}

/**
 *Create a menu options, to change assistance in list
 * @param: div - parent to append select.
 * @param: dates - array of object dates
 * @param: data - array of object days
 */
function showSelect(element, data, dt) {
    //create select element
    var select = document.createElement('select');
    //put class attribute to select.
    select.className = 'select-status';
    //Add function when select is change
    select.onchange = function () {
        obtainValue(this, dt, data);
    };
    //put days array to validate status in options
    validateStatus(select, data);
    //append select in div param.
    element.appendChild(select);
}
/**
 * Put options in select, it depends to hours
 * @param element : parent node
 * @param arrayStatus : status hours array
 */
function menuOptions(element, arrayStatus){
    for(var j = 0; j<arrayStatus.length; j++){
        //create option
        var options = document.createElement('option');
        //value is the status
        options.value = arrayStatus[j];
        //put status
        options.innerHTML = arrayStatus[j];
        //append options in select.
        element.appendChild(options);
    }
}
/**
 * Compare de hours to put the status values in combo
 * @param data: is an objects of days
 * @param element : is parent node
*/
function validateStatus(element, data){
    //is the array values
    var status =[];
    //count total hours in data array
    var totalHours = data.hours.length;
    switch(totalHours){
        case 1:
            status = ['A','/','R','J'];
            menuOptions(element, status);
            break;
        case 2:
            status = ['B','A','/','R','J'];
            menuOptions(element, status);
            break;
        case 3:
            status = ['C','B', 'A','/','R','J'];
            menuOptions(element, status);
            break;
        case 4:
            status = ['D','C', 'B', 'A', '/','R','J'];
            menuOptions(element, status);
            break;
        case 5:
            status = ['E', 'D', 'C', 'B', 'A', '/', 'R','J'];
            menuOptions(element, status);
            break
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
