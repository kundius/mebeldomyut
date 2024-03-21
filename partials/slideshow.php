<?php if ($slideshow = get_field('slideshow')): ?>
<div class="slideshow">
    <div class="slideshow-slides">
        <?php foreach ($slideshow as $key => $slide): ?>        
        <div class="slideshow-slide slideshow-slide_<?php echo $key ?>" style="clip-path: url(#slideshow-path-<?php echo $key ?>)">

            <img
                data-src="<?php echo $slide['image']['url'] ?>"
                <?php
                echo srcset($slide['image'], [
                    'sizes'=> ['medium', 'large'],
                    'toData' => true
                ])
                ?>
                alt=""
                class="slideshow-slide__image lazyload"
            >
            
            <svg height="0" width="0">
                <defs>
                    <clipPath id="slideshow-path-<?php echo $key ?>" clipPathUnits="objectBoundingBox">
                        <path d="M0 0 H 0 V 0 H 0 Z" />
                    </clipPath>
                </defs>
            </svg>

            <div class="slideshow-slide__title"><div><?php echo $slide['title'] ?></div></div>

            <?php if (!empty($slide['link'])): ?>
            <a href="/o-nas/akcii" class="slideshow-more circle-details">
                <span class="circle-details__inner">
                    <span>Акция</span>
                </span>
            </a>
            <!--<a href="<?php echo $slide['link'] ?>" class="slideshow-more circle-details">
                <span class="circle-details__inner">
                    <span>смотреть</span>
                    <span>все</span>
                    <span class="circle-details__arrow"></span>
                </span>
            </a>-->
            <?php endif; ?>

            <?php if (!empty($slide['desc'])): ?>
            <div class="slideshow-smalldesc">
                <span><?php echo str_replace("\n", "</span><span>", $slide['desc']) ?></span>
            </div>
            <?php endif; ?>
            
            <?php if (!empty($slide['label'])): ?>
            <div class="slide-overlay">
                <?php if (!empty($slide['label']['title'])): ?>
                <div class="slide-overlay__title">
                    <?php echo $slide['label']['title'] ?>
                </div>
                <?php endif; ?>
                <?php if (!empty($slide['label']['desc'])): ?>
                <div class="slide-overlay__desc">
                    <?php echo $slide['label']['desc'] ?>
                </div>
                <?php endif; ?>
                <div class="slide-overlay__pulsar pulsar<?php if ($key == 4): ?> pulsar_left<?php else: ?> pulsar_right<?php endif; ?>">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
            <?php endif; ?>
            
            <?php if (!empty($slide['price'])): ?>
            <div class="slideshow-cost">
                <div class="slideshow-cost__price"><?php echo $slide['price'] ?></div>
                <div class="slideshow-cost__line"></div>
            </div>
            <?php endif; ?>

        </div>
        <?php endforeach; ?>
    </div>

    <div class="slideshow-guarantee-and-delivery">
        <div class="slideshow-guarantee">Корпусная мебель на заказ от <span>6 дней</span>. Гарантия <span>5 лет</span></div>
        <div class="slideshow-delivery">Бесплатный замер и доставка по Москве и области</div>
    </div>

    <div class="slideshow-square-lt"></div>
    <div class="slideshow-square-rt"></div>
    <div class="slideshow-square-rb"></div>
    <div class="slideshow-square-lb"></div>

    <div class="slideshow-controls eraser">
        <div class="eraser__center"></div>
        <div class="eraser__left" data-slideshow-control="previous"></div>
        <div class="eraser__right" data-slideshow-control="next"></div>
        <a href="#projects" class="eraser__bottom js-scroll-to"></a>
    </div>

    <div class="slideshow-previous" data-slideshow-control="previous"></div>
    <div class="slideshow-next" data-slideshow-control="next"></div>

    <div class="slideshow-nav">
        <?php foreach ($slideshow as $key => $slide): ?>
        <button data-slideshow-control="<?php echo $key ?>"></button>
        <?php endforeach; ?>
    </div>
</div>
<?php endif; ?>
