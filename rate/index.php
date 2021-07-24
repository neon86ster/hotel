<?php
session_start();
include("../include/eg.inc.php");
$eg = new eg();

$sql="select * from room_suite order by room_id ";
$rs=$eg->get_data($sql);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<meta name="keywords" content="oasis Luxury,Oasis Baan Sean Doi Spa Resort,Chiangmai boutique hotel,luxury hotel,5 star resort,hotels in Chiang Mai,hotel rooms and Suites,hotel and spa,accommodations in Chiang Mai,wellness resort,retreat, rooms, spa vacation,Oasis Spa,Thailand,บ้านแสนดอย,โรงแรม,ที่พีกเชียงใหม่,เชียงใหม่ที่พัก,รีสอร์ทเชียงใหม่,เชียงใหม่รีสอร์ท, ห้องพักเชียงใหม่,ที่พัก,รีสอร์ท,โรงแรม,โรงแรมที่เชียงใหม่,โรงแรมโอเอซิสส, รีสอร์ทที่เชียงใหม่" />
<meta name="description" content="Oasis Baan Saen Doi Spa Resort. This is the secret Chiang Mai hideaway, a luxury boutique resort with all five star amenities. ">

<title>Rates,  Oasis Baan Saen Doi Spa Resort</title>
<link rel="stylesheet" type="text/css" media="screen" href="../css/reset.css">
<link rel="stylesheet" type="text/css" media="screen" href="../css/layout.css">
<link rel="stylesheet" type="text/css" media="screen" href="../css/style.css">
<link rel="stylesheet" type="text/css" media="screen" href="../themes/base/ui.all.css">
<link rel="stylesheet" type="text/css" media="screen" href="../css/selectBox.css">
<link rel="stylesheet" type="text/css" media="screen" href="../css/fancybox.css">
<link rel="icon" href="../images/favicon.ico" type="image/x-icon" />
<script type="text/javascript" src="../jquery/jquery.min.js"></script>
<script type="text/javascript" src="../jquery/jquery-ui.js"></script>
<script type="text/javascript" src="../scripts/ajax.js"></script>
<script type="text/javascript" src="../scripts/slideshow.js"></script>
<script type="text/javascript" src="../scripts/datepicker.js"></script><!--date picker-->
<script type="text/javascript" src="../jquery/jquery.selectBox.js"></script><!--select box-->
<script type="text/javascript" src="../scripts/fancybox.js"></script><!--fancybox-->

