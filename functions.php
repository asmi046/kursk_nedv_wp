<?php

define("COMPANY_NAME", "КУРСКАЯ НЕДВИЖИМОСТЬ");
define("MAIL_RESEND", "noreply@ultrakresla.ru");
error_reporting(0);

//----Подключене carbon fields
//----Инструкции по подключению полей см. в комментариях themes-fields.php
include "carbon-fields/carbon-fields-plugin.php";

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action('carbon_fields_register_fields', 'crb_attach_theme_options');
function crb_attach_theme_options()
{
	require_once __DIR__ . "/themes-fields.php";
}

add_action('after_setup_theme', 'crb_load');
function crb_load()
{
	require_once('carbon-fields/vendor/autoload.php');
	\Carbon_Fields\Carbon_Fields::boot();
}


// Menu ===========================================================================================================
//-----Блок описания вывода меню =========================================================================
// 1. Осмысленные названия для алиаса и для описания на русском.
// если это меню в подвали пишем - Меню в подвале 
// если в шапке то пишем - Меню в шапке 
// если 2 меню в шапке пишем  - Меню в шапке (верхняя часть)

add_action('after_setup_theme', function () {
	register_nav_menus([
		// 'menu_hot' => 'Меню актуальных предложений (рядом с каталогом)',
		'menu_1' => 'Меню 1',
		'menu_2' => 'Меню 2',
		'menu_3' => 'Меню 3',
		// 'menu_corp' => 'Общекорпоративное меню (верхняя шапка)', 
	]);
}); 


// Добавление стилей к пунктам меню li
// add_filter('nav_menu_css_class', 'change_menu_item_css_classes', 10, 4);

// function change_menu_item_css_classes($classes, $item, $args, $depth)
// {
// 	if ($item->ID  && 'menu_cat' === $args->theme_location) {
// 		$classes[] = 'footer-top-wrap-list-item-sublist-item';
// 	}

// 	if ($item->ID  && 'menu_company' === $args->theme_location) {
// 		$classes[] = 'footer-top-wrap-list-item-sublist-item';
// 	}

// 	if ($item->ID  && 'menu_main' === $args->theme_location) {
// 		$classes[] = 'header-bottom-wrap-menu-item';
// 	}

// 	return $classes;
// }


// Добавляет атрибут class к ссылке в пунктах меню menu_main
add_filter('nav_menu_link_attributes', 'filter_nav_menu_link_attributes', 10, 4);
function filter_nav_menu_link_attributes($atts, $item, $args, $depth)
{
	if (in_array($args->theme_location, ['menu_main'])) {
		$atts['class'] = 'header-bottom-wrap-menu-item__link';

		if ($item->current) {
			$atts['class'] .= ' menu-link--active'; //активный пункт меню
		}
	}
	return $atts;
}


// Добавляет иконку к ссылкам меню, прикрепленное к области меню menu_main
function change_menu_item_args($args)
{
	if ($args->theme_location == 'menu_main') {
		$args->link_after = '<img src="' . get_template_directory_uri() . '/img/home/header-menu-arrow-down.svg" alt="" class="header-bottom-wrap-menu-item-down__img">';
	}

	return $args;
}
add_filter('nav_menu_item_args', 'change_menu_item_args');


// Добавляем класс к submenu, прикрепленное к области меню menu_main
// add_filter('nav_menu_submenu_css_class', 'change_wp_nav_menu', 10, 3);

// function change_wp_nav_menu($classes, $args, $depth)
// {
// 	if ($args->theme_location == 'menu_main') {
// 		$classes[] = 'header-bottom-wrap-menu-item-submenu';
// 		// $classes[] = 'my-css-2';
// 	}

// 	return $classes;
// }


// Изменить css класс submenu 
add_filter('nav_menu_submenu_css_class', 'change_wp_nav_menu', 10, 3);

function change_wp_nav_menu($classes, $args, $depth)
{
	foreach ($classes as $key => $class) {
		if ($class == 'sub-menu') {
			$classes[$key] = 'header-bottom-wrap-menu-item-submenu';
		}
	}

	return $classes;
}
// === Menu End ========================================================================================================



add_theme_support('post-thumbnails');
set_post_thumbnail_size(185, 185);

add_post_type_support('page', 'excerpt');

// Подключение стилей и nonce для Ajax в админку 
add_action('admin_head', 'my_assets_admin');
function my_assets_admin()
{
	wp_enqueue_style("style-adm", get_template_directory_uri() . "/style-admin.css");

	wp_localize_script('jquery', 'allAjax', array(
		'nonce'   => wp_create_nonce('NEHERTUTLAZIT')
	));
}

