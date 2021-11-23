<div class="ststa">
    <?
        global $wpdb;

        $home =  $wpdb->get_results("SELECT `home` FROM `kn_ches_home` GROUP BY `home`");

        foreach ($home as $h) {
    ?>

    <h2> <?echo $h->home;?></h2>

    <h3>1 - к квартиры</h3>
    <? 
        $free = $wpdb->get_results("SELECT * FROM `kn_ches_home` WHERE `home` = '".$h->home."' AND  `status` = 'Свободна' AND `rooms` = 1");
        $free_area = $wpdb->get_results("SELECT SUM(`area`) as `fullarea` FROM `kn_ches_home` WHERE `home` = '".$h->home."' AND   `status` = 'Свободна' AND `rooms` = 1");
    ?>
    <p>Свободно: <? echo count($free);?> квартир, общая площадь:  <? echo round($free_area[0]->fullarea, 2);?> м²</p>

    <? 
        $rezerv = $wpdb->get_results("SELECT * FROM `kn_ches_home` WHERE `home` = '".$h->home."' AND   `status` = 'Резерв' AND `rooms` = 1");
        $rezerv_area = $wpdb->get_results("SELECT SUM(`area`) as `fullarea` FROM `kn_ches_home` WHERE  `home` = '".$h->home."' AND  (`status` = 'Резерв' OR `status` = 'Резерв руководителя') AND `rooms` = 1");
    ?>
    <p>Резерв: <? echo count($rezerv);?> квартир, общая площадь:  <? echo round($rezerv_area[0]->fullarea, 2);?> м²</p>

    <? 
        $prod = $wpdb->get_results("SELECT * FROM `kn_ches_home` WHERE `home` = '".$h->home."' AND   `status` = 'Продана' AND `rooms` = 1");
        $prod_area = $wpdb->get_results("SELECT SUM(`area`) as `fullarea` FROM   `kn_ches_home` WHERE  `home` = '".$h->home."' AND   (`status` = 'Продана' OR `status` = 'Резерв учередителя') AND `rooms` = 1");
    ?>
    <p>Продано: <? echo count($prod);?> квартир, общая площадь:  <? echo round($prod_area[0]->fullarea, 2);?> м²</p>

    <h3>2 - к квартиры</h3>
    
    <? 
        $free = $wpdb->get_results("SELECT * FROM `kn_ches_home` WHERE `home` = '".$h->home."' AND   `status` = 'Свободна' AND `rooms` = 2");
        $free_area = $wpdb->get_results("SELECT SUM(`area`) as `fullarea` FROM `kn_ches_home` WHERE `home` = '".$h->home."' AND   `status` = 'Свободна' AND `rooms` = 2");
    ?>
    <p>Свободно: <? echo count($free);?> квартир, общая площадь:  <? echo round($free_area[0]->fullarea, 2);?> м²</p>

    <? 
        $rezerv = $wpdb->get_results("SELECT * FROM `kn_ches_home` WHERE `home` = '".$h->home."' AND   `status` = 'Резерв' AND `rooms` = 2");
        $rezerv_area = $wpdb->get_results("SELECT SUM(`area`) as `fullarea` FROM `kn_ches_home` WHERE `home` = '".$h->home."' AND   (`status` = 'Резерв' OR `status` = 'Резерв руководителя') AND `rooms` = 2");
    ?>
    <p>Резерв: <? echo count($rezerv);?> квартир, общая площадь:  <? echo round($rezerv_area[0]->fullarea, 2);?> м²</p>

    <? 
        $prod = $wpdb->get_results("SELECT * FROM `kn_ches_home` WHERE `home` = '".$h->home."' AND   `status` = 'Продана' AND `rooms` = 2");
        $prod_area = $wpdb->get_results("SELECT SUM(`area`) as `fullarea` FROM `kn_ches_home` WHERE `home` = '".$h->home."' AND   (`status` = 'Продана' OR `status` = 'Резерв учередителя') AND `rooms` = 2");
    ?>
    <p>Продано: <? echo count($prod);?> квартир, общая площадь:  <? echo round($prod_area[0]->fullarea, 2);?> м²</p>

    <h3>3 - к квартиры</h3>

        
    <? 
        $free = $wpdb->get_results("SELECT * FROM `kn_ches_home` WHERE `home` = '".$h->home."' AND   `status` = 'Свободна' AND `rooms` = 3");
        $free_area = $wpdb->get_results("SELECT SUM(`area`) as `fullarea` FROM `kn_ches_home` WHERE  `home` = '".$h->home."' AND   `status` = 'Свободна' AND `rooms` = 3");
    ?>
    <p>Свободно: <? echo count($free);?> квартир, общая площадь:  <? echo round($free_area[0]->fullarea, 2);?> м²</p>

    <? 
        $rezerv = $wpdb->get_results("SELECT * FROM `kn_ches_home` WHERE `home` = '".$h->home."' AND   `status` = 'Резерв' AND `rooms` = 3");
        $rezerv_area = $wpdb->get_results("SELECT SUM(`area`) as `fullarea` FROM `kn_ches_home` WHERE `home` = '".$h->home."' AND   (`status` = 'Резерв' OR `status` = 'Резерв руководителя') AND `rooms` = 3");
    ?>
    <p>Резерв: <? echo count($rezerv);?> квартир, общая площадь:  <? echo round($rezerv_area[0]->fullarea, 2);?> м²</p>

    <? 
        $prod = $wpdb->get_results("SELECT * FROM `kn_ches_home` WHERE `home` = '".$h->home."' AND   `status` = 'Продана' AND `rooms` = 3");
        $prod_area = $wpdb->get_results("SELECT SUM(`area`) as `fullarea` FROM `kn_ches_home` WHERE `home` = '".$h->home."' AND   (`status` = 'Продана' OR `status` = 'Резерв учередителя') AND `rooms` = 3");
    ?>
    <p>Продано: <? echo count($prod);?> квартир, общая площадь:  <? echo round($prod_area[0]->fullarea, 2);?> м²</p>
    
    <?
        }
    ?>


</div>