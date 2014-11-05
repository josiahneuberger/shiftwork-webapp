<!DOCTYPE HTML>
<html lang="en">
<head>
	<title>Shift Work Web App by Josiah Neuberger</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<!--
	Built on top of Read Only by HTML5 UP Template
	html5up.net | @n33co
	unmodified version of template in assets folder.
	-->
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
	<!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
	<script src="js/jquery.min.js"></script>
	<script src="js/skel.min.js"></script>
	<script src="js/skel-layers.min.js"></script>
	<script src="js/init.js"></script>
	<noscript>
		<link rel="stylesheet" href="css/skel.css" />
		<link rel="stylesheet" href="css/style.css" />
		<link rel="stylesheet" href="css/style-xlarge.css" />
	</noscript>
	<!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
	<script type="text/javascript" src="js/css_browser_selector.js"></script>
	<script src="js/json2.js"></script>
	<script type="text/javascript" src="js/date.js"></script>
	<script src="js/jstorage.js"></script>
	<script> /* $.jStorage is now available */ </script>
	<script src="js/jquery.dropotron.js"></script>
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

	<style>

		.side_label {
			padding: 0px 0px 0px 0px;
			position:relative;
			width:200px;
			height:200px;
			left:38%;
			top:0%;
			z-index:3
		}

		.menuli {
		}
		
		.menuli1 {
			list-style-type:inherit;
			background-image:url('images/icon_1064s.png');
			background-repeat:no-repeat;
			background-position:2px 2px
		}
		
		.menuli2 {
			list-style-type:inherit;
			background-image:url('images/icon_5134.png');
			background-repeat:no-repeat;
			background-position:2px 2px
		}
		
		.menuli3 {
			list-style-type:inherit;
			background-image:url('images/icon_1667.png');
			background-repeat:no-repeat;
			background-position:2px 2px
		}
		
		.menuli4 {
			list-style-type:inherit;
			background-image:url('images/icon_36.png');
			background-repeat:no-repeat;
			background-position:2px 2px
		}
		
		.menubutton {
			width:200px;
			background:none!important;
			border:none; 
			padding:0!important;
			cursor: pointer;
			font-color:white;
		}

		.central {
			position:relative;
			left:3%;
			padding-top:3%;
		}

		.schedule {
			background-color:transparent;
			overflow-x:scroll; 
			position:relative;
			display:block;
			width:80%;
			left:5%;
		}
		
		.schedule-top {
			position:relative;
			display:block;
			width:80%;
			left:5%;
		}
		
		#wrapper {
			background: transparent;
		}
		
		#footer {
			background: transparent;
		}
		
		body {
			background-image: url(subtlepatterns/fresh_snow.png);
			background-repeat:repeat;
		}

		#logo-header {
			background-image: url(subtlepatterns/use_your_illusion.png);
			background-repeat:repeat;
			position:relative;
			height:250px;
			width:auto;
			z-index:-1;
		}

		#header {
			background-image: url(subtlepatterns/grey_wash_wall.png);
			background-repeat:repeat;
		}	

		.table2 {
			border-spacing: 20px;
			border-collapse: separate;
		}

		.table {
			display:table;
			min-width:300px;
			table-layout:fixed;
			margin:5%;
			empty-cells: show;
			border:inset #003D52 6px;
			border-spacing: none;
			border-collapse: separate;	
		}

		.table tr {
			text-align:center;
		}
		
		.table th {
			color:black;
		}

		.table td {
			display:table-cell;
			width:40px;
			height:30px;
			border:solid black 1px;
			text-align:center;
			color:black;
			
		}

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
			top:15%;
			left:5%;
			font-size:0.7em;
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

</head>
<body>
<div id="logo-header"><img src="./logos/your_logo.png" style="max-width:50%; width:50%; z-index:-1;" /></div>
<noscript><div><p>no javascript</p></div></noscript>

