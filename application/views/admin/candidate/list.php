<div class="heading">
	<h1>Candidați (<?php echo !empty($candidates) ? count($candidates) : "0"; ?>)</h1>
	<a class="button large success right" href="<?php echo base_url($this->language['key'] . '/admin/candidate/add'); ?>">Adaugă candidat</a>
</div>
<?php if (!empty($candidates)): ?>
	<table class="items">
		<thead>
			<td style="width:50px;"><i class="icon-hash"></i> ID</td>
			<td style="width:350px;"><i class="icon-notebook"></i> Funcție</td>
			<td><i class="icon-pin"></i> Locație</td>
			<td style="text-align:center;"><i class="icon-user-check"></i> Disponibilitate</td>
			<td><i class="icon-google-drive"></i> Google Drive</td>
			<td style="width:50px;text-align:center;"><i class="icon-pencil7"></i></td>
		</thead>
		<tbody>
			<?php foreach($candidates as $candidate): ?>
				<tr class="item">
					<td><?php echo $candidate['id_candidate']; ?></td>
					<td style="width:200px;text-align:center;font-weight:700;"><?php echo $candidate['function']; ?></td>
					<td>
						<?php if (isset($candidate['city'])): ?>
							<?php echo $candidate['city'] . ", " . $candidate['country'] ?>
						<?php else: ?>
							<?php echo $candidate['country'] ?>
						<?php endif; ?>		
					</td>
					<td style="text-align:center;"><span class="table-label <?php echo $candidate['active'] == 1 ? "success" : "warning"; ?>"><?php echo $candidate['active'] == 1 ? "Disponibil" : "Indisponibil"; ?></span></td>
					<td><a target="_blank" href="<?php echo $candidate['google_drive_url']; ?>" class="button large">Deschide</a></td>
					<td>
						<a href="<?php echo base_url($this->language['key'] . '/admin/candidates/edit/' . $candidate['id_candidate']); ?>" class="button small inactive"><i class="icon-pencil7"></i></a>
						<a onclick="return confirm('Esti sigur ca vrei sa stergi candidatul <?php echo $candidate['id_candidate']; ?>?');" href="<?php echo base_url($this->language['key'] . '/admin/candidates/delete/' . $candidate['id_candidate']); ?>" class="button small warning"><i class="icon-cross3"></i></a>
					</td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
<?php else: ?>
	<p>Nu există participanți</p>
<?php endif; ?>