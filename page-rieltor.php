<?php 

/*
Template Name: Страница - Услуги профессионального риэлтора в Курске
Template Post Type: page
*/

get_header(); ?>

<?php get_template_part('template-parts/header-section');?>  

<main class="page page-recurring">

	<a href="#callback" class="callback-widget blink _popup-link"></a>
	<a href="tel:<? echo preg_replace('/[^0-9]/', '', $tel = carbon_get_theme_option("as_phone_1")); ?>" class="callback-widget callback-widget-mob blink"></a>

	<section id="sell-pass-info" class="sell-pass-info sell-info" style = "background-image: url(<? $bg_img = carbon_get_post_meta(get_the_ID(), "banner_img"); echo empty($bg_img)?get_bloginfo("template_url")."/img/sell-bg.jpg":$bg_img; ?>)">
		<div class="container">
            
        	<div class="sell-pass-info__row d-flex ">
				<div class="sell-pass-info__text sell-pass-info__text-sell white_text">
					<h1>
						<?php the_title();?>
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
		</div>
	</section>

    <section id="how-work" class="how-work recurring">
		<div class="container">
            <div class="rielty_usl">
                <div class="rielty_usl_blk">
                    <h2>Вам нужно продать <br/>квартиру?</h2>
                    <div class="line"></div>
                    <div class="text">
                        Если вам необходимо продать квартиру в Курске смело обращайтесь к нам мы знаем как сделать это выгодно. 
                    </div>
                    <a class = "blue_btn" href="#">Получить консультацию</a>
                </div>

                <div class="rielty_usl_blk">
                    <h2>Вам нужно купить <br/>квартиру?</h2>
                    <div class="line"></div>
                    <div class="text">
                        Хотите выгодно купить квартиру в Курске и избежать неприятностей? Наша команда поможет провести безопасную сделку. 
                    </div>
                    <a class = "blue_btn" href="#">Получить консультацию</a>
                </div>

                <div class="rielty_usl_blk">
                    <h2>Вам нужно сопровождение сделкии?</h2>
                    <div class="line"></div>
                    <div class="text">
                        Наши специалисты помогут в сопровождении любой сделки купли продажи недвижимости слюбым видом расчета.
                    </div>
                    <a class = "blue_btn" href="#">Получить консультацию</a>
                </div>

                <div class="rielty_usl_blk">
                    <h2>Страховка недвижимости по выгодным тарифам</h2>
                    <div class="line"></div>
                    <div class="text">
                        Наши специалисты помогут вам подобрать выгодное предложение от надежных страховых компаний.
                    </div>
                    <a class = "blue_btn" href="#">Получить консультацию</a>
                </div>

                <div class="rielty_usl_blk">
                    <h2>Подбор недвижимости под задачи клиента</h2>
                    <div class="line"></div>
                    <div class="text">
                        Наши риелторы имеют богатый опыт в подборе недвижимости под любые задачи наших клиентов + у нас самая большая база недвижимости в Курске.
                    </div>
                    <a class = "blue_btn" href="#">Получить консультацию</a>
                </div>
            </div>
            </div>
        </section>

	

    <?php get_template_part('template-parts/advantages');?> 

    <section id="team" class="team">
		<div class="container">
			<h2>Наша команда</h2>
			<?php get_template_part('template-parts/team-block');?> 
		</div>
	</section>

    <?php get_template_part('template-parts/consult-form-section');?> 
</main>

<?php get_footer(); 
