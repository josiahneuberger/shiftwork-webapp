<!DOCTYPE html>
<!--
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
-->
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<style>

.side_label {

	padding: 0px 0px 0px 20px;
	position:fixed;
	left:130px; left:13rem;
	top:330px;
	width:185px;
	height:200px;
	z-index:3
}

.chrome .side_label { left:20rem; }

@media only screen and (-webkit-min-device-pixel-ratio: 1.5) { .side_label { left:5rem; position:absolute; }}

.side_label2 {
	padding: 0px 0px 0px 20px;
	position:fixed;
	left:195px; left:19.5rem;
	top:430px;
	width:185px;
	height:200px;
	z-index:3
}

.chrome .side_label2 { left:25rem; }
@media only screen and (-webkit-min-device-pixel-ratio: 1.5) { .side_label2 { left:12rem; position:absolute; }}

.debug_label {

	padding: 0px 0px 0px 20px;
	position:absolute;
	float:left;
	left:100px;
	top:600px;
	width:185px;
	height:200px;
	z-index:3	
}


.menuli {
	list-style-image: url('images/icon_36.png'); 
}
.menubutton {
	width:200px;
}

.schedule {
	overflow-x:scroll; 
	position:relative;
	display:block;
	width:750px;
	left:200px;
}

.schedule-top {
	position:relative;
	display:block;
	width:750px;
	left:200px;
}

header {
	background-image: url(subtlepatterns/use_your_illusion.png);
	background-repeat:repeat;
	
	position:relative;
	padding:25px;
	margin-left:auto;
	margin-right:auto;
	top:20px;
	height:230px;
	width:1100px;
}

body {
	background-image: url(subtlepatterns/grey_wash_wall.png);
	background-repeat:repeat
  
}

footer {
	position:relative;
	bottom: 10px;
	text-align:center;
}


.central {
	background-image: url(subtlepatterns/fresh_snow.png);
	background-repeat:repeat;
	position:relative;
	margin-left:auto;
	margin-right:auto;
	top:20px;
	width:1000px;
	height:1440px;
	padding: 35px 75px 75px 75px;
}

.table {
    display:table;
    width:250px;
    table-layout:fixed;
	margin-right:5px;
}

.chrome .table { margin-right:20px; }
@media only screen and (-webkit-min-device-pixel-ratio: 1.5) { .table { margin-right:30px; }}

.table tr {
	text-align:center;
}

.table td {
	display:table-cell;
	width:25px;
	height:25px;
	border:solid black 1px;
	text-align:center;
	margin:2px;
}

@media only screen and (-webkit-min-device-pixel-ratio: 1.5) { .table td { margin: 35px; }}

.weekdays td {
	border:none;
	background-color:silver;
	color:white;
}

.days {
	border:none;
	background-color:#33cccc;
}

.nights {
	border:none;
	background-color:#993300;
}
.eves {
	border:none;
	background-color:#666699;
}
.off {
	border:none;
	background-color:white;
}

.circle {
	background:red;
	width:50px;
	height:50px;
	border-radius:50px;
	margin-bottom:3px;
}

.circle div {
	position:relative;
	top:35%;
	left:20%;
	font-size:0.8em;
	font-color:black;
}

