<?

// /opt/php/7.1/bin/php www/xn----dtbfdhlbja1aetpolqc1p.xn--p1ai/wp-content/themes/kursk_nedv/pars/getObject.php

ini_set('include_path', "/var/www/u0829746/data/www/xn----dtbfdhlbja1aetpolqc1p.xn--p1ai/");

require_once("wp-config.php");

$objUrl = "https://xn--46-6kcaio0anxtsby.xn--p1ai/modules/m_boxreg.php?get_xml=Y&ver=2&prefix=boxreg&token=FTUYGg45r74r__rhtg75ueVGH4t3___43f";

$crl = curl_init($objUrl);
curl_setopt($crl, CURLOPT_NOBODY, true);
curl_exec($crl);

$ret = curl_getinfo($crl, CURLINFO_HTTP_CODE);
curl_close($crl);

if ($ret == 200) 
    $xml = simplexml_load_file($objUrl);

global $wpdb;

$wpdb->query('TRUNCATE `kn_objnedv`');

$index = 0;    
foreach ($xml->objects->children() as $elem)
{

    if (
        ($elem->status_enum == "Сделка (завершена)")||
        ($elem->status_enum == "Архив (без сделки)")||
        ($elem->status_enum == "Рекламный (несуществующий)")) continue;

    $insertedArray = array(
        'row_id' => (int)$elem->row_id,
        'lot' => (int)$elem->lot,
        'status_enum' => (string)$elem->status_enum,
        'sys_date_create' => (string)$elem->sys_date_create,
        'sys_date_update' => (string)$elem->sys_date_update,
        'klient_status' => (string)$elem->cat_enum,
        'deistvie' => (string)$elem->client_enum,
        'type' => (string)$elem->realty_enum,
        'obmen' => (int)$elem->alt_check,
        'rooms' => (int)$elem->rooms,
        'studia' => (int)$elem->stidio_check,
        'price' => (float)$elem->cost,
        'geocode' => (string)$elem->geocode,
        'obl' => (string)$elem->obl_auto,
        'obl_raion' => (string)$elem->obl_rayon_auto,
        'np' => (string)$elem->np_auto,
        'np_raion' => (string)$elem->np_rayon_auto,
        'street' => (string)$elem->street,
        'dom_number' => (string)$elem->dom_conv,
        'drob' => (string)$elem->drob,
        'korp' => (int)$elem->korp,
        'str' => (int)$elem->str,
        'floor' => (int)$elem->floor,
        'floors' => (int)$elem->floors,
        'description' => "",
        'photo' => (string)$elem->photo[0],
        'site_name' => (string)$elem->site_name,
        'area1' => (string)$elem->area1,
        'area2' => (string)$elem->area2,
    );

    $insertedArray['description'] = empty((string)$elem->description)?(string)$elem->site_text:(string)$elem->description;

    print_r( $insertedArray);

    $wpdb->insert('kn_objnedv', $insertedArray);

    echo $index.": "; 
    echo $objName = $elem->street." ".$elem->dom_conv;
    echo "\n\r";
    $index++;
}

?>