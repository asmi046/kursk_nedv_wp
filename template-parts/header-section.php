		<header id="header" class="header">
			<div class="header__container container">

				<div class="header__row d-flex">
					<a href="index.html" class="header__logo logo-icon"></a>

					<div class="header__nav-block">

						<div class="header__soc-block">
							<div class="header__soc-block-icon soc-block-icon">
								<a href="#" class="soc-block-icon-link soc-icon-1"></a>
								<a href="#" class="soc-block-icon-link soc-icon-2"></a>
								<a href="#" class="soc-block-icon-link soc-icon-3"></a>
								<a href="#" class="soc-block-icon-link soc-icon-4"></a>
							</div>
							<p>Мы в соцсетях</p> 
						</div>

						<div class="header__callback d-flex">
							<a href="tel:84951700000">8 800 488 22 22</a>
							<a href="#callback" class="header__popup-link _popup-link">Заказать звонок</a>
						</div>
						<a href="tel:8 800 488 22 22" class="mob-callback__phone"></a>

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
			<?php wp_nav_menu( array('theme_location' => 'menu_1','menu_class' => 'mob-menu__list',
			'container_class' => 'mob-menu__list','container' => false )); ?> 
			<?php wp_nav_menu( array('theme_location' => 'menu_2','menu_class' => 'mob-menu__list',
			'container_class' => 'mob-menu__list','container' => false )); ?> 
			<?php wp_nav_menu( array('theme_location' => 'menu_3','menu_class' => 'mob-menu__list',
			'container_class' => 'mob-menu__list','container' => false )); ?> 
		</nav>