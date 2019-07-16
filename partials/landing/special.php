<?php if ($special_offers = get_field('special_offers', 2)): ?>
<div class="container container_wide">
    <div class="special js-special">
        <div class="special__title">скидки <span>спецпредложения</span></div>
        <div class="special__list">
            <?php foreach ($special_offers as $item): ?>
            <div class="special-item">
                <div class="special-item__discount">
                    <span><?php echo $item['discount'] ?></span>
                </div>
                <div class="special-item__title"><?php echo $item['name'] ?></div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php if ($special_offer = get_field('special_offer', 2)): ?>
        <div class="special__price">
            <span><?php echo $special_offer['discount'] ?></span>
        </div>
        <div class="special__info">
            <?php echo $special_offer['name'] ?>
        </div>
        <?php endif; ?>
    </div>
</div>
<?php endif; ?>