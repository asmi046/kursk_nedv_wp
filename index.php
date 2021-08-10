<?php get_header(); ?>

<section>
	<div class="container">
		<div class="lgozon">
			<img src="<?php echo get_template_directory_uri(); ?>/img/logo.svg" alt="" class="logomain">
			<form action="" class="search">
				<div class="radioBlk">
					<input type="radio" <? if (($_REQUEST["type"] === "%") || ($_REQUEST["type"] === "")) echo "checked"; ?> checked id="all" name="type" value="%" onChange="this.form.submit()"> <label for="all">Любой тип</label>
					<input type="radio" <? if ($_REQUEST["type"] === "Квартира") echo "checked"; ?> id="kvartira" name="type" value="Квартира" onChange="this.form.submit()"> <label for="kvartira">Квартира</label>
					<input type="radio" <? if ($_REQUEST["type"] === "Земельный участок") echo "checked"; ?> id="uhastok" name="type" value="Земельный участок" onChange="this.form.submit()"> <label for="uhastok">Земельный участок</label>
					<input type="radio" <? if ($_REQUEST["type"] === "Дом") echo "checked"; ?> id="dom" name="type" value="Дом" onChange="this.form.submit()"> <label for="dom">Дом</label>
				</div>
				<input class="searchstr" type="text" name="serchstr" value="<? echo $_REQUEST["serchstr"]; ?>" placeholder="Введите улицу или район">
				<input type="submit" class="btn" value="Поиск">
			</form>
			<div class="objects">
				<?
				$searchStr = !empty($_REQUEST["serchstr"]) ? "%" . $_REQUEST["serchstr"] . "%" : "%";
				$type = !empty($_REQUEST["type"]) ? $_REQUEST["type"] : "%";
				global $wpdb;
				$rez = $wpdb->get_results('SELECT * FROM `kn_objnedv` WHERE (`street` LIKE "' . $searchStr . '" OR `np_raion` LIKE "' . $searchStr . '" OR `obl` LIKE "' . $searchStr . '" OR `obl_raion` LIKE "' . $searchStr . '") AND (`type` LIKE "' . $type . '")')
				?>
				<? foreach ($rez as $e) { ?>
					<div class="obj" data-rowid="<? echo $e->row_id; ?>" data-lot="<? echo $e->lot; ?>">

						<div class="img_wrapper">
							<img class="<? echo empty($e->photo) ? "contain" : "cover"; ?>" src="<? echo !empty($e->photo) ? $e->photo : get_template_directory_uri() . "/img/nophoto.jpg"; ?>" alt="">
						</div>

						<div class="info_wrapper">
							<p class="price">
								<? echo $e->price; ?> <span class="rz">₽</span>
							</p>

							<div class="type">
								<? echo $e->type; ?>
							</div>

							<div class="adr">
								<? echo $e->obl . " " . $e->street . " " . $e->np . " " . $e->street . " " . $e->dom_number; ?>
							</div>

						</div>

						<div class="btn_wrapper">
							<a href="#callback" class="_popup-link btn">Оставить заявку</a>
						</div>


					</div>
				<? } ?>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>