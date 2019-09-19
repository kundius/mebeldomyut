<?php
$term = get_queried_object();
$actions = get_field('actions', $term->taxonomy . '_' . $term->term_id) ?: [];
$content = get_field('content', $term->taxonomy . '_' . $term->term_id);
$content_promotion = get_field('content_promotion', $term->taxonomy . '_' . $term->term_id);
$action = array_shift($actions);
?>
<!DOCTYPE html>
<html>
    <head>
        <?php get_template_part('partials/head'); ?>
    </head>
    <body class="page">
        <div class="wrapper">
            <?php get_template_part('partials/header'); ?>

            <div class="container">
                <div class="breadcrumbs breadcrumbs_offset">
                    <?php bcn_display() ?>
                </div>

                <div class="category">
                    <h1 class="category__title"><?php single_cat_title() ?></h1>

                    <?php if ($action || count($actions) > 0 || $content): ?>
                    <div class="category__grid grid">
                        <div class="category__left">
                            <?php if ($action): ?>
                            <div class="main-action">
                                <img class="main-action__image" src="<?php echo $action['image']['url'] ?>" alt="">
                                <div class="main-action__sticker">Акция</div>
                                <div class="main-action__price">
                                    <?php echo $action['price']['before'] ?>
                                    <span><?php echo number_format($action['price']['value'], 0, ',', ' ') ?></span>
                                    <?php echo $action['price']['after'] ?>
                                </div>
                                <div class="main-action__info">
                                    <div class="main-action__title"><?php echo $action['title'] ?></div>
                                    <div class="main-action__desc"><?php echo $action['desc'] ?></div>
                                </div>
                            </div>
                            <?php endif; ?>
                        </div>

                        <div class="category__right">
                            <div class="category__content"><?php echo $content ?></div>
                            <?php if (count($actions) > 0): ?>
                            <div class="category-actions grid">
                                <?php foreach ($actions as $action): ?>
                                <div class="category-action">
                                    <img class="category-action__image" src="<?php echo $action['image']['url'] ?>" alt="">
                                    <div class="category-action__title"><?php echo $action['title'] ?></div>
                                </div>
                                <?php endforeach; ?>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="section-white">
                <div class="container">
                    <?php if (have_posts()) : ?>
                        <div class="products grid" data-match-height='<?php echo json_encode([".products-item__title", ".products-item__desc"]) ?>'>
                            <?php while (have_posts()) : the_post(); ?>
                            <div class="products-item">
                                <a href="<?php the_permalink() ?>" class="products-item__image">
                                    <?php the_post_thumbnail('thumbnail'); ?>
                                </a>
                                <a href="<?php the_permalink() ?>" class="products-item__title"><?php the_title() ?></a>
                                <div class="products-item__desc"><?php the_excerpt() ?></div>
                                <?php if ($price = get_field('price')): ?>
                                <div class="products-item__price">
                                    <?php echo $price['before'] ?>
                                    <span><?php echo number_format($price['value'], 0, ',', ' ') ?></span>
                                    <?php echo $price['after'] ?>
                                </div>
                                <?php endif; ?>
                                <div class="products-item__button">
                                    <a href="<?php the_permalink() ?>" class="form-submit form-submit_red form-submit_small">
                                        <span class="form-submit__inner">
                                            <span>Подробнее</span>
                                        </span>
                                    </a>
                                </div>
                            </div>
                            <?php endwhile; ?>
                        </div>
                    <?php endif; ?>
                </div>
				
				<?php if (!empty($content_promotion)) : ?>
				<div class="section-content_promotion" style="background: #e0e0e0;margin: 0 0 150px;padding: 100px 0;color: #000;">
					<div class="container container_small">
						<?php echo $content_promotion ?>
					</div>
				</div>
				<?php endif; ?>

                <?php get_template_part('partials/landing/special'); ?>
                    
                <?php get_template_part('partials/landing/contacts'); ?>

                <?php get_template_part('partials/landing/catalogs'); ?>
            </div>

            <?php get_template_part('partials/footer'); ?>
        </div>
    </body>
</html>
