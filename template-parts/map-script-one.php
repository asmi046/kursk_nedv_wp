<script src="//api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script> 

<script>
  ymaps.ready(init); 
  
  let centerMapOne = "<?echo $args["mapPinOne"]?>";
  
  function init () {
      var myMap = new ymaps.Map("map", {
        // Координаты центра карты
        center:[parseFloat(centerMapOne.split(",")[1]), parseFloat(centerMapOne.split(",")[0])],
        // Масштаб карты
        zoom: 12.3,
        // Выключаем все управление картой
        controls: ['fullscreenControl', 'zoomControl']
    }); 

      var myGeoObjects = [];

    // Указываем координаты метки
    
 
      let pin = new ymaps.Placemark([parseFloat(centerMapOne.split(",")[1]), parseFloat(centerMapOne.split(",")[0])], {
    								balloonContent: '<? echo $args["name"] ?>', 
                  },
                  {
    								iconLayout: 'default#image',
                    iconImageHref:  '<?php bloginfo("template_url"); ?>/img/icons/map-marker.svg',  
                    iconImageSize: [36, 36],
                    iconImageOffset: [-18, -36]
                  }
      );

      myGeoObjects.push(pin);

    var clusterer = new ymaps.Clusterer({
    	// clusterDisableClickZoom: false,
    	//clusterOpenBalloonOnClick: false,
    });
    
    clusterer.add(myGeoObjects);
    myMap.geoObjects.add(clusterer);
    // // Отключим zoom
    // myMap.behaviors.disable('scrollZoom');

}
</script>