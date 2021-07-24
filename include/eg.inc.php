<?
require_once("mysql.inc.php");

class eg
{
	var $ip;
	var $showpage;
	var $rdcount;
	var $u_id;
	var $errormsg;
	var $msg;
	var $msgcolor;
	
	var $column;
	var $lastid;
	var $affectedrows;
	
	function eg()
	{		
		$this->msg = "";
		$this->ip = $_SERVER["REMOTE_ADDR"];
		$this->showpage = 20;	
		$this->msgcolor = "red";
		$this->errormsg = "";
		$this->column = 3;
		$this->affectedrows = 0;
		$this->u_id = $_SESSION["__user_id"];
		$this->u = $_SESSION["__user"];		
	}		
		
	function get_ip()
	{
		return $this->ip;		
	}	
	
	function set_msg($newmsg)
	{
		$this->msg = $newmsg;
	}
	
	function get_msg()
	{
		return $this->msg;
	}
	
	function set_rdcount($newrdcount)
	{
		$this->rdcount = $newrdcount;
	}
	
	function set_errormsg($newMsg=false) {
		$this->errormsg = $newMsg;
	}

/********************************************************
 * Get and Set parameter function
 ********************************************************/ 	
/*
 * function to get parameter form POST or GET method
 * @param - Parameter name
 * @param - Return value
 */	
	function getParameter($value, $return=false, $numeric=false) {
		$default = $return;
		if(isset($_POST[$value])) {$return = $_POST[$value];}
		if(isset($_GET[$value])) {$return = $_GET[$value];}
		
		if($numeric){
			if(!ctype_digit($return)){return $default;}
		}else if(!is_array($return)){
			$return =$this->RemoveXSS($return);
		}
		
		return $return;
	}
	
/*
 * function for remove XSS from url parameter
 * @param - Value of the parameter
 */	
	function RemoveXSS($val) {
	   // remove all non-printable characters. CR(0a) and LF(0b) and TAB(9) are allowed
	   // this prevents some character re-spacing such as <java\0script>
	   // note that you have to handle splits with \n, \r, and \t later since they *are* allowed in some inputs
	   // note that you have to handle splits with \n and \r and \t later since they *are* allowed in some inputs
	   // remove , 8-Oct-2009 by natt
	   $val = preg_replace('/([\x00-\x08\x0b-\x0c\x0e-\x19])/', '', $val);
	   
	   // straight replacements, the user should never need these since they're normal characters
	   // this prevents like <IMG SRC=&#X40&#X61&#X76&#X61&#X73&#X63&#X72&#X69&#X70&#X74&#X3A &#X61&#X6C&#X65&#X72&#X74&#X28&#X27&#X58&#X53&#X53&#X27&#X29>
	   $search = 'abcdefghijklmnopqrstuvwxyz';
	   $search .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
	   $search .= '1234567890!@#$%^&*()';
	   $search .= '~`";:?+/={}[]-_|\'\\';
	   for ($i = 0; $i < strlen($search); $i++) {
	      // ;? matches the ;, which is optional
	      // 0{0,7} matches any padded zeros, which are optional and go up to 8 chars
	   
	      // &#x0040 @ search for the hex values
	      $val = preg_replace('/(&#[xX]0{0,8}'.dechex(ord($search[$i])).';?)/i', $search[$i], $val); // with a ;
	      // &#00064 @ 0{0,7} matches '0' zero to seven times
	      $val = preg_replace('/(&#0{0,8}'.ord($search[$i]).';?)/', $search[$i], $val); // with a ;
	   }
	   
	   // now the only remaining whitespace attacks are \t, \n, and \r
	   $ra1 = Array('javascript', 'vbscript', 'expression', 'applet', 'meta', 'xml', 'blink', 'link', 'style', 'script', 'embed', 'object', 'iframe', 'frame', 'frameset', 'ilayer', 'layer', 'bgsound', 'title', 'base');
	   $ra2 = Array('onabort', 'onactivate', 'onafterprint', 'onafterupdate', 'onbeforeactivate', 'onbeforecopy', 'onbeforecut', 'onbeforedeactivate', 'onbeforeeditfocus', 'onbeforepaste', 'onbeforeprint', 'onbeforeunload', 'onbeforeupdate', 'onblur', 'onbounce', 'oncellchange', 'onchange', 'onclick', 'oncontextmenu', 'oncontrolselect', 'oncopy', 'oncut', 'ondataavailable', 'ondatasetchanged', 'ondatasetcomplete', 'ondblclick', 'ondeactivate', 'ondrag', 'ondragend', 'ondragenter', 'ondragleave', 'ondragover', 'ondragstart', 'ondrop', 'onerror', 'onerrorupdate', 'onfilterchange', 'onfinish', 'onfocus', 'onfocusin', 'onfocusout', 'onhelp', 'onkeydown', 'onkeypress', 'onkeyup', 'onlayoutcomplete', 'onload', 'onlosecapture', 'onmousedown', 'onmouseenter', 'onmouseleave', 'onmousemove', 'onmouseout', 'onmouseover', 'onmouseup', 'onmousewheel', 'onmove', 'onmoveend', 'onmovestart', 'onpaste', 'onpropertychange', 'onreadystatechange', 'onreset', 'onresize', 'onresizeend', 'onresizestart', 'onrowenter', 'onrowexit', 'onrowsdelete', 'onrowsinserted', 'onscroll', 'onselect', 'onselectionchange', 'onselectstart', 'onstart', 'onstop', 'onsubmit', 'onunload');
	   $ra = array_merge($ra1, $ra2);
	   
	   $found = true; // keep replacing as long as the previous round replaced something
	   while ($found == true) {
	      $val_before = $val;
	      for ($i = 0; $i < sizeof($ra); $i++) {
	         $pattern = '/';
	         for ($j = 0; $j < strlen($ra[$i]); $j++) {
	            if ($j > 0) {
	               $pattern .= '(';
	               $pattern .= '(&#[xX]0{0,8}([9ab]);)';
	               $pattern .= '|';
	               $pattern .= '|(&#0{0,8}([9|10|13]);)';
	               $pattern .= ')*';
	            }
	            $pattern .= $ra[$i][$j];
	         }
	         $pattern .= '/i';
	         $replacement = substr($ra[$i], 0, 2).'<x>'.substr($ra[$i], 2); // add in <> to nerf the tag
	         $val = preg_replace($pattern, $replacement, $val); // filter out the hex tags
	         if ($val_before == $val) {
	            // no replacements were made, so exit the loop
	            $found = false;
	         }
	      }
	   }
	   return $val;
	} 
	
