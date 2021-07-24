<?
include("../include/eg.inc.php");
$eg = new eg();


$id=$eg->getParameter("id",false);
$row=$eg->getParameter("row",false);
?>

<style>

.fancybox-outer {
      background: #fffdec;
}

.scrollable_detail {
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
a.prev_detail {
	position:absolute;
	top:375px;
	left:0px;
}
a.next_detail {
	position:absolute;
	top:375px;
	right:30px;
}
a.disabled {
	visibility:hidden !important;		
}
.scrollable_detail {
	position:relative;
	overflow:hidden;
	width: 600px;
	height:400px;
	background : transparent;
}
#gallery_detail{
	width: 600px;
	height:400px;
}
#gallery_detail .scrollable_detail {
	position:relative;
	overflow:hidden;
	width: 600px;
	height:400px;
	background : transparent;
}
.scrollable_detail .items {
	/* this cannot be too large */
	width:20000em;
	position:absolute;
	clear:both;
}
.items div {
	float:left;
	width: auto;
}
.scrollable_detail img {
	float:left;
	height:400px;
}
#gallery_detail .scrollable_detail img {
	float:left;
	width:600px;
	height:400px;
}
.scrollable_detail .active {
	position:relative;
	cursor:default;
}
#item_box{
	float:left;
	height:400px;
}
#arrow_left_detail{
position:absolute;
left:5px;
top:176px;
}
#arrow_right_detail{
position:absolute;
right:15px;
top:176px;
}
</style>

<body>
<div style="padding:10px;text-align:left;line-height:1.5em;">


	
				
			<?
			if($row=="first"){
									$directory = "./images/gallery/large/";
								if (glob($directory . "*.{jpg,gif,png,bmp}", GLOB_BRACE) != false)
								{
								 $filecount = count(glob($directory . "*.{jpg,gif,png,bmp}", GLOB_BRACE));
								}
			
			?>
			<div id="gallery_detail">
			<!-- "previous page" action -->
				<div id="arrow_left_detail">
				<a class="prev browse left"><img id="prev_detail" src="./images/left_arrow1.png"></a>
				</div>
				<!-- root element for scrollable_detail -->
				<div id="scrollable_detail" class="scrollable_detail">   
				   <!-- root element for the items -->
				   <div class="items">
				   <?for($i=0;$i<$filecount;$i++){?>
				   		<div>

						<img src="./images/gallery/large/baan_saen_doi<?=$i+1?>.jpg">
					
						</div>
						<?}?>
						
				   </div>
				</div>
				<!-- "next page" action -->
				<div id="arrow_right_detail">
				<a class="next browse right"><img id="next_detail" src="./images/right_arrow1.png"></a>
				</div>
				<br clear="all">
				</div>
				<?}?>
			<!--finish row first-->
			<?
			if($row=="second"){
									$directory = "./images/gallery1/large/";
								if (glob($directory . "*.{jpg,gif,png,bmp}", GLOB_BRACE) != false)
								{
								 $filecount = count(glob($directory . "*.{jpg,gif,png,bmp}", GLOB_BRACE));
								}
			
			?>
			<div id="gallery_detail">
			<!-- "previous page" action -->
				<div id="arrow_left_detail">
				<a class="prev browse left"><img id="prev_detail" src="./images/left_arrow1.png"></a>
				</div>
				<!-- root element for scrollable_detail -->
				<div id="scrollable_detail" class="scrollable_detail">   
				   <!-- root element for the items -->
				   <div class="items">
				   <?for($i=0;$i<$filecount;$i++){?>
				   		<div>

						<img src="./images/gallery1/large/bsdsec<?=$i+1?>.jpg">
					
						</div>
						<?}?>
						
				   </div>
				</div>
				<!-- "next page" action -->
				<div id="arrow_right_detail">
				<a class="next browse right"><img id="next_detail" src="./images/right_arrow1.png"></a>
				</div>
				<br clear="all">
				</div>
				<?}?>
				


</div>
</body>

<script>  
        (function($){ 
			$(".scrollable_detail").scrollable({circular: true , initialIndex : <?=$id?>});
			//var api = $(".scrollable_detail").data("scrollable");
			//api.move(<?=$id?>);
			//api.index(<?=$id?>);
		})(jQuery);  
</script> 