// Подключение стилей и nonce для Ajax и скриптов во фронтенд 
add_action('wp_enqueue_scripts', 'my_assets');
function my_assets()
{

	// Подключение стилей 

	$style_version = "1.0.211";
	$scrypt_version = "1.0.211";

	// wp_enqueue_style("style-modal", get_template_directory_uri() . "/css/jquery.arcticmodal-0.3.css", array(), $style_version, 'all'); //Модальные окна (стили)
	// wp_enqueue_style("style-lightbox", get_template_directory_uri() . "/css/lightbox.min.css", array(), $style_version, 'all'); //Лайтбокс (стили)
	wp_enqueue_style("style-slik", get_template_directory_uri() . "/css/slick.css", array(), $style_version, 'all'); //Слайдер (стили)
	
	wp_enqueue_style("style-chess", get_template_directory_uri() . "/chess.css", array(), $style_version, 'all'); // Стили для квартир в домах

	// wp_enqueue_style("style-fancybox", get_template_directory_uri() . "/css/fancybox.css", array(), $style_version, 'all'); //fancybox (стили)

	wp_enqueue_style("main-style", get_stylesheet_uri(), array(), $style_version, 'all'); // Подключение основных стилей в самом конце

	// Подключение скриптов

	wp_enqueue_script('jquery');

	wp_enqueue_script('nicescroll', get_template_directory_uri() . '/js/jquery.nicescroll.min.js', array(), $scrypt_version, true); //nicescroll
	// wp_enqueue_script('amodal', get_template_directory_uri() . '/js/jquery.arcticmodal-0.3.min.js', array(), $scrypt_version, true); //Модальные окна
	// wp_enqueue_script('mask', get_template_directory_uri() . '/js/jquery.inputmask.bundle.js', array(), $scrypt_version, true); //маска для инпутов
	wp_enqueue_script('vendors', get_template_directory_uri() . '/js/vendors.min.js', array(), $scrypt_version, true); //Библиотечки JS
	// wp_enqueue_script('lightbox', get_template_directory_uri() . '/js/lightbox.min.js', array(), $scrypt_version, true); //Лайтбокс
	wp_enqueue_script('slick', get_template_directory_uri() . '/js/slick.min.js', array(), $scrypt_version, true); //Слайдер
	wp_enqueue_script('fancybox', get_template_directory_uri() . '/js/jquery.fancybox.min.js', array(), $scrypt_version, true); //fancybox
	// wp_enqueue_script('html2pdf', get_template_directory_uri() . '/js/html2pdf.bundle.js', array(), $scrypt_version, true); //Create PDF-page 

	wp_enqueue_script('main', get_template_directory_uri() . '/js/main.js', array(), $scrypt_version, true); // Подключение основного скрипта в самом конце
	wp_enqueue_script('chess', get_template_directory_uri() . '/js/chess.js', array(), $scrypt_version, true); // Шахматка



	wp_localize_script('main', 'allAjax', array(
		'ajaxurl' => admin_url('admin-ajax.php'),
		'nonce'   => wp_create_nonce('NEHERTUTLAZIT')
	));
}



// Заготовка для вызова ajax
add_action('wp_ajax_aj_fnc', 'aj_fnc');
add_action('wp_ajax_nopriv_aj_fnc', 'aj_fnc');

function aj_fnc()
{
	if (empty($_REQUEST['nonce'])) {
		wp_die('0');
	}

	if (check_ajax_referer('NEHERTUTLAZIT', 'nonce', false)) {
	} else {
		wp_die('НО-НО-НО!', '', 403);
	}
}



// Пагинация
// function wp_corenavi() {
//   global $wp_query;
//   $total = isset( $wp_query->max_num_pages ) ? $wp_query->max_num_pages : 1;
//   $a['total'] = $total;
//   $a['mid_size'] = 3; // сколько ссылок показывать слева и справа от текущей
//   $a['end_size'] = 1; // сколько ссылок показывать в начале и в конце
//   $a['prev_text'] = ''; // текст ссылки "Предыдущая страница"
//   $a['next_text'] = ''; // текст ссылки "Следующая страница"

//   if ( $total > 1 ) echo '<nav class="pagination">';
//   echo paginate_links( $a );
//   if ( $total > 1 ) echo '</nav>';
// }


/* Отправка почты
		
			$headers = array(
				'From: Сайт '.COMPANY_NAME.' <MAIL_RESEND>',
				'content-type: text/html',
			);
		
			add_filter('wp_mail_content_type', create_function('', 'return "text/html";'));
			
			$adr_to_send = <Присваиваем поле карбона c адресами для отправки>;
			$mail_content = "<Тело письма>";
			$mail_them = "<Тема письма>";

			if (wp_mail($adr_to_send, $mail_them, $mail_content, $headers)) {
				wp_die(json_encode(array("send" => true )));
			}
			else {
				wp_die( 'Ошибка отправки!', '', 403 );
			}
	*/


