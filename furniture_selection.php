<?php
/*
Template Name: Подбор мебели
*/
?>
<!DOCTYPE html>
<html>
	<head>
		<?php get_template_part('partials/head'); ?>
	</head>
	<body class="page page_light">
		<div class="wrapper">
			<?php get_template_part('partials/header'); ?>

			<div class="container">
				<div class="breadcrumbs">
					<?php bcn_display() ?>
				</div>

				<?php if (have_posts()) : while ( have_posts() ) : the_post(); ?>
				<div class="furniture-selection">
					<div class="grid">
						<div class="furniture-selection__left">
							<h1 class="furniture-selection__title">
								Подбор мебели
							</h1>
							<div class="furniture-selection__text">
								Подберите себе мебель и узнайте её стоимость, ответив на 5 простых вопросов
							</div>
							<div class="furniture-selection__more">
								<button class="circle-details circle-details_small js-open-modal" data-target="#quiz">
									<span class="circle-details__inner">
										<span>Подобрать</span>
										<span>мебель</span>
										<span class="circle-details__arrow"></span>
									</span>
								</button>
							</div>
						</div>
						<div class="furniture-selection__right">
							<?php if ($gallery = get_field('gallery')) : ?>
							<div class="lory-slideshow js-lory-slideshow">
								<div class="lory-slideshow-frame js_frame">
									<ul class="lory-slideshow-slides js_slides">
										<?php foreach($gallery as $item) : ?>
										<li class="lory-slideshow-slide js_slide">

											<img src="<?php echo $item['sizes']['large'] ?>" ?>
										</li>
										<?php endforeach; ?>
									</ul>
								</div>
								<div class="lory-slideshow__nav">
									<div class="eraser eraser_dark">
										<div class="eraser__center"></div>
										<div class="eraser__left js_prev"></div>
										<div class="eraser__right js_next"></div>
									</div>
								</div>
							</div>
							<?php endif; ?>
						</div>
					</div>
				</div>
				<div class="furniture-end">
					<div class="grid">
						<div class="furniture-end__left">
							<div class="furniture-end__text">
								По завершению вы получите:
								<ul>
									<li>Расчёт стоимости проекта по вашим параметрам</li>
									<li>Каталог 2018 и 2019 годов</li>
									<li>10% скидку до конца месяца</li>
								</ul>
							</div>
						</div>
						<div class="furniture-end__right">
							<div class="furniture-benefits">
								<div class="furniture-benefit">
									Корпусная мебель<br>
									на заказ от <span>6 дней</span>
								</div>
								<div class="furniture-benefit">
									Гарантия<br>
									<span>5 лет</span>
								</div>
								<div class="furniture-benefit">
									Бесплатный замер и доставка по Москве и области
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php endwhile; else: ?>
				<p>Извините, ничего не найдено.</p>
				<?php endif; ?>
			</div>

			<div style="display: none">
				<?php get_template_part('partials/quiz'); ?>
			</div>
			
			<?php get_template_part('partials/footer'); ?>
		</div>
	</body>
</html>
