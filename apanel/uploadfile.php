<?
include("include/eg.inc.php");
$eg = new eg();
$page = $eg->getParameter("page");
$name = $eg->getParameter("name");
$id = $eg->getParameter("id");
$type = $eg->getParameter("type");

$uploaddir = "../images/".$page."/"; 
$ext = pathinfo(basename($_FILES['uploadfile']['name']), PATHINFO_EXTENSION);

$file = $uploaddir.$type."-".$id.".".$ext; 
$path = "images/".$page."/".$type."-".$id.".".$ext;


if (move_uploaded_file($_FILES['uploadfile']['tmp_name'], $file)) {
	echo $path ; 

} else {
	echo "error";
}
?>