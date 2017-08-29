<?php if ($companies): ?>
	<table class="companies-table" cellspacing="0" cellpadding="0">
		<tbody>
			<?php foreach($companies as $company): ?>
			<tr>
				<td class="name">
					<a href="<?php echo base_url($this->language['key'] . '/company/' . $company['url_key']); ?>"><?php echo $company['name']; ?></a>
				</td>
				<td class="location">
					<i class="icon-pin"></i> <?php echo $company['location']; ?>
				</td>
				<td>	
					<a class="button light large" href="<?php echo base_url($this->language['key'] . '/company/' . $company['url_key']); ?>">Aplică acum</a>
				</td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
<?php else: ?>
	<p>Nimic de afișat.</p>
<?php endif; ?>