/*	Заготовка шорткода
		function true_url_external( $atts ) {
			$params = shortcode_atts( array( // в массиве укажите значения параметров по умолчанию
				'anchor' => 'Миша Рудрастых', // параметр 1
				'url' => 'https://misha.blog', // параметр 2
			), $atts );
			return "<a href='{$params['url']}' target='_blank'>{$params['anchor']}</a>";
		}
		add_shortcode( 'trueurl', 'true_url_external' );
	*/


// // Регистрация кастомного поста

// add_action( 'init', 'create_taxonomies' );

// function create_taxonomies(){

// 	register_taxonomy('ultracat', array('ultra'), array(
// 		'hierarchical'  => true,
// 		'labels'        => array(
// 			'name'              => "Категория товара",
// 			'singular_name'     => "Категория товара",
// 			'search_items'      => "Найти категорию товара",
// 			'all_items'         => __( 'Все категории' ),
// 			'parent_item'       => __( 'Дочерние категории' ),
// 			'parent_item_colon' => __( 'Дочерние категории:' ),
// 			'edit_item'         => __( 'Редактировать категорию' ),
// 			'update_item'       => __( 'Обновить категорию' ),
// 			'add_new_item'      => __( 'Добавить новую категорию товара' ),
// 			'new_item_name'     => __( 'Имя новой категории товара' ),
// 			'menu_name'         => __( 'Категории товара' ),
// 		),
// 		'description' => "Категория товаров для магазина",
// 		'public' => true,
// 		'show_ui'       => true,
// 		'query_var'     => true,
// 		'show_in_rest'  => true,
// 		'show_admin_column'     => true,
// 	));

// 	register_taxonomy('ultrastyle', array('ultra'), array(
// 		'hierarchical'  => false,
// 		'labels'        => array(
// 			'name'              => "Стиль дизайна",
// 			'singular_name'     => "Стиль дизайна",
// 			'search_items'      => "Найти стиль",
// 			'all_items'         => __( 'Все стили' ),
// 			'parent_item'       => __( 'Дочерние стили' ),
// 			'parent_item_colon' => __( 'Дочерние стили:' ),
// 			'edit_item'         => __( 'Редактировать стиль' ),
// 			'update_item'       => __( 'Обновить стиль' ),
// 			'add_new_item'      => __( 'Добавить новый стиль' ),
// 			'new_item_name'     => __( 'Имя новго стиля товара' ),
// 			'menu_name'         => __( 'Стили товара' ),
// 		),
// 		'description' => "Стиль дизайна товаров",
// 		'public' => true,
// 		'show_ui'       => true,
// 		'query_var'     => true,
// 		'show_in_rest'  => true,
// 		'show_admin_column'     => true,
// 	));
// }


// add_action('init', 'ultra_custom_init');

// function ultra_custom_init(){
// 	register_post_type('ultra', array(
// 		'labels'             => array(
// 			'name'               => 'Продукты', // Основное название типа записи
// 			'singular_name'      => 'Продукты', // отдельное название записи типа Book
// 			'add_new'            => 'Добавить новый',
// 			'add_new_item'       => 'Добавить новый товар',
// 			'edit_item'          => 'Редактировать товар',
// 			'new_item'           => 'Новый товар',
// 			'view_item'          => 'Посмотреть товар',
// 			'search_items'       => 'Найти товар',
// 			'not_found'          =>  'Товаров не найдено',
// 			'not_found_in_trash' => 'В корзине товаров не найдено',
// 			'parent_item_colon'  => '',
// 			'menu_name'          => 'Товары'

// 		  ),
// 		'taxonomies' => array('ultracat'), 
// 		'public'             => true,
// 		'publicly_queryable' => true,
// 		'show_ui'            => true,
// 		'show_in_menu'       => true,
// 		'query_var'          => true,
// 		'rewrite'            => true,
// 		'capability_type'    => 'post',
// 		'has_archive'        => true,
// 		'show_admin_column'        => true,
// 		'show_in_quick_edit'        => true,
// 		'hierarchical'       => false,
// 		'menu_position'      => 5,
// 		'supports'           => array('title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats')
// 	) );
// }

// // Колонки в таблицу админки

// add_filter('manage_posts_columns', 'posts_columns', 5);
// add_action('manage_posts_custom_column', 'posts_custom_columns', 5, 2);

// function posts_columns($defaults){
//     $defaults['riv_post_sku'] = __('Артикул');
// 	$defaults['riv_post_thumbs'] = __('Миниатюра');
// 	$defaults['riv_post_price'] = __('Цена');
// 	return $defaults;
// }

// function posts_custom_columns($column_name, $id){


// 	if($column_name === 'riv_post_sku'){
// 		$SKU_t = get_post_meta(get_the_ID(), "_offer_sku", true);
// 		echo empty($SKU_t)?"-":$SKU_t;
// 	}

