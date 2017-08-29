<div class="wrapper">
	<h1 class=""><?php echo $candidate['id_candidate'] . ". " . $candidate['function']; ?></h1>
	<p><?php echo $this->lang->line('added_by'); ?> <?php echo $added_by; ?> in <a href="<?php echo base_url($this->language['key'] . '/categories/' . $category['url_key']); ?>"><?php echo $category['name'] ?></a></p>
	<div class="section section-1">
		<div class="content-text">
			<?php echo $this->lang->line('candidate_text'); ?>
		</div>
	</div>
	<div class="section section-2">
		<h2><?php echo $this->lang->line('about'); ?></h2>
		<table cellspacing="0" cellpadding="0">
			<tr>
				<td><i class="icon-pin"></i> <?php echo $this->lang->line('candidate_location'); ?></td>
				<td>
					<?php if (isset($candidate['city'])): ?>
						<?php echo $candidate['city'] . ", " . $candidate['country'] ?>
					<?php else: ?>
						<?php echo $candidate['country'] ?>
					<?php endif; ?>
				</td>
			</tr>
			<tr>
				<td><i class="icon-bubbles4"></i> <?php echo $this->lang->line('languages'); ?></td>
				<td><?php echo $candidate['languages']; ?></td>
			</tr>
		</table>
	</div>
</div>