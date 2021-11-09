<?php 

/*
Template Name: Страница Квартиры в домах
Template Post Type: page
*/

get_header(); ?>

<?php get_template_part('template-parts/header-section');?>

<main class="page page-recurring">

	<a href="#callback" class="callback-widget blink _popup-link"></a>
	<a href="tel:<? echo preg_replace('/[^0-9]/', '', $tel = carbon_get_theme_option("as_phone_1")); ?>" class="callback-widget callback-widget-mob blink"></a>
	
	<section id="about" class="recurring text_section">
		<div class="container">
			<?php
			if ( function_exists('yoast_breadcrumb') ) {
				yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );  
			}
			?> 

            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			    <h1><? the_title();?></h1>  
				<?php the_content();?>
                    <div class="chesVrapper">
                        <div class="histo">
                        <form method = "GET">
                            <select name = "homes" class="form" onchange = "this.form.submit()">
                                <option value = "Выбрать" disabled <? echo empty($_REQUEST["homes"])?"selected = 'selected'":"" ?>>Выбрать</option>
                                
                                <?
                                    global $wpdb;

                                    $home = $wpdb->get_results("SELECT `home` FROM `kn_ches_home` GROUP BY `home`");

                                    foreach ($home as $h) {
                                ?>
                                    <option value="<?echo $h->home; ?>" <? echo ($_REQUEST["homes"] == $h->home)?"selected = 'selected'":"" ?> ><?echo $h->home; ?></option>
                                <?
                                    }
                                ?>
                            </select>
                        </form>
                        
                        <div class="historyElems">
                            <div class="historyElem prodana">
                                 Продана
                            </div>
                            <div class="historyElem rezerv">
                                 Резерв
                            </div>
                            <div class="historyElem svobodna">
                                 Свободна
                            </div>
                            <div class="historyElem empty">
                                 Заморожен
                            </div>

                        </div>

                        </div>
                        <div class="etazi">
                            <? if (!empty($_REQUEST["homes"])) { 
                                
                                
                                $homeInfo = $wpdb->get_results("SELECT * FROM `kn_ches_home_info` where `home` = '".$_REQUEST["homes"]."'");        
                                // echo "SELECT * FROM `kn_ches_home_info` where `etazg` = '".$_REQUEST["homes"]."'";
                                $homeInfo = $homeInfo[0];

                                $etazji = $wpdb->get_results("SELECT `etazg` FROM `kn_ches_home` GROUP BY `etazg` ORDER BY `etazg` DESC");

                                // for ($i = 0; $i<count($hous); $i+=7) {
                                    foreach ($etazji as $e) {
                            ?>
                                <div class="etazg">
                                    <div class="etagn_number">
                                        <?echo $e->etazg;?>
                                    </div>
                                    
                                    <div class="kvartiri">
                                        <?
                                            $hous = $wpdb->get_results("SELECT * FROM `kn_ches_home` WHERE `home` = '".$_REQUEST["homes"]."' AND `etazg` = ".$e->etazg." ORDER BY `number` ASC");
                                            foreach ($hous as $h) {
                                                $status = "";

                                                if ($h->status === "Продана") $status = "prodana"; 
                                                if ($h->status === "Резерв") $status = "rezerv"; 
                                                if ($h->status === "Свободна") $status = "svobodna"; 
                                        ?>
                                            <a href = "<?echo get_permalink(103)?>?kvartira=<?echo $h->id; ?>" class="kvartira <?echo $status; ?>">
                                                <div class="kinfo">
                                                    <div class = "knumber">
                                                        № <? echo $h->number; ?>
                                                    </div>
                                                    <div class="karea">
                                                        <? echo $h->area; ?>  м² 
                                                    </div>
                                                </div>
                                                <div class="kprice  rub">
                                                    <span class = "price_formator"><?echo round($homeInfo->price * $h->area, 2); ?></span>
                                                </div>
                                            </a>
                                        <?}?>
                                    </div>
                                </div>

                            <?
                                }
                            } else {?>       
                                <strong>Выберите дом</strong>
                            <?}?>    
                        </div>
                    </div>
                
                <?php endwhile;?>
			<?php endif; ?>
			
        </div>
	</section>

	</main>

	<?php get_footer(); 
