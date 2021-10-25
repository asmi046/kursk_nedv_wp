
<?php
/*
Template Name: Страница Коммерческая
Template Post Type: page
*/

get_header(); ?>

<?php get_template_part('template-parts/header-section');?> 

<main class="page">

	<a href="#callback" class="callback-widget blink _popup-link"></a>
	<a href="tel:<? echo preg_replace('/[^0-9]/', '', $tel = carbon_get_theme_option("as_phone_1")); ?>" class="callback-widget callback-widget-mob blink"></a>
	
	<section class="info category-info">
		<div class="nuar_blk"></div>
		<div class="container">
			<div class="info__block-tabs block__tabs tabs">
				<nav class="block__nav block__nav_title">
					<div class="block__navitem building-icon-04 tab__navitem active"><? the_title();?></div>
				</nav>
				<div class="block__items">
					<div class="block__item tab__item active">
						<?php get_template_part('template-parts/commercial-form-block');?> 
					</div>
				</div>
			</div>
		</div>
	</section>

	<section id="product-info" class="product-info recurring">
		<div class="container">

			<?php
			if ( function_exists('yoast_breadcrumb') ) {
				yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
			}
			?> 

			<h1><?php single_cat_title( '', true );?></h1> 

			<div class="product-info__row d-flex">

				<div class="product-info__column">

					<div class="product-info__wrap-card d-flex">
						
                        <?
                            global $wpdb;

                            $object = $wpdb->get_results( "SELECT * FROM `kn_objnedv` WHERE  `type` = 'Коммерческая' OR `type` = 'Земля (коммерческая)'" );

							$mapPin = array();

                            foreach ($object as $elem) {
                                get_template_part('template-parts/objec', 'elem', ["elem" => $elem]);
								
								if (!empty($elem->geocode))
								$mapPin[] = ["coord" => $elem->geocode, "name" => empty($elem->site_name)?$elem->type." ".$elem->street:$elem->site_name];
							}
                        ?>

					</div>

					<script>
						let mapPin = <?echo json_encode($mapPin);?>;
						console.log(mapPin)
					</script>
					
					<div class="pagging">
						<ul class="pagging-list">
							<li><a href="" class="pagging__link active">1</a></li>
							<li><a href="" class="pagging__link">2</a></li>
							<li><a href="" class="pagging__link">3</a></li>
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