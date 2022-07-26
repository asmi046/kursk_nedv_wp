<?php 

/*
Template Name: Страница - Независимая оценка недвижимости в Курске
Template Post Type: page
*/

get_header(); ?>

<?php get_template_part('template-parts/header-section');?>  

<main class="page page-recurring">

	<a href="#callback" class="callback-widget blink _popup-link"></a>
	<a href="tel:<? echo preg_replace('/[^0-9]/', '', $tel = carbon_get_theme_option("as_phone_1")); ?>" class="callback-widget callback-widget-mob blink"></a>

	<section id="sell-pass-info" class="sell-pass-info sell-info" style = "background-image: url(<? $bg_img = carbon_get_post_meta(get_the_ID(), "banner_img"); echo empty($bg_img)?get_bloginfo("template_url")."/img/sell-bg.jpg":$bg_img; ?>)">
		<div class="container">
            
        	<div class="sell-pass-info__row d-flex">
				<div class="sell-pass-info__text sell-pass-info__text-sell white_text">
					<h1>
						<h1><?php the_title();?></h1>
					</h1>
					<p>
                        <? echo carbon_get_post_meta(get_the_ID(), "sub_title"); ?>
					</p>
				</div>
				<?php get_template_part('template-parts/form-real-estate');?> 
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

            <div class = "text_contetnt text_section">
                <?php echo the_content(); ?>
            </div>

			<h2><?php echo carbon_get_the_post_meta("page_h2_title"); ?></h2>

            <div class="how-work__row d-flex">

                <div class="how-work__actions spollers-block d-flex" data-spollers data-one-spoller>

                <? $file = carbon_get_the_post_meta("complex_all_usl");
                if ($file) {
                    $Index = 0;
                    foreach ($file as $item) {
                ?>
                    <div class="actions-spollers-block spollers-block__item">
                        <div class="actions-item d-flex" data-spoller>
                            <div class="actions-item-number"><? echo $Index+1; ?></div>
                            <div class="actions-item-text actions-arrow-icon d-f"><? echo $item['usl_name']; ?></div>
                        </div>
                        <div class="actions-spollers-block__body spollers-block__body">
                            <? echo $item['usl_text']; ?>
                        </div>
                    </div>

                <?
                        $Index++; 
                    }
                }
                ?>


                </div>

                <div class="how-work__img">
                    <img src="<? $bg_img = carbon_get_the_post_meta("usl_banner_img"); echo empty($bg_img)?get_bloginfo("template_url")."/img/sell.jpg":$bg_img; ?>" alt="Услсги судепного представительства по недвижимости">
                </div>

            </div>

            <h2 class = "mup_mr">Стоимость оценки</h2>
            <div class="price_usl">
                <? $file = carbon_get_the_post_meta("complex_price_usl");
                    if ($file) {
                        $Index = 0;
                        foreach ($file as $item) {
                ?>
                        <div class="usl_price_blk">
                            <div class="text"> <span><? echo $item['price_usl_name']; ?></span> </div>
                            <div class="razdelitel"> </div>
                            <div class="price"> <? echo $item['price_usl_price']; ?> </div>
                        </div>
                <?
                            $Index++; 
                        }
                    }
                ?>
		    </div>
		</div>
	</section>

	<?php get_template_part('template-parts/consult-form-section');?> 

</main>

<?php get_footer(); 
