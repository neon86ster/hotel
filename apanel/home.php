<?
session_start();
include("include/eg.inc.php");
$eg = new eg();
$rs=$eg->checkLogin();
$uid = $eg->u_id;
$u_expert = $eg->expert;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <title>Administration Panel</title>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <meta name="keywords" content="Oasis School, Chiangmai, Thailand" />
		<meta name="description" content="Oasis School, Chiangmai, Thailand">
		
		<!-- Favicon -->
		<link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon" />
		<link rel="icon" href="../images/favicon.ico" type="image/x-icon" />
		
		<!-- CSS Files -->
		<link rel="stylesheet" type="text/css" media="screen" href="./css/reset.css">
        <link rel="stylesheet" type="text/css" media="screen" href="./css/style.css">	
		
		<!-- JavaScript Files -->
		<script type="text/javascript" src="./scripts/ajax.js"></script>	
		<script type="text/javascript" src="./jquery/jquery-1.7.1.min.js"></script>	
		<script type="text/javascript" src="./scripts/config.js"></script>	
		<script type="text/javascript" src="./scripts/nicEdit.js"></script>
		<script type="text/javascript" src="./scripts/ajaxupload.js"></script>
		<script type="text/javascript" src="./scripts/validation.js"></script>
		<script type="text/javascript" src="./scripts/validation-rule.js"></script>
		
				<!--JUpload-->
		<!-- Bootstrap CSS Toolkit styles -->
		<link rel="stylesheet" type="text/css" href="./jupload/css/bootstrap.min.css">
		<!-- Bootstrap styles for responsive website layout, supporting different screen sizes -->
		<link rel="stylesheet" type="text/css" href="./jupload/css/bootstrap-responsive.min.css">
		<!-- Bootstrap CSS fixes for IE6 -->
		<!--[if lt IE 7]><link rel="stylesheet" type="text/css" href="./jupload/css/bootstrap-ie6.min.css"><![endif]-->
		<!-- Bootstrap Image Gallery styles -->
		<link rel="stylesheet" type="text/css" href="./jupload/css/bootstrap-image-gallery.min.css">
		<!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
		<link rel="stylesheet" type="text/css" href="./jupload/css/jquery.fileupload-ui.css">

		<!-- Shim to make HTML5 elements usable in older Internet Explorer versions -->
		<!--[if lt IE 9]><script src="./jupload/scripts/html5.js"></script><![endif]-->

		<!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
		<script src="./jupload/js/vendor/jquery.ui.widget.js"></script>
		<!-- The Templates plugin is included to render the upload/download listings -->
		<script src="./jupload/scripts/tmpl.min.js"></script>
		<!-- The Load Image plugin is included for the preview images and image resizing functionality -->
		<script src="./jupload/scripts/load-image.min.js"></script>
		<!-- The Canvas to Blob plugin is included for image resizing functionality -->
		<script src="./jupload/scripts/canvas-to-blob.min.js"></script>
		<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
		<script src="./jupload/js/jquery.iframe-transport.js"></script>
		<!-- The basic File Upload plugin -->
		<script src="./jupload/js/jquery.fileupload.js"></script>
		<!-- The File Upload file processing plugin -->
		<script src="./jupload/js/jquery.fileupload-fp.js"></script>
		<!-- The File Upload user interface plugin -->
		<script src="./jupload/js/jquery.fileupload-ui.js"></script>
		<!-- The localization script -->
		<script src="./jupload/js/locale.js"></script>
		<!-- The main application script -->
		<!-- The XDomainRequest Transport is included for cross-domain file deletion for IE8+ -->
		<!--[if gte IE 8]><script src="./jupload/js/cors/jquery.xdr-transport.js"></script><![endif]-->
    </head>
    <body onload="JavaScript:doCallAjax('dashbord-dashbord','Dashbord');">
		<div id="body-wrapper">

		<div id="sidebar"><div id="sidebar-wrapper"> <!-- Sidebar with logo and menu -->
			<h1>Oasis Baan Saen Doi Spa Resort</h1>
			<h2>Administration Panel</h2>
			
				<!-- Sidebar Profile links -->
				<div id="profile-links">
					Wellcome, <a href="JavaScript:doCallAjax('s_user-edit','Your Profile','<?=$uid;?>');" title="Edit your profile"><?=$rs[0]["name"]?></a>
					<br />
					<br />
					<a target="_blank" href="http://www.oasisluxury.net" title="View the Site">View the Site</a> | <a href="JavaScript:doCallAjax('logout');" title="Sign Out">Log Out</a>
				</div>        
				
				<ul id="main-nav">  <!-- Accordion Menu -->
					
					<li>
						<a href="JavaScript:doCallAjax('dashbord-dashbord','Dashbord');" class="nav-top-item no-submenu current"> <!-- Add the class "no-submenu" to menu items with no sub menu -->
							Dashboard
						</a>       
					</li>
					
					<li>
						<a href="#" class="nav-top-item">
							Room & Suite
						</a>
						<ul>
							<li><a href="JavaScript:doCallAjax('room_suite-add','Add a new Special Offer');">Add a Speciall offer</a></li>
							<li><a href="JavaScript:doCallAjax('room_suite-manage','Manage Special Offer');">Manage special offer</a></li>

						</ul>
					</li>
							
					<li>
						<a href="#" class="nav-top-item">
							Special Offer
						</a>
						<ul>
							<li><a href="JavaScript:doCallAjax('special_offer-add','Add a new Special Offer');">Add a Speciall offer</a></li>
							<li><a href="JavaScript:doCallAjax('special_offer-manage','Manage Special Offer');">Manage special offer</a></li>

						</ul>
					</li>
					
					<li>
						<a href="#" class="nav-top-item">
							Spa Relaxation
						</a>
						<ul>
							<li><a href="JavaScript:doCallAjax('spa_relax-add','Add a new Special Offer');">Add a Speciall offer</a></li>
							<li><a href="JavaScript:doCallAjax('spa_relax-manage','Manage Special Offer');">Manage special offer</a></li>

						</ul>
					</li>
					
					<li>
						<a href="#" class="nav-top-item">
							Work Information
						</a>

						<ul>
							<li><a href="JavaScript:doCallAjax('work-add','Add a new Work');">Add a new Work</a></li>
							<li><a href="JavaScript:doCallAjax('work-manage','Manage Work');">Manage Work</a></li>
						</ul>
					</li>
					<li>
						<a href="#" class="nav-top-item">
							Subscribe
						</a>

						<ul>
							<li><a href="JavaScript:doCallAjax('subscribe-email','Write a new Newsletter');">Write a new Newsletter</a></li>
							<li><a href="JavaScript:doCallAjax('subscribe-manage','Manage Email List');">Manage Email List</a></li>
						</ul>
					</li>
										
					<li>
						<a href="#" class="nav-top-item">
							Settings
						</a>
						<ul>
							<li><a href="JavaScript:doCallAjax('s_user-add','Add a new User');">Add a new User</a></li>
							<li><a href="JavaScript:doCallAjax('s_user-edit','Your Profile','<?=$uid;?>');">Your Profile</a></li>
							<?if($u_expert){?>
							<li><a href="JavaScript:doCallAjax('s_user-manage','Users and Permissions');">Users and Permissions</a></li>
							<?}?>
						</ul>
					</li>      
					
				</ul> <!-- End #main-nav -->			
			</div>
		</div>
		
		<div id="content"></div>
		<div id="endpage" class="push"></div>
		</div>
		<div id="footer">
		<p>©2007 - 2012 The Oasis Spa Thailand All Rights Reserved. Web Hosting and Web Design by Tap Technology,Thailand.</p>
		</div>
    </body>
</html>