// 	if($column_name === 'riv_post_thumbs'){	
// 		$img1 = get_the_post_thumbnail_url( get_the_ID(), "thumbnail");

// 		if (empty($img1))
// 			$img1 = get_bloginfo("template_url")."/img/no-photo.jpg";

// 		echo '<img width = "60" src = "'.$img1.'" />';


// 	}

// 	if($column_name === 'riv_post_price'){
// 		$PRICE = get_post_meta(get_the_ID(), "_offer_price", true);
// 		echo empty($PRICE)?"0 руб.":$PRICE." руб.";
// 	}


// }

// Отправщик в CRM----------------------------------------------------------------------------

function to_crm_msg($name, $tel, $objname, $obj) {

	//xn--46-6kcaio0anxtsby.xn--p1ai/modules/m_boxreg.php?get_xml=site&token=FTUYGg45r74r__rhtg75ueVGH4t3___43f&iii="+formCallbackName.value+"&tel1="+formCallbackTel.value+"&realty_id="+formLot.value
	

	$url = "//xn--46-6kcaio0anxtsby.xn--p1ai/modules/m_boxreg.php?get_xml=site&token=FTUYGg45r74r__rhtg75ueVGH4t3___43f&iii=".$name."&tel1=".$tel."&realty_id=".$obj;

	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, $url);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	// curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
	// curl_setopt($curl, CURLOPT_SSLVERSION, 3);
	// curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 10);
	// curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
	$str = curl_exec($curl);

	if($str === false)
	{
   	 	echo 'Ошибка curl: ' . curl_error($curl);
	}

	curl_close($curl);

	return json_decode($str);

}

// Отправка Получите бесплатную консультацию
add_action('wp_ajax_sendphone', 'sendphone');
add_action('wp_ajax_nopriv_sendphone', 'sendphone');

function sendphone()
{
	if (empty($_REQUEST['nonce'])) {
		wp_die('0');
	}

	if (check_ajax_referer('NEHERTUTLAZIT', 'nonce', false)) {

		$headers = array(
			'From: Сайт ' . COMPANY_NAME . ' <' . MAIL_RESEND . '>',
			'content-type: text/html',
		);

		$mcontent = '<strong>Имя:</strong> ' . $_REQUEST["name"] . 
		' <br/> <strong>Телефон:</strong> ' . $_REQUEST["tel"]."<br/>";

		if (!empty($_REQUEST["obj"])) {
			$mcontent .= '<strong>Имя обекта:</strong> '.$_REQUEST["objname"]."<br/>";
			$mcontent .= '<strong>ID обекта:</strong> '.$_REQUEST["obj"]."<br/>";
		}

		$mcontent .= '<strong>Отправка в CRM:</strong> '.to_crm_msg($_REQUEST["name"], $_REQUEST["tel"], $_REQUEST["objname"], $_REQUEST["obj"]);

		add_filter('wp_mail_content_type', create_function('', 'return "text/html";'));
		if (wp_mail(carbon_get_theme_option('as_email_send'), 'Заказ Консультации', $mcontent, $headers))
			wp_die("<span style = 'color:green;'>Мы свяжемся с Вами в ближайшее время.</span>");
		else wp_die("<span style = 'color:red;'>Сервис недоступен попробуйте позднее.</span>");
	} else {
		wp_die('НО-НО-НО!', '', 403);
	}
}


// Отправка корзины
function tovarTo1c($bascetElem)
{
	return
		"<Товар>\n\r" .
		"<Ид>" . $bascetElem->sku1c . "</Ид>\n\r" .
		'<Наименование>' . $bascetElem->name . '</Наименование>\n\r' .
		'<БазоваяЕдиница Код="796" НаименованиеПолное="Штука" МеждународноеСокращение="PCE">шт</БазоваяЕдиница>\n\r' .
		"<ЦенаЗаЕдиницу>" . $bascetElem->price . "</ЦенаЗаЕдиницу>\n\r" .
		"<Количество>" . $bascetElem->count . "</Количество>\n\r" .
		"<Сумма>" . $bascetElem->subtotal . "</Сумма>\n\r" .
		"<ЗначенияРеквизитов>\n\r" .
		"<ЗначениеРеквизита>\n\r" .
		"<Наименование>ВидНоменклатуры</Наименование>\n\r" .
		"<Значение>Товар</Значение>\n\r" .
		"</ЗначениеРеквизита>\n\r" .

		"<ЗначениеРеквизита>\n\r" .
		"<Наименование>ТипНоменклатуры</Наименование>\n\r" .
		"<Значение>Товар</Значение>\n\r" .
		"</ЗначениеРеквизита>\n\r" .
		"</ЗначенияРеквизитов>\n\r" .
		"</Товар>\n\r";
}

