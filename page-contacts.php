<?php 

/*
Template Name: Страница Контакты
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

			<ul class="contacts__address">
				<li><strong><?php echo carbon_get_theme_option('as_company'); ?></strong></li>
				<li><strong>Адрес: </strong> <?php echo carbon_get_theme_option('as_address'); ?></li>
				<li><strong>Режим работы: </strong> <?php echo carbon_get_theme_option('as_schedule'); ?></li>
				<li><strong>e-mail: </strong> <a href = "mailto:<?php echo carbon_get_theme_option('as_email'); ?>"><?php echo carbon_get_theme_option('as_email'); ?></a></li>
			</ul>

			<ul class="contacts__contacts-block">
				<? $tel = carbon_get_theme_option("as_phone_1"); if (!empty($tel)){?><li><a href="tel:<? echo preg_replace('/[^0-9]/', '', $tel); ?>" class="contacts__contacts-item-phone"><? echo $tel; ?></a></li><?}?> 
				<? $tel = carbon_get_theme_option("as_phone_2"); if (!empty($tel)){?><li><a href="tel:<? echo preg_replace('/[^0-9]/', '', $tel); ?>" class="contacts__contacts-item-phone"><? echo $tel; ?></a></li><?}?> 
				
				</ul>

				<div class="contacts__soc-block soc-block-icon">
					<a href="<?php echo carbon_get_theme_option('as_insta'); ?>" class="soc-block-icon-link soc-icon-1"></a>
					<a href="<?php echo carbon_get_theme_option('as_vk'); ?>" class="soc-block-icon-link soc-icon-2"></a>
					<a href="<?php echo carbon_get_theme_option('as_telegr'); ?>" class="soc-block-icon-link soc-icon-3"></a>
					<a href="<?php echo carbon_get_theme_option('as_whatsapp'); ?>" class="soc-block-icon-link soc-icon-4"></a>
				</div>

				<div class="contacts__map map" id="map"></div>
				<?php get_template_part('template-parts/map-script', "contact", ["mapPinOne" => carbon_get_theme_option('map_point'), "name" => carbon_get_theme_option('as_company')]);?> 

			</div>
		</section>

		<section id="team" class="team">
			<div class="container">
				<h2>Наша команда</h2>
				<?php get_template_part('template-parts/team-block');?> 
			</div>
		</section>

		<?php get_template_part('template-parts/consult-form-section');?> 

	</main>

	<?php get_footer(); 
