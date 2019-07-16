<?php
$content = get_the_content();
if (empty($content)) {
	$content = get_the_excerpt();
}
?>
<div>
	<div class="product-details">
		<div class="product-details__image">
			<?php the_post_thumbnail('full') ?>
		</div>
		<div class="product-details__info">
			<div class="product-details__title">
				<?php the_title() ?>
			</div>
			<div class="product-details__content">
				<?php echo $content ?>
			</div>
	        <?php if ($price = get_field('price')): ?>
	        <div class="product-details__price">
	            <?php echo $price['before'] ?>
	            <span><?php echo number_format($price['value'], 0, ',', ' ') ?></span>
	            <?php echo $price['after'] ?>
	        </div>
	        <?php endif; ?>
		</div>

		<div class="product-details__nav">
			<div class="eraser eraser_dark">
				<?php if ($next = get_next_post(true, '', 'product_category')): ?>
				<div class="eraser__left js-product-details" data-id="<?php echo $next->ID ?>"></div>
			    <?php endif; ?>
				<?php if ($previous = get_previous_post(true, '', 'product_category')): ?>
				<div class="eraser__right js-product-details" data-id="<?php echo $previous->ID ?>"></div>
			    <?php endif; ?>
				<div class="eraser__center"></div>
			</div>
		</div>
	</div>
</div>