<div class="wrapper">
	<h1><?php echo $this->lang->line('contact'); ?></h1>
</div>
<div id="map"></div>
<div class="wrapper">
	<div class="row">
		<div class="section section-1">
			<form action="<?php echo current_url(); ?>" method="POST" class="contact-form ajax-form">
				<label for="name"><?php echo $this->lang->line('name_label'); ?></label>
				<input type="text" name="name">

				<label for="email"><?php echo $this->lang->line('email_label'); ?></label>
				<input type="text" name="email">

				<label for="subject"><?php echo $this->lang->line('subject_label'); ?></label>
				<input type="text" name="subject">

				<label><?php echo $this->lang->line('message_label'); ?></label>
				<textarea name="message"></textarea>
				<input type="submit" name="send" class="button light large" value="<?php echo $this->lang->line('submit'); ?>">
			</form>
		</div>
		<div class="section section-2">
			<h3>MyProHR SRL Romania</h3>
			<br>
			<p><b><?php echo $this->lang->line('address_label'); ?></b> Bv. 3 August 1919 nr. 2, ap. 22</p>
			<p>300092 Timisoara</p>

			<br>

			<p><b><?php echo $this->lang->line('contact_person'); ?></b> Andreea Leah</p>
			<p><b><?php echo $this->lang->line('contact_person'); ?></b> Sorin Mercea</p>

			<br>

			<p><b><?php echo $this->lang->line('phone_label'); ?></b> +40 (0) 733183767</p>
			<p><b><?php echo $this->lang->line('phone_label'); ?></b> +40 (0) 770146706</p>
			<p><b><?php echo $this->lang->line('email_label'); ?></b> <?php echo safe_mailto('contact@myprohr.info'); ?></p>
			<p><b>Skype: </b> myprohr</p>
			<!-- <p><b>Facebook: </b> <a href="https://www.facebook.com/pages/MyProHR/241491842585030">MyProHR</a></p> -->

			<br>

			<h3>MyProHR Deutschland</h3>
			<br>
			<p><b><?php echo $this->lang->line('address_label'); ?></b> Oskar von Miller Straße 5</p>
			<p>60314 – Frankfurt am Main</p>

			<br>

			<p><b><?php echo $this->lang->line('contact_person'); ?></b> Andreea Leah</p>
			<p><b><?php echo $this->lang->line('contact_person'); ?></b> Sorin Mercea</p>

			<br>

			<p><b><?php echo $this->lang->line('phone_label'); ?></b> +49 (0)699 8956896</p>
			<p><b><?php echo $this->lang->line('phone_label'); ?></b> +49 (0)151 63126783</p>
			<p><b><?php echo $this->lang->line('email_label'); ?></b> <?php echo safe_mailto('contact@myprohr.info'); ?></p>
			<p><b>Skype: </b> myprohr</p>
		</div>
	</div>
</div>