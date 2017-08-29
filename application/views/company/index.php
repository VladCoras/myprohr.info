<div class="search-block">
	<div class="wrapper">
		<?php $this->load->view('search/block'); ?>
	</div>
</div>
<div class="row">
	<div class="wrapper">
		<div class="section section-1">
			<h2><?php echo $this->lang->line('jobs'); ?> (<?php echo count($companies); ?>)</h2>
			<?php $this->load->view('company/list', $companies); ?>
		</div>
	</div>
</div>