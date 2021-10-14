<?php 

/*
Template Name: Страница Команда
Template Post Type: page
*/

get_header(); ?>

<?php get_template_part('template-parts/header-section');?> 

<main class="page page-recurring">

	<a href="#" class="callback-widget blink"></a>

	<section id="team" class="team recurring">
		<div class="container">

			<?php
			if ( function_exists('yoast_breadcrumb') ) {
				yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
			}
			?> 

			<h1><?php the_title();?></h1>

			<div class="team__row d-flex">
				<? $team = carbon_get_theme_option('complex_team');
				if ($team) {
					$teamIndex = 0;
					foreach ($team as $item) {
						?>
						<div class="team__card">
							<?
							$sticker = $item["offer_sticker"];
							if (!empty($sticker)) { ?>
								<span class="team__card-sticker"></span>
							<? } ?>
							<div class="team__card-img">
								<img src="<?php echo wp_get_attachment_image_src($item['img_team'], 'large')[0]; ?>" alt="">
							</div>
							<div class="team__card-descp"> 
								<h4>
									<? echo $item['name_team']; ?> <br>
									<? echo $item['surname_team']; ?>
								</h4>
								<p class="team__card-experience">Стаж работы: <? echo $item['special_team']; ?></p>
								<a href="tel:<? echo preg_replace('/[^0-9]/', '', $item['phone_team']); ?>" class="team__card-tel"><? echo $item['phone_team']; ?></a>
								<a href="mailto:<? echo $item['e-mail_team']; ?>" class="team__card-email"><? echo $item['e-mail_team']; ?></a>
							</div>
						</div>
						<?
						$teamIndex++; 
					}
				}
				?>
			</div>

		</div>
	</section>

	<?php get_template_part('template-parts/consult-form-section');?> 

</main>

<?php get_footer(); 
