<?
include("include/eg.inc.php");
include("../class.phpmailer.php");
$mail = new PHPMailer();
$csEmail = "oasisschool@oasisspa.net";
$eg = new eg();

$strUser = trim($eg->getParameter("tUser"));

	//*** Check Username & Email ***//
	if(trim($strUser) == "")
	{
		echo "N";
		exit();
	}else{
		$chk_remind=$eg->checkRemind($strUser);

		if($chk_remind){
			$name=$chk_remind[0]["name"];
			$user=$chk_remind[0]["u"];
			$email=$chk_remind[0]["email"];
			$pass=$eg->randomPassword(8);
			$reset=$eg->resetPassword($user,$pass);
			// Send e-mail to customer;
			$eol = " <br> ";
			$content = "<body style='margin: 0px;'>";
			$content .= "<div style='width: 640px; font-family: Arial, Helvetica, sans-serif; font-size: 14px;'>";
			$content .= "============ Customer Information ============".$eol;
			$content .= "Name : ".$name.$eol;
			$content.= "E-mail : ".$email.$eol;
			$content .= "Username : ".$username.$eol;
			$content .= "New Password : ".$pass.$eol;
			$content .= "</body>";
			
			$mail->From		= $csEmail;
			$mail->FromName = "Oasis Spa School Customer Service";
			$mail->CharSet  = "utf-8";
			
			$mail->Subject  = "Oasis Spa School - Reminder from website.";			
			
			$mail->MsgHTML($content);
			$mail->AddAddress($email, $name);
			
			$mail->Send();
			
			echo "Y";
		}else{
			echo "W";
			exit();
		}
	}
?>