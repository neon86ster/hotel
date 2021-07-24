<?
include("include/eg.inc.php");
include("class.phpmailer.php");
$mail = new PHPMailer();
$csmail = "david@tap10.com";
$eg = new eg();
$subject=$eg->getParameter("subject");
$detail=$_POST["detail"];
$csEmail = "oasisschool@oasisspa.net";

if($subject){
	//Send e-mail to CS;
	$eol = " <br> ";
	$content = "<body style='margin: 0px;'>";
	$content .= "<div style='width: 640px; font-family: Arial, Helvetica, sans-serif; font-size: 14px;'>";
	$content .= "============ Newsletter Information ============".$eol;
	$content .= $detail." ".$eol;
	$content .= "</body>";
			
	$mail->From		= $csEmail;// Customer email.
	$mail->FromName = "Oasis Spa School Customer Service";
	$mail->CharSet  = "utf-8";
			
	$mail->Subject  = $subject;
			
	$mail->MsgHTML($content);
	
	$customer_mail=$eg->getEmailList();
	for($i=0;$i<$customer_mail["rows"];$i++){
		$mail->AddAddress($customer_mail[$i]["sub_email"], "Customer Service");
	}
	
	if(!$mail->Send()) {
			  echo "F";
			  $msg_class="error_msg";
			  $msg="Sorry, Please check your infomation again.";
	} else {
			  echo "Y";
			  $class="complete_msg";
			  $head="Success,";
			  $detail="Your information has been received!";
	}
}else{
	echo "W";
	$class="error_msg";
	$head="Sorry!";
	$detail="Please provide a valid email address.";
}
?>