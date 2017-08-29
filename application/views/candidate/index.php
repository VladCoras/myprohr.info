<div class="search-block">
	<div class="wrapper">
		<?php $this->load->view('search/block'); ?>
	</div>
</div>
<div class="row">
	<div class="wrapper">
		<div class="section section-1">
			<h2><?php echo $this->lang->line('candidates'); ?> (<?php echo $candidates_count; ?>)</h2>
			<?php $this->load->view('candidate/list', $candidates); ?>
		</div>
		<div class="section section-2">
			<h2><?php echo $this->lang->line('categories'); ?></h2>
			<?php $this->load->view('category/list', $categories); ?>
		</div>
	</div>
</div>