<?php

/*
Template Name: Шаблон карточки товаров
WP Post Template: Шаблон карточки товаров
Template Post Type: post
*/ 

get_header(); ?>

<?php get_template_part('template-parts/header-section');?>

<main class="page">

	<a href="#callback" class="callback-widget blink _popup-link"></a>
	<a href="tel:<? echo preg_replace('/[^0-9]/', '', $tel = carbon_get_theme_option("as_phone_1")); ?>" class="callback-widget callback-widget-mob blink"></a>

</main>

<?php get_footer();