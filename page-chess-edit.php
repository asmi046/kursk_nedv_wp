<?php 

/*
Template Name: Страница Редактирование квартиры
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
                        
                            <? if (!empty($_REQUEST["kvartira"])) { 
                                global $wpdb;
                                $kinfo = $wpdb->get_results("SELECT * FROM `kn_ches_home` WHERE `id` = '".$_REQUEST["kvartira"]."'");
                                $kinfo = $kinfo[0];
                            ?>
                                
                                <div class="kvartira_edit_info">
                                    
                                        <strong>Дом: </strong><? echo $kinfo->home;?></br>
                                        <strong>Этаж: </strong><? echo $kinfo->etazg;?></br>
                                        <strong>Квартира №: </strong><? echo $kinfo->number;?></br>
                                    
                                </div>

                                <form class = "edit_kv_form" method="get">
                                    <label for = "">Площадь</label>
                                    <input class = "input" type = "text" name = "area" placeholder = "Введите площадь" value = "<?echo $kinfo->area?>" />
                                    
                                    <label for = "">Колличество комнат</label>
                                    <input class = "input" type = "number" name = "rooms" placeholder = "Введите колличество комнат" value = "<?echo $kinfo->rooms?>" />
                                    
                                    <label for = "">Статус</label>
                                    <select name = "status" class="form">
                                        <option value = "" disabled <? echo empty($kinfo->status)?"selected = 'selected'":"" ?>>Не продается</option>
                                        <option value="Продана" <? echo ($kinfo->status == "Продана")?"selected = 'selected'":"" ?> >Продана</option>
                                        <option value="Резерв" <? echo ($kinfo->status == "Резерв")?"selected = 'selected'":"" ?> >Резерв</option>
                                        <option value="Свободна" <? echo ($kinfo->status == "Свободна")?"selected = 'selected'":"" ?> >Свободна</option>
                                       
                                    </select>

                                    <label for = "">Цена в резерве</label>
                                    <input class = "input" type = "text" name = "rezerv_price" placeholder = "Введите цену резерва" value = "<?echo $kinfo->rezerv_price?>" />
                                    
                                    <label for = "">Клиент зарезервировавший</label>
                                    <input class = "input" type = "text" name = "klient_name" placeholder = "Введите имя клиента" value = "<?echo $kinfo->klient_name?>" />
                                    
                                    <label for = "">Менеджер вносящий изменения</label>
                                    <input class = "input" type = "text" name = "manager_name" placeholder = "Введите имя менеджера" value = "<?echo $kinfo->manager_name?>" />
                                    
                                    
                                    <button type = "submit" class = "btn">Сохранить</button>
                                </form>
                            <? } else {?>       

                                <strong>Выберите квартиру</strong>
                            <?}?>    
                        </div>
                    </div>
                
                <?php endwhile;?>
			<?php endif; ?>
			
        </div>
	</section>

	</main>

	<?php get_footer(); 
