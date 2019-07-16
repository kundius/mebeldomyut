<div class="contacts">
    <div class="contacts__left">
        <div class="contacts__title">Контакты:</div>
        <?php if ($socials = get_field('socials', 140)): ?>
        <div class="contacts__socials">
            <?php foreach ($socials as $item): ?>
            <a href="<?php echo $item['link'] ?>" target="_blank">
                <img src="<?php echo $item['icon']['url'] ?>" alt="" width="16" height="16">
            </a>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
    </div>
    <div class="contacts__right">
        <?php the_page_content(140) ?>
    </div>
</div>