<?php
/**
 * The header for Astra Theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Astra
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?><!DOCTYPE html>
<?php astra_html_before(); ?>
<html <?php language_attributes(); ?>>
<head>
<?php astra_head_top(); ?>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php
if ( apply_filters( 'astra_header_profile_gmpg_link', true ) ) {
	?>
	<link rel="profile" href="https://gmpg.org/xfn/11"> 
	<?php
}
?>
<?php wp_head(); ?>
<?php astra_head_bottom(); ?>
</head>

<body <?php astra_schema_body(); ?> <?php body_class(); ?>>
<?php astra_body_top(); ?>
<?php wp_body_open(); ?>

<a
	class="skip-link screen-reader-text"
	href="#content">
		<?php echo esc_html( astra_default_strings( 'string-header-skip-link', false ) ); ?>
</a>
<?php
$main_classes = 'pt-0';
$current_post = get_post_field('post_name', get_the_ID());
$main_id = 'page-'.$current_post;
?>
<div class="app <?= $main_id;?>" id="app">
	<?php
	astra_header_before();

	astra_header();

	astra_header_after();

	astra_content_before();

	?>
    <main class="<?= $main_classes;?>">
		<?php astra_content_top(); ?>
