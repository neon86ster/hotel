<?
include("../include/eg.inc.php");
$eg = new eg();

$room=$eg->getParameter("roome",false);

$sql="select * from room_suite where room_id = ".$room." ";
$rs=$eg->get_data($sql);


?>

<style>
ul#detail li{
	background:url('./images/list-spot.png') 0px 8px no-repeat;
	padding-left: 10px;
}
#head{
	margin-top:10px;
}
#foot{
	margin:10px 0 0 0;
	background:#c4c4c4;
	height: 50px;
	width: 576px;
	position:relative;
}
#book-now{
	background:url('./images/booknow.png') 0px 0px no-repeat;
	display:block;
	height: 28px;
	width: 183px;
	cursor:pointer;
	position:absolute;
	top:10px;
	left:105px;
}
#close{
	background:url('./images/close.png') 0px 0px no-repeat;
	display:block;
	height: 28px;
	width: 142px;
	cursor:pointer;
	position:absolute;
	top:10px;
	left:295px;
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
	width: 576px;
	height:384px;
	background : transparent;
}
#gallery{
	width: 576px;
	height:384px;
}
#gallery .scrollable {
	position:relative;
	overflow:hidden;
	width: 576px;
	height:384px;
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
	height:384px;
}
#gallery .scrollable img {
	float:left;
	width:576px;
	height:384px;
}
.scrollable .active {
	position:relative;
	cursor:default;
}
#item_box{
	float:left;
	height:384px;
}
</style>

<body>
<div style="padding:10px;text-align:left;line-height:1.5em;">

	<?
								$directory = "../images/room_suite/".$room."/";

								if (glob($directory . "*.{jpg,gif,png,bmp}", GLOB_BRACE) != false)
								{
								 $filecount = count(glob($directory . "*.{jpg,gif,png,bmp}", GLOB_BRACE));
								}
	
	?>
	<div id="gallery">
				<!-- "previous page" action -->
				<a class="prev browse left"><img id="prev" src="./images/left_arrow.png"></a></a>
				<!-- root element for scrollable -->
				<div id="scrollable" class="scrollable">   
				   <!-- root element for the items -->
				   <div class="items">
				   <?for($i=0;$i<$filecount;$i++){?>
				   		<div>

						<img src="../images/room_suite/<?=$room?>/<?=$room?>-<?=$i+1?>.jpg">
					
						</div>
						<?}?>
						

				   </div>
				</div>
				<!-- "next page" action -->
				<a class="next browse right"><img id="next" src="./images/right_arrow.png"></a>
				<br clear="all">
	</div>
	
	<div id="head">
	<img src="../<?=$rs[0]["pic3"]?>" >
	</div>

		<?=$rs[0]["room_detail"]?>
	
	
	<p style="margin-top:10px;border-top:1px dotted #c8c8c8;padding:10px 0 0 0;text-align:justify;">
		<font color="#793a10"><b>terms and conditions</b></font>
	</p>
	
	<div id="foot">
		<a id="book-now" href="<?=$rs[0]["link"]?>"></a>
		<a id="close" href="" onClick="$.fancybox.close();return false;"></a>
	</div>
	


</div>
</body>

<script>  
        (function($){ 
			$(".scrollable").scrollable({circular: true});
		})(jQuery);  
</script> 