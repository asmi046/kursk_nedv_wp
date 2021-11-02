<div class="pagging">
	<ul class="pagging-list">
		<?
	
			$start = 1;
			$end = ($args['pagecount'] < 6)?$args['pagecount']:6;

			$prefix = $args['prefix'];

			if ($args['curentpage'] >= 5)
			{
				$start = $args['curentpage'] - 2;
				$end = ($args['curentpage'] + 2 < $args['pagecount'])?$args['curentpage'] + 2:$args['pagecount'];	
			}

			$query = !empty($_GET)?"?".http_build_query($_GET):"";

			if ($start > 1) {
		?>
			<li><a href="<?echo get_bloginfo("url")."/".$prefix."/".$query ?>" class="pagging__link <? if ($args['pagecount'] == $args['curentpage']) echo "active" ?>">1</a></li>
			<li class = "empty">...</li>
		<?
			}

			for ($i = $start; $i<=$end; $i++) {
		?>
			<li><a href="<?echo get_bloginfo("url")."/".$prefix."/".$i."/".$query ?>" class="pagging__link <? if ($i == $args['curentpage']) echo "active" ?>"><? echo $i; ?></a></li>
		<?
			}

			if ($end+3 < $args['pagecount']) {
		?>
			<li class = "empty">...</li>
			<li><a href="<?echo get_bloginfo("url")."/".$prefix."/".$args['pagecount']."/".$query ?>" class="pagging__link <? if ($args['pagecount'] == $args['curentpage']) echo "active" ?>"><? echo $args['pagecount'] ; ?></a></li>
		<?
			}
		?>
	</ul>
</div>