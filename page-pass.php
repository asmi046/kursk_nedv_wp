<?php 

/*
Template Name: Страница Сдать
Template Post Type: page
*/

get_header(); ?>

<?php get_template_part('template-parts/header-section');?> 

<main class="page page-recurring">

	<section id="sell-pass-info" class="sell-pass-info pass-info">
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

	<section id="how-work" class="how-work recurring">
		<div class="container">

			<?php
			if ( function_exists('yoast_breadcrumb') ) {
				yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
			}
			?> 

			<h2>Как это работает</h2>

			<div class="how-work__row d-flex">

				<div class="how-work__actions d-flex">

					<div class="actions-item d-flex">
						<div class="actions-item-number">1</div>
						<div class="actions-item-text actions-arrow-icon d-f">Оставьте заявку на сайте</div>
					</div>

					<div class="actions-item d-flex">
						<div class="actions-item-number">2</div>
						<div class="actions-item-text actions-arrow-icon d-f">Подготовка к сдаче</div>
					</div>

					<div class="actions-item d-flex">
						<div class="actions-item-number">3</div>
						<div class="actions-item-text actions-arrow-icon d-f">Поиск арендаторов</div>
					</div>

					<div class="actions-item d-flex">
						<div class="actions-item-number">4</div>
						<div class="actions-item-text actions-arrow-icon d-f">Заключение сделки</div>
					</div>

				</div>

				<div class="how-work__img">
					<img src="<?php echo get_template_directory_uri();?>/img/pass.jpg" alt="">
				</div>

			</div>

		</div>
	</section>

	<?php get_template_part('template-parts/consult-form-section');?> 

</main>

<?php get_footer(); 