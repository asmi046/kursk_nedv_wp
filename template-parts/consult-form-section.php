<section id="consult-form" class="consult-form">
	<div class="container">
		<h2>Получите бесплатную консультацию</h2>
		<p>Оставьте свои контактные данные и получите бесплатную консультацию по любым вопросам</p>
		<div class="consult-form__form-block">
			<div class="consult-form__form-block-position"></div> 
			<div class="consult-form__form-block-img">
				<img src="<?php echo get_template_directory_uri();?>/img/consultation.png" alt="">
			</div>
			<form action="#" class="consult-form__form d-flex">
				<input type="text" placeholder="Имя*" id="form-consult-name" class="consult-form__form-input input">
				<div class="headen_form_blk">
					<input type="tel" placeholder="Телефон*" id="form-consult-tel" class="consult-form__form-input input">
				</div>
				<div class="SendetMsg" style="display:none;">
					<input type="tel" placeholder="Заявка отправлена!" class="consult-form__form-input input" disabled>
				</div>
				<button class="consult-form__form-btn consultBtn btn">Отправить</button>
			</form>
			<p>* Отправляя заявку, вы соглашаетесь на обработку персональных данных</p>
		</div>
	</div>
</section>