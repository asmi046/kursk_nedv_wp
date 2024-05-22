<section id="consult-form" class="consult-form ">
	<div class="container">
		<h2>Получите бесплатную консультацию</h2>
		<p>Оставьте свои контактные данные и получите бесплатную консультацию по любым вопросам</p>
		<div class="consult-form__form-block universal_form">
			<div class="consult-form__form-block-position"></div> 
			<div class="consult-form__form-block-img">
				<img src="<?php echo get_template_directory_uri();?>/img/consultation.png" alt="">
			</div>
			<form action="#" class="consult-form__form d-flex universal_send_form">
				
				<div class="headen_form_blk free_consult">
					<input type="text" placeholder="Имя*" data-error="Заполните поля" data-value="Имя*" id="form-consult-name" class="consult-form__form-input input _req _name">
					<input type="tel" name="tel" placeholder="Телефон*" data-error="Заполните поля" data-value="Телефон*" id="form-consult-tel" class="consult-form__form-input input _phone _req _tel">
					<label for="f_policy" class="checkbox_label">
						<input checked type="checkbox" name="policy" id="f_policy" class="_req">
						<span>Отправляя заявку, вы соглашаетесь на <a href="<?echo get_the_permalink(3);?>">обработку персональных данных</a></span>
					</label>
				</div>
				<div class="SendetMsg" style="display:none;">
					Ваше сообщение успешно отправлено.
				</div>
				

				<button class="consult-form__form-btn consultBtn btn u_send">Отправить</button>
			</form>
			
		</div>
	</div>
</section>