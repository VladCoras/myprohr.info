<div class="wrapper">
	<h1><?php echo $category['name']; ?></h1>
</div>
<div class="search-block">
	<div class="wrapper">
		<?php $this->load->view('search/block'); ?>
	</div>
</div>
<div class="wrapper">
	<div class="section section-1">
		<h2><?php echo $this->lang->line('candidates'); ?> (<?php echo count($candidates); ?>)</h2>
		<?php $this->load->view('candidate/list', $candidates); ?>
	</div>
</div>