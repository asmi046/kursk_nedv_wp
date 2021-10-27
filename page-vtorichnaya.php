
<?php
/*
Template Name: Страница Вторичная
Template Post Type: page
*/

get_header(); ?>

<?php get_template_part('template-parts/header-section');?> 

<main class="page">

	<a href="#callback" class="callback-widget blink _popup-link"></a>
	<a href="tel:<? echo preg_replace('/[^0-9]/', '', $tel = carbon_get_theme_option("as_phone_1")); ?>" class="callback-widget callback-widget-mob blink"></a>
	
	<section class="info category-info category-info-object"> 
		<div class="nuar_blk"></div>
		<div class="container">
			<h1><? the_title();?></h1>
			<div class="info__block-tabs block__tabs tabs">
				<div class="block__items">
					<div class="block__item tab__item active">
						<?php get_template_part('template-parts/vtorichnaya-form-block');?> 
					</div>
				</div>
			</div>
		</div>
	</section>

	<? 
		$countInPage = 6;
		$curentPage = get_query_var("onpage");
		$curentPage = !empty($curentPage)?$curentPage:1;

		global $wpdb;
		$object = $wpdb->get_results( "SELECT * FROM `kn_objnedv` WHERE `type` = 'Комната' OR `type` = 'Комната' OR `type` = 'Квартира' LIMIT 6" );
		$objectUl = $wpdb->get_results( "SELECT * FROM `kn_objnedv` WHERE `type` = 'Комната' OR `type` = 'Комната' OR `type` = 'Квартира'" );
		

		$totalCount = count($objectUl);

		$pageCount = intdiv($totalCount, $countInPage);
		if ($totalCount % $countInPage > 0)
			$pageCount++;
	?>

	<section id="product-info" class="product-info recurring">
		<div class="container">

			<?php
			if ( function_exists('yoast_breadcrumb') ) {
				yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
			}

			?> 

			<h2><?php single_cat_title( '', true );?></h2> 

			<div class="product-info__row d-flex">

				<div class="product-info__column">

					<div class="product-info__wrap-card d-flex">
						
						<?
						

						$mapPin = array();

						foreach ($object as $elem) {
							get_template_part('template-parts/objec', 'elem', ["elem" => $elem]);

							if (!empty($elem->geocode))
								$mapPin[] = ["coord" => $elem->geocode, "name" => empty($elem->site_name)?$elem->type." ".$elem->street:$elem->site_name];
						}
						?>

					</div>

					<script>
						//let mapPin = <?echo json_encode($mapPin);?>;
						//console.log(mapPin)
					</script>
					
					<div class="pagging">
						<ul class="pagging-list">
							<?
								for ($i = 0; $i<6; $i++) {
							?>
								<li><a href="" class="pagging__link <? if ($i == $curentPage) echo "active" ?>"><? echo $i; ?></a></li>
							<?
								}
							?>
						</ul>
					</div>

				</div>

				<div class="product-info__column product-info__column-map">
					<div class="product-info__map map" id="map"></div>
					<?php get_template_part('template-parts/map-script');?> 
				</div>

			</div>

		</div>
	</section>
</main>

<?php get_footer(); ?>   