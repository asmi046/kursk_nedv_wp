
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

    $sitename = empty($object->site_name)?$object->type." ".$object->street:$object->site_name;
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

			<div class="apartment__gallery d-flex">
				<div class="apartment__slider">
					<? 
                     
                    $i = 0;
                    foreach ($images as $img)  {?>
                        <div class="apartment__slider-img">
                            <img src="<?php echo $img->img_lnk;?>" alt="<?echo $sitename;?> фото № <?echo $i?>">
                        </div>
                    <?
                        $i++;
                     }
                     
                     if (empty($images)) {
                    ?>
                        <div class="apartment__slider-img">
                            <img src="<?php echo get_bloginfo("template_url")?>/img/no-photo.jpg" alt="<?echo $sitename;?>">
                        </div>    
                    <?
                     }
                    ?>

				</div>
				<div class="apartment__charact">
					<h3>Характеристики <?echo $obj_nedv_id?></h3>
					<div class="info__charact">
						<div class="info__charact-row d-flex">
							<div class="info__charact-name">Код объекта</div>
							<div class="info__charact-line"></div>
							<div class="info__charact-desc">5949905</div>
						</div>
						<div class="info__charact-row d-flex">
							<div class="info__charact-name">Общая площадь</div>
							<div class="info__charact-line"></div>
							<div class="info__charact-desc">57.8 м²</div>
						</div>
						<div class="info__charact-row d-flex">
							<div class="info__charact-name">Ремонт</div>
							<div class="info__charact-line"></div>
							<div class="info__charact-desc">Современный ремонт</div>
						</div>
						<div class="info__charact-row d-flex">
							<div class="info__charact-name">Год постройки</div>
							<div class="info__charact-line"></div>
							<div class="info__charact-desc">2007</div>
						</div>
						<div class="info__charact-row d-flex">
							<div class="info__charact-name">Этаж/Этажность</div>
							<div class="info__charact-line"></div>
							<div class="info__charact-desc">7 из 11</div>
						</div>
						<div class="info__charact-row d-flex">
							<div class="info__charact-name">Стены</div>
							<div class="info__charact-line"></div>
							<div class="info__charact-desc">Кирпичные</div>
						</div>
						<div class="info__charact-row d-flex">
							<div class="info__charact-name">Площадь кухни</div>
							<div class="info__charact-line"></div>
							<div class="info__charact-desc">19.9 м²</div>
						</div>
						<div class="info__charact-row d-flex">
							<div class="info__charact-name">Комнатность</div>
							<div class="info__charact-line"></div>
							<div class="info__charact-desc">1</div>
						</div>
						<div class="info__charact-row d-flex">
							<div class="info__charact-name">Высота потолков</div>
							<div class="info__charact-line"></div>
							<div class="info__charact-desc">2.71 м</div>
						</div>
						<div class="info__charact-row d-flex">
							<div class="info__charact-name">Кухня-гостиная</div>
							<div class="info__charact-line"></div>
							<div class="info__charact-desc">Да</div>
						</div>
						<div class="info__charact-row d-flex">
							<div class="info__charact-name">Санузел</div>
							<div class="info__charact-line"></div>
							<div class="info__charact-desc">Совмещенный</div>
						</div>
						<div class="info__charact-row d-flex">
							<div class="info__charact-name">Балкон</div>
							<div class="info__charact-line"></div>
							<div class="info__charact-desc">Лоджия</div>
						</div>
					</div>
				</div>
			</div>

			<div class="apartment__info-block d-flex">
				<div class="apartment__info-descp">
					<h1><? echo $sitename;?></h1>  
					<p class="apartment__subtitle"><?echo $adres;?></p>
				</div>
				<div class="apartment__info-charact">
					<div class="apartment__info-price rub price_formator"><?echo $object->price;?>  </div>
					<div class="apartment__info-price-square"> <span class="rub">87 370 </span> /м²</div>
					<div class="apartment__info-price-buyer">Стоимость услуг для покупателя <br> <span class="rub">79 500 </span></div>
				</div>
			</div>

			<div class="apartment__descp">
				<h3>Описание</h3>
				<p>
					Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quos delectus error minima numquam, dolorum ratione porro exercitationem, consequuntur incidunt accusamus quidem sed placeat, fugit nulla corporis laboriosam modi aperiam animi.
					Eos cumque beatae quae unde neque dignissimos officia quibusdam aut non ab inventore, sunt accusamus illum laudantium quo exercitationem at, itaque, perferendis et sed nobis hic molestias nihil obcaecati! Voluptates.
				</p>
				<p>
					Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quos delectus error minima numquam, dolorum ratione porro exercitationem, consequuntur incidunt accusamus quidem sed placeat, fugit nulla corporis laboriosam modi aperiam animi.
					Eos cumque beatae quae unde neque dignissimos officia quibusdam aut non ab inventore, sunt accusamus illum laudantium quo exercitationem at, itaque, perferendis et sed nobis hic molestias nihil obcaecati! Voluptates.
				</p>
				<p>
					Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quos delectus error minima numquam, dolorum ratione porro exercitationem, consequuntur incidunt accusamus quidem sed placeat, fugit nulla corporis laboriosam modi aperiam animi.
					Eos cumque beatae quae unde neque dignissimos officia quibusdam aut non ab inventore, sunt accusamus illum laudantium quo exercitationem at, itaque, perferendis et sed nobis hic molestias nihil obcaecati! Voluptates.
				</p>
			</div>

			<div class="apartment__map map" id="map"></div>
			<?php get_template_part('template-parts/map-script');?> 

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