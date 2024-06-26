<header id="header" class="header">
	<div class="header__container container">

		<div class="header__row d-flex">
			<a href="<? bloginfo("url"); ?>" class="header__logo logo-icon"></a>

			<div class="header__nav-block"> 

				<div class="header__soc-block">
					<div class="header__soc-block-icon soc-block-icon">
						<a href="<?php echo carbon_get_theme_option('as_vk'); ?>" class="soc-block-icon-link soc-icon-2"></a>
						<a href="<?php echo carbon_get_theme_option('as_telegr'); ?>" class="soc-block-icon-link hide_in_desctop soc-icon-3"></a>
						<a href="<?php echo carbon_get_theme_option('as_whatsapp'); ?>" class="soc-block-icon-link hide_in_desctop soc-icon-4"></a>
					</div>
					<p>Мы в соцсетях</p> 
				</div>

				<div class="header__callback d-flex">
					<a href="tel:+<? $tel = carbon_get_theme_option("as_phone_1"); echo preg_replace('/[^0-9]/', '', $tel); ?>"><? echo $tel; ?></a>
					<a href="#callback" class="header__popup-link _popup-link">Заказать звонок</a>
				</div>
				<a href="tel:+<? echo preg_replace('/[^0-9]/', '', $tel); ?>" class="mob-callback__phone"></a>

				<div class="header__menu-burg">
					<p>Меню</p>
					<div class="menu__icon icon-menu">
						<span></span>
						<span></span>
						<span></span>
					</div>
				</div>

			</div>
		</div>

	</div>
</header>

<nav class="mob-menu">
	<h3 class="mob-menu__title">Информация</h3>
	<?php wp_nav_menu( array('theme_location' => 'menu_1','menu_class' => 'mob-menu__list',
	'container_class' => 'mob-menu__list','container' => false )); ?> 
	<h3 class="mob-menu__title">Вся недвижимость</h3>
	<?php wp_nav_menu( array('theme_location' => 'menu_2','menu_class' => 'mob-menu__list',
	'container_class' => 'mob-menu__list','container' => false )); ?> 
	<h3 class="mob-menu__title">Актуальные предложения</h3>
	<?php wp_nav_menu( array('theme_location' => 'menu_3','menu_class' => 'mob-menu__list',
	'container_class' => 'mob-menu__list','container' => false )); ?> 
</nav>