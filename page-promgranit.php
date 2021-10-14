<?php 

/*
Template Name: Страница ПромГранит
Template Post Type: page
*/

get_header(); ?>

<?php get_template_part('template-parts/header-section');?> 

<main class="page page-recurring">

	<a href="#callback" class="callback-widget blink _popup-link"></a>
	<a href="tel:<? echo preg_replace('/[^0-9]/', '', $tel = carbon_get_theme_option("as_phone_1")); ?>" class="callback-widget callback-widget-mob blink"></a>

	<section id="sell-pass-info" class="sell-pass-info promgranit-info">
		<div class="nuar_blk"></div>
		<div class="container">

			<div class="sell-pass-info__row d-flex">
				<div class="sell-pass-info__text">
					<h1><?php the_title();?></h1>
					<p>
						Заполните заявку и наши менеджеры свяжутся с
						Вами в течении 15 минут
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

	<section id="promgranit-about" class="promgranit-about recurring">
		<div class="container">

			<?php
			if ( function_exists('yoast_breadcrumb') ) {
				yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
			}
			?> 

			<h2>ООО «ПромГранит»</h2>

			<div class="promgranit-about__row d-flex">

				<div class="promgranit-about__img">
					<img src="<?php echo get_template_directory_uri();?>/img/promgranit-about-img.jpg" alt="">
				</div>

				<div class="promgranit-about__descp d-flex">

					<div class="promgranit-about__text">
						<p>
							Предлагаем Вашему вниманию квартиры в современном жилом комплексе в одном из лучших спальных районов
							города Курска. Жилой комплекс построен с применением современных технологий и обеспечит Вам комфортные
							условия проживания.
						</p>
						<p>
							Воспользовавшись нашим предложением Вы получите уютную, теплую квартиру с современной практичной
							планировкой в монолитно кирпичном доме с обустроенной придомовой территорией и развитой
							инфраструктурой. Специально для вас мы подготовили 9 вариантов планировки квартир от 1 до 3 комнат.
						</p>
					</div>

					<div class="promgranit-about__descp-icons d-flex">

						<div class="promgranit-about__descp-icons-item">
							<div class="promgranit-about__descp-icons-item-text promgranit-about__descp-icon-01">
								Большая
								придомовая
								территория
							</div>
						</div>

						<div class="promgranit-about__descp-icons-item">
							<div class="promgranit-about__descp-icons-item-text promgranit-about__descp-icon-02">
								Монолитно
								кирпичный
								дом
							</div>
						</div>

						<div class="promgranit-about__descp-icons-item">
							<div class="promgranit-about__descp-icons-item-text promgranit-about__descp-icon-03">
								Развитая
								инфраструктура
								дома
							</div>

						</div>

					</div>

				</div>

			</div>
		</section>

		<section id="floor-plan" class="floor-plan">
			<div class="container">
				<h2>План этажа</h2>
				<div class="floor-plan__img">
					<img src="<?php echo get_template_directory_uri();?>/img/floor-plan.png" alt="">
				</div>
			</div>
		</section>

		<section id="interior" class="interior">
			<div class="container">

				<h2>Интерьер подъезда</h2>

				<div class="mosaic d-flex">

					<div class="mosaic__two d-flex">
						<div class="mosaic__two-left">
							<div class="mosaic__img">
								<img src="<?php echo get_template_directory_uri();?>/img/interior/01.jpg" alt="">
							</div>
						</div>
						<div class="mosaic__two-right d-flex">
							<div class="mosaic__img">
								<img src="<?php echo get_template_directory_uri();?>/img/interior/02.jpg" alt="">
							</div>
							<div class="mosaic__img">
								<img src="<?php echo get_template_directory_uri();?>/img/interior/03.jpg" alt="">
							</div>
							<div class="mosaic__img">
								<img src="<?php echo get_template_directory_uri();?>/img/interior/04.jpg" alt="">
							</div>
							<div class="mosaic__img">
								<img src="<?php echo get_template_directory_uri();?>/img/interior/05.jpg" alt="">
							</div>
						</div>
					</div>

				</div>

			</div>
		</section>

	<?php get_template_part('template-parts/consult-form-section');?> 

	</main>

	<?php get_footer(); 