<!--
<script type="text/javascript" src="http://www.webrezpro.com/Javascript/embed_bookingrequest.version19.js?hotel_id=1142&format=landscape&max_adults=6&flag_no_jquery=1"></script> 
-->
</head>
<!--<body onLoad="EmbedBookingRequest_OnLoad()">-->
<body>
<div id="wrappertop"></div>
<div id="wrapperline"></div>
<div id="wrapperhead"></div>
<div id="wrapperbody"></div>
<div id="wrapperfooter"></div>
<div class="wrapper">
		<div class="header">
			<div class="header_line"></div>
			<div class="header_line1"></div>
			
			<div id="navigate">
				<div id="position1">
				<span class="class">
					<a href="../home.php">Home</a>&nbsp&nbsp.&nbsp
					<a href="../presskit/index.php">Press Kit</a>&nbsp&nbsp.&nbsp
					<a href="../help/index.php">Help & Contact </a>
				</span>
				</div>
			</div>
			
			<div class="header_logo">
				<h1><span></span>The Oasis Luxury Thailand, Simply Unforgettable</h1>
					<div id="position2">
							<div id="nav-menu" class="nav-menu">
							<ul class="nav">
								<li><a href="../specialoffer/index.php">SPECIAL OFFERS</a></li>
								<li><a href="../discoverchiangmai/index.php">DISCOVER CHIANG MAI</a></li>
								<li><a href="../sparelaxation/index.php">SPA & WELLNESS</a></li>
							</ul>
							</div> 
					
					</div>
			</div>
		
			<div class="body_line1"></div>
		</div>	
		
	

			<div id="reservation">
					<div id="block"></div>
					<div id="text">
					<h2><span></span>Online Reservation</h2>
						<!--<script type="text/javascript">
						EmbedBookingRequest_ReturnHTML();
						</script>-->
						<form name="searchform" action="https://secure5.worldweb.com/Bookings-cr/activity-edit.html" method="get">
						<input name="table" value="hotels" type="hidden">
						<input name="listing_id" value="1142" type="hidden">
						<input name="hotel_id" value="1142" type="hidden">
						<input name="mode" value="command" type="hidden">
						<input name="command" value="pleasewait" type="hidden">
						<input name="nextcommand" value="roomsearch" type="hidden">
						<input name="area_id" value="" type="hidden">
						<input name="reservationcode_id" value="" type="hidden">
						<input name="location_id" value="" type="hidden">
						<input name="language" value="english" type="hidden">
						<table><tbody><tr>
						<td style="font-family: arial; font-size: 8pt;;text-align:left; " align="LEFT" valign="BOTTOM">Arrival Date
						<br><input name="date_from" id="date_from" value="" size="10" style="width:64px;height:12pt;font-family: arial; font-size: 8pt;;text-align:left;color:black;" readonly="readonly" type="text"></td>
						<td style="font-family: arial; font-size: 8pt;;text-align:left;" valign="BOTTOM">Nights
						<br><select class="selectBox" name="num_nights" style="width: 50px; height: 12pt; font-family: arial; font-size: 8pt; text-align: left; color: black; display: none;"><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option><option value="32">32</option><option value="33">33</option><option value="34">34</option><option value="35">35</option><option value="36">36</option><option value="37">37</option><option value="38">38</option><option value="39">39</option><option value="40">40</option><option value="41">41</option><option value="42">42</option><option value="43">43</option><option value="44">44</option><option value="45">45</option><option value="46">46</option><option value="47">47</option><option value="48">48</option><option value="49">49</option></select></td>
						<td style="font-family: arial; font-size: 8pt;;text-align:left;" valign="BOTTOM">Adults<br><select class="selectBox" name="num_adults" style="width: 50px; height: 12pt; font-family: arial; font-size: 8pt; text-align: left; color: black; display: none;"><option value="1" selected="">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option></select></td>
						<td style="font-family: arial; font-size: 8pt;;text-align:left;" valign="BOTTOM"></td>
						<td style="font-family: arial; font-size: 8pt;;text-align:left;" valign="BOTTOM"></td>
						<td style="font-family: arial; font-size: 8pt;;text-align:left;" valign="BOTTOM"></td>
						<td style="font-family: arial; font-size: 8pt;;text-align:left;" valign="BOTTOM"></td>
						<td style="font-family: arial; font-size: 8pt;;text-align:left;" valign="bottom"><input style="height:15pt;font-family: arial; font-size: 8pt;;text-align:left;color:black;" value="Availability Search" type="submit"></td>
						</tr></tbody></table>
						</form>
					</div>
					<div id="guarantee">Best Rates </div>
			</div>

			<div id="slideshow" class="home-slide">
			<div class="active">
				<img src="./images/slide-1.jpg"/>
			</div>	
			
			<div>
				<img src="./images/slide-2.jpg"/>
			</div>
			<div>
				<img src="./images/slide-3.jpg"/>
			</div>
			<div>
				<img src="./images/slide-4.jpg"/>
			</div>
			<div>
				<img src="./images/slide-5.jpg"/>
			</div>
			<div>
				<img src="./images/slide-6.jpg"/>
			</div>
			<div>
				<img src="./images/slide-7.jpg"/>
			</div>

			</div>

			
			

			<div id="body_line2"></div>
			<div id="page-content">
				<div id="side">

					
					<div id="sidemenu">
						<div id="navigation">
							<ul class="top-level">
							
								<li><a href="../home.php">WELCOME</a></li>
								<li><a href="index.php">ROOMS & SUITES</a></li>
								<li><a href="../sparelaxation/index.php">SPA & RELAXATION</a></li>
								<li><a href="../restaurant/index.php">RESTAURANT</a></li>
								<li><a href="../meetcelebrate/index.php">MEET & CELEBRATE</a></li>
								<li><a href="../photogallery/index.php">PHOTO GALLERY</a></li>
								<li><a href="../location/index.php">LOCATION</a></li>
								<div class="menu_b"></div>
							
							</ul>
						</div>
					
					</div>
					<div id="wrappersubscribe"></div>
					<div id="subscibe">
					
					<form name="subscibeForm"id="subscibeForm" method="post" action="subscibe.php">
					<p id="condition">Subscribe for E-Newsletter</p>
					
					<input  type="text"  id="subemail" name="subemail"  value="Your Email" onclick="clearTextBox();"/>
					<input type="text"  id="subcsname" size="15"name="subcsname" value="Your Name" onclick="clearTextBox();"/>
					<input type="submit" id="subbutton" name="subscribe" value="" onclick=""/>
					<div id="error-output"></div><div id="output"></div>
					<br>
					<br>
					<br>
					
					</form>
					</div>
					
				<div id="social" class="social">
				<a target="_blank" href="https://www.facebook.com/oasisluxury" onmouseover="changeimg('facebook','../images/facebook-hover.png')" onmouseout="changeimg('facebook','../images/facebook.png')"><img id="facebook" src="../images/facebook.png"></a>
				&nbsp<img border="0" src="../images/social_sep.png" alt="png1" width="5" height="27" />&nbsp
				<a target="_blank" href="http://www.youtube.com/user/TheOasisSpa" onmouseover="changeimg('youtube','../images/youtube-hover.png')" onmouseout="changeimg('youtube','../images/youtube.png')"><img id="youtube" src="../images/youtube.png"></a>
				&nbsp<img border="0" src="../images/social_sep.png" alt="png1" width="5" height="27" />&nbsp
				<a target="_blank" href="http://twitter.com/The_Oasis_Spa" onmouseover="changeimg('twitter','../images/twitter-hover.png')" onmouseout="changeimg('twitter','../images/twitter.png')"><img id="twitter" src="../images/twitter.png"></a>
				&nbsp<img border="0" src="../images/social_sep.png" alt="png1" width="5" height="27" />&nbsp
				<a target="_blank" href="http://www.tripadvisor.com/Hotel_Review-g293917-d661439-Reviews-Oasis_Baan_Saen_Doi_Spa_Resort-Chiang_Mai.html" onmouseover="changeimg('tripadvisor','../images/tripadvisor-hover.png')" onmouseout="changeimg('tripadvisor','../images/tripadvisor.png')"><img id="tripadvisor" src="../images/tripadvisor.png"></a>
				
				</div>
					
					
				
				</div>		


