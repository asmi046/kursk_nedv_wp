// Файлы Java Script -----------------------------------------------------------------------------------------------------

//BodyLock для Popup на JS
// const body = document.querySelector("body");

function body_lock(delay) {
	let body = document.querySelector("body");
	if (body.classList.contains('lock')) {
		body_lock_remove(delay);
	} else {
		body_lock_add(delay);
	}
}
function body_lock_remove(delay) {
	let body = document.querySelector("body");
	if (unlock) {
		let lock_padding = document.querySelectorAll("._lp");
		setTimeout(() => {
			for (let index = 0; index < lock_padding.length; index++) {
				const el = lock_padding[index];
				el.style.paddingRight = '0px';
			}
			body.style.paddingRight = '0px';
			body.classList.remove("lock");
		}, delay);

		unlock = false;
		setTimeout(function () {
			unlock = true;
		}, delay);
	}
}
function body_lock_add(delay) {
	let body = document.querySelector("body");
	if (unlock) {
		let lock_padding = document.querySelectorAll("._lp");
		for (let index = 0; index < lock_padding.length; index++) {
			const el = lock_padding[index];
			el.style.paddingRight = window.innerWidth - document.querySelector('.wrapper').offsetWidth + 'px';
		}
		body.style.paddingRight = window.innerWidth - document.querySelector('.wrapper').offsetWidth + 'px';
		body.classList.add("lock");

		unlock = false;
		setTimeout(function () {
			unlock = true;
		}, delay);
	}
}

sendZobj.addEventListener('click', (e) => { 
	e.preventDefault();



	let requestURL = "//xn--46-6kcaio0anxtsby.xn--p1ai/modules/m_boxreg.php?get_xml=site&token=FTUYGg45r74r__rhtg75ueVGH4t3___43f&iii="+formCallbackName.value+"&tel1="+formCallbackTel.value+"&realty_id="+formLot.value;
	const xhr = new XMLHttpRequest();
	xhr.open("get", requestURL);
	xhr.onload = () => {
		console.log("Ok");
	}

	xhr.onerror = () => {
		console.log("error");
	}


	xhr.send();
});

// Popup JS
let unlock = true;
let popup_link = document.querySelectorAll('._popup-link');
let popups = document.querySelectorAll('.popup');
for (let index = 0; index < popup_link.length; index++) {
	const el = popup_link[index];
	el.addEventListener('click', function (e) {
		if (unlock) {
			let lot = el.getAttribute('data-lot');
			popup_open(lot);
		}
		e.preventDefault();
	})
}
for (let index = 0; index < popups.length; index++) {
	const popup = popups[index];
	popup.addEventListener("click", function (e) {
		if (!e.target.closest('.popup__body')) {
			popup_close(e.target.closest('.popup'));
		}
	});
}
function popup_open(item) {
	// let activePopup = document.querySelectorAll('.popup._active');
	// if (activePopup.length > 0) {
	// 	popup_close('', false);
	// }
	let curent_popup = document.querySelector('.popup_callback');
	if (curent_popup) {
		
		// if (video != '' && video != null) {
		// 	let popup_video = document.querySelector('.popup_video');
		// 	popup_video.querySelector('.popup__video').innerHTML = '<iframe src="https://www.youtube.com/embed/' + video + '?autoplay=1"  allow="autoplay; encrypted-media" allowfullscreen></iframe>';
		// }
		// if (!document.querySelector('.menu__body._active')) {
		// 	body_lock_add(500);
		// }

		formLot.value = item;
		curent_popup.classList.add('_active');
		history.pushState('', '', '#' + item);
	}
}
function popup_close(item, bodyUnlock = true) {
	if (unlock) {
		if (!item) {
			for (let index = 0; index < popups.length; index++) {
				const popup = popups[index];
				let video = popup.querySelector('.popup__video');
				if (video) {
					video.innerHTML = '';
				}
				popup.classList.remove('_active');
			}
		} else {
			let video = item.querySelector('.popup__video');
			if (video) {
				video.innerHTML = '';
			}
			item.classList.remove('_active');
		}
		if (!document.querySelector('.menu__body._active') && bodyUnlock) {
			body_lock_remove(500);
		}
		history.pushState('', '', window.location.href.split('#')[0]);
	}
}
let popup_close_icon = document.querySelectorAll('.popup__close,._popup-close');
if (popup_close_icon) {
	for (let index = 0; index < popup_close_icon.length; index++) {
		const el = popup_close_icon[index];
		el.addEventListener('click', function () {
			popup_close(el.closest('.popup'));
		})
	}
}
document.addEventListener('keydown', function (e) {
	if (e.code === 'Escape') {
		popup_close();
	}
});
// Файлы Java Script End -----------------------------------------------------------------------------------------------------

// $ = jQuery;
// Функция верификации e-mail
function isEmail(email) {
	var regex = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
	return regex.test(email);
}

jQuery(document).ready(function () {

	// Сразу маскируем все поля телефонов
	var inputmask_phone = { "mask": "+7(999)999-99-99" };
	jQuery("input[type=tel]").inputmask(inputmask_phone);

	// Типовой скрипт для отправки сообщений на почту

	jQuery("#clsubmit").click(function () {

		e.preventDefault();

		var jqXHR = jQuery.post(
			allAjax.ajaxurl,
			{
				action: 'send_mail',
				nonce: allAjax.nonce,
				formsubject: jQuery("#formsubject").val(),
			}

		);


		jqXHR.done(function (responce) {  //Всегда при удачной отправке переход для страницу благодарности
			document.location.href = 'https://osagoprofi.su/stranica-blagodarnosti';
		});

		jqXHR.fail(function (responce) {
			jQuery('#messgeModal #lineMsg').html("Произошла ошибка. Попробуйте позднее.");
			jQuery('#messgeModal').arcticmodal();
		});
	});
});
