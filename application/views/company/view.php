<div class="wrapper">
	<h1><?php echo $company['name']; ?></h1>
	<p><?php echo $this->lang->line('views') . $company['views']; ?></p>
	<div class="section section-1">
		<h2><?php echo $this->lang->line('about'); ?></h2>
		<?php echo $company['description']; ?>
	</div>
	<div class="section section-2">
		<h2><?php echo $this->lang->line('apply_now'); ?></h2>
		<form method="POST" action="<?php echo current_url(); ?>" class="simple-form" enctype="multipart/form-data">
			<label for="name"><?php echo $this->lang->line('name_label'); ?></label>
			<input type="text" name="name">

			<label for="email"><?php echo $this->lang->line('email_label'); ?></label>
			<input type="text" name="email">

			<label><?php echo $this->lang->line('message_label'); ?></label>
			<textarea name="message"></textarea>

			<label><?php echo $this->lang->line('apply_file_types'); ?></label>
			<span class="note"><?php echo $this->lang->line('apply_file_types_note'); ?></span>
			
			<input type="file" name="userfile[]" id="file" class="inputfile" data-multiple-caption="{count} <?php echo $this->lang->line('selected_files'); ?>" multiple />
			<label for="file" class="button large success"><?php echo $this->lang->line('choose_file'); ?></label>

			<input type="submit" name="send" class="button light large" value="<?php echo $this->lang->line('apply_now'); ?>">
		</form>
	</div>
</div>