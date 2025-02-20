<!-- В этом файле описываем все  всплывающие окна -->

<!-- Popup-JS Оставить заявку -->
<div class="popup popup_callback">
	<div class="popup__content">
		<div class="popup__body">
			<div class="popup__close"></div>
			<div class="popup__item d-flex">
				<img src="<?php echo get_template_directory_uri(); ?>/img/popup.jpg" loading="lazy" alt="<? the_title();?>">
				<div class="popup__form-block universal_form">
					<h2>Заявка на обратный звонок</h2>
					<div class="SendetMsg" style="display:none;">
						Ваше сообщение успешно отправлено.
					</div>
					<div class="headen_form_blk">
						<p>Оставьте заявку и мы свяжемся с вами в течении 15 минут</p>  
						<form action="#" class="popup__form universal_send_form">
							<div class="form__line">
								<input autocomplete="off" type="text" name="name" data-error="Заполните поля" data-value="Имя*" class="popup__form-input input _req _name">
								<input autocomplete="off" type="text" name="tel" data-error="Заполните поля" data-value="Телефон*" class="popup__form-input input _phone _req _tel">
							</div>

							<?php get_template_part('template-parts/policy-ch');?> 
							
							<br>
							<br>
							<button type="button" class="popup__form_btn form-btn u_send btn">Отправить заявку</button>
						</form>
					</div> 
				</div>
			</div>
		</div>
	</div>
</div>
<!-- <a href="#callback" class="header__popup-link _popup-link">ЗАКАЗАТЬ ЗВОНОК</a> -->
<!-- ==================================================================================================================================== -->

<!-- Popup-JS Консультация по объекту -->
<div class="popup popup_object">
	<div class="popup__content">
		<div class="popup__body">
			<div class="popup__close"></div>
			<div class="popup__item d-flex">
				<img src="<?php echo get_template_directory_uri(); ?>/img/popup.jpg" loading="lazy" alt="<? the_title();?>">
				<div class="popup__form-block universal_form">
					<h2>Интересует <span class = "obj_in_win_name"></span></h2>
					<div class="SendetMsg" style="display:none;">
						Ваше сообщение успешно отправлено.
					</div>
					<div class="headen_form_blk">
						<p>Оставьте заявку и мы свяжемся с вами в течении 15 минут</p> 
						<form action="#" class="popup__form universal_send_form">
							<div class="form__line">
								<input type="hidden" name="objname" value = "" id = "form_param_obj_name" class = "_objname">
								<input type="hidden" name="obj" value = "" id = "form_param_obj_id" class = "_obj">
								<input autocomplete="off" type="text" name="name" data-error="Заполните поля" data-value="Имя*" class="popup__form-input input _req _name">
								<input autocomplete="off" type="text" name="tel" data-error="Заполните поля" data-value="Телефон*" class="popup__form-input input _phone _req _tel">
							</div>
							<p>Заполняя данную форму вы соглашаетесь с <a href="<?php echo get_permalink(452); ?>">политикой конфиденциальности</a></p>
							<button type="button" class="popup__form_btn form-btn u_send btn">Отправить заявку</button>
						</form>
					</div> 
				</div>
			</div>
		</div>
	</div>
</div>
<!-- <a href="#callback" class="header__popup-link _popup-link">ЗАКАЗАТЬ ЗВОНОК</a> -->
<!-- ==================================================================================================================================== -->

<div style="display: none;">
	<div class="box-modal" id="messgeModal">
		<div class="box-modal_close arcticmodal-close"><? _e("закрыть", "rubex"); ?></div>

		<div class="modalline" id="lineIcon">
		</div>

		<div class="modalline" id="lineMsg">
		</div>
	</div>
</div>

<div style="display: none;">
	<div class="box-modal box-modal-new box-modal-new__cust" id="question">
		<div class="box-modal_close box-modal_close_new arcticmodal-close">X</div>
		<img src="<?php bloginfo("template_url") ?>/img/similar-01.jpg" loading="lazy" />
		<div class="formArctikBlk mod-zagr-tur">
			<h2>Заказать звонок <span class='tkName'></span></h2>
			<p>Наши специалисты свяжутся с Вами в течение 15 минут</p>

			<form action="#" class="form-question">
				<div class="SendetMsg" style="display:none">
					Ваше сообщение успешно отправлено.
				</div>
				<div class="headen_form_blk">
					<input type="text" name="name" placeholder="Имя*" id="form-question-name" class="form-question__input input">
					<input type="tel" name="tel" placeholder="Телефон*" id="form-question-tel" class="form-question__input input">
				</div>
				<div class="callback-note mod-zagr-tur__note">Нажимая на кнопку "Отправить", вы соглашаетесь с <a class="tdu" href="<?php echo get_permalink(1312); ?>">условиями обработки персональных данных</a>.</div>
				<button type="submit" class="newButton btn">Отправить</button>
			</form>

		</div>
	</div>
</div>