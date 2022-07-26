<?php 

/*
Template Name: Страница - Постановка на кадастровый учет и межевание в Курске
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

			<div class="uslugi_type1">
                <div class="usl">
                    <div class="img">
                        <img src="<? bloginfo("template_url"); ?>/img/uslugi/kadastr_plan.webp" alt="">
                    </div>
                    <div class="title">
                        <h3>Подготовка межевого <br/>плана</h3>
                    </div>
                </div>

                <div class="usl">
                    <div class="img">
                        <img src="<? bloginfo("template_url"); ?>/img/uslugi/kadastr_gran.jpg" alt="">
                    </div>
                    <div class="title">
                        <h3>Определение границ <br/>участка</h3>
                    </div>
                </div>

                <div class="usl">
                    <div class="img">
                        <img src="<? bloginfo("template_url"); ?>/img/uslugi/kadastr_tech.jpg" alt="">
                    </div>
                    <div class="title">
                        <h3>Подготовка технического <br/>плана</h3>
                    </div>
                </div>
            </div>

		</div>
	</section>

	<?php get_template_part('template-parts/consult-form-section');?> 

</main>

<?php get_footer(); 
