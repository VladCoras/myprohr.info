<div class="slider">
    <?php $this->load->view('slide/list', $slides); ?>
</div>
<div class="search-block">
	<div class="wrapper">
		<?php $this->load->view('search/block'); ?>
	</div>
</div>
<div class="section section-1">
	<div class="wrapper">
		<h2><?php echo $this->lang->line('about-us'); ?></h2>
		<p><?php echo $this->lang->line('section-1-text') ?></p>
	</div>
	<img src="<?php echo images_url('home/section-1.jpg'); ?>" width="auto" height="100%" >	
</div>
<div class="section section-2">
	<div class="wrapper">
		<h2><?php echo $this->lang->line('last-jobs'); ?></h2>
		<?php $this->load->view('company/list', $companies); ?>
	</div>
</div>
<div class="section section-3">
	<div class="wrapper">
		<h2><?php echo $this->lang->line('categories'); ?></h2>
		<?php $this->load->view('category/list', $categories); ?>
	</div>
</div>
