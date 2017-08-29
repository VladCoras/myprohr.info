<div class="heading">
	<h1>Editare candidat #<?php echo $candidate['id_candidate']; ?> (<?php echo substr($candidate['function'], 0, 50); ?>)</h1>
	<a class="button large success right" href="<?php echo base_url($this->language['key'] . '/admin/candidates'); ?>">Înapoi</a>
</div>
<div class="form-body">
	<form class="ajax-form admin-form">
		<div class="panel">
			<h3 class="panel-title">General</h3>
			<div class="label-group label-group-3">
				<label style="width:8%;">
					<span class="label">Nr.</span>
					<input style="padding:8px 10px" disabled type="text" value="<?php echo isset($candidate['id_candidate']) ? $candidate['id_candidate'] : 0 ; ?>">
				</label>
				<label style="width:67%">
					<span class="label">Funcție</span>
					<input class="large" type="text" value="<?php echo isset($candidate['function']) ? $candidate['function'] : "" ; ?>">
				</label>
				<label style="width:25%">
					<span class="label">Adăugat de</span>
					<input class="large" disabled type="text" value="<?php echo $admin_name; ?>">
				</label>
			</div>
			<div class="label-group label-group-3">
				<label>
					<span class="label">Țara</span>
					<select name="country" class="js-select large">
						<option value="0">Selectati o țară...</option>
						<?php foreach ($this->config->item('countries_en') as $country): ?>
							<option value="<?php echo $country; ?>" <?php echo (isset($candidate['country']) && $candidate['country'] == $country) ? "selected" : "" ; ?>><?php echo $country; ?></option>
						<?php endforeach; ?>
					</select>
				</label>
				<label>
					<span class="label">Oraș</span>
					<input class="large" name="city" type="text" value="<?php echo isset($candidate['city']) ? $candidate['city'] : "" ; ?>">
				</label>
				<label>
					<span class="label">Categorie</span>
					<select name="country" class="large">
						<option value="0">Selectați o categorie</option>
						<?php foreach ($categories as $category): ?>
							<option <?php echo (isset($candidate['id_category']) && $candidate['id_category'] == $category['id_category']) ? "selected" : "" ; ?> value="<?php echo $category['id_category']; ?>"><?php echo $category['name']; ?></option>
						<?php endforeach; ?>
					</select>
				</label>
			</div>
		</div>
		<div class="panel">
			<h3 class="panel-title">URL</h3>
			<label>
				<span class="label"><i class="icon-google-drive"></i> Link Google Drive</span>
				<input class="large" name="google_drive_url" type="text" value="<?php echo isset($candidate['google_drive_url']) ? $candidate['google_drive_url'] : "" ; ?>">
			</label>
			<label>
				<span class="label"><i class="icon-link2"></i> Url key</span>
				<input class="large" type="text" value="<?php echo isset($candidate['url_key']) ? $candidate['url_key'] : "" ; ?>">
			</label>
		</div>
		<div class="panel">
			<h3 class="panel-title">Detalii</h3>
			<div class="label-group label-group-3">
				<label for="approbation">
					<span class="label">Aprobare</span>
					<input type="checkbox" class="switchery" name="approbation" type="checkbox">
				</label>
				<label for="target-country">
					<span class="label">Țară de destinație</span>
					<select name="target-country" class="js-select large">
						<option value="0">Selectati o țară...</option>
						<?php foreach ($this->config->item('countries_en') as $country): ?>
							<option value="<?php echo $country; ?>" <?php echo (isset($candidate['target-country']) && $candidate['target-country'] == $country) ? "selected" : "" ; ?>><?php echo $country; ?></option>
						<?php endforeach; ?>
					</select>
				</label>
				<label for="active">
					<span class="label">Disponibil</span>
					<input type="checkbox" name="active" type="checkbox" checked>
				</label>
			</div>
			<div class="button-container">
				<input type="submit" class="button large success" name="<?php echo isset($candidate) ? "edit" : "add"; ?>" value="<?php echo isset($candidate) ? "Salvează" : "Adaugă"; ?>">
				<?php if (isset($candidate)): ?>
					<input type="submit" class="button large danger" name="<?php echo isset($candidate) ? "edit" : "add"; ?>" value="Șterge">
				<?php endif; ?>
			</div>
		</div>
	</form>
</div>

<br><br>