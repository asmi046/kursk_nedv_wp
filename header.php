<!DOCTYPE html>
<html lang="ru">
<head>

  <title><?php wp_title(); ?></title>

  <meta charset="UTF-8">
  <meta name="format-detection" content="telephone=no">
  <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri();?>/img/favicons/icon256.png" sizes="256x256">
  <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri();?>/img/favicons/icon128.png" sizes="128x128">
  <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri();?>/img/favicons/icon64.png" sizes="64x64">
  <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri();?>/img/favicons/icon32.png" sizes="32x32">
  <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri();?>/img/favicons/icon16.png" sizes="16x16">
  <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri();?>/img/favicons/fav.svg" sizes="any">

  <meta name="yandex-verification" content="0b4ed7e66d0f80b0" />
  <meta name="google-site-verification" content="hwHBx382sHNu-DbtVwlk-3oBclM8viG_heFwsLnHEak" />

  <meta name="viewport" content="width=device-width, initial-scale=1.0"> 

  <?php wp_head();?>   

  <script>!function(a,m,o,c,r,m){a[o+c]=a[o+c]||{setMeta:function(p){this.params=(this.params||[]).concat([p])}},a[o+r]=a[o+r]||function(f){a[o+r].f=(a[o+r].f||[]).concat([f])},a[o+r]({id:"1542070",hash:"1b47f23be6bf12b390e6f877d7f143e4",locale:"ru"}),a[o+m]=a[o+m]||function(f,k){a[o+m].f=(a[o+m].f||[]).concat([[f,k]])}}(window,0,"amo_forms_","params","load","loaded");</script><script id="amoforms_script_1542070" async="async" charset="utf-8" src="https://forms.amocrm.ru/forms/assets/js/amoforms.js?1749547785"></script>

  <!-- Yandex.Metrika counter -->
    <script type="text/javascript" >
      (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
      m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
      (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

      ym(88914789, "init", {
            clickmap:true,
            trackLinks:true,
            accurateTrackBounce:true,
            webvisor:true
      });
    </script>
    <noscript><div><img src="https://mc.yandex.ru/watch/88914789" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
  <!-- /Yandex.Metrika counter -->

</head>
<body>
<!-- Скрипт корзины, отправка -->
<script>  
    let main_page = "<?echo get_bloginfo("url"); ?>";
    let kabinet_page = "<?echo get_the_permalink(93); ?>";
    let bascet_page = "<?echo get_the_permalink(53); ?>";
    let thencs_page = "<?echo get_the_permalink(56); ?>";
    let nophoto_page = "<?echo get_bloginfo("template_url");?>/img/no-photo.jpg";
</script> 
  <div class="wrapper">  
    <!-- Подключение  модальных окон-->
    <? include "modal-win.php";?>