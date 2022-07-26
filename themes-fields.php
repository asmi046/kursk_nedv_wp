<?

// Описание полей для Carbon_Fields производим только в этом файле
// 1. В начале идет описание полей - Настройки темы  далее категорий (если необходимо) в конце аблонов страниц и записей
// 2. Префиксы проставляем каждый раз новые осмысленно по имени проекта 
// 3. Для Полей которые входят в состав составново схема именования следующая <Общий префикс>_<название составного поля>_<имя поля>
// 4. Название секций Так же придумываем осмысленные на русском языке чтобы небыло сплошных Доп. полей
// 5. Каждый блок комментируем


use Carbon_Fields\Container;
use Carbon_Fields\Field; 

Container::make( 'theme_options', __( 'Настройки темы', 'crb' ) )
    ->add_tab('Главная', array(
      // Field::make( 'image', 'as_logo', 'Логотип в шапке')
      //   ->set_width(30),
      // Field::make( 'image', 'as_logo_white', 'Логотип в подвале')
      //   ->set_width(30),
      Field::make('text', 'about_home_title', 'Заголовок на главной')
      // Field::make('rich_text', 'about_home', 'О нашей компании')
    ))
    ->add_tab('Актуальные предложения', array(
      Field::make('complex', 'complex_suggest', 'Выводим Актуальные предложения')
      // ->set_max(3) // Можно будет выбрать только 5 постов
      ->add_fields(array(
        Field::make('image', 'img_suggest', 'Фото')
        ->set_width(10),
        Field::make('text', 'title_suggest', 'Заголовок')   
        ->set_width(45),
        Field::make('text', 'link_suggest', 'Ссылка')   
        ->set_width(30),
        ))
    ))
      ->add_tab('Команда', array(
      Field::make('complex', 'complex_team', 'Выводим карточки Команды')
      // ->set_max(3) // Можно будет выбрать только 5 постов
      ->add_fields(array(
        Field::make('image', 'img_team', 'Фото')
        ->set_width(10),
        Field::make('text', 'name_team', 'Имя')   
        ->set_width(10),
        Field::make('text', 'surname_team', 'Фамилия')   
        ->set_width(10),
        Field::make('text', 'special_team', 'Стаж работы')   
        ->set_width(10),
        Field::make('text', 'phone_team', 'Телефон')   
        ->set_width(15),
        Field::make('text', 'e-mail_team', 'E-mail')   
        ->set_width(15),
        Field::make("checkbox", "offer_sticker", "Стикер") 
        ->help_text('Выводим Стикер"')
        ->set_width( 5 ),
        )) 
    ))
      ->add_tab('Отзывы', array(
      Field::make('complex', 'complex_reviews', 'Выводим Отзывы')
      // ->set_max(3) // Можно будет выбрать только 5 постов
      ->add_fields(array(
        Field::make('image', 'img_reviews', 'Фото')
        ->set_width(10),
        Field::make('text', 'name_reviews', 'Имя')   
        ->set_width(10),
        Field::make('text', 'data_reviews', 'Дата')   
        ->set_width(10),
        Field::make('text', 'descp_reviews', 'Текст')   
        ->set_width(30),
        Field::make('text', 'link_reviews', 'Ссылка')   
        ->set_width(10),
        )) 
    ))
    ->add_tab('Контакты', array(
        Field::make( 'text', 'as_company', __( 'Название' ) )
          ->set_width(50),
        Field::make( 'text', 'as_schedule', __( 'Режим работы' ) )
          ->set_width(50),
        Field::make( 'text', 'as_phone_1', __( 'Телефон' ) )
          ->set_width(50),
        Field::make( 'text', 'as_phone_2', __( 'Телефон дополнительный' ) )
          ->set_width(50),
        Field::make( 'text', 'as_email', __( 'Email' ) )
          ->set_width(50),
        Field::make( 'text', 'as_email_send', __( 'Email для отправки' ) ) 
          ->set_width(50),
        Field::make( 'text', 'as_inn', __( 'ИНН' ) )
          ->set_width(50),
        Field::make( 'text', 'as_orgn', __( 'ОРГН' ) )
          ->set_width(50),
        Field::make( 'text', 'as_kpp', __( 'КПП' ) )
          ->set_width(50),
        Field::make( 'text', 'as_address', __( 'Адрес' ) )
          ->set_width(50),
        Field::make( 'text', 'as_bik', __( 'БИК' ) )
          ->set_width(50),
        Field::make( 'text', 'as_rs', __( 'Р/С' ) )
          ->set_width(50),
        Field::make( 'text', 'as_ks', __( 'К/С' ) )
          ->set_width(50),
        Field::make( 'text', 'as_bank', __( 'БАНК' ) )
          ->set_width(50),
        Field::make( 'text', 'as_insta', __( 'instagram' ) )
          ->set_width(50),
        Field::make( 'text', 'as_face', __( 'facebook' ) )
          ->set_width(50),
        Field::make( 'text', 'as_vk', __( 'Вконтакте' ) )
          ->set_width(50),
        Field::make( 'text', 'as_telegr', __( 'telegram' ) )
          ->set_width(50),
        Field::make( 'text', 'as_whatsapp', __( 'whatsapp' ) )
          ->set_width(50),
        Field::make('text', 'map_point', 'Координаты карты')
          ->set_width(50),
        Field::make('text', 'text_map', 'Текст метки карты')
          ->set_width(50),
    ) );

  Container::make('post_meta', 'page-files', 'Файлы')
  ->show_on_template(array('page-pyatnitsky-forest.php'))
  ->add_fields(array(
    Field::make('complex', 'complex_file_list', 'Добавить файл')
      // ->set_max(3) // Можно будет выбрать только 5 постов
      ->add_fields(array(
        Field::make("file", "file_list", "Файл") 
          ->set_width(15)
          ->set_value_type('url'), // сохранить в метаполе ссылку на файл
        Field::make('text', 'file_title', 'Имя файла')
          ->set_width(85),
      )),
  )); 

  Container::make('post_meta', 'osn_prop', 'Поля для страницы услуг')
  ->show_on_template(array('page-sudpred.php'))
  ->add_fields(array(
    Field::make( 'image', 'banner_img', 'Банер' )->set_width(100)->set_value_type('url'),
    Field::make( 'text', 'sub_title', __( 'Подзаголовок для страницы' ) )->set_width(100),
    Field::make( 'text', 'page_h2_title', __( 'Заголовок h2 под текстом' ) )->set_width(100),
    Field::make( 'image', 'usl_banner_img', 'Картинка напротив списка услуг' )->set_width(100)->set_value_type('url'),
    Field::make( 'complex', 'complex_all_usl', 'Список услуг')
    ->add_fields(array(
       Field::make( 'text', 'usl_name', __( 'Название услуги' ) )->set_width(50),
       Field::make( 'text', 'usl_text', __( 'Описание услуги' ) )->set_width(50),
    )),
  )); 

  //   Container::make('post_meta', 'ultra_product_cr', 'Характеристики товара')
  //   ->show_on_post_type(array( 'ultra'))
  //     ->add_fields(array(   
  //     Field::make('textarea', 'offer_smile_descr', 'Краткое описание')->set_width(100),
  //     // Field::make('text', 'offer_name', 'Название товара')->set_width(30),
  //     // Field::make('text', 'offer_label', 'Метка на товаре')->set_width(30),
  //     Field::make('text', 'offer_weight', 'Вес')->set_width(50),
  //     // Field::make('text', 'offer_allsearch', 'Все артикулы для поиска')->set_width(50),
  //     // Field::make('text', 'offer_siries', 'Серия (для сопутствующих)')->set_width(30),
  //     Field::make('text', 'offer_sticker', 'Стикер')->set_width(50), 
  //     Field::make('text', 'offer_price', 'Цена')->set_width(50),
  //     Field::make('text', 'offer_number', 'Колличество')->set_width(50),
  //     Field::make('text', 'offer_sku', 'Артикул (Базовый)')->set_width(50),
  //     // Field::make('text', 'offer_benefit', 'Выгода')->set_width(50),
  //     Field::make('rich_text', 'prod_descrip', 'Описание товара')->set_width(100),
  //     Field::make('text', 'offer_calories', 'Калории')->set_width(50),
  //     Field::make('text', 'offer_protein', 'Белки')->set_width(50),
  //     Field::make('text', 'offer_fats', 'Жиры')->set_width(50),
  //     Field::make('text', 'offer_carbohyd', 'Углеводы')->set_width(50),
        
  //     Field::make( 'complex', 'offer_picture', "Галерея товара" )
  //     ->add_fields( array(
  //       Field::make('image', 'gal_img', 'Изображение' )->set_width(30),
  //       Field::make('text', 'gal_img_sku', 'ID для модификации')->set_width(30),
  //       Field::make('text', 'gal_img_alt', 'alt и title')->set_width(30)        
  //     ) ),

  // ));


?>