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
    
    for (let i = 0; i<mapPin.length; i++ )
    { 
      let pin = new ymaps.Placemark([parseFloat(mapPin[i].coord.split(",")[1]), parseFloat(mapPin[i].coord.split(",")[0])], {
    								balloonContent: mapPin[i].name, 
                  },
                  {
    								iconLayout: 'default#image',
                    iconImageHref:  '<?php bloginfo("template_url"); ?>/img/icons/map-marker.svg',  
                    iconImageSize: [36, 36],
                    iconImageOffset: [-18, -36]
                  }
      );

      myGeoObjects.push(pin);
    }

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