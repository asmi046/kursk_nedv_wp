
<?php
/*
Template Name: Страница Новостройки
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
						<?php get_template_part('template-parts/novostroyki-form-block');?> 
					</div>
				</div>
			</div>
		</div>
	</section>

	<?
		$countInPage = 6;
		$curentPage = get_query_var("onpage");
		$curentPage = !empty($curentPage)?$curentPage:1;
		
		$ofset = ($curentPage - 1) * $countInPage;
		
		global $wpdb;
		
		$raion = empty($_REQUEST["raion"])?"%":$_REQUEST["raion"];
		$rooms = empty($_REQUEST["rooms"])?"%":$_REQUEST["rooms"];
		
		$areaot = empty($_REQUEST["areaot"])?PHP_INT_MIN:$_REQUEST["areaot"];
		$areado = empty($_REQUEST["areado"])?PHP_INT_MAX:$_REQUEST["areado"];
		
		$priceot = empty($_REQUEST["priceot"])?PHP_INT_MIN:$_REQUEST["priceot"];
		$pricedo = empty($_REQUEST["pricedo"])?PHP_INT_MAX:$_REQUEST["pricedo"];
		
		$etazgey = empty($_REQUEST["etazgei"])?"%":$_REQUEST["etazgei"];
		
		$etazgey = empty($_REQUEST["etazgei"])?"%":$_REQUEST["etazgei"];

		$searcstr = empty($_REQUEST["searcstr"])?"%":"%".$_REQUEST["searcstr"]."%";

		
		$sparam = "AND (`description` LIKE '".$searcstr."') AND (`np_raion` LIKE '".$raion."') AND (`rooms` LIKE '".$rooms."') AND (`floors` LIKE '".$etazgey."') AND (`area1` > ".$areaot.")  AND (`area1` < ".$areado.") AND (`price` > ".$priceot.")  AND (`price` < ".$pricedo.")";
		
	
		$object = $wpdb->get_results( "SELECT * FROM `kn_objnedv` WHERE (`type` = 'Новостройка') ".$sparam." LIMIT ".$ofset.", ".$countInPage );
		$objectUl = $wpdb->get_results( "SELECT * FROM `kn_objnedv` WHERE (`type` = 'Новостройка') ".$sparam.";" );
		
	
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
								$mapPin[] = [
									"coord" => $elem->geocode, 
									"name" => empty($elem->site_name)?$elem->type." ".$elem->street:$elem->site_name,
									"area" => $elem->area1,
									"img" => $elem->photo,
									"lnk" => get_bloginfo("url")."/obekt/".$elem->row_id,
								];
						}
						?>

					</div>

					<script>
						let mapPin = <?echo json_encode($mapPin);?>;
						console.log(mapPin)
					</script>
					
					<?php 
					$param = array("curentpage" => $curentPage, 'pagecount' => $pageCount, "prefix" => "novostrojki");
					get_template_part('template-parts/pagination','all', $param);?>

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