function sendToFtp($fileAdr, $zak_number)
{
	$ftp_server = "81.177.141.133";
	$ftp_user_name = "asmi046_1s";
	$ftp_user_pass = "!#(yTY)uz9d8";

	$conn_id = ftp_connect($ftp_server);
	$login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass);
	ftp_pasv($conn_id, true);
	if ((!$conn_id) || (!$login_result)) {
		return false;
	} else {
		$upload = ftp_put($conn_id, "orders/" . $zak_number . ".xml", $fileAdr, FTP_ASCII);
		return true;
	}
	ftp_close($conn_id);
}

add_action('wp_ajax_send_cart', 'send_cart');
add_action('wp_ajax_nopriv_send_cart', 'send_cart');

function send_cart()
{
	if (empty($_REQUEST['nonce'])) {
		wp_die('0');
	}

	if (check_ajax_referer('NEHERTUTLAZIT', 'nonce', false)) {

		$headers = array(
			'From: Сайт ' . COMPANY_NAME . ' <' . MAIL_RESEND . '>',
			'content-type: text/html',
		);

		add_filter('wp_mail_content_type', create_function('', 'return "text/html";'));

		$adr_to_send = carbon_get_theme_option("as_email_send");
		// $adr_to_send = (empty($adr_to_send))?"asmi046@gmail.com,rudikov-web@ya.ru":$adr_to_send;

		$zak_number = "A" . date("H") . date("i") . date("s") . rand(100, 999);

		$mail_content = "<h1>Заказ на сайте №" . $zak_number . "</h1>";

		$bscet_dec = json_decode(stripcslashes($_REQUEST["bascet"]));

		// Отправка в базу основного заказа

		global $wpdb;
		$wpdb->insert("shop_zakhistory", array(
			"agent" => empty($_COOKIE["agriautorise"]) ? "" : $_COOKIE["agriautorise"],
			"zak_number" => $zak_number,
			"zak_summ" => $_REQUEST["bascetsumm"],
			"zak_count" => count($bscet_dec),
			"client_name" => $_REQUEST["name"],
			"client_phone" => $_REQUEST["phone"],
			"client_mail" => $_REQUEST["mail"],
			"client_adr" => $_REQUEST["adres"],
			"client_comment" => $_REQUEST["comment"],
		));


		$mail_content .= "<table style = 'text-align: left;' width = '100%'>";
		$mail_content .= "<tr>";
		$mail_content .= "<th></th>";
		$mail_content .= "<th>ТОВАР</th>";
		$mail_content .= "<th>КОЛИЧЕСТВО</th>";
		$mail_content .= "<th>СУММА</th>";
		$mail_content .= "</tr>";

		$toXMLstr = "";

		for ($i = 0; $i < count($bscet_dec); $i++) {
			$toXMLstr .= tovarTo1c($bscet_dec[$i]);
			$mail_content .= "<tr>";
			$mail_content .= "<td><img src = '" . $bscet_dec[$i]->picture . "' width = '70' height = '70'></td>";
			$mail_content .= "<td><a href = '" . $bscet_dec[$i]->lnk . "'>" . $bscet_dec[$i]->name . " / " . $bscet_dec[$i]->sku . "</a></td>";
			$mail_content .= "<td>" . $bscet_dec[$i]->count . "</td>";
			$mail_content .= "<td>" . $bscet_dec[$i]->subtotal . " р.</td>";
			$mail_content .= "</tr>";

			// Отправка в базу содержимого корзины

			$wpdb->insert("shop_zaktovar", array(
				"zak_number" => $zak_number,
				"price" => $bscet_dec[$i]->price,
				"price_old" => empty($bscet_dec[$i]->oldprice) ? "" : $bscet_dec[$i]->oldprice,
				"subtotal" => $bscet_dec[$i]->subtotal,
				"sku" => $bscet_dec[$i]->sku,
				"lnk" => $bscet_dec[$i]->lnk,
				"name" => $bscet_dec[$i]->name,
				"count" => $bscet_dec[$i]->count,
				"picture" => $bscet_dec[$i]->picture,
			));
		}

		$mail_content .= "</table>";
		$mail_content .= "<h2>Сумма: " . $_REQUEST["bascetsumm"] . " р.</h2>";


		$zaktpl = file_get_contents(__DIR__ . '/zaktempl.xml', true);
		// ---- Формирование файла для 1С

		$clname = 	explode(" ", $_REQUEST["name"])[0];
		$clnames = 	explode(" ", $_REQUEST["name"])[1];

		$zaktpl = str_replace("{zaknum}", $zak_number, $zaktpl);
		$zaktpl = str_replace("{zakdata}", date("Y-m-d"), $zaktpl);
		$zaktpl = str_replace("{zaksumm}", $_REQUEST["bascetsumm"], $zaktpl);
		$zaktpl = str_replace("{zaktime}", date("H:i:s"), $zaktpl);
		$zaktpl = str_replace("{name}", $clname, $zaktpl);
		$zaktpl = str_replace("{inn}", ($_REQUEST["inn"] == "null") ? "" : $_REQUEST["inn"], $zaktpl);
		$zaktpl = str_replace("{sname}", $clnames, $zaktpl);
		$zaktpl = str_replace("{adr}", $_REQUEST["adres"], $zaktpl);
		$zaktpl = str_replace("{clientname}", $clname . " " . $clnames, $zaktpl);
		$zaktpl = str_replace("{clientnamefull}", $clname . " " . $clnames, $zaktpl);
		$zaktpl = str_replace("{clienphone}",  $_REQUEST["phone"], $zaktpl);
		$zaktpl = str_replace("{clientmail}", $_REQUEST["mail"], $zaktpl);
		$zaktpl = str_replace("{zakcomment}", $_REQUEST["comment"], $zaktpl);
		$zaktpl = str_replace("{tovars}", $toXMLstr, $zaktpl);

		$fileAdr = __DIR__ . "/1s/orders/" . $zak_number . ".xml";
		file_put_contents($fileAdr, $zaktpl);

		$ftprez = sendToFtp($fileAdr, $zak_number);

		$mail_content .= "<strong>Имя:</strong> " . $_REQUEST["name"] . "<br/>";
		$mail_content .= "<strong>Телефон:</strong> " . $_REQUEST["phone"] . "<br/>";
		$mail_content .= "<strong>e-mail:</strong> " . $_REQUEST["mail"] . "<br/>";
		$mail_content .= "<strong>Адрес:</strong> " . $_REQUEST["adres"] . "<br/>";
		$mail_content .= "<strong>Комментарий:</strong> " . $_REQUEST["comment"] . "<br/>";
		// $mail_content .= "<strong>FTP:</strong> ".($ftprez)?"Загружен":"Не загружен"."<br/>";

		$mail_them = "Заказ с сайта";



		if (wp_mail($adr_to_send, $mail_them, $mail_content, $headers)) {

			wp_die(json_encode(array("send" => true)));
		} else {
			wp_die('Ошибка отправки!', '', 403);
		}
	} else {
		wp_die('НО-НО-НО!', '', 403);
	}
}

