
<?
include("include/eg.inc.php");
$eg = new eg();

$subemail=$eg->getParameter("subemail",false);
$subemail = mysql_escape_string($subemail);
$subcsname=$eg->getParameter("subcsname",false);
$subcsname = mysql_escape_string($subcsname);
$sub = $eg->isValidEmail($subemail);
$sql="SELECT *
			FROM `subscribe`
			WHERE `sub_email` = '".$subemail."'";
	$rs=$eg->get_data($sql);
?>
<html>
<head>
<link rel="stylesheet" type="text/css" media="screen" href="./css/style.css">
</head>
</html>

<?
if(!$subemail || !$subcsname){

	$msg="<div id='msg'><font color='#DE5130'>Please Enter Your Name and Email !</font></div>";
}
elseif(!$sub)
{
$msg="<div id='msg'><font color='#DE5130'>Please Provide Valide Email !</font></div>";
}
else{
	if(!$rs){
		$sql="INSERT INTO `subscribe` (
				`sub_id` ,
				`sub_email` ,
				`sub_name` ,
				`sub_status`
				)
				VALUES (
				NULL , \"$subemail\", \"$subcsname\", '1'
				);";
		$insert=$eg->set_data($sql);
		$msg="<div id='msg''><font color='#0B4100'>Thank you for Subscribing!</font></div>";
	}else{
		$msg="<div id='msg'><font color='#DE5130'>This email address has subscribed already!</font></div>";
	}
	
}
echo $msg;
?>
