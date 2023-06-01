<div class="zoom-cursor-bg"></div>
<div class="zoom-cursor-icon"><?php icon('zoom') ?></div>

<button class="sctolltop"></button>

<div class="footer">
    <div class="container container_wide">
        <div class="footer__grid">
            <div class="footer__cell">
                <div class="footer__address">
                    <?php the_field('footer_address', 'option') ?>
                </div>
                <div class="footer__copyright">
                    <?php the_field('footer_copyright', 'option') ?>
                </div>
            </div>
            <div class="footer__cell">
                <ul class="footer__links">
                    <li><a href="/category/stati">Статьи</a></li>
                    <li><a href="http://мебель-ховрино.рф/" target="_blank">Каталог мебели</a></li>
                    <li><a href="<?php the_permalink(9) ?>">Карта сайта</a></li>
                    <li><a href="<?php the_permalink(14) ?>">Пользовательское соглашение</a></li>
                    <li><a href="<?php the_permalink(3) ?>">Политика конфиденциальности и обработки персональных даных</a></li>
                </ul>
            </div>
            <div class="footer__cell">
                <div class="footer__sitemap"><a href="<?php the_permalink(9) ?>">Карта сайта</a></div>

                <div class="footer__counters">
                    <?php the_field('footer_counters', 'option') ?>
                </div>
                <span class="footer__creator" target="_blank">
                    <img class="lazyload" data-src="<?php asset('creator.png') ?>" alt="">
                </span>
            </div>
        </div>
    </div>
</div>

<div style="display: none">
    <div id="callback" class="callback"> <!-- data-element-class="slbContentEl" -->
        <div class="callback__form">
            <div class="callback__title">Заказать звонок</div>
            <form action="/wp-json/contact-form-7/v1/contact-forms/7/feedback" method="post" class="js-form">
                <div class="callback__grid">
                    <div class="callback__cell">
                        <label class="form-input form-input_small">
                            <span class="form-input__label">Ваше имя</span>
                            <span class="form-input__placeholder">Как вы хотите, чтоб к вам обращались</span>
                            <input type="text" name="your-name" value="" size="40" class="form-input__value" aria-invalid="false" />
                        </label>
                    </div>
                    <div class="callback__cell">
                        <span class="wpcf7-form-control-wrap your-phone">
                            <label class="form-input form-input_small">
                                <span class="form-input__label">Ваш телефон</span>
                                <span class="form-input__mask">+ 7 (___) ___-__-__</span>
                                <input type="text" name="your-phone" value="" size="40" class="form-input__value" aria-required="true" aria-invalid="false" />
                            </label>
                        </span>
                    </div>
                    <div class="callback__cell">
                        <button class="form-submit form-submit_small">
                            <span class="form-submit__inner">
                                <span>Заказать<br>звонок</span>
                                <span class="form-submit__arrow"></span>
                            </span>
                        </button>
                    </div>
                    <div class="callback__cell">
                        <span class="wpcf7-form-acceptance-wrap">
                            <label class="ui-rules">
                                <input type="checkbox" name="rules" value="1" aria-invalid="false" checked="checked" class="form-checkbox form-checkbox_light" />
                                Прочитал(-а) <a href="/polzovatelskoe-soglashenie" target="_blank">Пользовательское соглашение</a> и соглашаюсь с <a href="/privacy-policy" target="_blank">Политикой обработки персональных данных</a>
                            </label>
                        </span>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div id="calculate" class="calculate"> <!-- data-element-class="slbContentEl" -->
        <?php echo do_shortcode('[contact-form-7 id="1122"]') ?>

    </div>
</div>

<div style="display: none">
    <?php get_template_part('partials/quiz'); ?>
</div>

<?php wp_footer() ?>