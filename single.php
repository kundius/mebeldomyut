<!DOCTYPE html>
<html>
    <head>
        <?php get_template_part('partials/head'); ?>
    </head>
    <body class="page">
        <div class="wrapper">
            <?php get_template_part('partials/header'); ?>

            <?php if (have_posts()) : while ( have_posts() ) : the_post(); ?>
            <div class="container">
                <div class="breadcrumbs">
                    <?php bcn_display() ?>
                </div>
                <h1><?php the_title(); ?></h1>
            </div>

            <div class="section-content">
                <div class="container container_small">
                    <div class="content">
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>
            <?php endwhile; endif; ?>

            <?php
                $also_query = null;
                if ($related = get_field('related')) {
                    $also_query = new wp_query([
                        'orderby'=> 'rand',                
                        'caller_get_posts'=> 1,            
                        'post__in' => $related,
                        'post__not_in' => [$post->ID],
                        'showposts'=> 5   
                    ]);
                } else {
                    $tags = wp_get_post_tags($post->ID);
                    if ($tags) {
                        $tag_ids = [];
                        foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
                        $also_query = new wp_query([
                            'tag__in' => $tag_ids,       
                            'orderby'=> 'rand',                
                            'caller_get_posts'=> 1,            
                            'post__not_in' => [$post->ID],
                            'showposts'=> 5   
                        ]);
                    }
                }
            ?>

            <?php if ($also_query && $also_query->have_posts()): ?>
            <div class="section-white">
                <div class="container">
                    <div class="products grid" data-match-height='<?php echo json_encode([".products-item__title", ".products-item__desc"]) ?>'>
                        <?php while($also_query->have_posts()): $also_query->the_post(); ?>
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
                </div>
            </div>
            <?php endif; wp_reset_query(); ?>

            <?php get_template_part('partials/footer'); ?>
        </div>
    </body>
</html>