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
        <?php echo do_shortcode('[contact-form-7 id="7"]') ?>
    </div>

    <div id="calculate" class="calculate"> <!-- data-element-class="slbContentEl" -->
        <?php echo do_shortcode('[contact-form-7 id="1122"]') ?>

    </div>
</div>

<div style="display: none">
    <?php get_template_part('partials/quiz'); ?>
</div>

<?php wp_footer() ?>
