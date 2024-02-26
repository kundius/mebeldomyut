<?php
/*
Template Name: Акции
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

            <div class="stock-page">
                <div class="stock-page-top"></div>
                <div class="stock-page-benefints">
                    <div class="container container_stock">
                        <div class="stock-page-benefints__text-1">
                            До конца месяца получите скидку 15%<br />
                            на изготовление мебели в Москве и области
                        </div>
                        <div class="stock-page-benefints__text-2">

                        </div>
                        <div class="stock-page-benefints__text-3">
                            Мы используем только качественные<br />
                            материалы фасадов, крепления и фурнитуру
                        </div>
                        <div class="stock-page-benefints__text-4">
                            - МДФ, ЛДСП, зеркала, стекло, фурнитура, пленка ПВХ итальянского (по параллельному импорту) и российского производства!<br />
                            - Гарантия 3 года!<br />
                            - Выезд на замер бесплатно!<br />
                            - Доставка в пределах МКАД бесплатно!<br />
                            - Сборка нашими мастерами!<br />
                            - Дополнительные скидки при заказе 2 мебели, гарнитура!<br />
                            - Подъем на этаж бесплатно!
                        </div>
                    </div>
                </div>
                <div class="stock-page-offer">
                    <div class="container container_stock">
                        <div class="stock-page-offer__text-2">
                            ДОПОЛНИТЕЛЬНЫЕ ПОДАРКИ
                        </div>
                        <div class="stock-page-offer__text-3">
                            - Петли с доводчиками в подарок на шкафы.<br />
                            - Зеркало графит, бронза по цене обычного.
                        </div>
                        <div class="stock-page-offer__text-1">
                            
                        </div>
                        <div class="stock-page-offer__list">
                            <div class="stock-page-offer__grid">
                                <div class="stock-page-offer__cell">
                                    <div class="stock-page-offer-item">
                                        <div class="stock-page-offer-item__image">
                                            <img src="<?php asset("stock-6.png") ?>" alt="">
                                        </div>
                                        <div class="stock-page-offer-item__title">
                                            Сочетание<br />
                                            цены и качества
                                        </div>
                                    </div>
                                </div>
                                <div class="stock-page-offer__cell">
                                    <div class="stock-page-offer-item">
                                        <div class="stock-page-offer-item__image">
                                            <img src="<?php asset("stock-7.png") ?>" alt="">
                                        </div>
                                        <div class="stock-page-offer-item__title">
                                            Реализация<br />
                                            сложных задач
                                        </div>
                                    </div>
                                </div>
                                <div class="stock-page-offer__cell">
                                    <div class="stock-page-offer-item">
                                        <div class="stock-page-offer-item__image">
                                            <img src="<?php asset("stock-8.png") ?>" alt="">
                                        </div>
                                        <div class="stock-page-offer-item__title">
                                            Большой<br />
                                            опыт изготовления
                                        </div>
                                    </div>
                                </div>
                                <div class="stock-page-offer__cell">
                                    <div class="stock-page-offer-item">
                                        <div class="stock-page-offer-item__image">
                                            <img src="<?php asset("stock-9.png") ?>" alt="">
                                        </div>
                                        <div class="stock-page-offer-item__title">
                                            Гарантия<br />
                                            качества мебели
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="stock-page-form">
                    <div class="stock-page-form__inner">
                        <?php echo do_shortcode('[contact-form-7 id="2251" title="Страница акции"]'); ?>
                    </div>
                </div>
            </div>

            <?php get_template_part('partials/footer'); ?>
        </div>
    </body>
</html>