add_action('init', 'do_rewrite');
function do_rewrite(){
	// Правило перезаписи
	add_rewrite_rule( '^(obekt)/([^/]*)/?', 'index.php?pagename=$matches[1]&objnedv=$matches[2]', 'top' );
	
	add_rewrite_rule( '^(vtorichnaya)/([^/]*)/?', 'index.php?pagename=$matches[1]&onpage=$matches[2]', 'top' );
	add_rewrite_rule( '^(novostrojki)/([^/]*)/?', 'index.php?pagename=$matches[1]&onpage=$matches[2]', 'top' );
	add_rewrite_rule( '^(doma-uchastki-dachi)/([^/]*)/?', 'index.php?pagename=$matches[1]&onpage=$matches[2]', 'top' );
	add_rewrite_rule( '^(kommercheskaya)/([^/]*)/?', 'index.php?pagename=$matches[1]&onpage=$matches[2]', 'top' );
	

	// скажем WP, что есть новые параметры запроса
	add_filter( 'query_vars', function( $vars ){
		$vars[] = 'objnedv';
		$vars[] = 'onpage';
		return $vars;
	} );
}


// ------Шахматка


function to_log($id_kv, $action, $data) {
	global $wpdb;

	$k_info = $wpdb->get_results('SELECT * FROM `kn_ches_home` WHERE `id` = '.$id_kv);
	$k_info = $k_info[0];

	$main_data = $data;

	$main_data["id_kv"] = $id_kv;
	$main_data["action_manager"] = $_COOKIE["name"];
	$main_data["action"] = $action;
	$main_data["home"] = $k_info->home;
	$main_data["etazg"] = $k_info->etazg;
	$main_data["area"] = $k_info->area;
	$main_data["rooms"] = $k_info->rooms;

	$wpdb->insert('kn_ches_log', $main_data);

}


add_action('wp_ajax_shlogin', 'shlogin');
add_action('wp_ajax_nopriv_shlogin', 'shlogin');

function shlogin()
{
	if (empty($_REQUEST['nonce'])) {
		wp_die('0');
	}

	if (check_ajax_referer('NEHERTUTLAZIT', 'nonce', false)) {
		global $wpdb;
		$rez = $wpdb->get_results('SELECT * FROM `kn_ches_login` WHERE `pass` = "'.$_REQUEST["pass"].'" AND `login` ="'.$_REQUEST["login"].'"');

		if (empty($rez)) {
			wp_die('Логин / Пароль не верен!', '', 403);	
		} else {
			wp_die(json_encode($rez));
		}
	} else {
		wp_die('НО-НО-НО!', '', 403);
	}
}