<style>
#rate_main{
	float:left;
	margin:50px 0 0 0;
	width: 750px;
}
#navmenu ul {
	margin: 0; padding: 0; 
	float:right; 
	list-style-type: none; list-style-image: none; 
}
#navmenu li {
	display: inline; 
}
#navmenu ul li a {
	text-decoration:none;  
	float:left; 
	display: block; 
	width: 235px;
	height: 22px;
	line-height: 22px;
	cursor:pointer;
}
#navmenu ul li #room{
		height:22px; margin:0; padding:0; overflow:hidden;
}
#navmenu ul li #room span {
		background:url('../images/room-menu.png') 0px 0px no-repeat;
		display:block;
		height: 22px;
}
#navmenu ul li #room span.active, #navmenu ul li #room span:hover{
		background:url('../images/room-menu-hover.png') 0px 0px no-repeat;
		display:block;
		height: 22px;
}
#navmenu ul li #rate{
		height:22px; margin:0; padding:0 0 0 10px; overflow:hidden;
}
#navmenu ul li #rate span {
		background:url('../images/rate-menu.png') 0px 0px no-repeat;
		display:block;
		height: 22px;
}
#navmenu ul li #rate span.active, #navmenu ul li #rate span:hover{
		background:url('../images/rate-menu-hover.png') 0px 0px no-repeat;
		display:block;
		height: 22px;
}
#navmenu ul li #offer{
		height:22px; margin:0; padding:0 0 0 10px; overflow:hidden;
}
#navmenu ul li #offer span {
		background:url('../images/special-menu.png') 0px 0px no-repeat;
		display:block;
		height: 22px;
}
#navmenu ul li #offer span.active, #navmenu ul li #offer span:hover{
		background:url('../images/special-menu-hover.png') 0px 0px no-repeat;
		display:block;
		height: 22px;
}
#content{
	clear: both;
	margin: 40px 0 0 30px;
	text-align: justify;
	line-height: 1.5;
}
#content p{
	margin: 20px 0 0 0;
	line-height: 1.5;
}
#content table.head{
	background:#ebebeb;
	border-top: solid 4px #ebebeb;
	border-bottom: solid 5px #b1b1b1;
}
#content table.detail{
	margin:3px 0 0 0;
	background:#ebebeb;
}
#content table tr td{
	text-align:center;
	font-size:12px;
	vertical-align:middle;
	padding:2px;
}
#content table.detail tr td{
	color:#882f0f;
}
#room-box{
	background:url('../images/box.png') 0px 0px repeat-x;
	height: 80px;
}
#room-box #box-pic, #room-box #box-detail, #room-box #box-book{
	float:left;
	display:block;
	height: 80px;
	width:155px;
	font-size:11px;
	position:relative;
}
#room-box #box-detail{
	padding:5px 0 0 15px;
	margin:0 3px 0 0;
	width:415px;
}
#room-box #box-detail p{
	line-height:1.3em;
}
#room-box #box-detail #name-head{
	position:absolute;
	top:5px;
	left:13px;
}
#room-box #box-book{
	padding:5px 0 0 15px;
	margin:0 3px 0 0;
	width:100px;
}
#booknow{
	background:url('../images/book.png') 0px 0px no-repeat;
	display:block;
	height: 36px;
	width: 106px;
	position:absolute;
	top:25px;
	right:0px;
	cursor:pointer;
}
#booknow:hover{
	background:url('../images/book-hover.png') 0px 0px no-repeat;
}
#readmore{
	background:url('../images/readmore.png') 0px 0px no-repeat;
	position:absolute;
	height: 9px;
	width: 68px;
	top:10px;
	right:10px;
	cursor:pointer;
}
#offer-box{
	float:left;
	display:block;
	height: 200px;
	width:220px;
	position:relative;
	text-align:center;
}
a#link{
	text-decoration:none;color:#3f3f3f
}
a#link:hover{
	text-decoration:underline;
}
</style>
				<div id="rate_main">

						<div id="navmenu">
							<ul>
							 <li><a id="room" href="../room/index.php"><h1><span></span>Rooms & Suites</h1></a></li>
							 <li><a id="rate" href="../rate/index.php"><h1><span class="active" ></span>Rates</h1></a></li>
							 <li><a id="offer" href="../specialoffer/index.php"><h1><span></span>Special Offers</h1></a></li>
							</ul>
						</div>
						
						<div id="content">
							<p>
							A sweet boutique retreat with all the upscale amenities...whether you are looking for a very private, romantic getaway, 
							a spa vacation, or a staging point for your Thailand adventure there is only one clear choice-Oasis Baan Saen Doi Spa  Resort.
							Located at the foot of the Doi Suthep Mountains, this retreat is your secret Chiang Mai hideaway.
							</p>
									
							<p style="border-top : 1px dotted #c8c8c8;padding:15px 0 0 0">
								<table class="head" width="100%">
									<tr>
										<td width="34%" style="background:#c8c8c8;color:#000000;font-size:13px;border-right: solid 3px #ebebeb;"><b>Room Type</b></td>
										<td width="22%" style="background:#c8c8c8;color:#343434;font-size:13px;border-right: solid 3px #ebebeb;"><font color="#9f2a00"><b>High</b></font> Season</td>
										<td width="22%" style="background:#c8c8c8;color:#343434;font-size:13px;border-right: solid 3px #ebebeb;"><font color="#9f2a00"><b>Green</b></font> Season</td>
										<td width="22%" style="background:#c8c8c8;color:#343434;font-size:13px;"><font color="#9f2a00"><b>Holiday</b></font></td>
									</tr>
									<tr>
										<td><?=$rs[0]["validity"]?></td>
										<td><?=$rs[0]["date_high_season"]?> </td>
										<td><?=$rs[0]["date_green_season"]?> </td>
										<td><?=$rs[0]["date_holiday"]?> </td>
									</tr>
								</table>
								
								<table class="detail" width="100%">
								<?
								for($i=0;$i<$rs["rows"];$i++){
								?>
									<tr>
										<td width="34%" style="background:#c8c8c8;color:#000000;border-right: solid 3px #ffffff;border-bottom: solid 2px #ffffff;"><b><?=$rs[$i]["room_title"]?></b></td>
										<td width="22%" style="border-right: solid 2px #ffffff;border-bottom: solid 2px #ffffff;"><?=$rs[$i]["rate_high_season"]?></td>
										<td width="22%" style="border-right: solid 2px #ffffff;border-bottom: solid 2px #ffffff;"><?=$rs[$i]["rate_green_season"]?></td>
										<td width="22%" style="border-bottom: solid 2px #ffffff;"><?=$rs[$i]["rate_holiday"]?></b></td>
									</tr>
								<?}?>
								</table>
							</p>
							

							++ *Prices are subjected to 7% VAT and 10% Service charge
							<p>
								<a id="link" href="../specialoffer/index.php" >Click on the links below to find out more about our special, value added offers and packages.</a>
							</p>
						</div>
									
				</div>

				
			
			
			</div>
		
			<div id="endpage"></div>
			