<!--Dropotron Menu-->
#main-nav ul { margin: 0; padding: 0;  }
#main-nav ul li { margin: 0 0em 0 0em; padding: 0.0em 0.75em 0.0em 0.75em; border-radius: 0.5em; }
#main-nav ul li.active { background: #999; }
#main-nav ul li.active a { color: #fff; text-decoration: none; }
.dropotron { background: #444; border-radius: 0.5em; list-style: none; margin: 0; min-width: 10em; padding: 0.75em 1em 0.75em 1em; }
.dropotron > li { border-top: solid 1px #555; margin: 0; padding: 0; }
.dropotron > li:first-child { border-top: 0; }
.dropotron > li > a { color: #ccc; display: block; padding: 0.5em 0 0.5em 0; text-decoration: none; }
.dropotron > li.active > a, .dropotron > li:hover > a { color: #fff; }
.dropotron.level-0 { margin-top: 1.25em; }
.dropotron.level-0:before { content: ''; position: absolute; border-bottom: solid 0.5em #444; border-left: solid 0.5em transparent; border-right: solid 0.5em transparent; top: -0.5em; }


</style>
<script>
	//http://css-tricks.com/theres-more-to-the-css-rem-unit-than-font-sizing/
	//https://gist.github.com/brianblakely/3106678
	function remCalibrate() {
	    var aspect_ratio =  (window.innerHeight/window.innerWidth)/0.75
		var vwh =  window.innerWidth/100
		var rem = Math.max(8,Math.min(24,vwh*aspect_ratio))
		
		document.documentElement.style.fontSize = window.innerWidth/100 + 'px';
	}
	remCalibrate();
	window.addEventListener('resize', remCalibrate, false);
</script>
<script type="text/javascript" src="js/css_browser_selector.js"></script>
<script src="js/json2.js"></script>
<script type="text/javascript" src="js/date.js"></script>
<script src="js/jquery.min.js"></script>
<script src="js/jstorage.js"></script>
<script> /* $.jStorage is now available */ </script>
<script src="js/jquery.dropotron.min.js"></script>
<script src="js/tea-block.js"></script>
<script type="text/javascript" src="js/utility.js"></script>
<?php include 'php/utility.php'; ?>
<?php setPattern();?>

<!--<script type="text/javascript" src="js/date.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/json2/20110223/json2.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
<script src="https://raw.githubusercontent.com/andris9/jStorage/master/jstorage.js"></script>
<script> /* $.jStorage is now available */$.jStorage.get("isFirstRun", true) </script>
<script src="dropotron/jquery.dropotron.min.js"></script>
<script type="text/javascript" src="js/createMonth.js"></script>-->

<script>
	$(function() {
		
		// Note: make sure you call dropotron on the top level <ul>
		$('#main-nav > ul').dropotron({ 
			offsetY: -200// Nudge up submenus by 10px to account for padding
		});
	
	});
</script>
</head>
<body>
<header>
<div><img style="display:block; margin:auto;" src="logos/your_logo.png" /></div>
</header>
<noscript><div><p>no javascript<p></div></noscript>



<nav id="main-nav" class="side_label" >
	<div><a target=_blank href="http://designaquark.com">http://designaquark.com</a></div>
	<ul>
		<li style="list-style-image: url('images/icon_1064.png');">
			<a href=""><button style="font-size:xx-large;">Menu</button><br></a>
		</li>
		
		<ul>
			<li class="menuli"><button class="menubutton" onclick="window.open('http://designaquark.com', '_blank')">DesignaQuark</button></li>	
			<li class="menuli"><button class="menubutton" style="width:200px;" onclick="hide('calendar1')">Team #1:+/-</button></li>
			<li class="menuli"><button class="menubutton" onclick="hide('calendar2')">Team #2:+/-</button></li>
			<li class="menuli"><button class="menubutton" onclick="hide('calendar3')">Team #3:+/-</button></li>
			<li class="menuli"><button class="menubutton" onclick="hide('calendar4')">Team #4:+/-</button></li>
			<li class="menuli" style="list-style-image:url('images/icon_5134.png');"><button class="menubutton" onclick="showAbout()">About App</button></li>
			<li class="menuli" style="list-style-image:url('images/icon_5134.png');">
				<button class="menubutton">Third-Party Attribution</button>
				<ul>
					<li class="menuli"><button class="menubutton" onclick="window.open('https://github.com/n33/jquery.dropotron', '_blank')">Dropotron Menu</button></li>
					<li class="menuli"><button class="menubutton" onclick="window.open('http://thenounproject.com/', '_blank')">The Noun Project</button></li>
					<li class="menuli"><button class="menubutton" onclick="showIconAbout()">Icon Attribution</button></li>
					<li class="menuli"><button class="menubutton" onclick="window.open('http://subtlepatterns.com/', '_blank')">Subtle Patterns</button></li>
					<li class="menuli"><button class="menubutton" onclick="window.open('http://ridjohansen.github.io/css_browser_selector/index_en.html', '_blank')">CSS Browser Selector</button></li>
					<li class="menuli"><button class="menubutton" onclick="window.open('http://www.datejs.com/', '_blank')">DateJS</button></li>
					<li class="menuli"><button class="menubutton" onclick="window.open('http://www.json.org/', '_blank')">JSON</button></li>
					<li class="menuli"><button class="menubutton" onclick="window.open('http://jquery.com/', '_blank')">jQuery</button></li>
					<li class="menuli"><button class="menubutton" onclick="window.open('http://www.jstorage.info/', '_blank')">jStorage</button></li>
				</ul>
			</li>
			<li class="menuli" style="list-style-image:url('images/icon_5134.png');">
				<button class="menubutton">Open Source Licenses</button>
				<ul>
					<li class="menuli"><button class="menubutton" onclick="window.open('http://opensource.org/licenses/mit-license.php', '_blank')">Dropotron License</button></li>
					<li class="menuli"><button class="menubutton" onclick="window.open('http://creativecommons.org/licenses/by-sa/3.0/', '_blank')">Subtle Patterns License</button></li>
					<li class="menuli"><button class="menubutton" onclick="window.open('http://creativecommons.org/licenses/by/2.5/', '_blank')">CSS Browser Selector</button></li>
					<li class="menuli"><button class="menubutton" onclick="window.open('http://opensource.org/licenses/mit-license.php', '_blank')">DateJS License</button></li>
					<li class="menuli"><button class="menubutton" onclick="window.open('http://opensource.org/licenses/mit-license.php', '_blank')">jQuery License</button></li>
					<li class="menuli"><button class="menubutton" onclick="window.open('http://www.json.org/license.html', '_blank')">JSON License</button></li>
					<li class="menuli"><button class="menubutton" onclick="window.open('http://unlicense.org/', '_blank')">jStorage License</button></li>
				</ul>
			</li>
		</ul>
	</ul>
</nav>

<div class="side_label2">
	<div class="circle" style="background:#993300"><div>Nights</div></div>
	<div class="circle" style="background:#33cccc"><div>Days</div></div>
	<div class="circle" style="background:#666699"><div>Eves</div></div>
</div>

<div class="central">	
	
	<div class="schedule-top"><h2 style="text-decoration:underline;">Team #1</h2></div><div id="calendar1" class="schedule"></div>

	<div class="schedule-top"><h2 style="text-decoration:underline">Team #2</h2></div><div id="calendar2" class="schedule"></div>

	<div class="schedule-top"><h2 style="text-decoration:underline">Team #3</h2></div><div id="calendar3" class="schedule"></div>

	<div class="schedule-top"><h2 style="text-decoration:underline">Team #4</h2></div><div id="calendar4" class="schedule"></div>
</div>

<script>

for (z=1; z<=4; z++) {
	table = document.createElement("TABLE");
	row = table.insertRow(0);
			
	getSchedule(z, row);
	document.getElementById("calendar" + z).appendChild(table);	
}
</script>
<footer><small>© Copyright 2014, DesignaQuark Josiah Neuberger, Apache License, Version 2.0</small></footer>
</body>
</html>