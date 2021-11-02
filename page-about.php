<?php 

/*
Template Name: Страница О компании
Template Post Type: page
*/

get_header(); ?>

<?php get_template_part('template-parts/header-section');?>

<main class="page page-recurring">

	<a href="#callback" class="callback-widget blink _popup-link"></a>
	<a href="tel:<? echo preg_replace('/[^0-9]/', '', $tel = carbon_get_theme_option("as_phone_1")); ?>" class="callback-widget callback-widget-mob blink"></a>
	
	<section id="about" class="recurring text_section">
		<div class="container">
			<?php
			if ( function_exists('yoast_breadcrumb') ) {
				yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );  
			}
			?> 

            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			    <h1><? the_title();?></h1>  
				<?php the_content();?>
				<?php endwhile;?>
			<?php endif; ?>
			
        </div>
		</section>

        <?php get_template_part('template-parts/advantages');?> 

		<section id="team" class="team">
			<div class="container">
				<h2>Наша команда</h2>
				<?php get_template_part('template-parts/team-block');?> 
			</div>
		</section>

		<?php get_template_part('template-parts/consult-form-section');?> 

	</main>

	<?php get_footer(); 