<div id="wrapper">
<!-- Header -->
	<div><a target="_blank" href="http://designaquark.com">http://designaquark.com</a></div>
	<section id="header" class="skel-layers-fixed">
		<header>
			<small>Site:</small><br>
			<h1 id="logo"><a target=_blank href="#">Your Company Name</a></h1>
		</header>
		
		<nav id="main-nav">
			<ul>
				<li class="menuli"><button style="font-size:xx-large;">Menu</button>
				
					<ul>
						<li class="menuli3"><button class="menubutton" onclick="window.open('http://designaquark.com', '_blank')">DesignaQuark</button></li>	
						<li class="menuli4" style="list-style-image:url('images/icon_5134.png');"><button class="menubutton">Third-Party Attribution</button>
							<ul>
								<li class="menuli3"><button class="menubutton" onclick="window.open('https://github.com/n33/jquery.dropotron', '_blank')">Dropotron Menu</button></li>
								<li class="menuli3"><button class="menubutton" onclick="window.open('https://github.com/n33/skel', '_blank')">Skel</button></li>
								<li class="menuli3"><button class="menubutton" onclick="window.open('http://html5up.net/read-only', '_blank')">HTML5 UP (Read Only)</button></li>
								<li class="menuli3"><button class="menubutton" onclick="window.open('http://thenounproject.com/', '_blank')">The Noun Project</button></li>
								<li class="menuli2"><button class="menubutton" onclick="showIconAbout()">Icon Attribution</button></li>
								<li class="menuli3"><button class="menubutton" onclick="window.open('http://subtlepatterns.com/', '_blank')">Subtle Patterns</button></li>
								<li class="menuli3"><button class="menubutton" onclick="window.open('http://ridjohansen.github.io/css_browser_selector/index_en.html', '_blank')">CSS Browser Selector</button></li>
								<li class="menuli3"><button class="menubutton" onclick="window.open('http://www.datejs.com/', '_blank')">DateJS</button></li>
								<li class="menuli3"><button class="menubutton" onclick="window.open('http://www.json.org/', '_blank')">JSON</button></li>
								<li class="menuli3"><button class="menubutton" onclick="window.open('http://jquery.com/', '_blank')">jQuery</button></li>
								<li class="menuli3"><button class="menubutton" onclick="window.open('http://www.jstorage.info/', '_blank')">jStorage</button></li>
							</ul>
						</li>
						<li class="menuli4" style="list-style-image:url('images/icon_5134.png');">
							<button class="menubutton">Open Source Licenses</button>
							<ul>
								<li class="menuli3"><button class="menubutton" onclick="window.open('http://opensource.org/licenses/mit-license.php', '_blank')">Dropotron License</button></li>
								<li class="menuli3"><button class="menubutton" onclick="window.open('http://opensource.org/licenses/mit-license.php', '_blank')">Skel	 License</button></li>
								<li class="menuli3"><button class="menubutton" onclick="window.open('http://html5up.net/license', '_blank')">HTML5 Up License</button></li>
								<li class="menuli3"><button class="menubutton" onclick="window.open('http://creativecommons.org/licenses/by-sa/3.0/', '_blank')">Subtle Patterns License</button></li>
								<li class="menuli3"><button class="menubutton" onclick="window.open('http://creativecommons.org/licenses/by/2.5/', '_blank')">CSS Browser Selector</button></li>
								<li class="menuli3"><button class="menubutton" onclick="window.open('http://opensource.org/licenses/mit-license.php', '_blank')">DateJS License</button></li>
								<li class="menuli3"><button class="menubutton" onclick="window.open('http://opensource.org/licenses/mit-license.php', '_blank')">jQuery License</button></li>
								<li class="menuli3"><button class="menubutton" onclick="window.open('http://www.json.org/license.html', '_blank')">JSON License</button></li>
								<li class="menuli3"><button class="menubutton" onclick="window.open('http://unlicense.org/', '_blank')">jStorage License</button></li>
							</ul>
						</li>
					</ul>
				</li>
				
				<li class="menuli2"><button class="menubutton" onclick="showAbout()">About App</button></li>
				<li class="menuli1"><button class="menubutton" onclick="hide('calendar1')">Team #1:+/-</button></li>
				<li class="menuli1"><button class="menubutton" onclick="hide('calendar2')">Team #2:+/-</button></li>
				<li class="menuli1"><button class="menubutton" onclick="hide('calendar3')">Team #3:+/-</button></li>
				<li class="menuli1"><button class="menubutton" onclick="hide('calendar4')">Team #4:+/-</button></li>
			</ul>
		</nav>

		<div class="side_label">
			<br><br>
			<div class="circle" style="background-color:#993300; position:relative; left:15%;"><div>Nights</div></div>
			<div class="circle" style="background-color:#33cccc; position:relative; left:0px;"><div>Days</div></div>
			<div class="circle" style="background-color:#666699; position:relative; left:30%; top:-27%;"><div>Eves</div></div>
		</div>
	</section>
	
	<div class="central">
		<div id="one" class+="schedule-top"><h2 style="text-decoration:underline; color:black;">Team #1</h2></div><div id="calendar1" class="schedule"></div>

		<div id="two" class+="schedule-top"><h2 style="text-decoration:underline; color:black;">Team #2</h2></div><div id="calendar2" class="schedule"></div>

		<div id="three" class+="schedule-top"><h2 style="text-decoration:underline; color:black;">Team #3</h2></div><div id="calendar3" class="schedule"></div>
		
		<div id="four" class+="schedule-top"><h2 style="text-decoration:underline; color:black;">Team #4</h2></div><div id="calendar4" class="schedule"></div>
		
	</div>
	
		<!-- Footer -->
	<section id="footer">
		<div class="container">
			<ul class="copyright">
				<li>&copy; 2014. DesignaQuark Josiah Neuberger, Apache License, Version 2.0</li>
				<li>Built on top of the <a href="http://html5up.net/read-only">HTML5 UP</a> Template: Read Only</li>
				<li><a href="http://html5up.net/license">Template License</a></li>
			</ul>
		</div>
	</section>
</div>




</body>

</html>