<?php
/**
 * Astra Child Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Astra Child
 * @since 1.0.0
 */

/**
 * Define Constants
 */
define( 'CHILD_THEME_ASTRA_CHILD_VERSION', '1.0.'.time() );
define( 'ASSETS_URL', get_stylesheet_directory_uri() . '/images' );

/**
 * Enqueue styles
 */
function child_enqueue_styles() {

	wp_enqueue_style( 'astra-child-theme-css', get_stylesheet_directory_uri() . '/style.css', array('astra-theme-css'), CHILD_THEME_ASTRA_CHILD_VERSION, 'all' );
	wp_enqueue_style( 'bootstrap', get_stylesheet_directory_uri() . '/css/bootstrap.min.css', array('astra-theme-css'), CHILD_THEME_ASTRA_CHILD_VERSION, 'all' );
	wp_enqueue_style( 'swiper-css', get_stylesheet_directory_uri() . '/css/swiper-bundle.min.css', array('astra-theme-css'), CHILD_THEME_ASTRA_CHILD_VERSION, 'all' );
	wp_enqueue_style( 'custom', get_stylesheet_directory_uri() . '/css/custom.css', array('astra-theme-css'), CHILD_THEME_ASTRA_CHILD_VERSION, 'all' );
	wp_enqueue_style( 'media-query', get_stylesheet_directory_uri() . '/css/media.css', array('astra-theme-css'), CHILD_THEME_ASTRA_CHILD_VERSION, 'all' );
	if( !is_admin() ) {
        wp_deregister_script('jquery');
        wp_dequeue_script('jquery');
		wp_enqueue_script( 'jquery', get_stylesheet_directory_uri() . '/js/jquery-3.7.1.min.js', array(), '3.7.1', true );
	}
	wp_enqueue_script( 'bootstrap', get_stylesheet_directory_uri() . '/js/bootstrap.min.js', array('jquery'), CHILD_THEME_ASTRA_CHILD_VERSION, true );
	wp_enqueue_script( 'swiper-js', get_stylesheet_directory_uri() . '/js/swiper-bundle.min.js', array('jquery'), CHILD_THEME_ASTRA_CHILD_VERSION, true );
	wp_enqueue_script( 'scripts', get_stylesheet_directory_uri() . '/js/scripts.js', array('jquery'), CHILD_THEME_ASTRA_CHILD_VERSION, true );
	if( is_front_page() ) {
		wp_enqueue_script( 'scripts-home', get_stylesheet_directory_uri() . '/js/scripts-home.js', array('jquery'), CHILD_THEME_ASTRA_CHILD_VERSION, true );
		$games = get_field('games', 'option');
		$file = $games['game_json'];
    	$game_providers = [];
		if ($file) {

			// If return format = ID
			if (is_numeric($file)) {
				$file_path = get_attached_file($file);

			// If return format = Array
			} elseif (is_array($file) && !empty($file['ID'])) {
				$file_path = get_attached_file($file['ID']);

			// If return format = URL
			} elseif (is_string($file)) {
				$file_path = wp_parse_url($file, PHP_URL_PATH);
				$file_path = ABSPATH . ltrim($file_path, '/');
			}

			if (!empty($file_path) && file_exists($file_path)) {
				$json = file_get_contents($file_path);
				$game_providers = json_decode($json, true);
			}
		}
		wp_localize_script( 'scripts-home', 'gameProviders', $game_providers );
	}
}
add_action( 'wp_enqueue_scripts', 'child_enqueue_styles', 15 );

function get_site_language() {
	static $language = null;

	if( $language === null ) {
        $settings = get_field('basic_settings', 'option');
		$language = (!empty($settings['language'])) ? $settings['language'] : 'english';
	}

	return $language;
}

function get_site_currency() {
    static $currency = null;

    if ($currency === null) {
        $settings = get_field('basic_settings', 'option');
        $currency = (!empty($settings['currency'])) ? $settings['currency']['value'] : '';
    }

    return $currency;
}

function randomUniqueID($length = 8) {
    return substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyz'), 0, $length);
}

function allow_custom_mime_types( $mimes ) {
    $mimes['svg']  = 'image/svg+xml';
    $mimes['json'] = 'application/json';
    $mimes['webp'] = 'image/webp';
    return $mimes;
}
add_filter( 'upload_mimes', 'allow_custom_mime_types' );

