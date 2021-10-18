<form action="#" class="info__form-block">

	<div class="info__form-block-col">
		<div class="info__form-block-sel form-block__item">
			<p class="info__form-block-sub">Количество комнат</p>
			<select name="form[]" class="form">
				<option value="1" selected="selected">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
			</select>
		</div>

		<div class="info__form-block-sel">
			<p class="info__form-block-sub">Этажей в доме</p>
			<select name="form[]" class="form">
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5" selected="selected">5</option>
			</select>
		</div>

		<div class="info__form-block-inp">
			<p class="info__form-block-sub">Cтоимость</p>
			<div class="info__form-block-inp-number">
				<input type="number" placeholder="От" class="input">
				<input type="number" placeholder="До" class="input">
			</div>
		</div>

		<div class="info__form-block-inp">
			<p class="info__form-block-sub">Площадь</p>
			<div class="info__form-block-inp-number">
				<input type="number" placeholder="От" class="input">
				<input type="number" placeholder="До" class="input">
			</div>
		</div>

		<div class="info__form-block-sel info__form-block-sel_last">
			<p class="info__form-block-sub">Район</p>
			<select name="form[]" class="form">
				<option value="1" selected="selected">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
			</select>
		</div>
	</div>

	<div class="info__form-block-col">
		<div class="info__form-block-inp info__form-block-inp_bottom">
			<input type="text" placeholder="Район, улица, дом" class="input">
		</div>
		<button class="info__form-block-inp-btn btn">Показать 1000 Вариантов</button>
	</div>

</form>