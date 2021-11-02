<?
$adres = $args['elem']->obl;
if (!empty($args['elem']->obl_raion)) $adres .= " ".$args['elem']->obl_raion;
if (!empty($args['elem']->np)) $adres .= " ".$args['elem']->np;
if (!empty($args['elem']->np_raion)) $adres .= " ".$args['elem']->np_raion;
if (!empty($args['elem']->street)) $adres .= " ".$args['elem']->street;
if (!empty($args['elem']->dom_number)) $adres .= " ".$args['elem']->dom_number;

$sitename = empty($args['elem']->site_name)?$args['elem']->type." ".$args['elem']->street:$args['elem']->site_name;

$metazg = $args['elem']->area1.(empty($args['elem']->area2)?"":" / ".$args['elem']->area2);
$etagnost = $args['elem']->floor.(empty($args['elem']->floors)?"":" / ".$args['elem']->floors);
?>
<div class="hot-deals__card">	
	<a href="<?bloginfo("url")?>/obekt/<?echo $args['elem']->row_id;?>" class="hot-deals__card-img" data-lot = "<?echo $args['elem']->lot;?>" data-crmid = "<?echo $args['elem']->row_id;?>">
		<img src="<?php echo (empty($args['elem']->photo))?get_bloginfo("template_url")."/img/no-photo.jpg":$args['elem']->photo;?>" alt="">
	</a> 
	<div class="hot-deals__card-descp">  
		<p class="hot-deals__card-price rub price_formator"><?echo $args['elem']->price;?> </p>
		<div class="hot-deals__card-charect d-flex">
			<p class="hot-deals__card-housing"><?echo $sitename;?></p>
			<p class="hot-deals__card-amount"><?echo $metazg; ?> м² | <?echo $etagnost; ?> эт.</p>
		</div>
		<p class="hot-deals__card-address"><?echo $adres; ?></p> 
	</div>
	<div class="hot-deals__card-btn d-flex">
		<a href="<?bloginfo("url")?>/obekt/<?echo $args['elem']->row_id;?>" class="hot-deals__card-link">Подробнее</a>
		<a href="#object" class="hot-deals__card-link _popup-link">Оставить заявку</a>
	</div> 
</div>