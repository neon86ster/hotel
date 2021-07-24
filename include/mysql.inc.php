<?
class mysql
{
   var $user; 
   var $pass; 
   var $host; 
   var $dbs;
   var $Connect; 
   var $msg;
   var $recordcount; 
   var $lastinsertid; 
   var $__error; 
   var $affectedrows;

/**

function mysql()
 */
	function mysql()
	{
	   $this->__error = false;
	   if(isset($_SESSION["_mysql_host"]))
	   {
	   	    $this->host = $_SESSION["_mysql_host"];
	   }
	   else
	   {
	     $this->host="localhost";
	   }
	 // $xml = simplexml_load_file('config.xml.php');
	  
	 /// $my = $xml->mysql;
	//  var_dump($my);
		 $this->host = "localhost";
	     //$this->dbs = "baansaendoi_db";
	     //$this->user = "baansaendoi";
	     //$this->pass = "Ae3GBu@6tf";
		 $this->dbs = "oasishotel";
	     $this->user = "root";
	     $this->pass = "123456";
	    
	     $this->msg = "";
	     $this->recordcount = 0;
	     $this->affectedrows = 0;
	
	
	   
	}

	function connect($debug=false)
	{
	
	          $Connection = @mysql_connect($this->host,$this->user,$this->pass);// or die("öԴͰҹ : ".mysql_error());

	          if(!$Connection)
	           {
	           	$this->msg.= @mysql_error();
	             if($debug)
	                {
	                 $this->msg .= @mysql_error($Connection);
	                }
	                 
	                $Connection = @mysql_connect("localhost","root","pakin32");
	         
	                               
	                if(!$Connection)
	                 {     	$this->msg.= @mysql_error();

	                 	  $Connection = @mysql_connect("localhost","root","");
	                 }
	                else
	                 {
	                 	  $_SESSION["_mysql_host"] = "localhost";
	                 }  
	                
	                             
	                 if(!$Connection)
	                   $this->msg .= @mysql_error();
	                  else
	                 {
	                 	  $_SESSION["_mysql_host"] = "127.0.0.1";
	                 }
	                     
	           }
	           else
	           {
	           	  $_SESSION["_mysql_host"] = $this->host;
	           }
	
	    if(!$Connection)
	      echo $this->getMsg();
	   
	          return $Connection;
	}

	function setdbs($newdbs)
	{
		$this->dbs = $newdbs;
	}

	function getXml($xml,$debug=false)
	{
		$xml = simplexml_load_string($xml);
		$sql = $xml->sql;
		  $this->__error = false;
	          $Connect = $this->connect($debug);
	          $this->recordcount = 0;
	                 $this->msg ="";
	          mysql_select_db($this->dbs,$Connect);
	
	          $this->msg.=mysql_error();
	          
	          $rs=false;
	          $rs = mysql_query($sql,$Connect);
	          if($rs)
	           {
	                 $this->recordcount = mysql_num_rows($rs);
	                 if($this->recordcount <=0)
	                  {
	                   $this->msg .= "Is empty";
	                   $notrows = false;
	                   if($debug)
	                   {
	                   	echo "<font color=red>".$this->msg."</font>";
	                   	echo "<br/>SQL: [<b>$sql</b>]";
	                   }
	                   return false;
	                 }
	           }
	
	          if(!$rs)
	             {
	             	 $this->__error = @mysql_errno();
	                 $this->msg .= mysql_error($Connect);
	                 $this->disConnect($Connect);
	                 if($debug)
	                 {
	                 	echo "<font color=red>".$this->msg."</font>";
	                 	echo "<br/>SQL [<b>$sql</b>]";
	                 }
	                 return false;
	             }
	
	
	      if($rs)
	       {
	        for($i=0;$i<$this->recordcount;$i++)
	             {
	                   if(!$notrows)
	                  $rows[$i] = mysql_fetch_array($rs);
	                 }
	               if(!$notrows)
	             $rows["rows"]  = $this->recordcount;
	       }
	         else
	           $rows = false;
	
	       $this->disConnect($Connect);
	       return $rows;
		
		
	}

