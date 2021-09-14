<?php 

/*
Template Name: Страница Жилой комплекс
Template Post Type: page
*/

get_header(); ?>

<?php get_template_part('template-parts/header-section');?> 

<main class="page page-recurring">

	<section id="sell-pass-info" class="sell-pass-info pyatnitsky-info">
		<div class="nuar_blk"></div>
		<div class="container">

			<div class="sell-pass-info__row d-flex">
				<div class="sell-pass-info__text">
					<h1><?php the_title();?></h1>
					<p>
						Развитая инфраструктура <br>
						2.5 километров от Курска <br>
						Уникальные архитектурные решения
					</p>
				</div>
				<div class="sell-pass-info__form-block">
					<p>Тип недвижимости</p>
					<form action="#" class="sell-pass-info__form">
						<select class="sell-pass-info__form-select">
							<option value="1" selected="selected">Квартира</option>
							<option value="2">Дом</option>
							<option value="3">Участок</option>
							<option value="4">Дача</option>
						</select>
						<input type="tel" placeholder="Телефон" class="sell-pass-info__form-input input">
						<button class="sell-pass-info__form-btn btn">Получить бесплатную консультацию</button>
					</form>
					<p>* Отправляя заявку, вы соглашаетесь на обработку персональных данных</p>
				</div>
			</div>

		</div>
	</section>

	<a href="#" class="callback-widget"></a>

	<section id="overview" class="overview recurring">
		<div class="container">

			<?php
			if ( function_exists('yoast_breadcrumb') ) {
				yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
			}
			?> 

			<h2>ЖК «Пятницкий лес»</h2>

			<p>
				Предлагаем Вашему вниманию великолепный поселок с развитой инфраструктурой всего в 2х километрах от города.
				Поселок находится на закрытой охраняемой территории в живописном и экологически чистом районе недалеко от
				города.
			</p>
			<p>
				На территории жилого комплекса располагается 50 коттеджей и 10 таунхаусов спроектированных и построенных
				одной из лучших дизайн студий города. Не сомневайтесь, ваш дом в ЖК "Пятницкий лес" это не просто коттедж
				построенный по типовому проекту а удобное жилище которое сочетает в себе эксклюзивное архитектурное решение,
				удобную планировку и экологически чистые материалы.
			</p>

			<div class="overview__mosaic mosaic d-flex">

				<div class="mosaic__one d-flex">
					<div class="mosaic__img">
						<img src="<?php echo get_template_directory_uri();?>/img/overview/01.jpg" alt="">
					</div>

					<div class="mosaic__img">
						<img src="<?php echo get_template_directory_uri();?>/img/overview/02.jpg" alt="">
					</div>

					<div class="mosaic__img">
						<img src="<?php echo get_template_directory_uri();?>/img/overview/03.jpg" alt="">
					</div>
				</div>

				<div class="mosaic__two d-flex">
					<div class="mosaic__two-left">
						<div class="mosaic__img">
							<img src="<?php echo get_template_directory_uri();?>/img/overview/04.jpg" alt="">
						</div>
					</div>

					<div class="mosaic__two-right d-flex">
						<div class="mosaic__img">
							<img src="<?php echo get_template_directory_uri();?>/img/overview/05.jpg" alt="">
						</div>

						<div class="mosaic__img">
							<img src="<?php echo get_template_directory_uri();?>/img/overview/06.jpg" alt="">
						</div>

						<div class="mosaic__img">
							<img src="<?php echo get_template_directory_uri();?>/img/overview/07.jpg" alt="">
						</div>

						<div class="mosaic__img">
							<img src="<?php echo get_template_directory_uri();?>/img/overview/08.jpg" alt="">
						</div>
					</div>

				</div>

			</div>

		</div>
	</section>

	<section id="location" class="location">
		<div class="container">
			<h2>Расположение поселка</h2>

			<div class="location__row d-flex">

				<div class="actions-item d-flex">
					<div class="actions-item-number actions-icon-pdf"></div>
					<div class="actions-item-text actions-round-arrow-icon">Генеральный план поселка</div>
				</div>

				<div class="actions-item d-flex">
					<div class="actions-item-number actions-icon-pdf"></div>
					<div class="actions-item-text actions-round-arrow-icon">План коттеджа #2</div>
				</div>

				<div class="actions-item d-flex">
					<div class="actions-item-number actions-icon-pdf"></div>
					<div class="actions-item-text actions-round-arrow-icon">План коттеджа #1</div>
				</div>

				<div class="actions-item d-flex">
					<div class="actions-item-number actions-icon-pdf"></div>
					<div class="actions-item-text actions-round-arrow-icon">План усадьбы</div>
				</div>

				<div class="actions-item d-flex">
					<div class="actions-item-number actions-icon-pdf"></div>
					<div class="actions-item-text actions-round-arrow-icon">План дуплекса</div>
				</div>

			</div>

		</div>
	</section>

	<section id="general-plan" class="general-plan">
		<div class="container">
			<h2>Генеральный план поселка</h2>
			<div class="general-plan__map map" id="map"></div>
			<?php get_template_part('template-parts/map-script');?> 
		</div>
	</section>

	<?php get_template_part('template-parts/consult-form-section');?> 

</main>

<?php get_footer(); 
