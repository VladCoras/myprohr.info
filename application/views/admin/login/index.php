<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, user-scalable=yes">
    <base href="<?php echo site_url(); ?>">
	<meta charset="utf-8">
	<meta name="theme-color" content="#2980b9">
	<meta name="title" content="MyProHR">
	<meta name="description" content="">
 	<meta name="keywords" content="">
	<title>MyProHR admin</title>
	<link rel="shortcut icon" href="<?php echo base_url('assets/images/favicon.ico?' . uniqid()); ?>">
	<link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,700&amp;subset=latin-ext" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,700&amp;subset=latin-ext" rel="stylesheet">
	<script type="text/javascript" src="<?php echo js_url("jquery-3.1.1.min.js"); ?>"></script>
	<script type="text/javascript" src="<?php echo js_url("global.js?") . uniqid(); ?>"></script>
	<script type="text/javascript" src="<?php echo js_url("functions.js?") . uniqid(); ?>"></script>
	<style type="text/css">
		body { font-family:"Raleway", sans-serif; }
		h1 { text-align: center; }
		.login-container { padding:20px; border:1px solid rgba(0,0,0,.3); border-radius:5px; width:300px; margin:0 auto; }
		input { display:inherit; width:250px; margin:0 auto; padding:5px; margin-bottom:10px; font-family:"Raleway", sans-serif; }
		input[type="submit"] { width:100%; background-color:#2980b9; color:white; border:none; cursor:pointer; font-weight:700;	font-family:"Raleway", sans-serif; }
	</style>
</head>
<body>
	<h1>Login</h1>
	<div class="login-container">
		<p style="text-align:center;font-size:13px;margin-bottom:20px;">Completează cu datele tale</p>
		<form action="<?php echo current_url(); ?>" method="post" class="ajax-form login-form">
			<input type="text" name="email" maxlength="64" placeholder="email@example.ro">
			<br>
			<input type="password" name="password" maxlength="64" placeholder="parola">
			<br>
			<input type="submit" name="login" value="Login">
		</form>
	</div>
</body>
</html>