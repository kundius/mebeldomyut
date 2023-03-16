<?php
define( 'DISALLOW_FILE_EDIT', true );

wp_enqueue_script('main', get_template_directory_uri() . '/dist/main.js', array(), false, true);

add_action('wp_enqueue_scripts', function() {
    wp_localize_script('main', 'myajax', array(
        'url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('myajax-nonce')
    ));  
}, 99);

add_theme_support( 'post-thumbnails', array( 'post', 'product', 'page' ) );
add_image_size('w800h800', 800, 800, true);

function srcset($image, $options) {
    $options = array_merge([
        'sizes' => ['thumbnail', 'medium', 'large'],
        'toData' => false
    ], $options);

    $prefix = $options['toData'] ? 'data-' : '';
    $srcset = [];
    foreach ($options['sizes'] as $size) {
        $srcset[] = $image['sizes'][$size] . ' ' . $image['sizes'][$size . '-width'] . 'w';
    }
    $srcset[] = $image['url'] . ' ' . $image['width'] . 'w';
    $sizes = [];
    foreach ($options['sizes'] as $size) {
        $sizes[] = '(max-width: ' . $image['sizes'][$size . '-width'] . 'px) ' . $image['sizes'][$size . '-width'] . 'px';
    }
    $sizes[] = $image['width'] . 'px';
    return $prefix . 'srcset="' . implode(', ', $srcset) . '" ' . $prefix . 'sizes="' . implode(', ', $sizes) . '"';
}

function icon($name, $scale = 1) {
    $width = $scale * 20;
    $height = $scale * 20;
    echo '<svg class="inline-svg-icon" width="' . $width . '" height="' . $height . '"><use xlink:href="' . get_bloginfo('template_url') . '/dist/img/sprite.svg#' . $name . '"></use></svg>';
}

function asset($file) {
    echo get_bloginfo("template_url") . "/assets/" . $file;
}

if( function_exists('acf_add_options_page') ) {
    acf_add_options_page(array(
        'page_title' => 'Параметры',
        'menu_title' => 'Параметры',
        'menu_slug' => 'acf-options',
        'capability' => 'edit_posts',
        'redirect' => false
    ));
}

function the_page_content($id) {
    $query = new WP_Query('page_id=' . $id);
    while ($query->have_posts()) {
        $query->the_post();
        the_content();
    }
    wp_reset_postdata();
}

add_action('init', 'action_register_taxonomy');
function action_register_taxonomy() {
    register_taxonomy('product_category', array('product'), array(
        'labels' => array(
            'name' => 'Категории',
            'singular_name' => 'Категория',
            'search_items' => 'Искать категорию',
            'all_items' => 'Все категории',
            'view_item' => 'Смотреть категорию',
            'parent_item' => 'Родительская категория',
            'parent_item_colon' => 'Родительская категория:',
            'edit_item' => 'Редактировать категорию',
            'update_item' => 'Изменить категорию',
            'add_new_item' => 'Добавить новую категорию',
            'new_item_name' => 'Новое имя категории',
            'menu_name' => 'Категории',
        )
    ));
}

add_action('init', 'action_register_post_type');
function action_register_post_type() {
    register_post_type('product', array(
        'labels' => array(
            'name' => 'Товары',
            'singular_name' => 'Товар',
            'add_new' => 'Добавить новый',
            'add_new_item' => 'Добавить новый товар',
            'edit_item' => 'Редактировать товар',
            'new_item' => 'Новый товар',
            'view_item' => 'Посмотреть товар',
            'search_items' => 'Найти товар',
            'not_found' => 'Товаров не найдено',
            'not_found_in_trash' => 'В корзине товаров не найдено',
            'parent_item_colon' => '',
            'menu_name' => 'Товары'
        ),
        'public' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'taxonomies' => array('product_category')
    ));
}

if (wp_doing_ajax()) {
    add_action('wp_ajax_product', 'ajax_product_callback');
    add_action('wp_ajax_nopriv_product', 'ajax_product_callback');
    function ajax_product_callback() {
        // check_ajax_referer( 'myajax-nonce', 'nonce_code' );

        global $post;
        $id = intval($_POST['id']);
        if ($post = get_post($id)) {
            setup_postdata($post);

            get_template_part('partials/productDetails');

            wp_reset_postdata();
        } else {
            echo 'Продукт не найден';
        }

        wp_die();
    }
}

function seo() {
	$title = '';
	$description = '';
	$keywords = '';
	
	if (is_archive()) {
		$term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));
		if ($term) {
			$title = get_field('title', $term->taxonomy . '_' . $term->term_id);
			if (empty($title)) {
				$title = $term->name;
			}
			$description = get_field('description', $term->taxonomy . '_' . $term->term_id);
			$keywords = get_field('keywords', $term->taxonomy . '_' . $term->term_id);
		} elseif (is_post_type_archive()) {
			$title = get_queried_object()->labels->name;
		} elseif (is_day()) {
			$title = sprintf(__('Daily Archives: %s', 'roots'), get_the_date());
		} elseif (is_month()) {
			$title = sprintf(__('Monthly Archives: %s', 'roots'), get_the_date('F Y'));
		} elseif (is_year()) {
			$title = sprintf(__('Yearly Archives: %s', 'roots'), get_the_date('Y'));
		} elseif (is_author()) {
			$author = get_queried_object();
			$title = sprintf(__('Author Archives: %s', 'roots'), $author->display_name);
		} else {
			$title = single_cat_title('', false);
		}
	} elseif (is_search()) {
		$title = sprintf(__('Search Results for %s', 'roots'), get_search_query());
	} elseif (is_404()) {
		$title = 'Not Found';
	} else {
		$title = get_field('title');
		if (empty($title)) {
			$title = get_the_title();
		}
		$description = get_field('description');
		$keywords = get_field('keywords');
	}
	
	echo '<title>' . $title . '</title>';
	if (!empty($description)) {
		echo '<meta name="keywords" content="' . $keywords . '">';
	}
	if (!empty($keywords)) {
		echo '<meta name="description" content="' . $description . '">';
	}
}

function is_new_year()
{
  if (date('m') === '12' && date('d') >= '20') {
    return true;
  }
  if (date('m') === '01' && date('d') <= '10') {
    return true;
  }
  return false;
}
