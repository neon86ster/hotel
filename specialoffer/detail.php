<?
include("../include/eg.inc.php");
$eg = new eg();

$offer=$eg->getParameter("offer",false);

$sql="select * from special_offer where special_id = ".$offer." ";
$rs=$eg->get_data($sql);


?>

<style>
 ul#detail li{
	background:url('./images/list-spot.png') 0px 8px no-repeat;
	padding-left: 10px;
}

#foot{
	margin:10px 0 0 0;
	background:#c4c4c4;
	height: 50px;
	width: 474px;
	position:relative;
}
#book-now{
	background:url('./images/booknow.png') 0px 0px no-repeat;
	display:block;
	height: 28px;
	width: 179px;
	cursor:pointer;
	position:absolute;
	top:10px;
	left:70px;
}
#next-package{
	background:url('./images/next.png') 0px 0px no-repeat;
	display:block;
	height: 28px;
	width: 147px;
	cursor:pointer;
	position:absolute;
	top:10px;
	left:259px;
}
.fancybox-outer {
      background: #fffdec;
}

.scrollable {
	float:left;	
}
a.browse {
	display:block;
	width:25px;
	height:50px;
	cursor:pointer;
	font-size:1px;
	z-index:1;
}
a.prev {
	position:absolute;
	top:175px;
	left:0px;
}
a.next {
	position:absolute;
	top:175px;
	right:15px;
}
a.disabled {
	visibility:hidden !important;		
}
.scrollable {
	position:relative;
	overflow:hidden;
	width: 474px;
	height:240px;
	background : transparent;
}
#gallery{
	width: 474px;
	height:240px;
}
#gallery .scrollable {
	position:relative;
	overflow:hidden;
	width: 474px;
	height:240px;
	background : transparent;
}
.scrollable .items {
	/* this cannot be too large */
	width:20000em;
	position:absolute;
	clear:both;
}
.items div {
	float:left;
	width: auto;
}
.scrollable img {
	float:left;
	height:240px;
}
#gallery .scrollable img {
	float:left;
	width:474px;
	height:240px;
}
.scrollable .active {
	position:relative;
	cursor:default;
}
#item_box{
	float:left;
	height:240px;
}
</style>

<body>
<div style="padding:10px;text-align:left;line-height:1.5em;">
	<div id="gallery">
				<!-- "previous page" action -->
				<!--<a class="prev browse left"><img id="prev" src="./images/left_arrow.png"></a></a>-->
				<!-- root element for scrollable -->
				<div id="scrollable" class="scrollable">   
				   <!-- root element for the items -->
				   <div class="items">
						<div>
							<img src="../<?=$rs[0]["detail_pic"]?>">
						</div>
				   </div>
				</div>
				<!-- "next page" action -->
				<!--<a class="next browse right"><img id="next" src="./images/right_arrow.png"></a>-->
				<br clear="all">
	</div>
	
	<p style="margin-top:5px;padding:5px 0 0 0;text-align:justify;width:474px;">
		<?=$rs[0]["special_fdetail"]?>
	</p>
	
	<img style="margin:10px 0 0 0;" src="../<?=$rs[0]["offer_pic"]?>">
	
	<?=$rs[0]["special_sdetail"]?>
	
	<div id="foot">
		<a id="book-now" href="<?=$rs[0]["link"]?>"></a>
		<a id="next-package" href="" onClick="$.fancybox.next();return false;"></a>
	</div>
</div>
</body>