
<?php
/*
Template Name: Страница категрии недвижимости
Template Post Type: page
*/

get_header(); ?>

<?php get_template_part('template-parts/header-section');?>

<main class="page">

	<a href="#" class="callback-widget blink"></a>
	
	<section id="category-info" class="info category-info">
		<div class="nuar_blk"></div>
		<div class="container">

			<?php get_template_part('template-parts/tabs-form-block');?>

		</div>
	</section>

	<section id="product-info" class="product-info recurring">
		<div class="container">

			<?php
			if ( function_exists('yoast_breadcrumb') ) {
				yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
			}
			?> 

			<h1><?php single_cat_title( '', true );?></h1> 

			<div class="product-info__row d-flex">

				<div class="product-info__column">

					<div class="product-info__wrap-card d-flex">
						
                        <?
                            global $wpdb;

                            $object = $wpdb->get_results( "SELECT id FROM `kn_objnedv`" );
                        ?>
                        
                        <div class="hot-deals__card">
							<div class="hot-deals__card-img">
								<img src="<?php echo get_template_directory_uri();?>/img/product/01.jpg" alt="">
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
								<img src="<?php echo get_template_directory_uri();?>/img/product/02.jpg" alt="">
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
								<img src="<?php echo get_template_directory_uri();?>/img/product/03.jpg" alt="">
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
								<img src="<?php echo get_template_directory_uri();?>/img/product/04.jpg" alt="">
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
								<img src="<?php echo get_template_directory_uri();?>/img/product/05.jpg" alt="">
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
								<img src="<?php echo get_template_directory_uri();?>/img/product/06.jpg" alt="">
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
					</div>

					<div class="pagging">
						<ul class="pagging-list">
							<li><a href="" class="pagging__link active">1</a></li>
							<li><a href="" class="pagging__link">2</a></li>
							<li><a href="" class="pagging__link">3</a></li>
						</ul>
					</div>

				</div>

				<div class="product-info__column product-info__column-map">
					<div class="product-info__map map" id="map"></div>
					<?php get_template_part('template-parts/map-script');?> 
				</div>

			</div>

		</div>
	</section>
</main>

<?php get_footer(); ?>   