add_action('wp_ajax_torezerv', 'torezerv');
add_action('wp_ajax_nopriv_torezerv', 'torezerv');

function torezerv()
{
	if (empty($_REQUEST['nonce'])) {
		wp_die('0');
	}

	if (check_ajax_referer('NEHERTUTLAZIT', 'nonce', false)) {
		global $wpdb;

		$prava = $wpdb->get_results('SELECT * FROM `kn_ches_login` WHERE `login` = "'.$_REQUEST["manager_login"].'"');

		$admin = false;
		if (!empty($prava) && ($prava[0]->status == 1))
			$admin = true;

		if (!$admin) {	
			$chec_phone = $wpdb->get_results('SELECT * FROM `kn_ches_home` WHERE `klient_phone` = "'.$_REQUEST["klient_tel"].'"');
		
			if (!empty($chec_phone)) {
				wp_die('Резерв по данному номеру телефона уже существует!', '', 403);
			}
		}

		$d = [ 
			'rezerv_price' => $_REQUEST["rezerv_price"],
			'rezerv_data' => date("Y-m-d"),
			'status' => "Резерв",
			'klient_phone' => $_REQUEST["klient_tel"],
			'klient_name' => $_REQUEST["klient_name"],
			'manager_name' => $_REQUEST["manager_name"],
			'manager_login' => $_REQUEST["manager_login"],
			'manager_phone' => $_REQUEST["manager_phone"],
			'info' => $_REQUEST["info"],
		];

		$update_rez = $wpdb->update('kn_ches_home',  
		$d, ['id' => $_REQUEST["kv_id"]]);

		if (!empty($update_rez)) {
			to_log($_REQUEST["kv_id"], "Оформлен резерв", $d);
			wp_die(true);
		} else {
			wp_die('При добавлении резерва возникла ошибка! '.$update_rez, '', 403);
		}

	} else {
		wp_die('НО-НО-НО!', '', 403);
	}
}

add_action('wp_ajax_update_rezerv', 'update_rezerv');
add_action('wp_ajax_nopriv_update_rezerv', 'update_rezerv');

function update_rezerv()
{
	if (empty($_REQUEST['nonce'])) {
		wp_die('0');
	}

	if (check_ajax_referer('NEHERTUTLAZIT', 'nonce', false)) {
		global $wpdb;

		$prava = $wpdb->get_results('SELECT * FROM `kn_ches_login` WHERE `login` = "'.$_REQUEST["manager_login"].'"');

		$admin = false;
		
		if (!empty($prava) && ($prava[0]->status == 1))
			$admin = true;

		if (!$admin) {	
			wp_die('У вас нет прав для редактирования!', '', 403);
		}

		$d = [ 
			'klient_phone' => $_REQUEST["klient_tel"],
			'klient_name' => $_REQUEST["klient_name"],
		];

		$update_rez = $wpdb->update('kn_ches_home',  
		$d, ['id' => $_REQUEST["kv_id"]]);

		if (!empty($update_rez)) {
			to_log($_REQUEST["kv_id"], "Данные обновлены", $d);
			wp_die(true);
		} else {
			wp_die('При обновлении резерва возникла ошибка! '.$update_rez, '', 403);
		}

	} else {
		wp_die('НО-НО-НО!', '', 403);
	}
}


add_action('wp_ajax_free', 'free');
add_action('wp_ajax_nopriv_free', 'free');

function free()
{
	if (empty($_REQUEST['nonce'])) {
		wp_die('0');
	}

	if (check_ajax_referer('NEHERTUTLAZIT', 'nonce', false)) {
		global $wpdb;
		$d =[ 
			'rezerv_price' => "",
			'rezerv_data' => 0,
			'status' => "Свободна",
			'klient_phone' => "",
			'klient_name' => "",
			'manager_name' => "",
			'manager_login' => "",
			'manager_phone' => "",
			'info' => "",
		];

		$update_rez = $wpdb->update('kn_ches_home',  
		$d, ['id' => $_REQUEST["kv_id"]]);

		if (!empty($update_rez)) {
			to_log($_REQUEST["kv_id"], "Резерв снят вручную", $d);
			wp_die(true);
		} else {
			wp_die('При обновлении статуса возникла ошибка! '.$_REQUEST["manager_login"], '', 403);
		}

	} else {
		wp_die('НО-НО-НО!', '', 403);
	}
}


add_action('wp_ajax_sale', 'sale');
add_action('wp_ajax_nopriv_sale', 'sale');

