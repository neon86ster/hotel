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
		$this->errormsg = "";
		$this->column = 3;
		$this->affectedrows = 0;
		$this->u_id = $_SESSION["__user_id"];
		$this->u = $_SESSION["__user"];	
		$this->expert = $_SESSION["__user_expert"];				
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
	
	function get_errormsg($newMsg=false) {
		return $this->errormsg;
	}
	
	function set_errormsg($newMsg=false) {
		$this->errormsg = $newMsg;
	}
	
	function setShowpage($newshowpage=false) {
 		$this->showpage = $newshowpage;
 	}
 	
 	function getShowpage() {
 		return $this->showpage;
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
	
	function checkUserPass($user=false,$pass=false){
		$sql = "select * from s_user where u=\"".urldecode($user)."\" and pass=\"".md5(htmlspecialchars(urldecode($pass)))."\"";
		$rs = $this->get_data($sql);
		return $rs;
	}
	
	function checkUser($user, $ignore=false) {
		if(!$ignore){
	    	$sql = "select * from s_user where u=\"".$user."\"";
	    }else{
	    	$sql = "select * from s_user where u=\"".$user."\" and u_id !=\"".$ignore."\"";
	    }
		$rs = $this->get_data($sql);
	    return  $rs;
	}
	
	function checkRemind($user=false){
		$sql = "select * from s_user where u=\"".$user."\" or email=\"".$user."\"";
		$rs = $this->get_data($sql);
		return $rs;
	}
	
	function randomPassword($len)
	{
		srand((double)microtime()*10000000);
		$chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
		$ret_str = "";
		$num = strlen($chars);
		for($i = 0; $i < $len; $i++)
		{
			$ret_str.= $chars[rand()%$num];
			$ret_str.=""; 
		}
		return $ret_str; 
	}
	
	function resetPassword($user=false,$pass=false){
		$sql ="update s_user set pass=\"".md5($pass)."\" where u=\"".$user."\"";
		$rs = $this->set_data($sql);
		return $rs;
	}
	
	function gerUserInfo($user=false){
		$sql = "select * from s_user where u=\"".$user."\"";
		$rs = $this->get_data($sql);
		return $rs;
	}
	
	function checkLogin(){
		if($_SESSION["__user"] == ""){
			header("location:login.php");
			exit();
		}else{
			$user=$_SESSION["__user"];
			$rs=$this->gerUserInfo($user);
			return $rs;
		}
	}
	
	function checkParameter($data=false, $return=false) {
		if(isset($data)&&$data){return $data;}
		else {return $return;}
	}
	
	function gFormEdit($xml, $filename='object.xml', $debug=false) {
 		$e = simplexml_load_string($xml);
 		$f = simplexml_load_file($filename);
 		
 		$tbname = $e->table;
 		$element = $f->table->$tbname;
 		$method = $this->checkParameter($element["method"],"post");
 		$action = $element["action"];
 		$enctype = $element["enctype"];
 		$usetable = $element["useTable"];
 		$eid = $element->idfield;
		$idfield = $eid["name"];
	
 		$rs = $this->getRsXML($xml,$filename,$debug);
 			
 		$textout .= "<table class=\"generalinfo\">\n";
 		foreach($element->field as $ff) {
 			$name = $ff["name"];
 			
 			$defaultvalue = false;
			if($ff["defaultvalue"]=="__get"){
				$defaultvalue = (isset($_GET["$name"]))?$_GET["$name"]:false;
			}else if($ff["defaultvalue"]=="__post"){
				$defaultvalue = (isset($_POST["$name"]))?$_POST["$name"]:false;
			}else if(isset($ff["defaultvalue"])){
				$defaultvalue = $ff["defaultvalue"];
			}
 			if($rs[0]["$name"] && $defaultvalue===false ){
 				$defaultvalue = $rs[0]["$name"];
 			}
				
 			if($ff["formtype"] == "submit" || $ff["formtype"] == "button") {
 				$defaultvalue = " save change ";
 			}
			
			if($ff["forexpert"]=="yes"){
						if(!$this->expert){
							$ff["formtype"]="hidden";
						}
					}
 			
	 			if($ff["showinformEdit"]!="no" && $ff["showinform"]!="no" && $ff["formtype"]!="hidden" && $ff["formtype"]!="password") {
	 				$textout .= "<tr> \n";
	 				$textout .= "<td valign='top'>".$ff["formname"];
					if($ff["prior"]){$textout .= "<font style='color:#ff0000''> ".$ff["prior"]."</font> ";}
					$textout .= "</td> \n";
	 				$textout .= "<td valign='top'> \n";
	 				
	 				if(($ff["formtype"]=="text" || $ff["formtype"]=="file" || $ff["formtype"]=="submit" || $ff["formtype"]=="reset" || $ff["formtype"]=="button")&&$ff["updatein"]=="") {
	 					$textout .= "<input class='".$ff["class"]."' name=\"".$ff["name"]."\" id=\"".$ff["name"]."\" type=\"".$ff["formtype"]."\" size=\"".$ff["size"]."\" value=\"".$defaultvalue."\" ".$ff["javascript"]." > \n";
	 				}
	 				else if($ff["formtype"]=="textarea") {
	 					$textout .= "<textarea name=\"".$ff["name"]."\" id=\"".$ff["name"]."\" size=\"".$ff["size"]."\" ".$ff["javascript"]." >".$defaultvalue."</textarea> \n";
	 				}
	 				else if($ff["formtype"]=="checkbox") {
	 					$selected = ($rs[0]["$name"] == 1)?"checked":"";     
	 					$textout .= "<input name=\"".$ff["name"]."\" id=\"".$ff["name"]."\" type=\"".$ff["formtype"]."\" value=\"1\" ".$ff["javascript"]." $selected> \n";
	 				}
	 				else if($ff["formtype"]=="textlink") {
	 					$textout .= "<a href=\"".$ff["href"]."?".$ff["target"]."\">".$ff["description"]."</a> \n";
	 				}
	 				else if($ff["formtype"]=="select") {
	 					$textout .= $this->gSelectBox($ff,$filename,$defaultvalue,$debug);
	 				}
					else if($ff["formtype"]=="image") {
						if($defaultvalue){
							$textout .= "<div id=\"".$ff["name"]."\"><img id=\"upload_image\" src=\"../$defaultvalue?".time()."\"></div>";
						}else{
							$textout .= "<div id=\"".$ff["name"]."\">No Image</div>";
						}
						$textout .= "<div id=\"upload\" ><span><input type=\"button\" name=\"btn_upload\" id=\"btn_upload\" value=\"upload\" onclick=\"\"></span></div><span id=\"status\" ></span> \n";
						$textout .= "<input name=\"".$ff["name"]."\" id='path' type='hidden' value=\"$defaultvalue\" > \n";
					}
					else if($ff["formtype"]=="date") {
						$date = new DateTime($defaultvalue);
						$date = $date->format('d-m-Y');
						$textout .= "<input readonly='readonly' class='".$ff["class"]."' id='datepicker-".$ff["name"]."' type='text' name='".$ff["name"]."' maxlength='".$ff["maxlength"]."' size='".$ff["size"]."' value=\"$date\" ".$ff["javascript"].">";
						$textout .= "<input class='".$ff["class"]."' id='".$ff["name"]."' type='hidden' name='".$ff["name"]."' maxlength='".$ff["maxlength"]."' size='".$ff["size"]."' value=\"$defaultvalue\" ".$ff["javascript"].">";
	 				}
	 				$textout .= "</td> \n";
	 				$textout .= "</tr> \n";
	 			}else if($ff["formtype"]=="password"){
	 				$textout .= "<tr> \n";
	 				$textout .= "<td valign='top'>New password";
					$textout .= "</td> \n";
	 				$textout .= "<td valign='top'> \n";
	 				$textout .= "<input name=\"".$ff["name"]."\" id=\"newpass\" type=\"".$ff["formtype"]."\" size=\"".$ff["size"]."\" value=\"\" ".$ff["javascript"]." > \n";
					$textout .= "</td>\n";
					$textout .= "</tr>\n";
	 				$textout .= "<tr> \n";
	 				$textout .= "<td valign='top'>Retype New password";
					$textout .= "</td> \n";
	 				$textout .= "<td valign='top'> \n";
	 				$textout .= "<input name=\"".$ff["name"]."\" id=\"rnewpass\" type=\"".$ff["formtype"]."\" size=\"".$ff["size"]."\" value=\"\" ".$ff["javascript"]." > \n";
					$textout .= "</td>\n";
					$textout .= "</tr>\n";
	 			}else {
	 				$textout .= "<input name=\"".$ff["name"]."\" id=\"".$ff["name"]."\" type=\"".$ff["formtype"]."\" value=\"".$defaultvalue."\"> \n";
	 			}	
 		}
		
 		$textout .= "<input name='formname' id='formname' type='hidden' value=\"".$tbname."\" > \n";
 		$textout .= "</table> \n";
 		//$textout .= "</form> \n";
 		return $textout;
 	}
	
	function gFormInsert($tbname,$filename='object.xml',$debug=false) {
 		
 		//For debug undefined variable : textout
 		$textout="";
 		
 		$f = simplexml_load_file($filename);
		
		$element = $f->table->$tbname;
		$action = $element["action"];
		$enctype = $element["enctype"];
		$usetable = $element["useTable"];
		$setform = $element["setForm"];
		$setdateform = $element["setdateForm"];
		if($setform){$textout = "<form name='$tablename' action='$action' enctype='$enctype' method='post'>\n";}
		$textout .= "<table class=\"generalinfo\">";
		foreach($element->field as $field) { // start loop xml
			$name = $field["name"];
			if(!isset($_GET["$name"])){$_GET["$name"]="";}
			if($field["defaultvalue"]=="__get"){
				$defaultvalue = (isset($_GET["$name"]))?$_GET["$name"]:false;
			}else if($field["defaultvalue"]=="__post"){
				$defaultvalue = (isset($_POST["$name"]))?$_POST["$name"]:false;
			}else if(isset($field["defaultvalue"])){
				$defaultvalue = $field["defaultvalue"];
			}else{
				$defaultvalue = false;
			}
			
			if($usetable == "yes") {

				if($field["showinform"] != "no" && $field["formtype"]!="hidden" && $field["formtype"]!="password"
					&& $field["showinformAdd"]!="no"){
					
					$textout .= "<tr>\n";
					$textout .= "<td valign='top'>".$field["formname"];
					if($field["prior"]){$textout .= "<font style='color:#ff0000'> ".$field["prior"]."</font> ";}
					$textout .= "</td>\n";
					$textout .= "<td valign='top'>";
					
					if($field["formtype"]=="text" || $field["formtype"]=="button" || $field["formtype"]=="submit" || $field["formtype"]=="reset" || $field["formtype"]=="button"){
						if($field["formtype"]=="text"){
							$field["javascript"]="onChange='".$field["javascript"]."'";
						}
						$textout .= "<input class='".$field["class"]."' id='".$field["name"]."' type='".$field["formtype"]."' name='".$field["name"]."' maxlength='".$field["maxlength"]."' size='".$field["size"]."' value=\"$defaultvalue\" ".$field["javascript"].">";
					}
					else if($field["formtype"]=="textarea") {
						$textout .= "<textarea id='".$field["name"]."' name='".$field["name"]."' cols='".$field["cols"]."' rows='".$field["rows"]."' ".$field["javascript"].">$defaultvalue</textarea>";
					}
					else if($field["formtype"]=="checkbox") {
						if($field["defaultvalue"]=="__post"&&$_POST["$name"]==1) {$selected = "checked";} else {$selected = "";}
						if($field["defaultvalue"]=="__get"&&$_GET["$name"]==1) {$selected = "checked";} else {$selected = "";}
						$textout .= "<input id='".$field["name"]."' type='".$field["formtype"]."' name='".$field["name"]."' value=\"$defaultvalue\" ".$field["javascript"]." $selected>";
					}
					else if($field["formtype"]=="textlink"){
						$textout .= "<a href='".$field["href"]."' ".$field["target"].">".$field["description"]."</a> ";
					}
	 				else if($field["formtype"]=="select") {
	 					$textout .= $this->gSelectBox($field,$filename,$defaultvalue,$debug);
	 				}
					else if($field["formtype"]=="date") {
						$textout .= "<input readonly='readonly' class='".$field["class"]."' id='datepicker-".$field["name"]."' type='text' name='".$field["name"]."' maxlength='".$field["maxlength"]."' size='".$field["size"]."' value=\"$defaultvalue\" ".$field["javascript"].">";
						$textout .= "<input class='".$field["class"]."' id='".$field["name"]."' type='hidden' name='".$field["name"]."' maxlength='".$field["maxlength"]."' size='".$field["size"]."' value=\"$defaultvalue\" ".$field["javascript"].">";
	 				}
					$textout .= "</td>\n";
					$textout .= "</tr>\n";
				}else if($field["formtype"]=="password"){
	 				$textout .= "<tr> \n";
	 				$textout .= "<td valign='top'>Password";
					$textout .= "</td> \n";
	 				$textout .= "<td valign='top'> \n";
	 				$textout .= "<input name=\"".$field["name"]."\" id=\"pass\" type=\"".$field["formtype"]."\" size=\"".$field["size"]."\" value=\"\" ".$field["javascript"]." > \n";
					$textout .= "</td>\n";
					$textout .= "</tr>\n";
	 				$textout .= "<tr> \n";
	 				$textout .= "<td valign='top'>Retype password";
					$textout .= "</td> \n";
	 				$textout .= "<td valign='top'> \n";
	 				$textout .= "<input name=\"".$field["name"]."\" id=\"rpass\" type=\"".$field["formtype"]."\" size=\"".$field["size"]."\" value=\"\" ".$field["javascript"]." > \n";
					$textout .= "</td>\n";
					$textout .= "</tr>\n";
	 			}else if($field["formtype"]=="hidden"){
	 				$textout .= "<input id='".$field["name"]."' name='".$field["name"]."' type='".$field["formtype"]."' value='".$defaultvalue."'>\n";
				}else{
					$textout .= "<input id='".$field["name"]."' name='".$field["name"]."' type='hidden' value='".$defaultvalue."'>\n";
				}
			} 
		} // end loop xml
		
		$textout .= "<input name='formname' id='formname' type='hidden' value='$tbname'>\n";
		$textout .= "</table>\n";
		if($setform){$textout .= "</form>\n";}
        return $textout;
		
 	}
	
	function getPass($u_id){
		$sql = "select * from s_user where u_id=\"".$u_id."\"";
		$rs = $this->get_data($sql);
		if($rs["rows"]){
			return $rs[0]['pass'];
		}else {
			return false;
		}
	}
	
	function readToUpdate($post, $filename='object.xml', $debug=false) {
 		$formname = $post["formname"];
		$tmp = $this->readForm($post, $filename);
		if(!$tmp){return false;}
		$key = array_keys($tmp);
 		
 		$field = "";
 		$value = "";
 		$set = false;
 		for($i=0; $i<count($key); $i++) {
 			$field = $key[$i];
 			if(str_replace("'","",htmlspecialchars($tmp[$key[$i]]))!=""&&$key[$i]=="pass"){
 				$value = "'".md5(str_replace("'","",htmlspecialchars(urldecode($tmp[$key[$i]]))))."'";
 			}else if(str_replace("'","",htmlspecialchars($tmp[$key[$i]]))==""&&$key[$i]=="pass"){
 				$value = "'".$this->getPass($post["u_id"])."'";
 			}else{
 				$value = htmlspecialchars(urldecode($tmp[$key[$i]]));
 			}
 			if($set) {
 				$set.=",";
 			}
 			
 			$set.= $field."=".$value;
 		}
 		
 		$sql = "update ".$formname." set ".$set." where ".$key[0]."=".$tmp[$key[0]];
 		$xml = "<command>" .
 				"<sql>".$sql."</sql>".
 				"</command>";
 		//echo $sql;
 		if($debug){
 			echo $sql."<br/>";
 		}
 		$id = $this->setRsXML($xml,$debug);
 		//echo $id;
 		if(!$id) {
 			$this->printDebug("formdb.readToUpdate()",$this->get_errormsg(),$sql);
 		}
 		
 		return $id;
 	}
	
	function readToInsert($post, $filename='object.xml', $debug=false) {
		$id = false;
		$formname = $post["formname"];
		$tmp = $this->readForm($post,$filename);
		if(!$tmp){return false;}
		$key = array_keys($tmp);
		
		$field="";	// field name after take out form type 'submit,button,file and textlink'
		$value="";	// value from form we need to input
		for($i=0; $i<count($key); $i++) {
			$field .= $key[$i];
 			if($key[$i]=="pass"){$value .= "'".md5(str_replace("'","",htmlspecialchars(urldecode($tmp[$key[$i]]))))."'";}
 			else if($key[$i]=="c_lu_user"){
 				$value .= $_SESSION["__user_id"];}
 			else if($key[$i]=="c_lu_date"){
 				$value .= "Now()";}
 			else if($key[$i]=="c_lu_ip"){
 				$value .= "'".$this->get_ip()."'";}
			else{$value .= htmlspecialchars(urldecode($tmp[$key[$i]]));}
			if($i < (count($key)-1)) {
				$field .= ",";
				$value .= ",";
			}
		}
 		$sql = "insert into $formname($field) values($value) ";
 		$xml = "<command>" .
 				"<sql>".$sql."</sql>" .
 				"</command>";
 		if($debug){
 			echo $sql."<br/>";
 		}
 		if($this->getDebugStatus()) {
 			$this->printDebug("formdb.readToInsert()","all array count: ".count($key),$sql);
 		}
		$id = $this->setRsXML($xml,true);
		if(!$id) {
			$this->printDebug("formdb.readToInsert()","insert information not complete!!",$sql);
		}
		return $id;
	}
	
	function readToDelete($table=false, $id=false, $filename='object.xml', $debug=false) {
		$f = simplexml_load_file($filename);
		$element = $f->table->$table;
		$eid = $element->idfield;
		$idfield = $eid["name"];
		
		$sql = "delete from $table where $idfield = $id";
 		$xml = "<command>" .
 				"<sql>".$sql."</sql>" .
 				"</command>";
 		if($debug){
 			echo $sql."<br/>";
 		}
 		if($this->getDebugStatus()) {
 			$this->printDebug("formdb.readToInsert()","all array count: ".count($key),$sql);
 		}
		$id = $this->setRsXML($xml,true);
		if(!$id) {
			$this->printDebug("formdb.readToInsert()","delete information not complete!!",$sql);
		}
		return $id;
	}
	
	function checkOldData($table=false,$field=false,$fieldvalue=false,$idfield=false,$idfieldvalue=false) {
		if(!$idfieldvalue){
	    	$sql = "select * from $table where $field=\"".$fieldvalue."\"";
	    }else{
	    	$sql = "select * from $table where $field=\"".$fieldvalue."\" and $idfield !=\"".$idfieldvalue."\"";
	    }
		$rs = $this->get_data($sql);
	    return  $rs;
	}
	
	function readForm($post,$filename='object.xml') {
	 
 		$formname = $post["formname"];
 		$f = simplexml_load_file($filename);
 		$tmp = array();
		$aform = $f->table->$formname;
		
		$eid = $aform->idfield;
		$ename = $aform->namefield;
		$idfield = $eid["name"];
		$namefield = $ename["name"];
		$repeat = $ename["repeat"];
			
		if($repeat=="no"){
			// check can't insert the name that already has in system
			foreach($aform->field as $ff){
		 		if("$namefield"==$ff["name"]){
		 			
					if($this->checkOldData($formname,$namefield,$post["$namefield"],$idfield,$post["$idfield"])){
						$this->set_errormsg("This ".$ff["formname"]." already exists. Please try again.");
	 					return false;
		 			}
		 			break;
					
		 		}
	 		}
		}
		
 		$insertField="";
 		$id="";
 		foreach($aform->field as $ff) {
 			if($ff["showinform"] != "no" && $ff["formtype"] != "submit" && $ff["formtype"]!="button" && $ff["formtype"]!="file" && $ff["formtype"]!="textlink" ) {
 				$t = $ff["name"];
 				$tmp["$t"] = $this->checkHiddenValue(htmlspecialchars($post["$t"]));
 				
 				if(($post["$t"]==""&&$ff["prior"]=="*")
 				||($ff["formtype"]=="select"&&$post["$t"]=="0"&&$ff["prior"]=="*")) {
 					$this->set_errormsg("Please insert ".$ff["formname"]."!!");
 					return false;
 				}
 			}
 			
	 		if($ff["formtype"]=="date"){
	 			$t = $ff["name"];
	 			$tmp["$t"] = "'".$this->separate_time(htmlspecialchars($post["$t"]),3)."'";
	 		}
 		}
 		return $tmp;
 	}
	
	function checkHiddenValue($value) {
		if($value=="thisuser") {
			return "'".$_SESSION["__user_id"]."'";
		}
		else if($value=="thistime") {
			return "Now()";
		}
		else if($value=="thisip") {
			return "'".$this->ip."'";
		} 
		else {
			//return "'".$value."'";
			return "'".str_replace("'","''",$value)."'";
		}
	}
	
	function getDebugStatus() {
		if(isset($_SESSION["__debug"])){
			return $_SESSION["__debug"];	
		}else{
			return false;
		}
		
	}
	
	function setRsXML($xml, $debug=false) {
		$e = simplexml_load_string($xml);
		$sql = $e->sql;
		return $this->set_data($sql, $debug);
	}
	
	function getRsXML($xml,$filename='object.xml', $debug=false) {
		$e = simplexml_load_string($xml);
		$f = simplexml_load_file($filename);
		
	// initial parameter from $xml => string command
	 	$table = $e->table;
	 	$sql = $e->sql;
	 	$field = $this->checkParameter($e->field, " * ");
	 	
	 	$where = $e->where;
	 	$status = $e->status;
	 	$order = $e->order;
	 	if($e->page)
	 		$page = $e->page;
	 	
	// initial parameter from file object.xml
		$limit = $f->table->$table->showpage["value"];
		$aform = $f->table->$table;
		
	 	if($sql) {return $this->getResult($sql);}
	 	else {$sql = "select ".$field." from ".$table." ";}
	 	
	 	if($e->usejoin == "yes") {
	 		foreach ($aform->jointable as $jj) {
				$sql .= $jj["jointype"]." ".$jj["tablename"]." on ".$table.".".$jj["pkfield"]."=".$jj["tablename"].".".$jj["fgkfield"]." ";        
			}
	 	}
	 	
	 	$count = count($where);
	 	
	 	$i=0;
		if($where) {
			$sql .= "where ";
			if($status=="search"){
				foreach($where as $wheres) {
					if($i<$count && $i!=0) {$sql.=" ".$wheres["logic"]." ";}
						
					$sql .= "lower(".$wheres["name"].") ".htmlspecialchars($wheres["operator"]." '".strtolower($wheres)."' ");
					$i++;	
				}
			} else {
				foreach($where as $wheres) {
					if($i<$count && $i!=0) {$sql.=" ".$wheres["logic"]." ";}
						
					$sql .= $wheres["name"]." ".htmlspecialchars($wheres["operator"]." '$wheres' ");
					$i++;	
				}
			}
		}
	 	
	 	if($order) {
	 		$arrchktbname = explode(".",$order);
	 		if(count($arrchktbname)>1) {
	 			$sql .= "order by ".$order." ";
	 		}
	 		else {
	 			$sql .= "order by ".$table.".".$order." ";
	 		}
	 	}
	 	
	 	if($page > -1) {$sql .= "limit ".$this->getPagetolimit($page,$limit).",".$limit." ";}
	 	if($debug){echo $sql."<br/>";}
	 	return $this->get_data($sql, $debug);
	}
	
	function getReport($table=false , $orderby=false, $sort='asc', $where=false){
		$sql = "select * from ".$table." ";
		if($where){
			$sql .= "where ".$where." ";
		}
		if($orderby){
			$sql .= "order by ".$orderby." ".$sort;
		}
		$rs = $this->get_data($sql);
		return $rs;
	}
	
	function getIdToText($id=false,$table=false,$field=false,$index=false,$condition=false,$debug=false) {
		if(!$id) {
			$this->set_errormsg("No have ID $id in $table!!");
			return false;
		}
		
		$sql = "select ".$field." from ".$table." where `$index`='$id'";
		if($condition){
			$sql .= " and $condition";
		}
		$sql .= " limit 0,1";
		if($debug){
 			echo $sql."<br/>";
 			return false;
 		}
		$row = $this->get_data($sql);
		return $row[0]["".$field.""];		
	}
	
	function printDebug($method, $msg=false, $SQL=false, $error=false, $errorcode=false) {
		$textout = "<pre> \n";
		$textout .= "<b>Object: ".get_class($this)."</b> \n";
		$textout .= "<b>From: <font color='#2b71d6'>$method</font></b> \n";
		
		if($msg) {$textout .= "<b>Msg</b>: <font color=".$this->successcolor.">$msg</font> \n";}
		if($SQL) {$textout .= "<b>SQL</b>: <font color=".$this->successcolor.">$SQL</font> \n";}
		
		if($error) {$textout .= "<b>Error</b>: <font color=".$this->errorcolor.">$error</font> \n";}
		if($errorcode) {$textout .= "<b>Error code</b>: <font color=".$this->errorcolor.">$errorcode</font> \n";}
		$textout .= "</pre>";
		echo $textout;
	}
	
	function insertPathImage ($page=false,$namefield=false,$idfield=false,$id=false,$path=false){
		$sql = "update ".$page." set ".$namefield."=\"".$path."\" where ".$idfield."=\"".$id."\"";
		$rs = $this->set_data($sql);
		return $rs;
	}
	
	function getEmailList (){
		$sql = "select * from subscribe where sub_status=1";
		$rs = $this->get_data($sql);
		return $rs;
	}
	
	function separate_time($timeinput=false,$to=false,$needtime=false) {
		$arrMonthNumbers = Array("Jan"=>0,"Feb"=>1,"Mar"=>2,"Apr"=>3,
    							"May"=>4,"Jun"=>5,"Jul"=>6,"Aug"=>7,
    							"Sep"=>8,"Oct"=>9,"Nov"=>10,"Dec"=>11);
    	$arrMonthNames = array_keys($arrMonthNumbers);
    	if($needtime){
    		$apTime = split(' ',$timeinput);
    		$dateinput = $apTime[0];
    		$timeinput = $apTime[1];
    	}else{
    		$dateinput = $timeinput;
    	}
    	
    	//print_r($apTime);
		if($to==1) {
			list($year, $month, $day) = split('[/.-]',$dateinput);
			$dateinput = $day."-".$month."-".$year;	
		}
		if($to==2) {
			list($day, $month, $year) = split('[/.-]',$dateinput);
			$dateinput = $year."-".$month."-".$day;	
		}
		if($to==3) {
			list($year,$month,$day) = split('[/.-]',$dateinput);
			$dateinput = date("y-m-d", mktime(0, 0, 0,$month,$day,$year));
     	}
		if($to==4) {
			list($year, $month, $day) = split('[/.-]',$dateinput);
			$dateinput = $year."".$month."".$day;	
		}
		if($to==5) {
			list($day, $month, $year) = split('[/.-]',$dateinput);
			$month = $arrMonthNumbers["$month"]+1;
			$dateinput = ($month>=10)?"$year-$month-$day":"$year-0$month-$day";	
		}
		if($to==6) {
			list($year, $month, $day) = split('[/.-]',$dateinput);
			$month = $arrMonthNames[$month-1];
			$dateinput = $day."-".$month."-".$year;	
		}
		if($to==7) {
			list($day, $month, $year) = split('[/.-]',$dateinput);
			$month = $arrMonthNumbers["$month"]+1;
			$dateinput = $day."-".$month."-".$year;	
		}
		if(!$to){
			list($day, $month, $year) = split('[/.-]',$timeinput);
			$dateinput = $year."".$month."".$day;	
		}	
		if($needtime){
			$timeinput = $dateinput." ".$timeinput;
			return $timeinput;
		}
		return $dateinput;	
		
	}
	
	function gSelectBox($ff,$filename='object.xml',$value=false,$debug=false) {
 		$f = simplexml_load_file($filename);
 		$tbname = $ff["table"];
 		$element = $f->table->$tbname;
 		$namefield = $element->namefield["name"];
 		$idfield = $element->idfield["name"];
 		$sortby = $element->sortby["name"];
 		
 		foreach($element->field as $field) {
 			if($field["formname"]=="Enable") {$activefield=$field["name"];}
 		}
 		$income = "";
 		if($value) {$income=", incoming parameter: ".$value;}
 		
 		$xml = "<command>".
 				"<table>$tbname</table>";
 		if($sortby!=""){
 			//echo "true<br>";
 			$xml .="<order>".$element->field["name"]."</order>";
 		}else{
 			//echo "false<br>";
			$xml .="<order>$namefield</order>";
 		}
 		
 		if($activefield){$xml.="<where name='$activefield' operator='='>1</where>";}
 		$xml .=	"</command>";
 		$rs = $this->getRsXML($xml,$filename,$debug);
 		
 		$textout = "<select name=\"".$ff["name"]."\" id=\"".$ff["name"]."\" ".$ff["javascript"]."> \n";
 		
 		if($ff["first"]!="no"&&$ff["first"]!=false) {$textout .= "<option value='0'>".$ff["first"]."</option> \n";}
 		
 		for($i=0; $i<$rs["rows"];$i++) {
 			$selected = ($value==$rs[$i]["$idfield"])?'selected':'';
 			$textout .= "<option value=\"".$rs[$i]["$idfield"]."\" $selected >".$rs[$i]["$namefield"]."</option> \n";
 		}
 		$textout .= "</select> \n";
 		
 		if($this->getDebugStatus()) {
 			$this->printDebug("formdb.gSelectBox()","generate list box already..component name: ".$ff["name"]." ".$income);
 		}
 		
 		return $textout." \n";
 	}
	
	function search($array, $key, $value) {
		$results = array();

		if (is_array($array))
		{
			if (isset($array[$key]) && $array[$key] == $value)
				$results[] = $array;

			foreach ($array as $subarray)
				$results = array_merge($results, $this->search($subarray, $key, $value));
		}

		return $results;
	}
	
}
?>