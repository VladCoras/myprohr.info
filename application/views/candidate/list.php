<?php if (isset($candidates)): ?>
	<table class="candidates-table" cellspacing="0" cellpadding="0">
		<thead>
			<tr>
				<td><?php echo $this->lang->line('table_no'); ?></td>
				<td><?php echo $this->lang->line('table_function'); ?></td>
				<td style="width:200px;"><?php echo $this->lang->line('table_location'); ?></td>
				<td style="width:200px;"><?php echo $this->lang->line('table_language'); ?></td>
				<td style="width:200px;"><i style="text-align:center;" class="icon-pencil7"></i></td>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($candidates as $candidate): ?>
				<tr>
					<td><?php echo $candidate['id_candidate']; ?></td>
					<td><?php echo $candidate['function']; ?></td>
					<td style="width:200px;">
						<i class="icon-pin"></i>
						<?php if (isset($candidate['city'])): ?>
							<?php echo $candidate['city'] . ", " . $candidate['country'] ?>
						<?php else: ?>
							<?php echo $candidate['country'] ?>
						<?php endif; ?>
					</td>
					<td style="width:200px;"><?php echo $candidate['languages'] ?></td>
					<td style="width:200px;"><a class="button small light" href="<?php echo base_url($this->language['key'] . "/candidates/" . $candidate['url_key']); ?>"><?php echo $this->lang->line('see_candidate'); ?></a></td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
	<div class="pagination">
		<script>
			$(document).ready(function() {
				$('.js-page-select').change(function() {
					window.location = $(this).val();
				});
			});
		</script>
		<label for="page">Page:</label>
		<select name="page" class="js-page-select">
			<?php for ($i = 1; $i < ($candidates_count / 20); $i++): ?>
				<option value="<?php echo base_url($this->language['key'] . '/candidates/page/' . $i); ?>" <?php echo $i == $candidates_current_page ? "selected" : ""; ?>><?php echo $i; ?></option>
			<?php endfor; ?>
		</select>
	</div>
<?php else: ?>
	<p><?php echo $this->lang->line('no_candidates'); ?></p>
<?php endif; ?>