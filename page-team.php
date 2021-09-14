<?php 

/*
Template Name: Страница Команда
Template Post Type: page
*/

get_header(); ?>

<?php get_template_part('template-parts/header-section');?> 

<main class="page page-recurring">

	<section id="team" class="team recurring">
		<div class="container">

			<?php
			if ( function_exists('yoast_breadcrumb') ) {
				yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
			}
			?> 

			<h1><?php the_title();?></h1>

			<div class="team__row d-flex">

				<div class="team__card">
					<span class="team__card-sticker"></span>
					<div class="team__card-img">
						<img src="<?php echo get_template_directory_uri();?>/img/team/01.jpg" alt="">
					</div>
					<div class="team__card-descp">
						<h4>
							Анна <br>
							Исаева
						</h4>
						<p class="team__card-experience">Стаж работы: 4 года </p>
						<a href="tel:79009009988" class="team__card-tel">+ 7 900 900 99 88</a>
						<a href="mailto:info@kurskaya-nedvigimost.ru" class="team__card-email">info@kurskaya-nedvigimost.ru</a>
					</div>
				</div>

				<div class="team__card">
					<!-- <span class="team__card-sticker"></span> -->
					<div class="team__card-img">
						<img src="<?php echo get_template_directory_uri();?>/img/team/02.jpg" alt="">
					</div>
					<div class="team__card-descp">
						<h4>
							Светлана <br>
							Князева
						</h4>
						<p class="team__card-experience">Стаж работы: 4 года </p>
						<a href="tel:79009009988" class="team__card-tel">+ 7 900 900 99 88</a>
						<a href="mailto:info@kurskaya-nedvigimost.ru" class="team__card-email">info@kurskaya-nedvigimost.ru</a>
					</div>
				</div>

				<div class="team__card">
					<!-- <span class="team__card-sticker"></span> -->
					<div class="team__card-img">
						<img src="<?php echo get_template_directory_uri();?>/img/team/03.jpg" alt="">
					</div>
					<div class="team__card-descp">
						<h4>
							Инга <br>
							Власова
						</h4>
						<p class="team__card-experience">Стаж работы: 4 года </p>
						<a href="tel:79009009988" class="team__card-tel">+ 7 900 900 99 88</a>
						<a href="mailto:info@kurskaya-nedvigimost.ru" class="team__card-email">info@kurskaya-nedvigimost.ru</a>
					</div>
				</div>

				<div class="team__card">
					<!-- <span class="team__card-sticker"></span> -->
					<div class="team__card-img">
						<img src="<?php echo get_template_directory_uri();?>/img/team/04.jpg" alt="">
					</div>
					<div class="team__card-descp">
						<h4>
							Cергей <br>
							Иванов
						</h4>
						<p class="team__card-experience">Стаж работы: 4 года </p>
						<a href="tel:79009009988" class="team__card-tel">+ 7 900 900 99 88</a>
						<a href="mailto:info@kurskaya-nedvigimost.ru" class="team__card-email">info@kurskaya-nedvigimost.ru</a>
					</div>
				</div>

			</div>

			<button class="team__btn btn">Все сотрудники</button>

		</div>
	</section>

	<?php get_template_part('template-parts/consult-form-section');?> 

</main>

<?php get_footer(); 
