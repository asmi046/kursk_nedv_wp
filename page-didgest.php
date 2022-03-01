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

			<?
				global $wpdb;
				$allObj = $wpdb->get_results('SELECT * FROM `kn_objnedv`');
				$didgest = $wpdb->get_results('SELECT COUNT(*) as count, `type` FROM `kn_objnedv` GROUP BY `type`');

			?>
				<h3>Всего в базе: <span style = "color:green"><?echo count($allObj); ?></span> объектов</h3>

				<table>
					<thead>
						<tr>
							<th>Тип</th>
							<th>Колличество</th>
						</tr>
					</thead>

					<tbody>
						<?
							foreach ($didgest as $d) {
						?>
							<tr>
								<td><? echo $d->count ?></td>
								<td><? echo $d->type ?></td>
							</tr>
						<?
							}
						?>
					</tbody>
				</table>
			</div>
		</section>

	</main>

	<?php get_footer(); 
