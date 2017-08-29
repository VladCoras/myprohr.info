<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, user-scalable=yes">
    <base href="<?php echo site_url(); ?>">
	<meta charset="utf-8">
	<meta name="theme-color" content="#2980b9">
	<meta name="title" content="MyProHR admin page">
	<meta name="description" content="">
	<title>MyProHR admin page</title>
	<link rel="shortcut icon" href="<?php echo base_url('assets/images/favicon.ico?' . uniqid()); ?>">
	<link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,700&amp;subset=latin-ext" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,700&amp;subset=latin-ext" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
	<link rel="stylesheet" type="text/css" href="<?php echo css_url('admin/global.css?') . uniqid(); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo css_url("design/icons/icomoon/styles.css?") . uniqid(); ?>">
</head>
<body class="<?php echo !empty($page_class) ? $page_class : 'home'; ?> <?php echo 'admin'; ?>">
	<div class="header">
            <div class="wrapper">
                <a class="logo" href="<?php echo site_url('administrator'); ?>">
                    <img src="<?php echo images_url('myprohr-logo.png'); ?>" height="57" alt="MyProHR">
                </a>
                <ul class="menu">
                    <li>
                        <a href="<?php echo site_url($this->language['key'] . '/admin/candidates'); ?>">Candidați</a>
                    </li>
                     <li>
                        <a href="<?php echo site_url($this->language['key'] . '/admin/companies'); ?>">Locuri de muncă</a>
                    </li>
                    <li>
                        <a href="<?php echo site_url($this->language['key'] . '/admin/settings'); ?>">Configurări</a>
                    </li>
                    <li>
                        <a href="<?php echo site_url($this->language['key'] . '/admin/tools'); ?>">Scripturi</a>
                    </li>
                </ul>
                <a class="logout" href="<?php echo site_url($this->language['key'] . '/admin/logout'); ?>">Logout</a>
            </div>
        </div>
	<div class="main">
		<?php if (!empty($this->input->get('message')) && ($this->input->get('message') == "success" || $this->input->get('message') == "fail")): ?>
			<div class="messages">
				<?php echo ($this->input->get('message') == "success") ? "Operația s-a încheiat cu succes." : "" ?>
				<?php echo ($this->input->get('message') == "fail") ? "Operația <u>nu</u> s-a încheiat cu succes." : "" ?>
			</div>
		<?php endif; ?>
		<div class="wrapper">
			<?php echo $main; ?>
		</div>
	</div>
	<script type="text/javascript" src="<?php echo js_url("jquery-3.1.1.min.js?") . uniqid(); ?>"></script>
	<script type="text/javascript" src="<?php echo js_url("admin/functions.js?") . uniqid(); ?>"></script>
	<script type="text/javascript" src="<?php echo js_url("admin/global.js?") . uniqid(); ?>"></script>
	<script type="text/javascript" src="<?php echo js_url("global.js?") . uniqid(); ?>"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
</body>
</html>