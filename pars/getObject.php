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

$index = 0;    
foreach ($xml->objects->children() as $elem)
{
    echo $index.": "; 
    echo $objName = $elem->street." ".$elem->dom_conv;
    echo "\n\r";
    $index++;
}

?>