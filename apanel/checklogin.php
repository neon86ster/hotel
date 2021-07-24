<?
session_start();
include("include/eg.inc.php");
$eg = new eg();
	
	$strUsername = trim($eg->getParameter("tUsername"));
	$strPassword = trim($eg->getParameter("tPassword"));
	//*** Check Username & Password ***//
	if(trim($strUsername) == "" && trim($strPassword) == "")
	{
		echo "B";
		exit();
	}
	else if(trim($strUsername) == "")
	{
		echo "U";
		exit();
	}
	
	else if(trim($strPassword) == "")
	{
		echo "P";
		exit();
	}else{
		$chk_login=$eg->checkUserPass($strUsername,$strPassword);
		if($chk_login){
			echo "Y";
			$_SESSION["__user"] = $chk_login[0]["u"];
			$_SESSION["__user_id"] = $chk_login[0]["u_id"];
			$_SESSION["__user_expert"] = $chk_login[0]["expert"];
		}else{
			echo "W";
			exit();
		}
	}
?>