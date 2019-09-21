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
                            <div class="product-single__feed">
                                <button class="form-submit form-submit_red form-submit_small js-open-modal" data-target="#calculate">
                                    <span class="form-submit__inner">
                                        <span>Рассчитать стоимость</span>
                                    </span>
                                </button>
                            </div>
                            <div class="product-single__feed-desc">
                                Ориентировочная стоимость мебели&nbsp;под&nbsp;заказ
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="product-single-content">
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
            
            <div class="section-white">
                <div class="container">
                    <div class="departure-order">
                        <form action="/wp-json/contact-form-7/v1/contact-forms/6/feedback" class="departure-order__form js-form">
                            <div class="departure-order__title">
                                Выезд<span>*</span> <svg class="js-svg-text"><text x="50%" y="50%">дизайнера</text></svg> на&nbsp;дом
                            </div>
                            <div class="departure-order__grid">
                                <div class="departure-order__cell">
                                    <label class="form-input">
                                        <span class="form-input__label">Ваше имя</span>
                                        <span class="form-input__placeholder">Как вы хотите, чтоб к вам обращались</span>
                                        <input type="text" class="form-input__value" name="your-name">
                                    </label>
                                </div>
                                <div class="departure-order__cell">
                                    <label class="form-input">
                                        <span class="form-input__label">Ваш телефон</span>
                                        <span class="form-input__mask">+ 7 (___) ___-__-__</span>
                                        <input type="text" class="form-input__value" data-imask="+{7} (000) 000-00-00" name="your-phone">
                                    </label>
                                </div>
                                <div class="departure-order__cell">
                                    <button class="form-submit">
                                        <span class="form-submit__inner">
                                            <span>Хочу, чтобы</span>
                                            <span class="form-submit__arrow"></span>
                                            <span>дизайнер&nbsp;приехал<span>
                                        </span>
                                    </button>
                                </div>
                            </div>
                            <label class="departure-order__rights">
                                <input type="checkbox" class="form-checkbox" name="rules" value="1"> Прочитал(-а) <a href="<?php the_permalink(3) ?>" target="_blank">Пользовательское соглашение</a> и соглашаюсь с <a href="<?php the_permalink(14) ?>" target="_blank">Политикой обработки персональных данных</a>
                            </label>
                            <div class="departure-order__notice"><span>*</span> выезд бесплатный и не обязывает вас к покупке</div>
                        </form>
                    </div>
                </div>
            </div>

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