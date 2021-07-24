<?
include("../include/eg.inc.php");
$eg = new eg();

$send=$eg->getParameter("send");
$cs_name=$eg->getParameter("cs_name");
$cs_email=$eg->getParameter("cs_email");
$sub = $eg->isValidEmail($cs_email);

?>
<html>
<head>
<link rel="stylesheet" type="text/css" media="screen" href="./css/style.css">
</head>
</html>
<?
if(!$cs_name || !$cs_email){

	$msg="<div id='msg'><font color='#DE5130'>Please Enter Your Name and Email !</font></div>";
}
elseif(!$sub)
{
$msg="<div id='msg'><font color='#DE5130'>Please Provide Valid Email !</font></div>";
}
else{
		$title = $eg->getParameter("cs_title",false);
		$name = $eg->getParameter("cs_name",false);
		$countrycode = $eg->getParameter("cs_countrycode",false);
		$phone = $eg->getParameter("cs_phone",false);
		$email = $eg->getParameter("cs_email",false);
		$subject = $eg->getParameter("cs_subject",false);
		$description = $eg->getParameter("cs_description",false);
		$ip = $eg->get_ip();
		
		$csMessage='<body style="margin: 0px;">
					<div style="width: 640px; font-family: Arial, Helvetica, sans-serif; font-size: 14px;">
					============ Customer Information ============<br>
					'.$title.' '.$name.' <br>
					Tel : '.$countrycode.' '.$phone.' <br>
					Email : '.$email.' <br>
					Description : '.$description.' <br>
					Contact from IP :'.$ip.' <br></body>';
		
		$strMessage='<body style="margin: 0px;">
					<div style=width: 640px; font-family: Arial, Helvetica, sans-serif; font-size: 14px;">
					<table width="600" cellpadding="2" cellspacing="0" border="0" style="font-family:tahoma; font-size:12px;">
					<tr>
						<td colspan="2"><div align="left"></div></td>
					</tr>
					<tr>
						<td colspan="2"><b>Dear '.$title.' '.$name.'</b><br></td>
					</tr>
					<tr>
						<td>&nbsp;</td><td align="left" >&nbsp;</td>
					</tr>
					<tr>
						<td colspan="2">
						<b>Greetings from Oasis Baan Saen Doi Spa Resort!<br>
						   We are delighted to receive your communication from our website:</b>
						</td>
					</tr>
					<tr>
						<td width="150">Your Name : </td>
						<td width="450" align="left">'.$title.' '.$name.'</td>
					</tr>
					<tr>
						<td width="150">Your E-mail : </td>
						<td width="450" align="left">'.$email.'</td>
					</tr>
					<tr>
						<td width="150">Your Subject : </td>
						<td width="450" align="left">'.$subject.'</td>
					</tr>
					<tr>
						<td width="150">Your Description : </td>
						<td width="450" align="left">'.$description.'</td>
					</tr>
					<tr>
						<td>&nbsp;</td><td align="left" >&nbsp;</td>
					</tr>
					<tr>
						<td><b>We will get back to you within 24 hours.<br>
							   Thank you for contacting Oasis Baan Saen Doi Spa Resort!</b></td>
					</tr>
					<tr>
						<td>&nbsp;</td><td align="left" >&nbsp;</td>
					</tr>
					<tr>
						<td colspan="2"><div align="left"><img src="http://oasisluxury.net/images/luxuryfooter.jpg" width="820" height="87"></div></td>
					</tr>
					</table></div></body>';
					
		//Send e-mail to Customer;
			$strSubject = "Thank you for contacting Oasis Baan Saen Doi Spa Resort";
			
			//*** Uniqid Session ***//
			$strSid = md5(uniqid(time()));

			$strHeader = "";
			$strHeader .= "From: Oasis Baan Saen Doi Customer Service <cs@oasisluxury.net>\nReply-To: cs@oasisluxury.net\n";
			//$strHeader .= "Cc: Oasis Spa Customer Service<cs@oasisspa.net>";
			//$strHeader .= "Bcc: cs@oasisspa.net";

			$strHeader .= "MIME-Version: 1.0\n";
			$strHeader .= "Content-Type: multipart/mixed; boundary=\"".$strSid."\"\n\n";
			$strHeader .= "This is a multi-part message in MIME format.\n";

			$strHeader .= "--".$strSid."\n";
			$strHeader .= "Content-type: text/html; charset=utf-8\n"; // or UTF-8 //
			$strHeader .= "Content-Transfer-Encoding: 7bit\n\n";
			$strHeader .= $strMessage."\n\n";
		
		//Send e-mail to CS;
			$strTo = "cs@oasisluxury.net";
			$csSubject = $subject;
			
			if($email){
			$csHeader = "From: <".$email.">\n";
			}
			$csHeader .= "MIME-Version: 1.0\n";
			$csHeader .= "Content-Type: multipart/mixed; boundary=\"".$strSid."\"\n\n";
			$csHeader .= "This is a multi-part message in MIME format.\n";

			$csHeader .= "--".$strSid."\n";
			$csHeader .= "Content-type: text/html; charset=utf-8\n"; // or UTF-8 //
			$csHeader .= "Content-Transfer-Encoding: 7bit\n\n";
			$csHeader .= $csMessage."\n\n";
		
		$flgSend = @mail($email,$strSubject,null,$strHeader);  // @ = No Show Error //
		$flgSend = @mail($strTo,$csSubject,null,$csHeader);  // @ = No Show Error //

		$msg="<div id='msg''><font color='#0B4100'>Thank you for Contact!We will contact you shortly</font></div>";
		

		

	
}
echo $msg;

?>