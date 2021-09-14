		<footer id="footer" class="footer">
			<div class='footer__container container'>

				<div class="footer__row d-flex">
					
					<?php wp_nav_menu( array('theme_location' => 'menu_2','menu_class' => 'footer__menu',
					'container_class' => 'mob-menu__list','container' => false )); ?> 
					<?php wp_nav_menu( array('theme_location' => 'menu_3','menu_class' => 'footer__menu',
					'container_class' => 'mob-menu__list','container' => false )); ?> 
					<?php wp_nav_menu( array('theme_location' => 'menu_1','menu_class' => 'footer__menu',
					'container_class' => 'mob-menu__list','container' => false )); ?> 

					<div class="footer__contact">
						<div class="header__callback d-flex">
							<a href="tel:84951700000">8 800 488 22 22</a>
							<a href="#callback" class="header__popup-link _popup-link">Заказать звонок</a>
						</div>
						<div class="footer__soc-block">
							<div class="footer__soc-block-icon soc-block-icon">
								<a href="#" class="soc-block-icon-link soc-icon-1"></a>
								<a href="#" class="soc-block-icon-link soc-icon-2"></a>
								<a href="#" class="soc-block-icon-link soc-icon-3"></a>
								<a href="#" class="soc-block-icon-link soc-icon-4"></a>
							</div>
							<p>Мы в соцсетях</p>
						</div>
					</div>

				</div>

				<div class="footer__line"></div>

				<p class="footer__policy">©2010-2021 Компания «Курская недвижимость ». Все права защищены. При использовании
					материалов гиперссылка
				обязательна.</p>

			</div>
		</footer>
	</div>

	<?php wp_footer(); ?>
</body>
</html>