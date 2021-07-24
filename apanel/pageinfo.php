<?
session_start();
include("include/eg.inc.php");
$eg = new eg();
$rs = $eg->checkLogin();
$filename = "./object.xml";
$page = $eg->getParameter("page");
$title = $eg->getParameter("title");
$pagename = substr($page,0,stripos($page,"-"));
$mode = substr($page,stripos($page,"-")+1);
$add = $eg->getParameter("add");
$id = $eg->getParameter("id");
$uid = $eg->u_id;

if($add=="add"){
	$insert = $eg->readToInsert($_REQUEST,$filename);
	if($insert){
		$msgclass="complete";
		$successmsg="Insert data complete!!";
	}else{
		$msgclass="error";
		$errormsg = $eg->get_errormsg();
	}
}else if($add=="save"){
	$update = $eg->readToUpdate($_REQUEST,$filename);
	if($update){
		$msgclass="complete";
		$successmsg="Update data complete!!";
	}else{
		$msgclass="error";
		$errormsg = $eg->get_errormsg();
	}
}else if($add=="delete"){
	$delete=$eg->readToDelete($pagename,$id,$filename);
	if($delete){
		$msgclass="complete";
		$successmsg="Delete data complete!!";
	}else{
		$msgclass="error";
		$errormsg = $eg->get_errormsg();
	}
}
?>
<h2><?=$title;?></h2>
<?if($successmsg || $errormsg){?>
<div id="<?=$msgclass;?>"><?=($successmsg)?$successmsg:$errormsg;?></div><br>
<?}?>
<table>
<tr><td>
<?
if($mode=="dashbord"){
?>
<h4>Wellcome to Oasis Baan Saen Doi Spa Resort Administration Panel</h3>
<h5>What would you like to do?</h4>
<ul class="shortcut-buttons-set">			

				
				<li><a href="JavaScript:doCallAjax('special_offer-add','Add a new special_offer');" class="shortcut-button"><span>
					<img alt="icon" src="./images/Add-a-new-Event.png"/><br/>
					Add a new Special Offer
				</span></a></li>
				
				<li><a href="JavaScript:doCallAjax('subscribe-email','Write a new Newsletter');" class="shortcut-button"><span>
					<img alt="icon" src="./images/Write-a-new-Newsletter.png"/><br/>
					Write a new Newsletter
				</span></a></li>
				
				<li><a href="JavaScript:doCallAjax('work-add','Add a new work');" class="shortcut-button"><span>
					<img alt="icon" src="./images/Write-a-new-Article.png"/><br/>
					Add a New Work
				</span></a></li>
				
				<li><a href="JavaScript:doCallAjax('s_user-edit','Your Profile','<?=$uid;?>');" class="shortcut-button"><span>
					<img alt="icon" src="./images/Your-Profile.png"/><br/>
					Your Profile
				</span></a></li>			
</ul>
<?
}else if($mode=="add"){
echo $eg->gFormInsert($pagename,$filename);
?>
<input name="add" id="add" type="button" size="" value="add" onclick="set_insertData('<?=$pagename;?>')" > 
<?
}else if($mode=="edit"){
	if($id){
	$f = simplexml_load_file($filename);
	$element = $f->table->$pagename;
	$eid = $element->idfield;
	$idfield = $eid["name"];
									$xml = "<command>" .
									"<table>$pagename</table>" .
									"<where name='$idfield' operator='='>$id</where>" .
									"</command>";
									
								echo $eg->gFormEdit($xml,$filename);	 
			}
?>
<?
if($pagename=="room_suite" && $mode=="edit"){
?>
<div class="container">

    <br>
    <!-- The file upload form used as target for the file upload widget -->
	<form id="fileupload" action="jupload/server/php/index.php" method="POST" enctype="multipart/form-data">
	<input type="hidden" name="juploadpage" id="juploadpage" value="<?=$pagename?>">
	<input type="hidden" name="juploadid" id="juploadid" value="<?=$id?>">
        <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
        <div class="row fileupload-buttonbar">
            <div class="span7">
                <!-- The fileinput-button span is used to style the file input field as button -->
                <span class="btn btn-success fileinput-button">
                    <i class="icon-plus icon-white"></i>
                    <span>Add Picture...</span>
                    <input type="file" name="files[]" multiple>
                </span>
                <button type="submit" class="btn btn-primary start">
                    <i class="icon-upload icon-white"></i>
                    <span>Start upload</span>
                </button>
                <button type="reset" class="btn btn-warning cancel">
                    <i class="icon-ban-circle icon-white"></i>
                    <span>Cancel upload</span>
                </button>
                <button type="button" class="btn btn-danger delete">
                    <i class="icon-trash icon-white"></i>
                    <span>Delete</span>
                </button>
                <input type="checkbox" class="toggle">
            </div>
            <!-- The global progress information -->
            <div class="span5 fileupload-progress fade">
                <!-- The global progress bar -->
                <div class="progress progress-success progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                    <div class="bar" style="width:0%;"></div>
                </div>
                <!-- The extended global progress information -->
                <div class="progress-extended">&nbsp;</div>
            </div>
        </div>
        <!-- The loading indicator is shown during file processing -->
        <div class="fileupload-loading"></div>
        <br>
        <!-- The table listing the files available for upload/download -->
        <table role="presentation" class="table table-striped"><tbody class="files" data-toggle="modal-gallery" data-target="#modal-gallery"></tbody></table>
    </form>
    <br>

</div>
<!-- modal-gallery is the modal dialog used for the image gallery -->
<div id="modal-gallery" class="modal modal-gallery hide fade" data-filter=":odd">
    <div class="modal-header">
        <a class="close" data-dismiss="modal">&times;</a>
        <h3 class="modal-title"></h3>
    </div>
    <div class="modal-body"><div class="modal-image"></div></div>
    <div class="modal-footer">
        <a class="btn modal-download" target="_blank">
            <i class="icon-download"></i>
            <span>Download</span>
        </a>
        <a class="btn btn-success modal-play modal-slideshow" data-slideshow="5000">
            <i class="icon-play icon-white"></i>
            <span>Slideshow</span>
        </a>
        <a class="btn btn-info modal-prev">
            <i class="icon-arrow-left icon-white"></i>
            <span>Previous</span>
        </a>
        <a class="btn btn-primary modal-next">
            <span>Next</span>
            <i class="icon-arrow-right icon-white"></i>
        </a>
    </div>
</div>
<!-- The template to display files available for upload -->
<script id="template-upload" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-upload fade">
        <td class="preview"><span class="fade"></span></td>
        <td class="name"><span>{%=file.name%}</span></td>
        <td class="size"><span>{%=o.formatFileSize(file.size)%}</span></td>
        {% if (file.error) { %}
            <td class="error" colspan="2"><span class="label label-important">{%=locale.fileupload.error%}</span> {%=locale.fileupload.errors[file.error] || file.error%}</td>
        {% } else if (o.files.valid && !i) { %}
            <td>
                <div class="progress progress-success progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="bar" style="width:0%;"></div></div>
            </td>
            <td class="start">{% if (!o.options.autoUpload) { %}
                <button class="btn btn-primary">
                    <i class="icon-upload icon-white"></i>
                    <span>{%=locale.fileupload.start%}</span>
                </button>
            {% } %}</td>
        {% } else { %}
            <td colspan="2"></td>
        {% } %}
        <td class="cancel">{% if (!i) { %}
            <button class="btn btn-warning">
                <i class="icon-ban-circle icon-white"></i>
                <span>{%=locale.fileupload.cancel%}</span>
            </button>
        {% } %}</td>
    </tr>
{% } %}
</script>
<!-- The template to display files available for download -->
<script id="template-download" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-download fade">
        {% if (file.error) { %}
            <td></td>
            <td class="name"><span>{%=file.name%}</span></td>
            <td class="size"><span>{%=o.formatFileSize(file.size)%}</span></td>
            <td class="error" colspan="2"><span class="label label-important">{%=locale.fileupload.error%}</span> {%=locale.fileupload.errors[file.error] || file.error%}</td>
        {% } else { %}
            <td class="preview">{% if (file.thumbnail_url) { %}
                <a target="_blank" href="{%=file.url%}" title="{%=file.name%}" rel="gallery" download="{%=file.name%}"><img src="{%=file.thumbnail_url%}"></a>
            {% } %}</td>
            <td class="name">
                <a target="_blank" href="{%=file.url%}" title="{%=file.name%}" rel="{%=file.thumbnail_url&&'gallery'%}" download="{%=file.name%}">{%=file.name%}</a>
            </td>
            <td class="size"><span>{%=o.formatFileSize(file.size)%}</span></td>
            <td colspan="2"></td>
        {% } %}
        <td class="delete">
            <button class="btn btn-danger" data-type="{%=file.delete_type%}" data-url="{%=file.delete_url%}">
                <i class="icon-trash icon-white"></i>
                <span>{%=locale.fileupload.destroy%}</span>
            </button>
            <input type="checkbox" name="delete" value="1">
        </td>
    </tr>
{% } %}
</script>
<?}?>
<input name="add" id="add" type="button" size="" value="save" onclick="set_insertData('<?=$pagename;?>','<?=$id;?>');" > 
<?
}else if($mode=="manage"){
	$f = simplexml_load_file($filename);
	$element = $f->table->$pagename;
	$eshowpage = $element->showpage;
	$showpage = $eshowpage["value"];
	$eg->setShowpage($showpage);
	$i = 0;
	$arrFields = array();
	foreach($element->field as $fi){
			$arrFields[$i] = $fi["name"];
			$arrFieldsname[$i] = $fi["formname"];
			$arrFormType[$i] = $fi["formtype"];
			$arrShowinform[$i] = $fi["showinform"];
			$arrShowinList[$i] = $fi["showinList"];
			$arrTableinList[$i] = $fi["table"];
			$i++;
	} 
	$column = count($arrFields);
	$eid = $element->idfield;
	$ename = $element->namefield;
	$idfield = $eid["name"];
	$namefield = $ename["name"];
	
	$rows=$eg->getShowpage();
	$page = $eg->getParameter("page",1);
	$start = $rows*$page - $rows;

	$rs=$eg->getReport($pagename);
?>
	<table width="100%" class="tableinfo">
				<tr class="column">
<?
//start field name generate
for($i=0;$i<$column;$i++){
	if($arrFormType[$i]!="submit"&&$arrFormType[$i]!="button"&&$arrShowinList[$i]!="no"){
?>
					<td>
					<b><?=$arrFieldsname[$i];?></b>
					</td>
<? 	}
} ?>
					<td>
					<b>Edit</b>
					</td>
					<td>
					<b>Delete</b>
					</td>
				</tr>
				</tr>
<?
//end field name generate
//start field element generate
//end field name generate
//start field element generate
$data = "&nbsp;";
for($i=0;$i<$rs["rows"];$i++){
	if($i%2==1){
		echo "<tr class=\"odd\">\n";
	}else{
		echo "<tr class=\"even\">\n";
	}
	for($j=0;$j<$column;$j++){
		if($arrShowinList[$j]!="no") {
				$data = "";
				$chkarrFields = explode(".",$arrFields[$j]); //chk array field of order; some $arrFields is "tablename"."columnname"
				$arrFields[$j] = (count($chkarrFields)>1)?$chkarrFields[1]:$arrFields[$j];
				
				if(!$arrTableinList[$j]){
					if($arrFormType[$j]=="image"){
					$data = "<div id='table-img'><img id='table-img' src='../".$rs[$i]["$arrFields[$j]"]."?".time()."'></div>";
					}
					
					else{
					$data = $rs[$i]["$arrFields[$j]"];
					}
				}else{
					$g = simplexml_load_file($filename);
					$ele = $g->table->$pagename;
					$eleid = $ele->idfield;
					$elename = $ele->namefield;
					$id_field = $eleid["name"];
					$name_field = $elename["name"];
					$data=$eg->getIdToText($rs[$i]["$arrFields[$j]"],$arrTableinList[$j],$name_field,$id_field);
				}
?>
			<td class="report"><?=$data;?>&nbsp;</td>
<?		}
	}
?>
		<td><input name="update" id="update" type="button" value="update" onclick="JavaScript:doCallAjax('<?=$pagename;?>-edit','<?=$title?>','<?=$rs[$i]["$arrFields[0]"];?>');" ></td>
		<td><input name="delete" id="delete" type="button" value="delete" onclick="set_deleteData('<?=$pagename;?>','<?=$rs[$i]["$arrFields[0]"];?>');" > </td>
	</tr>
<?
}
?>
	</table>
<?
}else if($mode=="email"){
?>
	<div id="status"></div><br>
	<table class="generalinfo"><input type="hidden" value="" name="home_id" id="home_id"/>
		<tbody>
		<tr>
		<td valign="top">Subject<font style="color: rgb(255, 0, 0);"> *</font></td>
		<td valign="top"><input type="text" name="email-subject" id="email-subject"/></td>
		</tr>
		<tr>
		<td valign="top">Detail</td>
		<td valign="top"><textarea id="email-content" name="email-content"></textarea></td>
		</tr>
		</tbody>
	</table>
	<input name="send" id="send" type="button" size="" value="send" onclick="JavaScript:doCallSend();" > 
<?
}
?>
</td>
</tr>
</table>
<input name="page" id="page" type="hidden" size="" value="<?=$page;?>"> 
<input name="title" id="title" type="hidden" size="" value="<?=$title;?>">
<input name="id" id="id" type="hidden" size="" value="<?=$id;?>">  

