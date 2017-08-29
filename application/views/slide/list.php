<?php if (isset($slides)): ?>
	<div id="slideshow">
		<?php foreach ($slides as $slide): ?>
			<div>
				<img src="<?php echo media_url('slides/' . $slide['image']); ?>" alt="MyProHR slide #<?php echo $slide['id_slide']; ?>">
				<div class="darken"></div>
				<h1>MyProHR</h1>
				<p><?php echo $this->lang->line('slider_text'); ?></p>
			</div>
		<?php endforeach; ?>
	</div>
<?php endif; ?>