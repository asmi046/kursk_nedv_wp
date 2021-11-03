<?php 

/*
Template Name: Страница Квартира
Template Post Type: page
*/

get_header(); ?>

<?php get_template_part('template-parts/header-section');?>

<main class="page page-recurring">

	<a href="#callback" class="callback-widget blink _popup-link"></a>
	<a href="tel:<? echo preg_replace('/[^0-9]/', '', $tel = carbon_get_theme_option("as_phone_1")); ?>" class="callback-widget callback-widget-mob blink"></a>

	<section id="apartment" class="apartment recurring">
		<div class="container">
			<?php
			if ( function_exists('yoast_breadcrumb') ) {
				yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );  
			}
			?> 

			<div class="apartment__gallery d-flex">
				<div class="apartment__slider"> 
					<div class="apartment__slider-img">
						<div class="apartment__slider-img-cover"></div>
						<img src="<?php echo get_template_directory_uri();?>/img/offers/01.jpg" alt="">
					</div>
					<div class="apartment__slider-img">
						<div class="apartment__slider-img-cover"></div>
						<img src="<?php echo get_template_directory_uri();?>/img/offers/02.jpg" alt="">
					</div> 
				</div>
				<div class="apartment__charact">
					<h3>Характеристики</h3>
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
					<h1><? the_title();?></h1>  
					<p class="apartment__subtitle">Южный мкр, ул. Депутатская, д. 80 к2 (1.6 км до центра)</p>
				</div>
				<div class="apartment__info-charact">
					<div class="apartment__info-price rub">5 050 000 </div>
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
