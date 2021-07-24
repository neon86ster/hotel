<?php
session_start();
include("../include/eg.inc.php");
$eg = new eg();

$sql="select * from spa_relax order by relax_id ";
$rs=$eg->get_data($sql);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<meta name="keywords" content="oasis Luxury,Oasis Baan Sean Doi Spa Resort,Chiangmai boutique hotel,luxury hotel,5 star resort,hotels in Chiang Mai,hotel rooms and Suites,hotel and spa,accommodations in Chiang Mai,wellness resort,retreat, rooms, spa vacation,Oasis Spa,Thailand,บ้านแสนดอย,โรงแรม,ที่พีกเชียงใหม่,เชียงใหม่ที่พัก,รีสอร์ทเชียงใหม่,เชียงใหม่รีสอร์ท, ห้องพักเชียงใหม่,ที่พัก,รีสอร์ท,โรงแรม,โรงแรมที่เชียงใหม่,โรงแรมโอเอซิสส, รีสอร์ทที่เชียงใหม่" />
<meta name="description" content="Oasis Baan Saen Doi Spa Resort. This is the secret Chiang Mai hideaway, a luxury boutique resort with all five star amenities. ">

<title>Spa Relaxation, Oasis Baan Saen Doi Spa Resort</title>
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
								<li><a href="../room/index.php">ROOMS & SUITES</a></li>
								<li class="active"><a class="active" href="index.php">SPA & RELAXATION</a></li>
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
					<div id="condition">Subscribe for E-Newsletter</div>
					
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
				<div id="spa_main">

						<div id="relax_title">
						<h1><span></span>Spa & Relaxation</h1>
						</div>
						<div id="paragraph_spa">
						<p>
						What's your pleasure? Do you enjoy the pampering of Chiangmai's best spa treatments... would you like to discover the life-long benefits of Tai Chi... or do you relish the opportunity to give yourself a new lease on life with a personalized inner cleansing and detoxification? We have all that and more
						</p>
						</div>
						
						<div id="spa_relax_pic">
						<div id="spa_relax"></div>
						<div id="pool"></div>
						<div id="tennis"></div>
						<div id="yoga"></div>
						</div>
							<div id="spa_relax_body">
							<a target="blank"href="http://www.oasisspa.net/home.php"><div id="oasis_logo"></div></a>
							<a target="blank"href="http://www.oasisspa.net/home.php"><div id="oasis_png"></div><h1><font color="#7D2F01" style="font-size:15px;"><b>Oasis Spa</b></font ><font color="#686868"> Baan Saen Doi</font></h1></a>
							<br>
							
							<div id="paragraph_oasis_spa">
							<p>A part of the hotel complex you will find a branch of one of the most celebrated day spas in Thailand. Oasis Spas offer the unique "Lanna-style" spa experience. Treatments created by combining the best of ancient Thai traditional medicine and herbal secrets with advanced discoveries in beauty and wellness. The gentle and courteous Lanna ambience pervades all to create a magical place where beautiful, gracious people provide the ultimate in personal service without pretentious airs.
								</P>
							</div>
						<div id="paragraph_oasis_spa2">
						<p>
						
						This magnificent spa is a continuation of the hotel with all the charm and comfort for which Baan Saen Doi is famous. Your dream spa awaits you with a decor of striking original ethnic art and decorations, breathtaking mountain views along with beautiful gardens and grounds. It has private change areas for men and women but only five treatment rooms so you should book early. 
						</p></div>
							<div id="download" class="down-load-map-item"><a target="blank"  href="http://www.oasisspa.net/therapie/"><font color="#A44B2B" style="font-size:14px;"><b>Spa</b></font> Therapies &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</a></div>
							<div id="download_spa" class="down-load-map-item"><a target="blank"  href="http://www.oasisspa.net/promotion/"><font color="#A44B2B" style="font-size:14px;"><b>Spa</b></font>  Promotions &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</a></div>
							<div class="sparelax_body_line"></div>
							</div>
							
							<?	for($i=0;$i<$rs["rows"];$i++){?>
							<?if($rs[$i]["title"]=="INNER Body Cleansing"){?>
							<div id="spa_inner_body">
							<img style="position:absolute;left:0px;top:0px;" src="../<?=$rs[$i]["pic1"]?>" height="29px" width="28px;"><h1><font color="#7D2F01" style="font-size:15px;"><b><?=$rs[$i]["title"]?></b></font></h1><br>
							<p><?=$rs[$i]["paragraph"]?></p>
							<div class="inner_body_line"></div>
							</div>
							<?}else{?>
							<div id="spa_taichi_body">
							<img style="position:absolute;left:0px;top:0px;" src="../<?=$rs[$i]["pic1"]?>" height="29px" width="28px;"><h1><font color="#7D2F01" style="font-size:15px;"><b><?=$rs[$i]["title"]?></b></font></h1><br>
							<p><?=$rs[$i]["paragraph"]?></p>
							<div class="taichi_body_line"></div>
							</div>
							<?}
							}?>


						
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
						<a href="../rate/index.php" >Rates </a>|
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