add_action('wp', function() {
	global $elementor_mode;
	$elementor = \Elementor\Plugin::$instance;

	if ( $elementor->editor->is_edit_mode() || $elementor->preview->is_preview_mode() ) {
		$elementor_mode = 'editor-preview';
	}
	else {
		$elementor_mode = 'front-end';
	}
});

class Icon_Menu_Walker extends Walker_Nav_Menu {
    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        $icon = get_field('menu_icon', $item->ID);
		$icon_html = '';

        if (!empty($icon)) {
			if ( 'dashicons' === $icon['type'] ) {
				$icon_html = '<div class="dashicons icon '. esc_attr( $icon['value'] ) .'>';
			}

			if ( 'media_library' === $icon['type'] ) {
				$attachment_url = $icon['value']['url'];
				$icon_html = '<img class="menu-icon icon" src="'.$attachment_url.'"/>';
			}

			if ( 'url' === $icon['type'] ) {
				$url = $icon['value'];
				$icon_html = '<img class="menu-icon icon" src="'.esc_url( $url ).'">';
			}
        }
        $output .= '<li class="menu-item nav-item menu-item-'.$item->ID.'">';

        $output .= '<a class="nav-link" href="' . esc_url($item->url) . '">';
        $output .= $icon_html;
        $output .= esc_html($item->title);
        $output .= '</a>';
    }
}

function shortcode_main_header($atts) {

	ob_start();
	$home_url		= home_url();
	$site_title     = get_bloginfo( 'name' );
	$custom_logo_id = get_theme_mod( 'custom_logo' );
	$logo_url       = wp_get_attachment_image_url( $custom_logo_id, 'full' );
	$logo_alt       = get_post_meta( $custom_logo_id, '_wp_attachment_image_alt', true );
	?>
	<nav class="navbar rounded px-4 py-2">
		<div class="navbar-row">
			<button type="button" class="navbar-toggler filter-black-to-white" data-bs-toggle="collapse" data-bs-target="#main-navigation" aria-controls="main-navigation" aria-expanded="true" aria-label="Toggle navigation">
				<span class="d-none">Open Mobile Menu</span>
				<img src="https://u31th.asia/assets/images/icon-menu.png">
			</button>
			<a href="<?= $home_url;?>" class="navbar-brand p-0">
				<span class="d-none">Home</span>
				<picture>
					<source srcset="<?= $logo_url;?>" type="image/webp">
					<source srcset="https://u31th.asia/assets/images/logo/u31th_logo.png" type="image/png">
					<img src="<?= $logo_url;?>" alt="<?= $site_title;?> Logo" class="img-fit">
				</picture>
			</a>
			<div></div>
			<div class="navbar-collapse justify-content-xl-end collapse" id="main-navigation">
				<div class="navbar-collapse-inner">
					<h4 class="d-block text-center p-4 py-2 title-logo mb-0"><a href="<?= $home_url;?>" class="d-block"><img src="<?= $logo_url;?>" alt="<?= $site_title;?> Logo" class="img-fit mx-auto"></a></h4>
					<button type="button" class="navbar-close" aria-label="Close menu">
						<span class="d-none">Close Mobile Menu</span>
					</button>
					<div class="menu-wrapper d-flex flex-column justify-content-between">
						<?php
						wp_nav_menu(array(
							'theme_location' => 'primary',
							'menu_class' => 'navbar-nav nav w-100 w-xl-auto p-4 px-0 p-xl-0',
							'menu_id' => 'primary-menu',
							'walker' => new Icon_Menu_Walker(),
						));
						?>
						<?php
						wp_nav_menu(array(
							'theme_location' => 'secondary_menu',
							'menu_class' => 'navbar-nav nav w-100 w-xl-auto p-4 px-0 p-xl-0',
							'menu_id' => 'disclaimer-menu',
							'walker' => new Icon_Menu_Walker(),
						));
						?>
					</div>
				</div>
			</div>
		</div>
	</nav>
	<?php
	return ob_get_clean();
}
add_shortcode('shortcode_main_header', 'shortcode_main_header');


function shortcode_main_footer($atts) {
	ob_start();
	wp_nav_menu(array(
		'theme_location' => 'footer_menu',
		'container_class' => 'footer w-100 fixed-bottom',
		'container_id' => 'mastfoot',
		'menu_class' => 'navbar-nav nav px-3 px-md-4 py-2 m-auto w-100 d-flex flex-row',
    	'walker' => new Icon_Menu_Walker(),
	));
	return ob_get_clean();
}
add_shortcode('shortcode_main_footer', 'shortcode_main_footer');