<?php get_header(); ?>

<?php get_template_part('template-parts/header-section');?>

<main class="page">

	<a href="#callback" class="callback-widget blink _popup-link"></a>
	<a href="tel:<? echo preg_replace('/[^0-9]/', '', $tel = carbon_get_theme_option("as_phone_1")); ?>" class="callback-widget callback-widget-mob blink"></a>

	<section id="info" class="info">
		<div class="nuar_blk"></div> 
		<div class="container">

			<h1><?php echo carbon_get_theme_option('about_home_title'); ?></h1> 

			<div class="info__item d-flex">
				<a href="#" class="info__item-link">Купить</a>
				<a href="<?php echo get_permalink(26);?>" class="info__item-link">Продать</a>
				<a href="<?php echo get_permalink(24);?>" class="info__item-link">Сдать</a>
				<a href="<?php echo get_permalink(26);?>" class="info__item-link">Снять</a> 
			</div>

			<?php get_template_part('template-parts/tabs-form-block');?>

		</div>
	</section> 

	<section id="topical" class="topical"> 
		<div class="container">
			<h2>Актуальные предложения</h2>
			<div class="topical__slider topical__row d-flex">
				<? $suggest = carbon_get_theme_option('complex_suggest');
				if ($suggest) {
					$suggestIndex = 0;
					foreach ($suggest as $item) {
						?>
						<a href="<? echo $item['link_suggest']; ?>" class="topical__card">
							<div class="topical__position">
								<p><? echo $item['title_suggest']; ?></p>
							</div>
							<img src="<?php echo wp_get_attachment_image_src($item['img_suggest'], 'large')[0]; ?>" alt="">
						</a>
						<?
						$suggestIndex++; 
					}
				}
				?>
			</div>
		</div>
	</section>

	<?php get_template_part('template-parts/advantages');?> 

	<section id="reviews" class="reviews">
		<div class="container">
			<h2>Отзывы довольных клиентов</h2>

			<div class="slider-reviews reviews__row d-flex">
				<? $reviews = carbon_get_theme_option('complex_reviews');
				if ($reviews) {
					$reviewsIndex = 0;
					foreach ($reviews as $item) {
						?>
						<div class="reviews__col">
							<div class="reviews__card d-flex">
								<div class="reviews__image-wrap">
									<div class="reviews__image">
										<img src="<?php echo wp_get_attachment_image_src($item['img_reviews'], 'large')[0]; ?>" alt="">
									</div>
								</div>
								<h4><? echo $item['name_reviews']; ?></h4>
								<p class="reviews__date"><? echo $item['data_reviews']; ?></p>
								<span class="reviews__like"></span>
								<p class="reviews__descp"><? echo $item['descp_reviews']; ?></p>
								<a href="<? echo $item['link_reviews']; ?>" class="reviews__btn">Читать отзыв в Vk</a>
							</div>
						</div>
						<?
						$reviewsIndex++; 
					}
				}
				?>
			</div>

		</div>
	</section>

	<section id="hot-deals" class="hot-deals">
		<div class="container">
			<h2>Горячие предложения</h2>

			<div class="slider__hot-deals hot-deals__row d-flex">
				<?
					$hotObject = $wpdb->get_results( "SELECT * FROM `kn_objnedv` WHERE `photo` != '' AND `klient_status` = 'Горячий' LIMIT 0, 10" );
				
					foreach ($hotObject as $elem) {
						get_template_part('template-parts/objec', 'elem', ["elem" => $elem]);
					}
				?>
			
				<!-- <div class="hot-deals__card">
					<div class="hot-deals__card-img">
						<img src="<?php echo get_template_directory_uri();?>/img/hot-deals/01.jpg" alt="">
					</div>
					<div class="hot-deals__card-descp">
						<p class="hot-deals__card-price rub">2 500 000 </p>
						<div class="hot-deals__card-charect d-flex">
							<p class="hot-deals__card-housing">2-х комнатная квартира </p>
							<p class="hot-deals__card-amount">44 м² | 5 / 5 эт.</p>
						</div>
						<p class="hot-deals__card-address">ул. Новая д. 34</p>
					</div>
					<div class="hot-deals__card-btn d-flex">
						<a href="#" class="hot-deals__card-link">Подробнее</a>
						<a href="#" class="hot-deals__card-link">Оставить заявку</a>
					</div>
				</div>

				<div class="hot-deals__card">
					<div class="hot-deals__card-img">
						<img src="<?php echo get_template_directory_uri();?>/img/hot-deals/02.jpg" alt="">
					</div>
					<div class="hot-deals__card-descp">
						<p class="hot-deals__card-price rub">6 000 000 </p>
						<div class="hot-deals__card-charect d-flex">
							<p class="hot-deals__card-housing">3-х комнатная квартира </p>
							<p class="hot-deals__card-amount">75 м² | 5 / 5 эт.</p>
						</div>
						<p class="hot-deals__card-address">ул. Новая д. 34</p>
					</div>
					<div class="hot-deals__card-btn d-flex">
						<a href="#" class="hot-deals__card-link">Подробнее</a>
						<a href="#" class="hot-deals__card-link">Оставить заявку</a>
					</div>
				</div>

				<div class="hot-deals__card">
					<div class="hot-deals__card-img">
						<img src="<?php echo get_template_directory_uri();?>/img/hot-deals/03.jpg" alt="">
					</div>
					<div class="hot-deals__card-descp">
						<p class="hot-deals__card-price rub">4 300 000 </p>
						<div class="hot-deals__card-charect d-flex">
							<p class="hot-deals__card-housing">3-х комнатная квартира </p>
							<p class="hot-deals__card-amount">54 м² | 5 / 5 эт.</p>
						</div>
						<p class="hot-deals__card-address">ул. Новая д. 34</p>
					</div>
					<div class="hot-deals__card-btn d-flex">
						<a href="#" class="hot-deals__card-link">Подробнее</a>
						<a href="#" class="hot-deals__card-link">Оставить заявку</a>
					</div>
				</div>

				<div class="hot-deals__card">
					<div class="hot-deals__card-img">
						<img src="<?php echo get_template_directory_uri();?>/img/hot-deals/04.jpg" alt="">
					</div>
					<div class="hot-deals__card-descp">
						<p class="hot-deals__card-price rub">2 100 000 </p>
						<div class="hot-deals__card-charect d-flex">
							<p class="hot-deals__card-housing">2-х комнатная квартира </p>
							<p class="hot-deals__card-amount">44 м² | 5 / 5 эт.</p>
						</div>
						<p class="hot-deals__card-address">ул. Новая д. 34</p>
					</div>
					<div class="hot-deals__card-btn d-flex">
						<a href="#" class="hot-deals__card-link">Подробнее</a>
						<a href="#" class="hot-deals__card-link">Оставить заявку</a>
					</div>
				</div> -->

			</div>

		</div>
	</section>

	<?php get_template_part('template-parts/consult-form-section');?> 

	<section id="team" class="team">
		<div class="container">
			<h2>Наша команда</h2>
			<?php get_template_part('template-parts/team-block');?> 
		</div>
	</section>

</main>

<?php get_footer(); ?> 