</div>
<div class="footer">
<div class="wrapperfooter"></div>
		<div id="footer_link" >
				<div id="footer_sub">
				<span class="class1">
						<a href="../discoverchiangmai/index.php" >Excursion </a>|
						<a target="_blank" href="http://www.oasisspa.net/home.php" >Oasis Spa </a>|
						<a target="_blank" href="http://www.oasisspa.net/oasisschool/home.php" >Oasis School </a>|
						<a target="_blank" href="http://www.kinnatural.com/home.php" >Kin </a>|
						<a href="../pressmedia/index.php" >Press & Media </a>|
						<a href="../work/index.php" >Work with us </a>|
						<a href="index.php" >Rates </a>|
						<a href="../help/index.php" >Contact Us </a>
					
				</span>
								
				</div>
	
				
		</div>
		<div id="credit">
		<p>@2007-2012 Oasis Baan Saen doi All Rights Reserved.Web Hosting and Design by Tap Technology,Thailand. </p>
		</div>
</div>
	<script>
															
			$("#subscibeForm").bind("submit", function() {
			

			$.fancybox({
				autoSize        : true,
				minHeight       : 10,
				href            : "../subscribe.php",
				type            : 'ajax',
				fixed			: false,
				ajax            : {
						type    : "POST",
						cache   : false,
						data    : $(this).serializeArray()
				}
			})
			return false;

			});
			
(function($){  
$("#date_from").datepicker({
				showOn: 'both', 
				buttonImage: '../images/calendar.gif', 
				buttonImageOnly: true,
				minDate: 1, 
				/*maxDate: '+1M +10D',*/
				dateFormat: 'yy-mm-dd'
			});

var currentDate = new Date(new Date().getTime() + 24 * 60 * 60 * 1000);

var MyDateString =  currentDate.getFullYear() + '-' + ('0' + (currentDate.getMonth()+1)).slice(-2) + '-' + ('0' + currentDate.getDate()).slice(-2);
	
	$("#date_from").val(MyDateString);
	
$("SELECT").selectBox();

 })(jQuery);  			
</script>

</body>
</html>