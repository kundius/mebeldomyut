<?php
/*
Template Name: Контакты
*/
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

                <?php if (have_posts()) : while ( have_posts() ) : the_post(); ?>
                <div class="page-contacts">
                    <h1 class="page-contacts__title"><?php the_title(); ?></h1>
                    <div class="grid">
                        <div class="page-contacts__left">
                            <div class="page-contacts__map">
                                <?php the_field('map') ?>
                            </div>
                        </div>
                        <div class="page-contacts__right">
                            <div class="page-contacts__content">
                                <?php the_content(); ?>
                            </div>
                            <?php if ($socials = get_field('socials')): ?>
                            <div class="page-contacts__socials">
                                <div class="page-contacts-socials">
                                    <div class="page-contacts-socials__title">Мы в соцсетях:</div>
                                    <div class="page-contacts-socials__items">
                                        <?php foreach ($socials as $item): ?>
                                        <a href="<?php echo $item['link'] ?>" target="_blank">
                                            <img src="<?php echo $item['icon']['url'] ?>" alt="">
                                        </a>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php endwhile; else: ?>
                    <p>Извините, ничего не найдено.</p>
                <?php endif; ?>

                <div class="feedback">
                    <div class="feedback__title">Обратная связь</div>
                    <div class="feedback__desc">Вы можете связаться с нами с помощью формы обратной связи:</div>
                    <div class="feedback__form">
                        <?php echo do_shortcode('[contact-form-7 id="153" title="Обратная связь"]'); ?>
                    </div>
                </div>
            </div>

            <?php get_template_part('partials/footer'); ?>
        </div>
    </body>
</html>
