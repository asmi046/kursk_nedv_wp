<?php 

/*
Template Name: Страница Команда
Template Post Type: page
*/

get_header(); ?>

<?php get_template_part('template-parts/header-section');?> 

<main class="page page-recurring">

	<section id="team" class="team recurring">
		<div class="container">

			<?php
			if ( function_exists('yoast_breadcrumb') ) {
				yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
			}
			?> 

			<h1><?php the_title();?></h1>

			<?php get_template_part('template-parts/team-block');?> 

			<button class="team__btn btn">Все сотрудники</button>

		</div>
	</section>

	<?php get_template_part('template-parts/consult-form-section');?> 

</main>

<?php get_footer(); 
