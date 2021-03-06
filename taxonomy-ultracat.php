<?php get_header(); ?>

<?php get_template_part('template-parts/header-section');?>

<main class="page">

	<a href="#callback" class="callback-widget blink _popup-link"></a>
	<a href="tel:<? echo preg_replace('/[^0-9]/', '', $tel = carbon_get_theme_option("as_phone_1")); ?>" class="callback-widget callback-widget-mob blink"></a>

	<section class="category">  
		<div class="container">

			<!-- Хлебные крошки -->
			<?php
			if ( function_exists('yoast_breadcrumb') ) {
				yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
			}
			?> 

			<!-- Вывод заголовка -->
			<h1><?php single_cat_title( '', true );?></h1>

			<div class="prod-card d-flex">

				<!-- Вывод записей таксономии -->
				<?php
				while(have_posts()):
					the_post();
					get_template_part('template-parts/product-elem');  
				endwhile;
				?>

			</div>

			<!-- Пагинация -->
			<?php if ( function_exists( 'wp_corenavi' ) ) wp_corenavi(); ?>

		</div>
	</section>
</main>

<?php get_footer(); ?>  