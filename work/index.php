<?php
session_start();
include("../include/eg.inc.php");
$eg = new eg();

$sql="select * from work order by work_id ";
$rs=$eg->get_data($sql);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<meta name="keywords" content="oasis Luxury,Oasis Baan Sean Doi Spa Resort,Chiangmai boutique hotel,luxury hotel,5 star resort,hotels in Chiang Mai,hotel rooms and Suites,hotel and spa,accommodations in Chiang Mai,wellness resort,retreat, rooms, spa vacation,Oasis Spa,Thailand,��ҹ�ʹ���,�ç���,���ա��§����,��§������ѡ,��������§����,��§����������, ��ͧ�ѡ��§����,���ѡ,������,�ç���,�ç��������§����,�ç������ͫ���, �����췷����§����" />
<meta name="description" content="Oasis Baan Saen Doi Spa Resort. This is the secret Chiang Mai hideaway, a luxury boutique resort with all five star amenities. ">
<title>Work With Us, Oasis Baan Saen Doi Spa Resort</title>

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

<script type="text/javascript" src="http://www.webrezpro.com/Javascript/embed_bookingrequest.version19.js?hotel_id=1142&format=landscape&max_adults=6&flag_no_jquery=1"></script> 

</head>
<body onLoad="EmbedBookingRequest_OnLoad()">
<div id="wrappertop"></div>
<div id="wrapperline"></div>
<div id="wrapperhead"></div>


<div class="wrapper">
		<div class="header">
			<div class="header_line"></div>
			<div class="header_line1"></div>
			
			<div id="navigate">
				<div id="position1">
				<span class="class">
					<a href="../home.php">Home</a>&nbsp&nbsp.&nbsp
					<a href="index.php">Press Kit</a>&nbsp&nbsp.&nbsp
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






			
			<div id="page-content">
				<div id="side">

					
					<div id="sidemenu">
						<div id="navigation">
							<ul class="top-level">
							
								<li><a href="../home.php">WELCOME</a></li>
								<li><a href="../room/index.php">ROOMS & SUITES</a></li>
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
				
				<div id="work_main">
						<div id="work_title">
						<h1><span></span>Work With us</h1>
						</div>
						<div id="paragraph_work">
						<p>
						At Oasis Baan Saen Doi Spa Resort, we are looking for talent with unique personalities and sense of character. People with passion for hospitality and grow and develop your career with us, please join our team.
						</p>
						<div class="work_body_line"></div>
						</div>
						
						<div id="job_vacancy" class="down-load-work-item"><a target="blank"  href=""><b>&nbsp&nbsp&nbsp&nbsp Job Vacancy /ตำแหน่งงานว่าง  </b></a></div>
						<div id="work_application" class="down-load-work-item"><a target="blank"  href=""><font style="#ffffff"><b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Download Application Form </b></font></a></div>
						<div id="download_application" class="down-load-work-application"><a target="blank"  href="./document/Application Form Oasis Baan Saen Doi Spa Resort.doc"><font style="#ffffff">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Application Form >>  </font></a></div>
						<div id="download_map" class="down-load-work-application"><a target="blank"  href="./document/Map of Oasis Spa Office.pdf"><font style="#ffffff">Office Map >></font></a></div>
						
						<div id="paragraph_work1">
						<p>
						<table>

							<?for($i=0;$i<$rs["rows"];$i++){?>
							<tr>
								<td style="line-height:22px;"><?=($i+1)?>. <?=$rs[$i]["work_position"]?></td>
								<td style="line-height:22px;"><?=$rs[$i]["work_people"]?></td>
								
							</tr>
							<?}?>
						</table>
						
						
						</p>
						</div>
						
						<div id="paragraph_work2">
						<p>
							Qualified candidates are welcome to application by email <a style="color:#000000" href="mailto:hr@oasisluxury.net">hr@oasisluxury.net</a> Your email must include: Resume, Photo, and completed application form. You may also apply in person at the Oasis Spa office in Chiang Mai
							<br><br>
							<font color="#8F2600" style="font-size:15px;"><b>For more information please contact</b></font> <br>
							Khun Annie (Human Resource Manager)<br>
							Telephone: +66 53 920160, Mon - Fri (9am-5pm)<br>
							<br>
							<font color="#8F2600" style="font-size:15px;"><b>Destiny Enterprises Co.,Ltd.</b></font><br>
							4 Sukasame Rd (Nimmanhemin Area) Suthep, Muang, Chiang Mai 50200 Thailand<br>
							<b>Phone:</b> +66 53-920160, <b>Fax:</b> +66 53920122, <b>email:</b> <a style="color:#000000" href="mailto:hr@oasisluxury.net">hr@oasisluxury.net </a><br>
							<br>	
							<font color="#8F2600" style="font-size:15px;"><b>สนใจร่วมงานกับเรา กรุณาดาวน์โหลดใบสมัครงาน </b></font><br>
							จากนั้น กรอกข้อมูลแบบฟอร์มการสมัครงาน พร้อมแนบหลักฐานการสมัครงาน และรูปถ่าย มาที่ <br>
							อีเมล์ <a style="color:#000000" href="mailto:hr@oasisluxury.net">hr@oasisluxury.net </a>  หรือ สมัครด้วยตัวเอง <br>
							<br>
							<font color="#8F2600" style="font-size:15px;"><b>สมัครได้ที่สำนักงานถนนนิมมาเหมินทร์ เชียงใหม่ </b></font><br>
							สอบถามเพิ่มเติม โทร 053-920160 ติดต่อ คุณแอนนี่ (แผนกบุคคล) จันทร์-ศุกร์ เวลา 9.00- 17.00น.<br>
							บริษัท เดสทีนี่เอนเตอร์ไพร์ซ จำกัด <br>
							เลขที่ 4 ถนนสุขเกษม ซอย 2 นิมมานเหมินทร์ ตำบลสุเทพ อำเภอเมือง จังหวัดเชียงใหม่ 50200<br>

			
						
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
						<a href="index.php" >Work with us </a>|
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