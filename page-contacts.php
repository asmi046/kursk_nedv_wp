<?php 

/*
Template Name: Страница Контакты
Template Post Type: page
*/

get_header(); ?>

<?php get_template_part('template-parts/header-section');?>

<main class="page page-recurring">
	<section id="contacts" class="contacts recurring">
		<div class="container">
			<?php
			if ( function_exists('yoast_breadcrumb') ) {
				yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );  
			}
			?> 

			<h1><? the_title();?></h1>  

			<ul class="contacts__address">
				<li>Курск,</li>
				<li>Курская обл., 305000</li>
				<li>ул. Ватутина, 20</li>
			</ul>

			<ul class="contacts__contacts-block">
				<? $tel = carbon_get_theme_option("as_phone_1"); if (!empty($tel)){?><li><a href="tel:<? echo preg_replace('/[^0-9]/', '', $tel); ?>" class="contacts__contacts-item-phone"><? echo $tel; ?></a></li><?}?> 
				<? $mail = carbon_get_theme_option("as_email"); if (!empty($mail)){?><li><a href="mailto:<? echo $mail; ?>"
					class="contacts__contacts-item-email"><? echo $mail; ?></a></li><?}?>
				</ul>

				<div class="contacts__soc-block soc-block-icon">
					<a href="<?php echo carbon_get_theme_option('as_insta'); ?>" class="soc-block-icon-link soc-icon-1"></a>
					<a href="<?php echo carbon_get_theme_option('as_vk'); ?>" class="soc-block-icon-link soc-icon-2"></a>
					<a href="<?php echo carbon_get_theme_option('as_telegr'); ?>" class="soc-block-icon-link soc-icon-3"></a>
					<a href="<?php echo carbon_get_theme_option('as_whatsapp'); ?>" class="soc-block-icon-link soc-icon-4"></a>
				</div>

				<div class="contacts__map map" id="map"></div>

				<script src="//api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script> 

				<script>
					ymaps.ready(init); 

					function init () {
						var myMap = new ymaps.Map("map", {
        // Координаты центра карты
        center:[<?php echo carbon_get_theme_option('map_point') ?>],
        // Масштаб карты
        zoom: 12.3,
        // Выключаем все управление картой
        controls: []
      }); 

						var myGeoObjects = [];

    // Указываем координаты метки
    myGeoObjects = new ymaps.Placemark([<?php echo carbon_get_theme_option('map_point') ?>],{
    								// hintContent: '<div class="map-hint">Авто профи, Курск, ул.Комарова, 16</div>',
    								balloonContent: '<div class="map-hint"><?php echo carbon_get_theme_option('text_map') ?>', },{
    									iconLayout: 'default#image',
                    // Путь до нашей картинки
                    iconImageHref:  '<?php bloginfo("template_url"); ?>/img/icons/map-marke.svg',  
                    // Размеры иконки
                    iconImageSize: [65, 65],
                    // Смещение верхнего угла относительно основания иконки
                    iconImageOffset: [-25, -100]
                  });

    var clusterer = new ymaps.Clusterer({
    	clusterDisableClickZoom: false,
    	clusterOpenBalloonOnClick: false,
    });
    
    clusterer.add(myGeoObjects);
    myMap.geoObjects.add(clusterer);
    // Отключим zoom
    myMap.behaviors.disable('scrollZoom');

  }
</script>
</div>
</section>

<section id="team" class="team">
	<div class="container">
		<h2>Наша команда</h2>
		<?php get_template_part('template-parts/team-block');?> 
	</div>
</section>

<?php get_template_part('template-parts/consult-form-section');?> 

</main>

<?php get_footer(); 
