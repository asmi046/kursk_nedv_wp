<?php 

/*
Template Name: Страница Квартиры в домах
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
                    
                    <?
                        if (empty($_COOKIE["login"])) 
                            get_template_part('template-parts/chess-login-form');
                        else {
                            get_template_part('template-parts/chess-control');
                            get_template_part('template-parts/chess-input');
						}
					?>
                
                <?php endwhile;?>
			<?php endif; ?>
			
        </div>
	</section>

	</main>

	<?php get_footer(); 
