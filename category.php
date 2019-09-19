<!DOCTYPE html>
<html>
    <head>
        <?php get_template_part('partials/head'); ?>
    </head>
    <body class="page">
        <div class="wrapper">
            <?php get_template_part('partials/header'); ?>

            <div class="container">
                <div class="breadcrumbs">
                    <?php bcn_display() ?>
                </div>

                <h1><?php single_cat_title(); ?></h1>
            </div>

            <div class="section-white">
                <div class="container">
                    <?php if (have_posts()) : ?>
                        <div class="products grid" data-match-height='<?php echo json_encode([".products-item__title", ".products-item__desc"]) ?>'>
                            <?php while (have_posts()) : the_post(); ?>
                            <div class="products-item">
                                <a href="<?php the_permalink() ?>" class="products-item__image zoom-container">
                                    <?php the_post_thumbnail('thumbnail'); ?>
                                </a>
                                <a href="<?php the_permalink() ?>" class="products-item__title"><?php the_title() ?></a>
                                <div class="products-item__desc"><?php the_excerpt() ?></div>
                                <div class="products-item__button">
                                    <a href="<?php the_permalink() ?>" class="form-submit form-submit_red form-submit_small">
                                        <span class="form-submit__inner">
                                            <span>Читать</span>
                                            <span class="form-submit__arrow"></span>
                                        </span>
                                    </a>
                                </div>
                            </div>
                            <?php endwhile; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <?php get_template_part('partials/footer'); ?>
        </div>
    </body>
</html>
