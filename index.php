<?php get_header(); ?>

<?php get_template_part('template-parts/header-section');?>

<main class="page">

	<a href="#callback" class="callback-widget blink _popup-link"></a>
	<a href="tel:<? echo preg_replace('/[^0-9]/', '', $tel = carbon_get_theme_option("as_phone_1")); ?>" class="callback-widget callback-widget-mob blink"></a>

	<section id="info" class="info">
		<div class="nuar_blk"></div> 
		<div class="container"> 

			<h2>Вся недвижимость Курска</h2> 

			<div class="info__item d-flex">
				<a href="<? bloginfo("url"); ?>" class="info__item-link">Купить</a>  
				<a href="<?php echo get_permalink(26);?>" class="info__item-link">Продать</a> 
				<a href="<?php echo get_permalink(24);?>" class="info__item-link">Сдать</a>
				<a href="<?php echo get_permalink(26);?>" class="info__item-link">Снять</a>  
			</div>

			<?php get_template_part('template-parts/tabs-form-block');?> 

		</div>
	</section> 

	<? $abouttc = carbon_get_theme_option("about_home_subtitle");
	if (!empty($abouttc)) { ?>
	<section id="about" class="about"> 
		<div class="container">
			<h1 class="about__title"><?php echo carbon_get_theme_option('about_home_title'); ?></h1>
			<div class="about__subtitle">
				<? echo $abouttc; ?>
			</div>
		</div>
	</section> 
	<? } ?>

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
							<img src="<?php echo wp_get_attachment_image_src($item['img_suggest'], 'large')[0]; ?>" loading="lazy" alt="<? the_title();?>">
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
										<img src="<?php echo wp_get_attachment_image_src($item['img_reviews'], 'large')[0]; ?>" loading="lazy" alt="<? the_title();?>">
									</div>
								</div>
								<h4><? echo $item['name_reviews']; ?></h4>
								<p class="reviews__date"><? echo $item['data_reviews']; ?></p>
								<span class="reviews__like"></span>
								<p class="reviews__descp"><? echo $item['descp_reviews']; ?></p>
								<a href="<? echo $item['link_reviews']; ?>" class="reviews__btn">Читать в источнике</a>
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