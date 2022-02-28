<?php 

/*
Template Name: Страница Дайджест
Template Post Type: page
*/

get_header(); ?>

<?php get_template_part('template-parts/header-section');?>

<main class="page page-recurring">

	<a href="#callback" class="callback-widget blink _popup-link"></a>
	<a href="tel:<? echo preg_replace('/[^0-9]/', '', $tel = carbon_get_theme_option("as_phone_1")); ?>" class="callback-widget callback-widget-mob blink"></a>
	
	<section id="contacts" class="contacts recurring">
		<div class="container">
			<?php
			if ( function_exists('yoast_breadcrumb') ) {
				yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );  
			}
			?> 

			<h1><? the_title();?></h1>  

			
			</div>
		</section>

	</main>

	<?php get_footer(); 
