<?php 

/*
Template Name: Страница Жилой комплекс
Template Post Type: page
*/

get_header(); ?>

<?php get_template_part('template-parts/header-section');?> 

<main class="page page-recurring">

	<a href="#callback" class="callback-widget blink _popup-link"></a>
	<a href="tel:<? echo preg_replace('/[^0-9]/', '', $tel = carbon_get_theme_option("as_phone_1")); ?>" class="callback-widget callback-widget-mob blink"></a>

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
				<?php get_template_part('template-parts/form-real-estate');?> 
			</div>

		</div>
	</section>

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

			<div class="location__row spollers-block d-flex" data-spollers data-one-spoller>

				<div class="actions-spollers-block spollers-block__item">
					<div class="actions-item d-flex" data-spoller>
						<div class="actions-item-number actions-icon-pdf"></div>
						<div class="actions-item-text actions-round-arrow-icon">Генеральный план поселка</div>
					</div>
					<div class="actions-spollers-block__body spollers-block__body">
						<ul>
							<li>
								Добавьте объявление о сдаче недвижимости или просто оставьте свой телефон и мы поможем.
							</li>
						</ul>
					</div>
				</div>

				<div class="actions-spollers-block spollers-block__item">
					<div class="actions-item d-flex" data-spoller>
						<div class="actions-item-number actions-icon-pdf"></div>
						<div class="actions-item-text actions-round-arrow-icon">План коттеджа #2</div>
					</div>
					<div class="actions-spollers-block__body spollers-block__body">
						<ul>
							<li>
								Добавьте объявление о сдаче недвижимости или просто оставьте свой телефон и мы поможем.
							</li>
						</ul>
					</div>
				</div>

				<div class="actions-spollers-block spollers-block__item">
					<div class="actions-item d-flex" data-spoller>
						<div class="actions-item-number actions-icon-pdf"></div>
						<div class="actions-item-text actions-round-arrow-icon">План коттеджа #1</div>
					</div>
					<div class="actions-spollers-block__body spollers-block__body">
						<ul>
							<li>
								Добавьте объявление о сдаче недвижимости или просто оставьте свой телефон и мы поможем.
							</li>
						</ul>
					</div>
				</div>

				<div class="actions-spollers-block spollers-block__item">
					<div class="actions-item d-flex" data-spoller>
						<div class="actions-item-number actions-icon-pdf"></div>
						<div class="actions-item-text actions-round-arrow-icon">План усадьбы</div>
					</div>
					<div class="actions-spollers-block__body spollers-block__body">
						<ul>
							<li>
								Добавьте объявление о сдаче недвижимости или просто оставьте свой телефон и мы поможем.
							</li>
						</ul>
					</div>
				</div>

				<div class="actions-spollers-block spollers-block__item">
					<div class="actions-item d-flex" data-spoller>
						<div class="actions-item-number actions-icon-pdf"></div>
						<div class="actions-item-text actions-round-arrow-icon">План дуплекса</div>
					</div>
					<div class="actions-spollers-block__body spollers-block__body">
						<ul>
							<li>
								Добавьте объявление о сдаче недвижимости или просто оставьте свой телефон и мы поможем.
							</li>
						</ul>
					</div>
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