	function get_data($sql = false,$debug = false)
	{
		$m = new mysql();
		 $rs = $m->MyGetBySql($sql,$debug);
		 $this->set_rdcount($m->getRecordcount());
		 if(!$rs)
		  {
			 $this->set_errormsg("<font color=red>".$m->getMsg()."</font>");
		  }
		unset($m);  
		return $rs;
	}

	function set_data($sql = false,$debug = false)
	{
		$m = new mysql();

	 	$id = $m->MySetBySql($sql);	 
	
	 	$this->set_errormsg("<br> <b>Error</b>: <font color=red>".$m->getMsg()." </font><br> <b>SQL</b>: $sql");
	 	$this->lastid = $m->getLastinsertid();
	 	$this->affectedrows = $m->getAffected();
     	unset($m);

		return $id;	
	}
	
	function subscribe($email=false){
		$sub=array();
			if($email){
				$sql = "select * from subscribe where sub_email=\"".$email."\" limit 1 ";		
				$rs = $this->get_data($sql);
				if($rs){
					$sub["class"]="error_msg";
					$sub["head"]="Sorry!";
					$sub["detail"]="This email address has subscribed already";
				}else{
					$sql_insert = "insert into subscribe (sub_email) value (\"".$email."\")"; 
					$insert = $this->set_data($sql_insert);
					
					$sub["class"]="complete_msg";
					$sub["head"]="Thanks for  subscribing!";
					$sub["detail"]="A confirmation of your subscription has been sent to your email address, with instructions for unsubscribing.";
				}
			}else{
				$sub["class"]="error_msg";
				$sub["head"]="Sorry!";
				$sub["detail"]="Please provide a valid email address.";
			}
			
			return $sub;
	}
	
	function homeContent(){
			$sql = "select * from home_content";
			$rs = $this->get_data($sql);
			return $rs;
	}
	
	function getItemContent($item=false){
			$sql = "select * from home_content where home_id=\"".$item."\"";
			$rs = $this->get_data($sql);
			return $rs;
	}
	
	function coursesContent(){
			$sql = "select * from courses_content";
			$rs = $this->get_data($sql);
			return $rs;
	}
	
	function getCoursesContent($item=false){
			$sql = "select * from courses_content where courses_id=\"".$item."\"";
			$rs = $this->get_data($sql);
			return $rs;
	}
	
	function getEventContent(){
			$sql = "select * from event_content order by event_id desc";
			$rs = $this->get_data($sql);
			return $rs;
	}
	function isValidEmail($email=false){
    return preg_match("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^", $email);
}


}
?>