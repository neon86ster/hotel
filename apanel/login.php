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
		<script type="text/javascript" src="./scripts/screen.js"></script>			
    </head>
    <body>
		<div class="wrapper">
			<h1>Oasis Baan Saen Doi Spa Resort</h1>
			<h2>Administration Panel</h2>
			<div class="content">
				<div id="form_wrapper" class="form_wrapper">
					<form class="login active">
						<h3>Login</h3>
						<div class="error"><span id="error" class="error">This is an error</span></div>
						<div>
							<label>Username:</label>
							<div><input id="txtUsername" type="text" /></div>
						</div>
						<div>
							<label>Password:</label>
							<div><input id="txtPassword" type="password" /></div>
							<a href="" rel="forgot_password" class="forgot linkform">Forgot your password?</a>
						</div>
						<div class="bottom">
							<!--<div class="remember"><input type="checkbox" /><span>Keep me logged in</span></div>-->
							<input type="submit" value="Login" onclick="JavaScript:doCallAjax('login');"></input>
							<div class="clear"></div>
						</div>
					</form>
					<form class="forgot_password">
						<h3>Forgot Password</h3>
						<div class="re_error"><span id="re_error" class="re_error">This is an error</span></div>
						<div>
							<label>Username or Email:</label>
							<div><input id="txtUser" type="text" /></div>
						</div>
						<div class="bottom">
							<input type="submit" value="Send reminder" onclick="JavaScript:doCallAjax('remind');"></input>
							<div><a href="" rel="login" class="linkform">Suddenly remebered? Log in here</a></div>
							<div class="clear"></div>
						</div>
					</form>
				</div>
				<div class="clear"></div>
			</div>
		</div>
    </body>
</html>