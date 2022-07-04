<?php
$categories = get_terms('product_category', array(
    'hide_empty' => false
));
?>
<div class="mobile-header">
    <?php if (is_new_year()): ?>
        <div class="mobile-header__new_year_left_top_1"></div>
        <div class="mobile-header__new_year_right_top_1"></div>
    <?php endif; ?>

    <div class="mobile-header__menu js-toggle-menu">
        <?php icon('menu', 1.2) ?>
    </div>

    <a href="/" class="mobile-header-logo">
        <span class="mobile-header-logo__name">Домашний уют</span>
        <span class="mobile-header-logo__desc">Магазин корпусной мебели</span>
    </a>

    <button class="mobile-header__callback js-open-modal" data-target="#callback"><?php icon('phone', .9) ?></button>
</div>

<div class="header-placeholder"></div>

<div class="header">
    <?php if (is_new_year()): ?>
        <div class="header_new_year_left_top_1"></div>
        <div class="header_new_year_right_top_1"></div>
    <?php endif; ?>

    <div class="container container_wide">
        <?php if (is_new_year()): ?>
        <div class="header_new_year_left_top_2"></div>
        <div class="header_new_year_right_top_2"></div>
        <div class="header_new_year_middle_top_1"></div>
        <?php endif; ?>

        <div class="header-wrapper">
            <a href="/" class="header-logo">
                <span class="header-logo__name">Домашний уют</span>
                <span class="header-logo__desc">Магазин корпусной мебели</span>
            </a>

            <ul class="header-menu">
                <?php foreach ($categories as $category): ?>
                <li>
                    <a href="<?php echo get_term_link($category->term_id) ?>">
                        <?php echo $category->name ?>
                    </a>
                </li>
                <?php endforeach; ?>
            </ul>

            <?php if ($slideshow = get_field('slideshow')): ?>
            <div class="header-menu-slideshow">
                <ul class="header-menu-slideshow__list">
                    <?php foreach ($slideshow as $key => $slide): ?>
                    <li class="header-menu-slideshow__item">
                        <span class="header-menu-slideshow__slide js-slideshow-nav" data-index="<?php echo $key ?>"></span>
                        <a href="<?php echo $slide['link'] ?>" class="header-menu-slideshow__link"><span><?php echo $slide['name'] ?></span></a>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <?php endif; ?>

            <ul class="header-menu">
                <li>
                    <a href="<?php the_permalink(671) ?>">О нас</a>
                </li>
                <li>
                    <a href="<?php the_permalink(140) ?>">Контакты</a>
                </li>
            </ul>

            <div class="header-telephony">
                <div class="header-phone">
                    <div class="header-phone__number"><?php the_field('phone', 'option') ?></div>
                    <div class="header-phone__time"><a href="mailto:<?php the_field('email', 'option') ?>"><?php the_field('email', 'option') ?></a></div>
                </div>

                <button class="header-callback js-open-modal" data-target="#callback">
                    <span class="header-callback__text">Заказать звонок</span>
                    <span class="header-callback__icon"><?php icon('phone', .9) ?></span>
                </button>
            </div>
        </div>

        <div class="header-overlay js-toggle-menu"></div>
        <button class="header-close js-toggle-menu"></button>
    </div>
</div>

<div class="overlay-email"><a href="mailto:<?php the_field('email', 'option') ?>"><?php the_field('email', 'option') ?></a></div>

<div class="overlay-sitemap"><a href="<?php the_permalink(9) ?>">Карта сайта</a></div>
