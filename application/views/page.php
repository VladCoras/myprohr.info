<?php 
	$devMode = true;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <base href="<?php echo site_url($this->language['key']); ?>">
	<meta charset="utf-8">
	<meta name="theme-color" content="#2980b9">
	<meta name="title" content="<?php echo (isset($meta_title) && !empty($meta_title)) ? $meta_title : "MyProHR"; ?>">
	<meta name="description" content="<?php echo (isset($meta_description) && !empty($meta_description)) ? $meta_description : "";  ?>">
 	<meta name="keywords" content="<?php echo (isset($meta_keywords) && !empty($meta_keywords)) ? $meta_keywords : "";  ?>">
	<title><?php echo (isset($page_title) && !empty($page_title)) ? $page_title : "MyProHR"; ?></title>
	<link rel="shortcut icon" href="<?php echo base_url('assets/images/favicon.ico?' . uniqid()); ?>">
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700&amp;subset=latin-ext" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Oswald:200,300,400,700&amp;subset=latin-ext" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo css_url('jquery-ui.css?') . uniqid(); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo css_url('global.css?') . uniqid(); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo css_url("design/icons/icomoon/styles.css?") . uniqid(); ?>">
	<!-- bxSlider CSS file -->
	<link href="?php echo js_url('bxslider/jquery.bxslider.css'); ?>" rel="stylesheet" />
	<script type="text/javascript" src="<?php echo js_url('jquery-3.1.1.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo js_url('jquery-ui.min.js'); ?>"></script>
	<!-- bxSlider Javascript file -->
	<script src="<?php echo js_url('bxslider/jquery.bxslider.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo js_url('global.js?') . uniqid(); ?>"></script>
	<script type="text/javascript" src="<?php echo js_url('functions.js?') . uniqid(); ?>"></script>
</head>
<body class="<?php echo !empty($page_class) ? $page_class : "home" ; ?>">
	<div id="fb-root"></div>
	<script>
	  window.fbAsyncInit = function() {
	    FB.init({
	      appId      : '217265992132447',
	      cookie     : true,
	      xfbml      : true,
	      version    : 'v2.8'
	    });
	    FB.AppEvents.logPageView();   
	  };

	  (function(d, s, id){
	     var js, fjs = d.getElementsByTagName(s)[0];
	     if (d.getElementById(id)) {return;}
	     js = d.createElement(s); js.id = id;
	     js.src = "//connect.facebook.net/en_US/sdk.js";
	     fjs.parentNode.insertBefore(js, fjs);
	   }(document, 'script', 'facebook-jssdk'));
	</script>
	<!-- Header -->
	<div class="header">
		<div class="wrapper">
			<ul class="mini-menu">
				<li>
					<a href="tel:+49015163126783"><?php echo $this->lang->line('call-us'); ?></a>
				</li>
				<li>
					<a href="mailto:contact@myprohr.info"><i class="icon-mail5"></i> contact@myprohr.info</a>
				</li>
				<li>
					<a href="#"><i class="icon-facebook"></i></a>
				</li>
				<li>
					<a href="#"><i class="icon-linkedin2"></i></a>
				</li>
				<?php foreach($this->languages as $language): ?>
					<li class="language <?php echo $this->language['key'] == $language['key'] ? "current" : ""; ?>">
						<!-- <a href="<?php echo base_url($language['key']); ?>"><?php echo $language['key']; ?></a> -->
						<a href="<?php echo str_replace('/' . $this->language['key'], '/' . $language['key'], current_url()); ?>"><?php echo $language['key']; ?></a>
					</li>
				<?php endforeach; ?>
			</ul>
			<ul class="header-menu">
				<li class="logo">
					<a href="<?php echo base_url($this->language['key']); ?>">
						<img src="<?php echo images_url('myprohr-logo.png'); ?>" width="250" height="75" alt="MyProHR">
						<span><?php echo $this->lang->line('logo_text'); ?></span>
					</a>
				</li>
				<li>
					<a href="<?php echo base_url($this->language['key'] . '/companies'); ?>"><?php echo $this->lang->line('for_candidates'); ?></a>
				</li>
				<li>
					<a href="<?php echo base_url($this->language['key'] . '/candidates'); ?>"><?php echo $this->lang->line('for_companies'); ?></a>
				</li>
				<li>
					<a href="<?php echo base_url($this->language['key'] . '/contact'); ?>"><?php echo $this->lang->line('contact'); ?></a>
				</li>
			</ul>
			<div class="mobile-menu">
				<div class="logo">
					<a href="<?php echo base_url($this->language['key']); ?>">
						<img src="<?php echo images_url('myprohr-logo.png'); ?>" width="250" height="75" alt="MyProHR">
						<span><?php echo $this->lang->line('logo_text'); ?></span>
					</a>
				</div>
				<a href="#" class="js-open-mobile-menu"><span></span></a>
				<ul class="mobile-header-menu">
					<li>
						<a href="<?php echo base_url($this->language['key'] . '/companies'); ?>"><?php echo $this->lang->line('for_candidates'); ?></a>
					</li>
					<li>
						<a href="<?php echo base_url($this->language['key'] . '/candidates'); ?>"><?php echo $this->lang->line('for_companies'); ?></a>
					</li>
					<li>
						<a href="<?php echo base_url($this->language['key'] . '/contact'); ?>"><?php echo $this->lang->line('contact'); ?></a>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- END header -->
	<!-- Main -->
	<div class="main">
		<?php echo $main; ?>
	</div>
	<!-- END main -->
	<!-- Footer -->
	<div class="footer">
		<div class="wrapper">
			<span>&copy; <?php echo date('Y'); ?> MyProHR All rights reserved.</span>
			<span style="float:right"><a href="<?php echo base_url($this->language['key'] . '/contact'); ?>"><?php echo $this->lang->line('contact'); ?></a></span>
		</div>
	</div>
	<!-- END footer -->
	<!-- Scripts down the page for performance -->
	
</body>
</html>