function sale()
{
	if (empty($_REQUEST['nonce'])) {
		wp_die('0');
	}

	if (check_ajax_referer('NEHERTUTLAZIT', 'nonce', false)) {
		global $wpdb;
		$d = [ 
			'status' => "Продана",
			'scrou' => $_REQUEST["escrou"],
		];

		$update_rez = $wpdb->update('kn_ches_home',  
		$d, ['id' => $_REQUEST["kv_id"]]);

		if (!empty($update_rez)) {
			to_log($_REQUEST["kv_id"], "Квартира продана", $d);
			wp_die(true);
		} else {
			wp_die('При обновлении статуса возникла ошибка! '.$_REQUEST["manager_login"], '', 403);
		}

	} else {
		wp_die('НО-НО-НО!', '', 403);
	}
}

add_action('wp_ajax_uhred', 'uhred');
add_action('wp_ajax_nopriv_uhred', 'uhred');

function uhred()
{
	if (empty($_REQUEST['nonce'])) {
		wp_die('0');
	}

	if (check_ajax_referer('NEHERTUTLAZIT', 'nonce', false)) {
		global $wpdb;
		
		$d = [ 
			'status' => "Резерв учередителя",
			'rezerv_data' => date("Y-m-d"),
			'rezerv_price' => $_REQUEST["rezerv_price"],
		];

		$update_rez = $wpdb->update('kn_ches_home',  
		$d, ['id' => $_REQUEST["kv_id"]]);

		if (!empty($update_rez)) {
			to_log($_REQUEST["kv_id"], "Резерв учередителя", $d);
			wp_die(true);
		} else {
			wp_die('При обновлении статуса возникла ошибка! '.$_REQUEST["manager_login"], '', 403);
		}

	} else {
		wp_die('НО-НО-НО!', '', 403);
	}
}

add_action('wp_ajax_ruk', 'ruk');
add_action('wp_ajax_nopriv_ruk', 'ruk');

function ruk()
{
	if (empty($_REQUEST['nonce'])) {
		wp_die('0');
	}

	if (check_ajax_referer('NEHERTUTLAZIT', 'nonce', false)) {
		global $wpdb;
		$d = [ 
			'status' => "Резерв руководителя",
			'rezerv_data' => date("Y-m-d"),
			'rezerv_price' => $_REQUEST["rezerv_price"],
		];

		$update_rez = $wpdb->update('kn_ches_home',  
		$d, ['id' => $_REQUEST["kv_id"]]);

		if (!empty($update_rez)) {
			to_log($_REQUEST["kv_id"], "Резерв руководителя", $d);
			wp_die(true);
		} else {
			wp_die('При обновлении статуса возникла ошибка! '.$_REQUEST["manager_login"], '', 403);
		}

	} else {
		wp_die('НО-НО-НО!', '', 403);
	}
}

add_filter('wpseo_title', function($title){
	if (is_page(63)) {
		global $wpdb;
		$obj_nedv_id = get_query_var("objnedv");
		$object = $wpdb->get_results( "SELECT * FROM `kn_objnedv` WHERE `row_id` = '".$obj_nedv_id."'" );
		$object = $object[0];

		$sitename = empty($object->site_name)?$object->type." ул. ".$object->street:$object->site_name;

		$sitename = $object->deistvie . " - " . $sitename . " - Курская недвижимость";

		$title = $sitename;
	}            
	return $title;
}, 10, 1);


add_filter('wpseo_metadesc', function($metadesc){
	
	if (is_page(63)) {
		global $wpdb;
		$obj_nedv_id = get_query_var("objnedv");
		$object = $wpdb->get_results( "SELECT * FROM `kn_objnedv` WHERE `row_id` = '".$obj_nedv_id."'" );
		$object = $object[0];

		$sitename = empty($object->site_name)?$object->type." ул. ".$object->street:$object->site_name;

		$prefix = "Предлагаем";
		if ($object->deistvie === "Продажа")
			$prefix = "Агентство Курская недвижимость предлагает к покупке ";

		if ($object->deistvie === "Аренда")
			$prefix = "Агентство Курская недвижимость предлагает арендовать ";

		$sitename = $prefix . $sitename . ". Наши специалисты помогут с оформлением сделки.";
		
		$metadesc = $sitename;
	}
	
	return "$metadesc";
}, 10, 1);


add_filter( 'wpseo_sitemap_page_content', 'add_archive_URL' );

function add_archive_URL() {

		global $wpdb;
		$q = 'SELECT * FROM `kn_objnedv` ';
        $allpage = $wpdb->get_results($q);
		
		$url = "";
		$index = 0;
		foreach ($allpage as $us) {
			$urlMain = get_the_permalink(63).$us->row_id;

			// $date = get_post_modified_time( 'Y-m-d h:i:s', true, 63);
			$date = date( 'Y-m-d h:i:s' );
            $last_mod = YoastSEO()->helpers->date->format( $date );

			$url .= "\t<url>\n";
			$url .= "\t\t<loc>$urlMain</loc>\n";
			$url .= "\t\t<lastmod>$last_mod</lastmod>\n";
			$url .= "\t</url>\n";

			$index++;
		}
			

	return $url;

}