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
                    <li><a href="<?php the_permalink(9) ?>">Карта сайта</a></li>
                    <li><a href="<?php the_permalink(3) ?>">Пользовательское соглашение</a></li>
                    <li><a href="<?php the_permalink(14) ?>">Политика конфиденциальности и обработки персональных даных</a></li>
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
        <form action="/wp-json/contact-form-7/v1/contact-forms/7/feedback" class="callback__form js-form">
            <div class="callback__title">
                Заказать звонок
            </div>
            <div class="callback__grid">
                <div class="callback__cell">
                    <label class="form-input form-input_small">
                        <span class="form-input__label">Ваше имя</span>
                        <span class="form-input__placeholder">Как вы хотите, чтоб к вам обращались</span>
                        <input type="text" class="form-input__value" name="your-name">
                    </label>
                </div>
                <div class="callback__cell">
                    <label class="form-input form-input_small">
                        <span class="form-input__label">Ваш телефон</span>
                        <span class="form-input__mask">+ 7 (___) ___-__-__</span>
                        <input type="text" class="form-input__value" data-imask="+{7} (000) 000-00-00" name="your-phone">
                    </label>
                </div>
                <div class="callback__cell">
                    <button class="form-submit form-submit_small">
                        <span class="form-submit__inner">
                            <span>Заказать<br>звонок</span>
                            <span class="form-submit__arrow"></span>
                        </span>
                    </button>
                </div>
            </div>
            <label class="callback__rights">
                <input type="checkbox" class="form-checkbox form-checkbox_light" name="rules" value="1"> Прочитал(-а) <a href="<?php the_permalink(3) ?>" target="_blank">Пользовательское соглашение</a> и соглашаюсь с <a href="<?php the_permalink(14) ?>" target="_blank">Политикой обработки персональных данных</a>
            </label>
        </form>
    </div>

    <div id="calculate" class="calculate"> <!-- data-element-class="slbContentEl" -->
        <form action="/wp-json/contact-form-7/v1/contact-forms/7/feedback" class="callback__form js-form">
            <div class="callback__title">
                Рассчитать стоимость
            </div>
            <div class="callback__grid">
                <div class="callback__cell">
                    <label class="form-input form-input_small">
                        <span class="form-input__label">Ваше имя</span>
                        <span class="form-input__placeholder">Как вы хотите, чтоб к вам обращались</span>
                        <input type="text" class="form-input__value" name="your-name">
                    </label>
                </div>
                <div class="callback__cell">
                    <label class="form-input form-input_small">
                        <span class="form-input__label">Ваш телефон</span>
                        <span class="form-input__mask">+ 7 (___) ___-__-__</span>
                        <input type="text" class="form-input__value" data-imask="+{7} (000) 000-00-00" name="your-phone">
                    </label>
                </div>
                <div class="callback__cell">
                    <button class="form-submit form-submit_small">
                        <span class="form-submit__inner">
                            <span>Заказать<br>звонок</span>
                            <span class="form-submit__arrow"></span>
                        </span>
                    </button>
                </div>
            </div>
            <label class="callback__rights">
                <input type="checkbox" class="form-checkbox form-checkbox_light" name="rules" value="1"> Прочитал(-а) <a href="<?php the_permalink(3) ?>" target="_blank">Пользовательское соглашение</a> и соглашаюсь с <a href="<?php the_permalink(14) ?>" target="_blank">Политикой обработки персональных данных</a>
            </label>
        </form>
    </div>
</div>

<?php wp_footer() ?>