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

            <div class="section-white">
                <div class="container">
                    <div class="product-single">
                        <div class="product-single__image">
                            <?php the_post_thumbnail('full') ?>
                        </div>
                        <div class="product-single__info">
                            <div class="product-single__title">
                                <?php the_title() ?>
                            </div>
                            <?php if (has_excerpt()): ?>
                            <div class="product-single__content">
                                <?php the_excerpt() ?>
                            </div>
                            <?php endif; ?>
                            <?php if ($price = get_field('price')): ?>
                            <div class="product-single__price">
                                <?php echo $price['before'] ?>
                                <span><?php echo number_format($price['value'], 0, ',', ' ') ?></span>
                                <?php echo $price['after'] ?>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="section-content">
                <div class="container container_small">
                    <div class="content">
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>

            <section class="article-foot">
                <div class="container">
                    <div class="article-foot__inner">
                        <div class="article-foot__social">
                            <p>Понравилась статья?<br> Поделись с друзьями:</p>
                            <script src="https://yastatic.net/es5-shims/0.0.2/es5-shims.min.js"></script>
                            <script src="https://yastatic.net/share2/share.js"></script>
                            <div class="ya-share2" data-services="collections,vkontakte,facebook,odnoklassniki,moimir,pinterest,twitter,telegram" data-image="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large') ?>"></div>
                        </div>
                        <div class="article-foot__neighbors">
                            <?php previous_post_link('%link', 'Предыдущая<i></i>') ?>
                            <span></span>
                            <?php next_post_link('%link', 'Следующая<i></i>') ?>
                        </div>
                    </div>
                </div>
            </section>
            <?php endwhile; endif; ?>

            <?php get_template_part('partials/departure-order'); ?>

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
            <div class="section-related">
                <div class="container">
                    <h2 class="section-related__title">Вам может быть интересно:</h2>
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