<?php
/*
Template Name: Главная
*/
$projects = get_field('projects');
if ($projects) {
    $projects = array_filter(array_map(function($row) {
        return [
            'url' => $row['image']['url'],
            'thumbnail' => $row['image']['sizes']['w800h800']
        ];
    }, $projects), function($row) {
        return !empty($row);
    });
}
?>
<!DOCTYPE html>
<html>
    <head>
        <?php get_template_part('partials/head'); ?>
    </head>
    <body class="page page_slideshow">
        <?php get_template_part('partials/preloader'); ?>

        <div class="wrapper">
            <?php get_template_part('partials/header'); ?>

            <?php get_template_part('partials/slideshow'); ?>

            <div class="container">
                <?php if ($projects): ?>
                <div class="projects" id="projects" data-projects='<?php echo json_encode($projects) ?>'>
                    <div class="projects-header">
                        <h1 class="projects-header__title">
                            Мебель под заказ,
                            <small>которую мы уже сделали</small>
                        </h1>
                        <div class="projects-header__desc">Фото выполненных проектов:</div>
                    </div>

                    <div class="projects-grid">
                        <div class="projects-cell">
                            <div class="projects-main zoom-container"></div>
                        </div>

                        <div class="projects-cell">
                            <div class="projects-grid">
                                <div class="projects-cell">
                                    <div class="projects-thumb zoom-container"></div>
                                </div>

                                <div class="projects-cell">
                                    <div class="projects-thumb zoom-container"></div>
                                </div>
                            </div>

                            <div class="projects-controls">
                                <div class="eraser">
                                    <div class="eraser__center"></div>
                                    <div class="eraser__left" data-projects-control="previous"></div>
                                    <div class="eraser__right" data-projects-control="next"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="projects-selection">
                        <a href="<?php the_permalink(477) ?>" class="projects-selection__headline js-open-modal" data-target="#quiz">
                            <span class="projects-selection__title">
                                Ответьте на 5 вопросов, подобрав себе мебель, и&nbsp;получите скидку +&nbsp;бесплатный эскиз
                            </span>
                            <span class="projects-more circle-details circle-details_small">
                                <span class="circle-details__inner">
                                    <span>Получить</span>
                                    <span style="margin-right: -8px">скидку</span>
                                    <span class="circle-details__arrow"></span>
                                </span>
                            </span>
                        </a>
                        <div class="projects-selection__text">
                            Пройдя тест вы получите:
                            <ul>
                                <li>Расчёт стоимости проекта по вашим параметрам</li>
                                <li>Каталог 2019 и 2020 годов</li>
                                <li>20% скидку и бесплатный эскиз</li>
                            </ul>
							Подробности акции по номеру +7 (965) 631-90-50
                        </div>
                    </div>
                </div>
                <?php endif; ?>

                <div class="departure">
                    <div class="departure__intro">Точная стоимость рассчитывается после проведения замеров.</div>
                    <div class="departure__main">Выезд<span>*</span> <svg class="js-svg-text"><text x="50%" y="50%">дизайнера</text></svg> на&nbsp;дом</div>
                    <div class="departure__content">
                        <ul class="departure__tasks">
                            <li>1. Нарисует эскиз прямо на месте</li>
                            <li>2. Привезет с собой материалы и поможет с выбором</li>
                            <li>3. Рассчитает точную стоимость Вашей мебели</li>
                        </ul>
                        <div class="departure__notice"><span>*</span> выезд бесплатный и не обязывает вас к покупке</div>
                    </div>
                </div>

                <div class="departure-order js-departure-order">
			<?php echo do_shortcode('[contact-form-7 id="6"]'); ?>
                </div>

                <div class="manufacture">
                    <div class="manufacture__warranty">
                        <img class="lazyload" data-src="<?php asset("warranty.png") ?>" alt="">
                    </div>
                    <div class="manufacture__content">
                        <div class="manufacture-title">
                            <div class="manufacture-title__first">производство</div>
                            <svg class="manufacture-title__second js-svg-text"><text x="50%" y="50%">мебели</text></svg>
                            <div class="manufacture-title__third">на заказ</div>
                        </div>
                        <div class="manufacture-control">
                            <div class="manufacture-control__title">
                                <div class="manufacture-control__pulsar pulsar pulsar_left">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                                3 этапа контроля качества:
                            </div>
                            <div class="manufacture-control__text">Вся продукция, прежде, чем её доставят Вам проходит тщательный 3-х этапный контроль. Без этого её не выпустят с производства.</div>
                        </div>
                    </div>
                </div>

                <div class="range-info">
                    <div class="range-info__title">
                        Большой <svg class="js-svg-text"><text x="50%" y="50%">ассортимент</text></svg>
                    </div>
                    <div class="range-info__text">
                        <p>Материалы фасадов представлены каталогом из:</p>
                        <ul>
                            <li>60 цветов первокласного ЛДСП и МДФ;</li>
                            <li>Плёнки 1 320 цветов и фактур;</li>
                            <li>Высокопрочными пластиками производства  Италии, Германии и Кореи</li>
                        </ul>
                    </div>
                </div>

                <div class="range-grid">
                    <div class="range-cell">
                        <div class="range-item">
                            <img class="range-item__image lazyload" data-src="<?php asset("range-1.jpg") ?>" alt="">
                            <div class="range-item__info">
                                <div class="range-item__title">ЛДСП</div>
                                <div class="range-item__desc">более 60 цветов и фактур</div>
                            </div>
                        </div>
                    </div>
                    <div class="range-cell">
                        <div class="range-item">
                            <img class="range-item__image lazyload" data-src="<?php asset("range-2.jpg") ?>" alt="">
                            <div class="range-item__info">
                                <div class="range-item__title">МДФ</div>
                                <div class="range-item__desc">высокоглянцевая</div>
                            </div>
                        </div>
                    </div>
                    <div class="range-cell">
                        <div class="range-item">
                            <img class="range-item__image lazyload" data-src="<?php asset("range-3.jpg") ?>" alt="">
                            <div class="range-item__info">
                                <div class="range-item__title">Пластики</div>
                                <div class="range-item__desc"><span>пр-во </span>Италия, Германия, Корея</div>
                            </div>
                        </div>
                    </div>
                    <div class="range-cell">
                        <button class="form-submit js-open-modal" data-target="#callback">
                            <span class="form-submit__inner">
                                <span>Получить</span>
                                <span class="form-submit__arrow"></span>
                                <span>консультацию<span>
                            </span>
                        </button>
                    </div>
                    <div class="range-cell">
                        <div class="range-note">Образцы и материалы, из которых изготавливается мебель привозит с собой дизайнер-замерщик</div>
                    </div>
                </div>

                <?php if ($materials = get_field('material')): ?>
                <div class="materials">
                    <div class="materials__title-first">материал</div>
                    <div class="materials__title-second">фасадов</div>
                    <?php foreach($materials as $key => $material): ?>
                    <div class="materials__cell">
                        <div class="materials-item materials-item_<?php echo $material['modifier']; ?><?php if ($key === 0): ?> js-materials-first<?php endif; ?>">
                            <img class="materials-item__image lazyload" data-src="<?php echo $material['image']['url'] ?>" alt="">
                            <div class="materials-item__title"><?php echo $material['title'] ?></div>
                            <div class="materials-item__text"><?php echo $material['desc'] ?></div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>

                <div class="leather">
                    <div class="leather__title">
                        <div>эко-кожа</div>
                        <svg class="js-svg-text"><text x="50%" y="50%">для фасадов</text></svg>
                    </div>
                    <div class="leather__body">
                        <div class="leather__text">
                            1. Придает стильный<br>
                            и респектабельный вид мебели.<br>
                            2. Отличное решение<br>
                            для кабинета или библиотеки.
                        </div>
                        <img data-src="<?php asset("leather-example.png") ?>" alt="" class="leather__example lazyload">
                    </div>
                </div>

                <div class="engraving">
                    <div class="engraving__title">
                        <div>Гравировка</div>
                        <svg class="js-svg-text"><text x="50%" y="50%">по стеклу</text></svg>
                    </div>
                    <div class="engraving__grid">
                        <img data-src="<?php asset("engraving-3.jpg") ?>" alt="" class="engraving__before lazyload">
                        <img data-src="<?php asset("engraving-4.jpg") ?>" alt="" class="engraving__after lazyload">
                        <div class="engraving__cell js-engraving-first">
                            <img data-src="<?php asset("engraving-1.jpg") ?>" alt="" class="engraving__image lazyload">
                            <div class="engraving__type engraving__type_left">
                                сложная
                            </div>
                        </div>
                        <div class="engraving__cell">
                            <img data-src="<?php asset("engraving-2.jpg") ?>" alt="" class="engraving__image lazyload">
                            <div class="engraving__type engraving__type_right">
                                Ромбовидная
                            </div>
                        </div>
                    </div>
                </div>

                <?php if ($reviews = get_field('reviews')): ?>
                <div class="video js-slb-gallery">
                    <div class="video__cell">
                        <div class="video__title">
                            Отзывы о компании "ДОМАШНИЙ УЮТ"
                        </div>
                    </div>
                    <div class="video__cell">
                        <div class="video-list">
                            <?php foreach($reviews as $review): ?>
                            <div class="video-list__item">
                                <?php if ($review['type'] == 'media'): ?>
                                <div class="video-item"><?php echo $review['media'] ?></div>
                                <?php endif; ?>
                                <?php if ($review['type'] == 'image'): ?>
                                <a href="<?php echo $review['image']['sizes']['large'] ?>"" class="video-item">
                                    <img src="<?php echo $review['image']['sizes']['medium'] ?>" alt="">
                                </a>
                                <?php endif; ?>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <?php endif; ?>

                <?php if ($videos = get_field('videos')): ?>
                <div class="video">
                    <div class="video__cell">
                        <div class="video__title">
                            Видео о технологиях изготовления
                        </div>
                    </div>
                    <div class="video__cell">
                        <div class="video-list">
                            <?php foreach($videos as $video): ?>
                            <div class="video-list__item">
                                <div class="video-item js-video-first"><?php echo $video['code'] ?></div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <?php endif; ?>

                <div class="consultation">
                    <div class="consultation__title">Не знаете, какие материалы подобрать?</div>
                    <div class="consultation__body">
                        <div class="consultation__desc">
                            Получите бесплатную консультацию эксперта о правильном выборе фасада и комплектующих
                        </div>
			<?php echo do_shortcode('[contact-form-7 id="7"]'); ?>
                    </div>
                </div>

                <div class="action">
                    <div class="action-mask">
                        <div class="action-mask__outset"><span>акция</span></div>
                        <div class="action-mask__inset"><span>акция</span></div>
                    </div>
                    <div class="action__attention">Внимание, акция!</div>
                    <div class="action__title">
                        <span>Позвоните сейчас<br> и получите</span>
                        <strong>дополнительную скидку</strong>
                    </div>
                    <div class="action__phone">
                        <?php the_field('phone', 'option') ?>
                    </div>
                    <div class="action__time">
                        Период действия акции ограничен, подробности уточняйте по телефону
                    </div>
                    <div class="action__price">
                        1 500 <span>р</span>
                    </div>
                </div>

                <?php if ($partners = get_field('partners')): ?>
                <div class="partners">
                    <div class="partners__title">Наши <span>партнеры</span></div>
                    <div class="partners__grid">
                        <?php foreach ($partners as $item): ?>
                        <div class="partners-item">
                            <img class="lazyload" data-src="<?php echo $item['image']['url'] ?>" alt="">
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <?php endif; ?>
            </div>

            <?php get_template_part('partials/landing/special'); ?>

            <?php get_template_part('partials/landing/contacts'); ?>

            <?php get_template_part('partials/landing/catalogs'); ?>

            <?php get_template_part('partials/footer'); ?>
        </div>
    </body>
</html>
