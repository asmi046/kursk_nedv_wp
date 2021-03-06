
<?php

/*
Template Name: Обект недвижимости
Template Post Type: page
*/

get_header(); ?>

<?php get_template_part('template-parts/header-section');?>
<?
global $wpdb;
echo $obj_nedv_id = get_query_var("objnedv");

$object = $wpdb->get_results( "SELECT * FROM `kn_objnedv` WHERE `row_id` = '".$obj_nedv_id."'" );
$object = $object[0]; 



$images = $wpdb->get_results( "SELECT * FROM `kn_obj_img` WHERE `row_id` = '".$obj_nedv_id."'" );

$adres = $object->obl;
if (!empty($object->obl_raion)) $adres .= " ".$object->obl_raion;
if (!empty($object->np)) $adres .= " ".$object->np;
if (!empty($object->np_raion)) $adres .= " ".$object->np_raion;
if (!empty($object->street)) $adres .= " ".$object->street;
if (!empty($object->dom_number)) $adres .= " ".$object->dom_number;

$sitename = empty($object->site_name)?$object->type." ул. ".$object->street:$object->site_name;
?>
<main class="page page-recurring">

	<a href="#callback" class="callback-widget blink _popup-link"></a>
	<a href="tel:<? echo preg_replace('/[^0-9]/', '', $tel = carbon_get_theme_option("as_phone_1")); ?>" class="callback-widget callback-widget-mob blink"></a>

	<section id="apartment" class="apartment recurring">
		<div class="container">
			<p id="breadcrumbs">
				<a href = "<?bloginfo("url");?>">Главная</a> 
				<span class = "bkSep">/</span>
				
				<?
				$catUrl = get_permalink(51);
				$catAncor = "Вторичная";

				if (($object->type  == 'Новостройка')) {
					$catUrl = get_permalink(57);
					$catAncor = "Новостройки";
				}

				if (($object->type  == 'Земля (коммерческая)') || ($object->type  == 'Коммерческая') ) {
					$catUrl = get_permalink(61);
					$catAncor = "Коммерческая";
				}

				if (($object->type  == 'Земельный участок') || ($object->type  == 'Дом') || ($object->type  == 'Дача') || ($object->type  == 'Гараж')) {
					$catUrl = get_permalink(59);
					$catAncor = "Дома, участки, дачи";
				}
				?>

				<a href = "<? echo $catUrl; ?>"><? echo $catAncor; ?></a>

				<span class = "bkSep">/</span> 
				<span class = "bkFinal"><? echo $sitename;?></span>
			</p> 


			<?
				// echo "<pre>";
				// 	print_r($object);
				// echo "</pre>";
			?>

			<div class="apartment__gallery d-flex">
				<div class="apartment__slider">
					<? 

					$i = 0;
					foreach ($images as $img)  {?>
						<div class="apartment__slider-img">
							<div class="apartment__slider-img-cover" style="background-image: url(<?php echo $img->img_lnk;?>);"></div>
							<img src="<?php echo $img->img_lnk;?>" alt="<?echo $sitename;?> фото № <?echo $i?>">
						</div>
						<?
						$i++;
					}
					
					if (empty($images)) {
						?>
						<div class="apartment__slider-img">
							<div class="apartment__slider-img-cover" style="background-image: url(<?php echo $img->img_lnk;?>);"></div>
							<img src="<?php echo get_bloginfo("template_url")?>/img/no-photo.jpg" alt="<?echo $sitename;?>">
						</div>    
						<?
					}
					?>

				</div>
				

				<?php get_template_part('template-parts/obj', 'param', ["obj" => $object]);?>

				<div class="apartment__info-block d-flex">
					<div class="apartment__info-descp">
						<h1><? echo $sitename;?></h1>  
						<p class="apartment__subtitle"><?echo $adres;?></p>
					</div>
					<div class="apartment__info-charact">
						<div class="apartment__info-price rub price_formator"><?echo $object->price;?>  </div>
						<div class="apartment__info-price-square "> <span class = "price_formator"><? echo round($object->price / $object->area1); ?></span> <span class="rub "> </span>/м²</div>
						<!-- <div class="apartment__info-price-buyer">Стоимость услуг для покупателя <br> <span class="rub">79 500 </span></div> -->
					</div>
				</div>
				
			</div>

			<? 
			if (!empty($object->description) ) {
				?>
				<div class="apartment__descp">
					<h3>Описание</h3>
					<? echo  apply_filters( 'the_content', $object->description); ?>
				</div>
			<? } ?>

			<div class="apartment__map map" id="map"></div>
			<?php get_template_part('template-parts/map-script', 'one', ["mapPinOne" => $object->geocode, "name" => $sitename]);?> 

		</div>
	</section>

<!-- 		<section id="apartment-map" class="apartment-map">
			<div class="container">
				<div class="contacts__map map" id="map"></div>
				<?php get_template_part('template-parts/map-script');?> 
			</div>
		</section>
	-->
	<?php get_template_part('template-parts/consult-form-section');?> 

</main>

<?php get_footer(); 