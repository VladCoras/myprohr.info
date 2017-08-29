<?php if (isset($categories)): ?>
	<ul class="category-list">
		<?php foreach($categories as $category): ?>
			<li>
				<img src="<?php echo images_url('/categories/' . $category['image']); ?>">
				<a href="<?php echo base_url($this->language['key'] . '/categories/' . $category['url_key']); ?>">
					<span><?php echo $category['name']; ?></span>
				</a>
			</li>
		<?php endforeach; ?>
	</ul>
<?php else: ?>
	<p>Nu sunt categorii disponibile.</p>
<?php endif; ?>