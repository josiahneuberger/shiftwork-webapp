/*
 * Shift Work Calendar WebApp by DesignaQuark
 * DesignaQuark
 * Josiah Neuberger
 * http://designaquark.com
 * designaquark@gmail.com
 * Version 1.0
 *
 * License:
 *
 * Copyright 2014 DesignaQuark: Josiah Neuberger
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *   http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

 
//Globals
var shifts = ["nights", "days", "eves", "off"];
var monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

/***********
 * Creates a schedule a year into the future and the previous 6 months.
 */
function getSchedule(team, row) {

	var pattern = $.jStorage.get("pattern", "");
	var pattern_dateStrings = $.jStorage.get("pattern_dates", "").split(",");
	var pattern_dates = [];
	for (i=0; i<4; i++) {
		pattern_dates.push(Date.parse(pattern_dateStrings[i]));
	}
			
	var now = Date.today();
	var month = now.getMonth();
	var year = now.getFullYear();
	var indexYear, indexMonth;
	var didWeSwitch = false;
	
	
	indexMonth = month;
	indexYear = year;

	for (w=0; w<20; w++) {
	
		
		if (indexMonth > 11) {
			indexYear++;
			indexMonth = (indexMonth - 11) - 1;
		}

		var tableOfMonth = createMonth(team, indexYear, indexMonth, pattern, pattern_dates);
		row.insertCell(w).appendChild(tableOfMonth);
		
		if (w > 11 && didWeSwitch==false) {
			didWeSwitch = true; 
			indexMonth = month-6; 
			indexYear = year;
			
			if (indexMonth<0) {
				indexYear--;
				indexMonth = 12 -(month+1); //must add 1 to offset crossing 0 in zero-based indexing
			}
			w++;
			var h2 = document.createElement("H2");
			h2.innerHTML = "<h2>Previous<br>Months</h2>";
			row.insertCell(w).innerHTML = "<h2>Previous<br>Months<img style='float:right;' src='images/icon_6645.png' /></h2>";
			
		} else {
			indexMonth++;
		}	
	}
}

/********
 * Builds a table that is a month calendar with the pattern applied.
 */
function createMonth(team, year, month, pattern, pattern_dates) {

	var table = document.createElement("TABLE");
	table.className = "table";

	table.insertRow(0).innerHTML = "<th colspan='7' style='background-color:gray; font-size:x-large;'>" + monthNames[month] + ",&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp" + year + "</th>";
	var weekRow = table.insertRow(1);
	weekRow.innerHTML = "<td>Su</td><td>Mo</td><td>Tu</td><td>We</td><td>Th</td><td>Fr</td><td>Sa</td>";
	weekRow.className = "weekdays";

	var date = Date.today().set({millisecond: 0, second: 0, minute: 0, hour: 0, day: 1, month: month, year: year});

	var rowIndex = 2;
	var row = "";
	var RowE;
	var stop = 42;

	//offset the first week
	var offset = date.getDay();
	if (offset==0) {
		for (i=0; i<7; i++) {
			row += "<td class='off'></td>";
		}
		table.insertRow(rowIndex).innerHTML = row;
		rowIndex++;
		stop -= 7;
		row = "";
		
	} else {

		for (i=0; i<offset; i++) {
			row += "<td class='off'></td>";
		}
	}

	var mc = date.getDaysInMonth();
	for (i=offset+1; i<=stop; i++) { 

		var shiftIndex = getShiftIndex(pattern, pattern_dates[team-1], date);

		var shift = shifts[shiftIndex]; 
		if (mc > 0) row += "<td class='" + shift + "'>" + date.toString("d") + "</td>";
		else { row += "<td class='off'> </td>"; }
		
		//update looping parameters
		date = date.addDays(1);
		mc--;

		if (i%7==0) {
			rowE = table.insertRow(rowIndex);
			rowE.innerHTML = row;
			row = "";
			rowIndex++;
		}

	}
	return table;
}

/***********
 * Finds the days between the two given dates inclusively.
 */
function getDaysBetween(date1_f, date2_f) {

	var daysInMilli = (1000*60)*(60)*24;

	var daysBetween = Math.round((date2_f - date1_f)/daysInMilli);

	if (daysBetween < 0) return daysBetween;
	else return daysBetween;
}

/*********
 * Finds the index from the pattern that can be used to index into the shift color and name global variables.
 */
function getShiftIndex(pattern, pattern_date, date) {

	var daysBetween = getDaysBetween(pattern_date, date);
	var patternLength = pattern.length;
	
	var patternUnits = truncate(daysBetween/patternLength);
	
	var dayIndexInPattern;
	if (daysBetween < 0) dayIndexInPattern = ((patternLength) - ((-1*(daysBetween)) - (-1*patternUnits*patternLength)));
	else dayIndexInPattern = (daysBetween) - patternUnits*patternLength;

	var shiftIndex = pattern.charAt(dayIndexInPattern);
	return shiftIndex;
}


/**********
 * Acts as if integer division was done to the passed number by truncating it using the following method:
 * source:
 * https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Math/trunc/
 */
function truncate(x) {
	if (x >=0) return Math.floor(x);
	else return Math.ceil(x);
}

/*************
 * Hides the passed in element (no space is taken up once hidden);
 */
function hide(element) {

	var e = document.getElementById(element);
	if (e.style.display.valueOf() == "none".valueOf()) {
		e.style.display = "block";
	}
	else e.style.display = "none";
}

/**************
 * Shows an alert box containing information about application.
 */
function showIconAbout() {
	
	var info = "The icons listed here can be found at:\n";
	info += "http://www.thenounproject.com\n\n";
	info += "Info Icon:\t\tKarthick Nagarajan - Icon #5134\n"
	
	window.alert(info);
}

/**************
 * Shows an alert box containing information about application.
 */
function showAbout() {
	
	var info = "";
	info += "Shift Work Calendar WebApp by DesignaQuark\n";
	info += "Version: 1.0\n";
	info += "Author: Josiah Neuberger\n";
	info += "Contact: http://designaquark@gmail.com\n";
	info += "\n\nLicense:\n" + getLicenseInfo() + "\n";
	
	alert(info);
}

/********
 * Provides the license and copyright info for this app.
 */
function getLicenseInfo() {

	var l =  "";
	
	l += "Copyright 2014 DesignaQuark: Josiah Neuberger\n\n";
	
	l += "Licensed under the Apache License, Version 2.0 (the \"License\");\n";
	l += "you may not use this file except in compliance with the License.\n";
	l += "You may obtain a copy of the License at\n\n";

	l += "	http://www.apache.org/licenses/LICENSE-2.0\n\n";

	l += "Unless required by applicable law or agreed to in writing, software\n";
	l += "distributed under the License is distributed on an \"AS IS\" BASIS,\n";
	l += "WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.\n";
	l += "See the License for the specific language governing permissions and\n";
	l += "limitations under the License.\n";
	l += "return license;\n";
	
	return l;
}

