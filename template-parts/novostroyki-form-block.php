<form method = "GET" action="<?echo bloginfo("url")."/novostrojki"; ?>" class="info__form-block">
	<div class="info__form-block-col">
		<div class="info__form-block-sel form-block__item">
			<p class="info__form-block-sub">Количество комнат</p>
			<select name="rooms" class="form">
				<option value = "Выбрать" disabled <? echo empty($_REQUEST["rooms"])?"selected = 'selected'":"" ?>>Выбрать</option>
				<option value="1" <? echo ($_REQUEST["rooms"] == "1")?"selected = 'selected'":"" ?>>1</option>
				<option value="2" <? echo ($_REQUEST["rooms"] == "2")?"selected = 'selected'":"" ?>>2</option>
				<option value="3" <? echo ($_REQUEST["rooms"] == "3")?"selected = 'selected'":"" ?>>3</option>
				<option value="4" <? echo ($_REQUEST["rooms"] == "4")?"selected = 'selected'":"" ?>>4</option>
				<option value="5" <? echo ($_REQUEST["rooms"] == "5")?"selected = 'selected'":"" ?>>5</option>
			</select>
		</div>

		<div class="info__form-block-sel">
			<p class="info__form-block-sub">Этажей в доме</p>
			<select name="etazgei" class="form" placeholder="Выбрать">
				<option value = "Выбрать" disabled <? echo empty($_REQUEST["etazgei"])?"selected = 'selected'":"" ?>>Выбрать</option>
				<option value="1" <? echo ($_REQUEST["etazgei"] == "1")?"selected = 'selected'":"" ?>>1</option>
				<option value="2" <? echo ($_REQUEST["etazgei"] == "2")?"selected = 'selected'":"" ?>>2</option>
				<option value="3" <? echo ($_REQUEST["etazgei"] == "3")?"selected = 'selected'":"" ?>>3</option>
				<option value="4" <? echo ($_REQUEST["etazgei"] == "4")?"selected = 'selected'":"" ?>>4</option>
				<option value="5" <? echo ($_REQUEST["etazgei"] == "5")?"selected = 'selected'":"" ?>>5</option>
				<option value="6" <? echo ($_REQUEST["etazgei"] == "6")?"selected = 'selected'":"" ?>>6</option>
				<option value="9" <? echo ($_REQUEST["etazgei"] == "9")?"selected = 'selected'":"" ?>>9</option>
				<option value="12" <? echo ($_REQUEST["etazgei"] == "12")?"selected = 'selected'":"" ?>>12</option>
				<option value="10" <? echo ($_REQUEST["etazgei"] == "10")?"selected = 'selected'":"" ?>>10</option>
				<option value="17" <? echo ($_REQUEST["etazgei"] == "17")?"selected = 'selected'":"" ?>>17</option>
			</select>
		</div>

		<div class="info__form-block-inp">
			<p class="info__form-block-sub">Cтоимость</p>
			<div class="info__form-block-inp-number">
				<input name = "priceot" type="number" placeholder="От" class="input" value = "<? echo $_REQUEST["priceot"]; ?>">
				<input name = "pricedo" type="number" placeholder="До" class="input" value = "<? echo $_REQUEST["pricedo"]; ?>">
			</div>
		</div>

		<div class="info__form-block-inp">
			<p class="info__form-block-sub">Площадь</p>
			<div class="info__form-block-inp-number">
				<input name = "areaot" type="number" placeholder="От" class="input" value = "<? echo $_REQUEST["areaot"]; ?>">
				<input name = "areado" type="number" placeholder="До" class="input" value = "<? echo $_REQUEST["areado"]; ?>">
			</div>
		</div>

		<div class="info__form-block-sel info__form-block-sel_last">
			<p class="info__form-block-sub">Район</p>
			<select value = "<? echo $_REQUEST["raion"]; ?>" name = "raion" class="form">
				<option value = "Выбрать" disabled <? echo empty($_REQUEST["raion"])?"selected = 'selected'":"" ?>>Выбрать</option>
				<option value="Центральный" <? echo ($_REQUEST["raion"] == "Центральный")?"selected = 'selected'":"" ?> >Центральный</option>
				<option value="Сеймский" <? echo ($_REQUEST["raion"] == "Сеймский")?"selected = 'selected'":"" ?> >Сеймский</option>
				<option value="Железнодорожный" <? echo ($_REQUEST["raion"] == "Железнодорожный")?"selected = 'selected'":"" ?> >Железнодорожный</option>
			</select>
		</div>
	</div>

	<div class="info__form-block-col">
		<div class="info__form-block-inp info__form-block-inp_bottom">
			<input value = "<? echo $_REQUEST["searcstr"]; ?>" name = "searcstr" type="text" placeholder="Район, улица, дом" class="input">
		</div>
		<button name = "doserch" type = "submit" class="info__form-block-inp-btn btn">Применить</button>
	</div>

</form>