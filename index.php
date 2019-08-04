<!DOCTYPE html>
<html>
    <head>
        <?php get_template_part('partials/head'); ?>
    </head>
    <body class="page">
        <div class="wrapper">
            <?php get_template_part('partials/header'); ?>

            <?php if (have_posts()) : while ( have_posts() ) : the_post(); ?>
            <div class="container">
                <div class="breadcrumbs">
                    <?php bcn_display() ?>
                </div>
                <h1><?php the_title(); ?></h1>
            </div>

            <div class="section-content">
                <div class="container container_small">
                    <div class="content">
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>
            <?php endwhile; endif; ?>

            <?php get_template_part('partials/footer'); ?>
        </div>
    </body>
</html>