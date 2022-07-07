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
            </div>

            <div class="section-category">
                <div class="container">
                    <div class="category">
                        <h1 class="category__title"><?php single_cat_title() ?></h1>

                        <?php if ($action || count($actions) > 0 || $content): ?>
                        <div class="category__grid">
                            <div class="category__grid-cell">
                                <?php if ($action): ?>
                                <div class="main-action">
                                    <img class="main-action__image" src="<?php echo $action['image']['url'] ?>" alt="">
                                    <div class="main-action__sticker">Акция</div>
                                    <div class="main-action__bonus">Приятный бонус!</div>
                                    <div class="main-action__info">
                                        <div class="main-action__title"><?php echo $action['title'] ?></div>
                                        <div class="main-action__desc"><?php echo $action['desc'] ?></div>
                                    </div>
                                </div>
                                <?php endif; ?>
                            </div>

                            <div class="category__grid-cell">
                                <div class="category__content"><?php echo $content ?></div>
                                <?php if (count($actions) > 0): ?>
                                <div class="category-actions">
                                    <div class="category-actions__grid">
                                        <?php foreach ($actions as $action): ?>
                                        <div class="category-actions__grid-cell">
                                            <div class="category-action">
                                                <img class="category-action__image" src="<?php echo $action['image']['url'] ?>" alt="">
                                                <div class="category-action__title"><?php echo $action['title'] ?></div>
                                            </div>
                                        </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>

                    <div class="category-moments">
                        <div class="category-moments__title">Выбор мебели на заказ: основные моменты</div>
                        <div class="moments-group">
                            <div class="moments-group__title">Материал</div>
                            <div class="moments-group__grid">
                                <div class="moments-group__grid-cell">
                                    <div class="moments-card-primary">
                                        <div class="moments-card-primary__image">
                                            <img src="/wp-content/uploads/2022/07/moment-1.jpg" alt="" />
                                        </div>
                                        <div class="moments-card-primary__content">
                                            <p><strong class="moments-card-primary__title">ЛДСП</strong> - экономный вариант</p>
                                            <p><strong>Плюсы:</strong> большой выбор цветов и фактур, имитация натурального дерева. Устойчивость к механическим повреждениям и термическому воздействию.</p>
                                            <p><strong>Минусы:</strong> Износостойкость ниже, чем у МДФ-плит. Твердость материала, не допускающая возможность тонкой обработки.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="moments-group__grid-cell">
                                    <div class="moments-card-primary">
                                        <div class="moments-card-primary__image">
                                            <img src="/wp-content/uploads/2022/07/moment-2.jpg" alt="" />
                                        </div>
                                        <div class="moments-card-primary__content">
                                            <p><strong class="moments-card-primary__title">МДФ</strong> - лучшее соотношение “цена / качество”</p>
                                            <p><strong>Плюсы:</strong> Экологичность. Значительно дешевле массива дерева, имея при этом большой срок эксплуатации. Легко поддается любой обработке.</p>
                                            <p><strong>Минусы:</strong> относительно высокая стоимость по сравнению с ЛДСП.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="moments-group__grid-cell">
                                    <div class="moments-card-primary">
                                        <div class="moments-card-primary__image">
                                            <img src="/wp-content/uploads/2022/07/moment-3.jpg" alt="" />
                                        </div>
                                        <div class="moments-card-primary__content">
                                            <p><strong class="moments-card-primary__title">Зеркала и стекло</strong> - выбор для отражения Вашей индивидуальности</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="moments-group">
                            <div class="moments-group__title">Оформление фасадов</div>
                            <div class="moments-group__grid">
                                <div class="moments-group__grid-cell">
                                    <div class="moments-card-secondary">
                                        <div class="moments-card-secondary__image">
                                            <img src="/wp-content/uploads/2022/07/moment-4.jpg" alt="" />
                                        </div>
                                        <div class="moments-card-secondary__content">
                                            <div class="moments-card-secondary__content-title">ЛДСП и МДФ</div>
                                            <div class="moments-card-secondary__content-desc">Более 60 цветов</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="moments-group__grid-cell">
                                    <div class="moments-card-secondary">
                                        <div class="moments-card-secondary__image">
                                            <img src="/wp-content/uploads/2022/07/moment-5.jpg" alt="" />
                                        </div>
                                        <div class="moments-card-secondary__content">
                                            <div class="moments-card-secondary__content-title">Пленки</div>
                                            <div class="moments-card-secondary__content-desc">В каталоге 1320 цветов и фактур</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="moments-group__grid-cell">
                                    <div class="moments-card-secondary">
                                        <div class="moments-card-secondary__image">
                                            <img src="/wp-content/uploads/2022/07/moment-6.jpg" alt="" />
                                        </div>
                                        <div class="moments-card-secondary__content">
                                            <div class="moments-card-secondary__content-title">Нанесение</div>
                                            <div class="moments-card-secondary__content-desc">Фотопечать, пескоструйный рисунок, гравировка, витражи</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="moments-group">
                            <div class="moments-group__title">Фурнитура</div>
                            <div class="moments-group__grid">
                                <div class="moments-group__grid-cell">
                                    <div class="moments-card-tertiary">
                                        <div class="moments-card-tertiary__image">
                                            <img src="/wp-content/uploads/2022/07/moment-7.jpg" alt="" />
                                        </div>
                                        <div class="moments-card-tertiary__title">Экономные, рекомендуемые по качеству<br /> крепежи и фурнитура</div>
                                    </div>
                                </div>
                                <div class="moments-group__grid-cell">
                                    <div class="moments-card-tertiary">
                                        <div class="moments-card-tertiary__image">
                                            <img src="/wp-content/uploads/2022/07/moment-8.jpg" alt="" />
                                        </div>
                                        <div class="moments-card-tertiary__title">Фурнитура и крепежи<br /> премиум класса</div>
                                    </div>
                                </div>
                                <div class="moments-group__grid-cell">
                                    <div class="moments-card-tertiary">
                                        <div class="moments-card-tertiary__image">
                                            <img src="/wp-content/uploads/2022/07/moment-9.jpg" alt="" />
                                        </div>
                                        <div class="moments-card-tertiary__title">По индивидуальным<br /> пожеланиям</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="category-consultation">
                        <div class="category-consultation__grid">
                            <div class="category-consultation__grid-cell">
                                <div class="consultation-text">
                                    <div class="consultation-text__title">
                                        Затрудняетесь с выбором фасада, варианта оформления или подбором комплектующих?
                                    </div>
                                    <div class="consultation-text__content">
                                        <p>Наши специалисты дадут подробную консультуцию<br /> и посоветуют оптимальное решение именно для Вашего случая.</p>
                                        <p>Звоните по телефону <strong>+7 (965) 631-90-50</strong><br /> или отправьте заявку на консультацию</p>
                                    </div>
                                </div>
                            </div>
                            <div class="category-consultation__grid-cell">
                                <?php echo do_shortcode('[contact-form-7 id="2095" title="Консультация в категории"]'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php if (have_posts()) : ?>
            <div class="section-products">
                <div class="container">
                    <div class="section-products__title">
                        <span>Готовые решения из нашего каталога</span>
                    </div>
                    <div class="products" data-match-height='<?php echo json_encode([".products-item__title"]) ?>'>
                        <div class="products__grid">
                            <?php while (have_posts()) : the_post(); ?>
                            <div class="products__grid-cell">
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
                            </div>
                            <?php endwhile; ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>

            <?php if (!empty($content_promotion)) : ?>
            <div class="section-promotion">
                <div class="container container_small">
                    <?php echo $content_promotion ?>
                </div>
            </div>
            <?php endif; ?>

            <div class="section-white">
                <?php get_template_part('partials/landing/special'); ?>
                    
                <?php get_template_part('partials/landing/contacts'); ?>

                <?php get_template_part('partials/landing/catalogs'); ?>
            </div>

            <?php get_template_part('partials/footer'); ?>
        </div>
    </body>
</html>
