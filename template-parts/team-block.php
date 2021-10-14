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

