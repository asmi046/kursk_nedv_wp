<section id="uslugi_main" class="uslugi_main">
		<div class="container">
			<h2>Наши услуги</h2>
			
			<div class="usl_in_main">
				
				<a href = "<? echo get_the_permalink(158); ?>" class="uni_blk" style = "background-image: url(<? $bg_img = get_the_post_thumbnail_url(158, "full"); echo empty($bg_img)?get_bloginfo("template_url")."/img/sell-bg.jpg":$bg_img; ?>)">
					<h3><?echo get_the_title(158); ?></h3>
				</a>
				

				<a href = "<? echo get_the_permalink(160); ?>" class="uni_blk" style = "background-image: url(<? $bg_img = get_the_post_thumbnail_url(160, "full"); echo empty($bg_img)?get_bloginfo("template_url")."/img/sell-bg.jpg":$bg_img; ?>)">
					<h3><?echo get_the_title(160); ?></h3>
				</a>

				<a href = "<? echo get_the_permalink(162); ?>" class="uni_blk" style = "background-image: url(<? $bg_img = get_the_post_thumbnail_url(162, "full"); echo empty($bg_img)?get_bloginfo("template_url")."/img/sell-bg.jpg":$bg_img; ?>)">
					<h3><?echo get_the_title(162); ?></h3>
				</a>

				<a href = "<? echo get_the_permalink(164); ?>" class="uni_blk" style = "background-image: url(<? $bg_img = get_the_post_thumbnail_url(164, "full"); echo empty($bg_img)?get_bloginfo("template_url")."/img/sell-bg.jpg":$bg_img; ?>)">
					<h3><?echo get_the_title(164); ?></h3>
				</a>
			</div>
		</div>
	</section>	