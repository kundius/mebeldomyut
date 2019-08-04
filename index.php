<!DOCTYPE html>
<html>
    <head>
        <?php get_template_part('partials/head'); ?>
    </head>
    <body class="page">
        <div class="wrapper">
            <?php get_template_part('partials/header'); ?>

            <div class="container">
                <div class="breadcrumbs">
                    <?php bcn_display() ?>
                </div>
            </div>

            <div class="section-content">
                <div class="container container_small">
                    <div class="content">
                        <?php if (have_posts()) : while ( have_posts() ) : the_post(); ?>
                            <h1><?php the_title(); ?></h1>
                            <?php the_content(); ?>
                        <?php endwhile; else: ?>
                            <p>Извините, ничего не найдено.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <?php get_template_part('partials/footer'); ?>
        </div>
    </body>
</html>