<div class="sell-pass-info__form-block">
	<p></p>
	<div class="universal_form">
		<div class="SendetMsg" style="display:none;">
			Ваше сообщение успешно отправлено.
		</div>
		<div class="headen_form_blk">
			<form action="#" class="sell-pass-info__form universal_send_form">
				<div class="form__line">
					<input autocomplete="off" type="text" name="name" data-error="Заполните поля" data-value="Имя*" class="sell-pass-info__form-input input _req _name">
					<input autocomplete="off" type="text" name="tel" data-error="Заполните поля" data-value="Телефон*" class="sell-pass-info__form-input input _phone _req _tel">
				</div>
				<label for="f_policy" class="checkbox_label checkbox_label_white_bg">
						<input checked type="checkbox" name="policy" id="f_policy" class="_req">
						<span>Отправляя заявку, вы соглашаетесь на <a href="<?echo get_the_permalink(3);?>">обработку персональных данных</a></span>
				</label>
				<br>
				<br>
				<button type="button" class="sell-pass-info__form-btn form-btn u_send btn">Получить бесплатную консультацию</button>
			</form> 
			
		</div>
	</div>
</div>