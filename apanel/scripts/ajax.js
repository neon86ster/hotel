 var HttPRequest = false;

	   function doCallAjax(page,title,id) {
		  HttPRequest = false;
		  if (window.XMLHttpRequest) { // Mozilla, Safari,...
			 HttPRequest = new XMLHttpRequest();
			 if (HttPRequest.overrideMimeType) {
				HttPRequest.overrideMimeType('text/html');
			 }
		  } else if (window.ActiveXObject) { // IE
			 try {
				HttPRequest = new ActiveXObject("Msxml2.XMLHTTP");
			 } catch (e) {
				try {
				   HttPRequest = new ActiveXObject("Microsoft.XMLHTTP");
				} catch (e) {}
			 }
		  } 
		  
		  if (!HttPRequest) {
			 alert('Cannot create XMLHTTP instance');
			 return false;
		  }
		
		if(page=="login"){
		  var url = 'checklogin.php';
		  var pmeters = "tUsername=" + encodeURIComponent(document.getElementById("txtUsername").value) +
						"&tPassword=" + encodeURIComponent(document.getElementById("txtPassword").value );
	
			HttPRequest.open('POST',url,true);

			HttPRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			HttPRequest.setRequestHeader("Content-length", pmeters.length);
			HttPRequest.setRequestHeader("Connection", "close");
			HttPRequest.send(pmeters);
			
			
			HttPRequest.onreadystatechange = function()
			{
				if(HttPRequest.readyState == 4) // Return Request
				{
				document.getElementById("error").style.visibility = 'hidden';
				document.getElementById("re_error").style.visibility = 'hidden';				

					if(HttPRequest.responseText == 'Y')
					{
						window.location = 'home.php';
					}
					else if(HttPRequest.responseText =='W')
					{
						document.getElementById("error").style.visibility = 'visible'; 
						document.getElementById("error").innerHTML = 'Plase recheck Username & Password';
					}
					else if(HttPRequest.responseText =='B')
					{
						document.getElementById("error").style.visibility = 'visible'; 
						document.getElementById("error").innerHTML = 'Plase input Username & Password';
					}
					else if(HttPRequest.responseText =='U')
					{
						document.getElementById("error").style.visibility = 'visible'; 
						document.getElementById("error").innerHTML = 'Plase input Username';
					}
					else if(HttPRequest.responseText =='P')
					{
						document.getElementById("error").style.visibility = 'visible'; 
						document.getElementById("error").innerHTML = 'Plase input Password';
					}
				}
			}
		}else if(page=="logout"){
		  var url = 'logout.php';
		  var pmeters = "";
			HttPRequest.open('POST',url,true);

			HttPRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			HttPRequest.setRequestHeader("Content-length", pmeters.length);
			HttPRequest.setRequestHeader("Connection", "close");
			HttPRequest.send(pmeters);
			
			HttPRequest.onreadystatechange = function()
			{
				if(HttPRequest.readyState == 4) // Return Request
				{
					if(HttPRequest.responseText == 'Y')
					{
						window.location = 'login.php';
					}
				}
			}
		}else if(page=="remind"){
		  var url = 'sendremind.php';
		  var pmeters = "tUser=" + encodeURI( document.getElementById("txtUser").value);

			HttPRequest.open('POST',url,true);

			HttPRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			HttPRequest.setRequestHeader("Content-length", pmeters.length);
			HttPRequest.setRequestHeader("Connection", "close");
			HttPRequest.send(pmeters);
			
			
			HttPRequest.onreadystatechange = function()
			{
				if(HttPRequest.readyState == 4) // Return Request
				{
				document.getElementById("error").style.visibility = 'hidden';
				document.getElementById("re_error").style.visibility = 'hidden';
				document.getElementById("re_error").style.color = 'red'; 
				
					if(HttPRequest.responseText == 'Y')
					{
						document.getElementById("re_error").style.visibility = 'visible'; 
						document.getElementById("re_error").style.color = 'green'; 
						document.getElementById("re_error").innerHTML = 'Password is already send';
					}
					else if(HttPRequest.responseText =='N')
					{
						document.getElementById("re_error").style.visibility = 'visible'; 
						document.getElementById("re_error").innerHTML = 'Plase input Username or Email';
					}
					else if(HttPRequest.responseText =='W')
					{
						document.getElementById("re_error").style.visibility = 'visible'; 
						document.getElementById("re_error").innerHTML = 'Plase recheck Username or Email';
					}
				}
			}
		}else{
			var url="pageinfo.php";
			var pmeters = "page="+encodeURI(page)+"&title="+encodeURI(title)+"&id="+encodeURI(id);
			
			HttPRequest.open('POST',url,true);

			HttPRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			HttPRequest.setRequestHeader("Content-length", pmeters.length);
			HttPRequest.setRequestHeader("Connection", "close");
			HttPRequest.send(pmeters);
			
			
			HttPRequest.onreadystatechange = function()
			{
				if(HttPRequest.readyState == 4) // Return Request
				{
					  document.getElementById('content').innerHTML = HttPRequest.responseText;
					  nicEditors.allTextAreas({fullPanel : true});
					  if(document.getElementById('upload')){
							doCallUpload();
					  }
					  						// Initialize the jQuery File Upload widget:
						$('#fileupload').fileupload();

						// Enable iframe cross-domain access via redirect option:
						$('#fileupload').fileupload(
							'option',
							'redirect',
							window.location.href.replace(
								/\/[^\/]*$/,
								'/cors/result.html?%s'
							)
						);
					  
					   $('#fileupload').fileupload('option', {
							url: 'jupload/server/php/',
							maxFileSize: 5000000,
							acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i,
							process: [
								{
									action: 'load',
									fileTypes: /^image\/(gif|jpeg|png)$/,
									maxFileSize: 2000000 // 2MB
								},
								{
									action: 'resize',
									maxWidth: 1440,
									maxHeight: 900
								},
								{
									action: 'save'
								}
							]
						});
						
						// Load existing files:
						$('#fileupload').each(function () {
							var that = this;
							$.getJSON(this.action+'?juploadpage='+$('#juploadpage').val()+'&juploadid='+$('#juploadid').val(), function (result) {
							//$.getJSON(this.action, function (result) {
								if (result && result.length) {
									$(that).fileupload('option', 'done')
										.call(that, null, {result: result});
								}
							});
						});
				}
			}
		}
	   }
	   
	   function set_insertData(table,id){
			var d;
			d = this.getFormParaValue('./object.xml',table);
					  HttPRequest = false;
					  if (window.XMLHttpRequest) { // Mozilla, Safari,...
						 HttPRequest = new XMLHttpRequest();
						 if (HttPRequest.overrideMimeType) {
							HttPRequest.overrideMimeType('text/html');
						 }
					  } else if (window.ActiveXObject) { // IE
						 try {
							HttPRequest = new ActiveXObject("Msxml2.XMLHTTP");
						 } catch (e) {
							try {
							   HttPRequest = new ActiveXObject("Microsoft.XMLHTTP");
							} catch (e) {}
						 }
					  } 
					  
					  if (!HttPRequest) {
						 alert('Cannot create XMLHTTP instance');
						 return false;
					  }
					  
			var url="pageinfo.php";
			var pmeters = "page="+encodeURI(document.getElementById("page").value)+"&title="+encodeURI(document.getElementById("title").value)+encodeURI(d)+"&id="+encodeURI(id);
			
			HttPRequest.open('POST',url,true);

			HttPRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			HttPRequest.setRequestHeader("Content-length", pmeters.length);
			HttPRequest.setRequestHeader("Connection", "close");
			HttPRequest.send(pmeters);
			
			
			HttPRequest.onreadystatechange = function()
			{
				if(HttPRequest.readyState == 4) // Return Request
				{
					  document.getElementById('content').innerHTML = HttPRequest.responseText;
					  nicEditors.allTextAreas({fullPanel : true});
					  if(document.getElementById('upload')){
							doCallUpload();
					  }
				}
			}
					
		}
		
		function set_deleteData(table,id){
			HttPRequest = false;
					  if (window.XMLHttpRequest) { // Mozilla, Safari,...
						 HttPRequest = new XMLHttpRequest();
						 if (HttPRequest.overrideMimeType) {
							HttPRequest.overrideMimeType('text/html');
						 }
					  } else if (window.ActiveXObject) { // IE
						 try {
							HttPRequest = new ActiveXObject("Msxml2.XMLHTTP");
						 } catch (e) {
							try {
							   HttPRequest = new ActiveXObject("Microsoft.XMLHTTP");
							} catch (e) {}
						 }
					  } 
					  
					  if (!HttPRequest) {
						 alert('Cannot create XMLHTTP instance');
						 return false;
					  }
					  
					  var url="pageinfo.php";
			
			var pmeters = "page="+encodeURI(document.getElementById("page").value)+"&title="+encodeURI(document.getElementById("title").value)+"&id="+encodeURI(id)+"&add=delete";
			
			HttPRequest.open('POST',url,true);

			HttPRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			HttPRequest.setRequestHeader("Content-length", pmeters.length);
			HttPRequest.setRequestHeader("Connection", "close");
			HttPRequest.send(pmeters);
			
			
			HttPRequest.onreadystatechange = function()
			{
				if(HttPRequest.readyState == 4) // Return Request
				{
					  document.getElementById('content').innerHTML = HttPRequest.responseText;
				}
			}
		
		}
		
		function getFormParaValue(dname,tableName) {
		   xmlDoc = this.loadXMLDoc(dname);
			   var e = xmlDoc.getElementsByTagName(tableName)[0].getElementsByTagName('field');
			   var i;
			   var n,t="";
			   var frmvalue = "";
				
				for(i=0; i<e.length; i++) {
					if(e[i].getAttribute('idfields')!="yes"&&e[i].getAttribute('showinform')!="no"){
						 n = e[i].getAttribute('name');
						   if(n)
							 t+= "&";
						  
						  if(e[i].getAttribute('formtype')=="textarea"){
							frmvalue = nicEditors.findEditor(n).getContent();
							frmvalue=encodeURIComponent(frmvalue);
							t += n+"="+frmvalue;
						  } else if(e[i].getAttribute('formtype')=="checkbox"&&document.getElementById(n).checked){
							 t += n+"=1";
						  } else if(e[i].getAttribute('formtype')=="checkbox"&&!document.getElementById(n).checked){
							 t += n+"=0";
						  }else if(e[i].getAttribute('formtype')=="password"&&document.getElementById("add").value=="add"){
								t += "pass="+encodeURIComponent(document.getElementById("pass").value);
								t += "&rpass="+encodeURIComponent(document.getElementById("rpass").value);
						  }else if(e[i].getAttribute('formtype')=="password"&&document.getElementById("add").value=="save"){
								t += "&pass="+encodeURIComponent(document.getElementById("newpass").value);
								t += "&rpass="+encodeURIComponent(document.getElementById("rnewpass").value);
						  }else if(e[i].getAttribute('formtype')=="image"&&document.getElementById("add").value=="save"){
								//frmvalue=document.getElementById("path").value;
								frmvalue=$('input[id][name$="'+n+'"]').val();
								frmvalue=encodeURIComponent(frmvalue);
								t += n+"="+frmvalue;
						  }else{
								frmvalue=document.getElementById(n).value;
								frmvalue=encodeURIComponent(frmvalue);
								t += n+"="+frmvalue;
						  }
					}
				}
			   t+="&formname="+tableName;
			   t+="&add="+document.getElementById("add").value;
				
			   return t;
			}
			
		function loadXMLDoc(dname) {        
			if (window.XMLHttpRequest)
			  {
			  xhttp=new XMLHttpRequest();
			  }
			else
			  {
			  xhttp=new ActiveXObject("Microsoft.XMLHTTP");
			  }
			xhttp.open("GET",dname,false);
			xhttp.send();
			return xhttp.responseXML;
		}
		
		function doCallUpload(){
			var btnUpload=$('#btn_upload');
			//var status=$('#status');
			
			var page=document.getElementById('formname').value;
			var id=document.getElementById('id').value;
			
			$('.generalinfo').find('input[id][name$="btn_upload"]').each(function(i) {
					var status=$('#status');
					var type=$(this).parent().parent().parent().children('#path').attr("name");
					var path=$(this).parent().parent().parent().children('#path');
	
					new AjaxUpload($(this), {
						action: 'uploadfile.php?page='+encodeURI(page)+'&id='+encodeURI(id)+'&type='+encodeURI(type),
						name: 'uploadfile',
						onSubmit: function(file, ext){
							 if (! (ext && /^(jpg|png|jpeg|gif)$/.test(ext))){ 
								// extension is not allowed 
								status.text('Only JPG, PNG or GIF files are allowed');
								return false;
							}
							status.text('Uploading...');
						},
						onComplete: function(file, response){
							//On completion clear the status
							status.text('');
							//Add uploaded file to list
							if(response!="error"){
								//var clearText=$('#image');
								var clearText=$('#'+type);
								clearText.text('');
								//document.getElementById('path').value=response;
								path.val(response);
								$(this).parent().parent().parent().children('#path').val(response);
								$('<div></div>').appendTo('#'+type).html('<img id="upload_image" src="../'+response+'?'+ new Date().getTime()+'" alt=""/>').addClass('success');
							}else{
								$('<div></div>').appendTo('#'+type).text(file).addClass('error');
							}
						}
					});
			});
			
			/*	
			new AjaxUpload(btnUpload, {
				action: 'uploadfile.php?page='+encodeURI(page)+'&id='+encodeURI(id)+'&idfield'+encodeURI(idfield),
				name: 'uploadfile',
				onSubmit: function(file, ext){
					 if (! (ext && /^(jpg|png|jpeg|gif)$/.test(ext))){ 
						// extension is not allowed 
						status.text('Only JPG, PNG or GIF files are allowed');
						return false;
					}
					status.text('Uploading...');
				},
				onComplete: function(file, response){
					//On completion clear the status
					status.text('');
					//Add uploaded file to list
					if(response!="error"){
						var clearText=$('#image');
						clearText.text('');
						document.getElementById('path').value=response;
						$('<div></div>').appendTo('#image').html('<img id="upload_image" src="../'+response+'?'+ new Date().getTime()+'" alt=""/>').addClass('success');
					}else{
						$('<div></div>').appendTo('#image').text(file).addClass('error');
					}
				}
			});
			*/
		}
		
		function doCallSend(){
			HttPRequest = false;
		  if (window.XMLHttpRequest) { // Mozilla, Safari,...
			 HttPRequest = new XMLHttpRequest();
			 if (HttPRequest.overrideMimeType) {
				HttPRequest.overrideMimeType('text/html');
			 }
		  } else if (window.ActiveXObject) { // IE
			 try {
				HttPRequest = new ActiveXObject("Msxml2.XMLHTTP");
			 } catch (e) {
				try {
				   HttPRequest = new ActiveXObject("Microsoft.XMLHTTP");
				} catch (e) {}
			 }
		  } 
		  
		  if (!HttPRequest) {
			 alert('Cannot create XMLHTTP instance');
			 return false;
		  }
		  
		  var url = 'sendnewsletter.php';
		  var pmeters = "subject=" + encodeURIComponent(document.getElementById("email-subject").value) +
						"&detail=" + encodeURIComponent(nicEditors.findEditor("email-content").getContent());
			HttPRequest.open('POST',url,true);

			HttPRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			HttPRequest.setRequestHeader("Content-length", pmeters.length);
			HttPRequest.setRequestHeader("Connection", "close");
			HttPRequest.send(pmeters);
			
			
			HttPRequest.onreadystatechange = function()
			{
				var status=$('#status');
				if(HttPRequest.responseText == 'Y'){
					status.addClass('complete')
					status.text('Send newslettes complete!!');
				}else if(HttPRequest.responseText == 'F'){
					status.addClass('error')
					status.text('Please check your infomation again!!');
				}else if(HttPRequest.responseText == 'W'){
					status.addClass('error')
					status.text('Please insert Subject!!');
				}
			}
		}
		