	function gets($SQL,$debug=false,$notrows=false,$result=true)
    {
          $this->__error = false;
          $Connect = $this->connect($debug);
          $this->recordcount = 0;
                 $this->msg ="";
                 
          mysql_select_db($this->dbs,$Connect);
          
          echo $this->msg.=mysql_error();
          
          $rs=false;
          mysql_query("set names utf8");
          $rs = mysql_query($SQL,$Connect);
         
          if($rs)
           {
                 $this->recordcount = mysql_num_rows($rs);
                 if($this->recordcount <=0)
                  {
                   $this->msg .= "Is empty";
                   return false;
                 }
           }

          if(!$rs)
             {
             	 $this->__error = @mysql_errno();
                 $this->msg .= mysql_error($Connect);
                 $this->disConnect($Connect);
                return false;
             }

      if($rs)
       {
        for($i=0;$i<$this->recordcount;$i++)
             {
                   if(!$notrows)
                  $rows[$i] = mysql_fetch_array($rs);
                 }
               if(!$notrows)
             $rows["rows"]  = $this->recordcount;
       }
         else
           $rows = false;

       $this->disConnect($Connect);
       return $rows;
    }


	function setXml($SQL)
	{
		$xml = simplexml_load_string($SQL);
		$SQL = $xml->sql;
		$con = $this->connect();
	    $this->msg =false;

	      mysql_select_db($this->dbs,$con);
	      $result = mysql_query($SQL,$con);
	
	      $delete = eregi("delete",$SQL);
	      $update = eregi("update",$SQL);
	      
	      $insert = eregi("insert",$SQL);
	  
	   if($delete || $update)
	    {
	      $this->affectedrows = mysql_affected_rows($con);
	    }
	
	   if($insert)
	   {
	     $this->lastinsertid = mysql_insert_id($con);
	   } 
	
	   if(!$result)
	       {
	         $this->msg = mysql_error($con);
	         $this->__error = mysql_errno($con);
	         echo "<font color=red>".$this->msg."</font> SQL:<b>$SQL</b>";
	       }
	      $this->disConnect($con);
	      
		if($insert)
		{
			return $this->lastinsertid;
		} 
	  
		return $result;
	
		
	}

		function MyGetBySql($SQL,$debug=false,$notrows=false,$result=true)
    {
          $Connect = $this->connect($debug);
          $this->recordcount = 0;
                 $this->msg ="";
          mysql_select_db($this->dbs,$Connect);
          $rs=false;
		  
		  mysql_query("set names utf8");
		  
          $rs = mysql_query($SQL,$Connect);
          if($rs)
           {
                 $this->recordcount = mysql_num_rows($rs);
                 if($this->recordcount <=0)
                  {
                   $this->msg = "Is empty";
                   return false;
                 }
           }

          if(!$rs)
             {
                    $this->msg = mysql_error($Connect);
                if($debug)
                 {
                  echo "debug [line 81 function gets():mysql error msg : $this->msg]";
                          echo "<br>$SQL";
                 }
                 $this->disConnect($Connect);
                return false;
             }


          if($debug)
            {
             echo "$SQL";
              if($rs)
                 {
                  $this->recordcount = mysql_num_rows($rs);
                  $this->printmsg("found record(s) : $this->recordcount");
                 }
            }

       if($rs)
       {
           for($i=0;$i<$this->recordcount;$i++)
           {
              if(!$notrows)
                 $rows[$i] = mysql_fetch_array($rs);
           }
           if(!$notrows)
              $rows["rows"]  = $this->recordcount;
       }
       else
          $rows = false;

       $this->disConnect($Connect);
       return $rows;
    }
	
	function MySetBySql($SQL,$debug=false)
	{
		$con = $this->connect();
		$this->msg =false;
		mysql_select_db($this->dbs,$con);
		mysql_query("set names utf8");
		$result = mysql_query($SQL,$con);
		
		$delete = eregi("delete",$SQL);
		$update = eregi("update",$SQL);
		$insert = eregi("insert",$SQL);
	
	  
		if($delete || $update)
		{
		      $this->affectedrows = mysql_affected_rows($con);
		}

		if($insert)
		{
			$this->lastinsertid = mysql_insert_id($con);
		} 
	
		if(!$result)
		{
			$this->msg = mysql_error($con);
			$this->__error = mysql_errno($con);
		}
		$this->disConnect($con);
		if($insert)
		{
			return $this->lastinsertid;
		} 
	  
		return $result; 
	}

	function disConnect($Connect)
    {
        mysql_close($Connect);
    }
    
	function getRecordcount($SQL = false)
    {
           if(!$SQL)
           {
                 return $this->recordcount;
           }

           $this->gets($SQL);
           return $this->recordcount;

    }
    
	function getAffected()
	{
		return $this->affectedrows;
	}
	
	function getMsg()
	{
		return $this->msg;
	}
	function getLastinsertid()
	{
		return $this->lastinsertid;
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
}
?>