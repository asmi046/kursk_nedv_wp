<?

// /opt/php/7.1/bin/php www/xn----dtbfdhlbja1aetpolqc1p.xn--p1ai/wp-content/themes/kursk_nedv/pars/clear_chess.php

ini_set('include_path', "/var/www/u0829746/data/www/xn----dtbfdhlbja1aetpolqc1p.xn--p1ai/");

require_once("wp-config.php");

function countDaysBetweenDates($d1, $d2)
{
    $d1_ts = strtotime($d1);
    $d2_ts = strtotime($d2);

    $seconds = $d1_ts - $d2_ts;
    
    return floor($seconds / 86400);
}

global $wpdb;
$houses = $wpdb->get_results("SELECT * FROM `kn_ches_home` WHERE `status` = 'Резерв'");
foreach ($houses as $h) {
   
    // echo date("Y-m-d H:i:s")."  ".date("Y-m-d H:i:s", $h->rezerv_data);
    $dey_count = countDaysBetweenDates(date("Y-m-d H:i:s"), $h->rezerv_data);

    echo $h->home . " кв.: ".$h->number. " дней: ".$dey_count; 

    if ($dey_count > 14) {
        $update_rez = $wpdb->update('kn_ches_home',  
		[ 
			'rezerv_price' => "",
			'rezerv_data' => 0,
			'status' => "Свободна",
			'klient_phone' => "",
			'klient_name' => "",
			'manager_name' => "",
			'manager_login' => "",
			'manager_phone' => "",
		], ['id' => $h->id]);

        echo " - Резерв снят";
    }

    echo "\n\r";
}

?>