//!Анимация кнопки наверх
window.addEventListener('scroll', function () {
	var scroll = document.querySelector('.upward');
	scroll.classList.toggle("active", window.scrollY > 500)
})
function scrollTopTop() {
	window.scrollTo({
		top: 0,
		behavior: 'smooth'
	})
}

//!-----------------------------------------------------------------

//!Анимация кнопки Контакты
function scrollDownDown() {
	window.scrollTo({
		top: 10000000,
		behavior: 'smooth'
	})
	$('body').on('click', ".remove-hash", function(e){
		$(this).removeAttr('href');
	});
}
//!-----------------------------------------------------------------

//!Для кнопки копирования текста
function copytext(el) {
	var $tmp = $("<textarea>");
	$("body").append($tmp);
	$tmp.val($(el).text()).select();
	document.execCommand("copy");
	$tmp.remove();
}
//!-----------------------------------------------------------------

//!Добавление доп поля в select
$(document).ready(function () {
	$(".drop_down").change(function () {
		if (this.value == "other") {
			$(".other_input").val("");
			$(".other_input").show();
			$(".other_br").show();
		} else {
			$(".other_input").hide();
			$(".other_br").hide();
		}
	});
	$(".btn").click(function() {
		$(".drop_down").val("choose").change();
		$(".other_input").hide();
		$(".other_br").hide();	
	})
})
//!-----------------------------------------------------------------


//!Анимация текста
const animItems = document.querySelectorAll('._anim-items');

if (animItems.length > 0) {
	window.addEventListener('scroll', animOnScroll);
	function animOnScroll() {
		for (let index = 0; index < animItems.length; index++) {
			const animItem = animItems[index];
			const animItemHeight = animItem.offsetHeight;
			const animItemOffset = offset(animItem).top;
			const animStart = 4;


			let animItemPoint = window.innerHeight - animItemHeight / animStart;
			if (animItemHeight > window.innerHeight) {
				animItemPoint = window.innerHeight - window.innerHeight / animStart;
			}

			if ((pageYOffset > animItemOffset - animItemPoint) && pageYOffset < (animItemOffset + animItemHeight)) {
				animItem.classList.add('_active');
			}
			else {
				if (!animItem.classList.contains('_anim-no-hide')) {
					animItem.classList.remove('_active');
				}
			}
		}
	}
	function offset(el) {
		const rect = el.getBoundingClientRect(),
			scrollLeft = window.pageXOffset || document.documentElement.scrollLeft,
			scrollTop = window.pageYOffset || document.documentElement.scrollTop;
		return { top: rect.top + scrollTop, left: rect.left + scrollLeft }
	}
	setTimeout(() => {
		animOnScroll();
	}, 300);
}
//!-----------------------------------------------------------------


//!Появление бургера на моб.версии

$(document).ready(function() {
	$('.header__burger').click(function(event){
		$('.header__burger,.header__menu').toggleClass('active');
		$('body').toggleClass('lock');
	});
});

//!-----------------------------------------------------------------

//!Анимация popup
const popupLinks = document.querySelectorAll('.popup-link');
const body = document.querySelector('body');
const lockPadding = document.querySelectorAll(".lock-padding");
let unlock = true;
const timeout = 800;
if(popupLinks.length > 0){
	for(let index = 0; index < popupLinks.length; index++){
		const popupLink = popupLinks[index];
		popupLink.addEventListener("click", function (e) {
			const popupName = popupLink.getAttribute('href').replace('#', '');
			const curentPopup = document.getElementById(popupName);
			popupOpen(curentPopup);
			e.preventDefault();
		});
	}
}
const popupCloseIcon = document.querySelectorAll('.close-popup');
if(popupCloseIcon.length > 0){
	for(let index = 0; index < popupCloseIcon.length; index++){
		const el = popupCloseIcon[index];
		el.addEventListener('click', function(e){
			popupClose(el.closest('.popup'));
			e.preventDefault();
		});
	}
}
function popupOpen(curentPopup){
	if(curentPopup && unlock){
		const popupActive = document.querySelector('.popup.open');
		if(popupActive){
			popupClose(popupActive, false);
		}
		else{
			bodyLock();
		}
		curentPopup.classList.add('open');
		curentPopup.addEventListener("click", function (e) {
			if (!e.target.closest('.popup__content')){
				popupClose(e.target.closest('.popup'));
			}
		});
	}
}
function popupClose(popupActive, doUnlock = true){
	if(unlock){
		popupActive.classList.remove('open');
		if(doUnlock){
			bodyUnLock();
		}
	}
}
function bodyLock(){
	const lockPaddingValue = window.innerWidth - document.querySelector('.wrapper').offsetWidth + 'px';

	if(lockPadding.length > 0) {
		for(let index = 0; index < lockPadding.length; index++){
			const el = lockPadding[index];
			el.getElementsByClassName.paddingRight = lockPaddingValue;
		}
	}
	body.style.paddingRight = lockPaddingValue;
	body.classList.add('lock');

	unlock = false;
	setTimeout(function(){
		unlock = true;
	}, timeout);
}
function bodyUnLock(){
	setTimeout(function(){
		if(lockPadding.length > 0){
			for(let index = 0; index < lockPadding.length; index++){
				const el = lockPadding[index];
				el.style.paddingRight = '0px';
			}
		}
		body.style.paddingRight = '0px';
		body.classList.remove('lock');
	}, timeout);

	unlock = false;
	setTimeout(function(){
		unlock = true;
	}, timeout);
}
document.addEventListener('keydown', function (e){
	if (e.which === 27){
		const popupActive = document.querySelector('.popup.open');
		popupClose(popupActive);
	}
});

//!-----------------------------------------------------------------

//!Ajax для регистрации

$('.buttonReg').click(function(e){
	e.preventDefault();
	$(`input`).removeClass('error');
	var chbox = document.getElementById('formAgreement');
	if(chbox.checked)
		chboxInf = ('Выбран');
	else
		chboxInf = ('Не выбран');
	
	let login = $('input[name="login"]').val(),
		emailReg = $('input[name="emailReg"]').val(),
		passFirst = $('input[name="passFirst"]').val(),
		passSecond = $('input[name="passSecond"]').val();

	$.ajax({
		url: "app/controllers/registration.php",
		type: "POST",
		dataType: "json",
		data: {
			login: login,
			email: emailReg,
			passFirst: passFirst,
			passSecond: passSecond,
			chboxInf: chboxInf,
		},
		success (data){
			if(data.status){
				document.location.href = window.location.href;
			}
			else{
				if(data.type === 1){
					data.fieldsReg.forEach(function (field){
						$(`input[name="${field}"]`).addClass('error');
					})
				}
				$('.errorMessageReg').text(data.message);
				let passFirst = $('input[name="passFirst"]').val(''),
					passSecond = $('input[name="passSecond"]').val('');
			}
		}
	});
});

//!-----------------------------------------------------------------

//!Ajax для авторизации

$('.buttonEntry').click(function(e){
	e.preventDefault();
	$(`input`).removeClass('error');
	let emailEnt = $('input[name="emailEnt"]').val(),
		password = $('input[name="password"]').val();
		$.ajax({
		url: "app/controllers/entry.php",
		type: "POST",
		dataType: "json",
		data: {
			emailEnt: emailEnt,
			password: password,
		},
		success (data){
			if(data.status){
				document.location.href = window.location.href;
			}
			else{
				if(data.type === 1){
					data.fields.forEach(function (field){
						$(`input[name="${field}"]`).addClass('error');
					})
				}
				$('.errorMessageEnt').text(data.message);
				let password = $('input[name="password"]').val('');
			}
		}
	});
});

//!-----------------------------------------------------------------

//!Ajax для редактирования имени

$('.buttonRedName').click(function(e){
	e.preventDefault();
	$(`input`).removeClass('error');
	let redName = $('input[name="redName"]').val();

		$.ajax({
		url: "app/controllers/redName.php",
		type: "POST",
		dataType: "json",
		data: {
			redName: redName,
		},
		success (data){
			if(data.status){
				alert('Вы успешно изменили имя');
				document.location.href = window.location.href;
			}
			else{
				if(data.type === 1){
					data.fields.forEach(function (field){
						$(`input[name="${field}"]`).addClass('error');
					})
				}
				if(data.type === 2){
					data.fields.forEach(function (field){
						$(`input[name="${field}"]`).addClass('error');
					})
				}
				$('.errorMessageRedName').text(data.message);
				let redName = $('input[name="redName"]').val('');
			}
		}
	});
});

//!-----------------------------------------------------------------

//!Ajax для редактирования email

$('.buttonRedEmail').click(function(e){
	e.preventDefault();
	$(`input`).removeClass('error');
	let redEmail = $('input[name="redEmail"]').val();

		$.ajax({
		url: "app/controllers/redEmail.php",
		type: "POST",
		dataType: "json",
		data: {
			redEmail: redEmail,
		},
		success (data){
			if(data.status){
				alert('Вы успешно изменили email');
				document.location.href = window.location.href;
			}
			else{
				if(data.type === 1){
					data.fields.forEach(function (field){
						$(`input[name="${field}"]`).addClass('error');
					})
				}
				if(data.type === 2){
					data.fields.forEach(function (field){
						$(`input[name="${field}"]`).addClass('error');
					})
				}
				$('.errorMessageRedEmail').text(data.message);
				let redEmail = $('input[name="redEmail"]').val('');
			}
		}
	});
});

//!-----------------------------------------------------------------

//!Ajax для редактирования пароля

$('.buttonRedPass').click(function(e){
	e.preventDefault();
	$(`input`).removeClass('error');
	let oldPass = $('input[name="oldPass"]').val(),
		newPass1 = $('input[name="newPass1"]').val(),
		newPass2 = $('input[name="newPass2"]').val();

		$.ajax({
		url: "app/controllers/redPass.php",
		type: "POST",
		dataType: "json",
		data: {
			oldPass: oldPass,
			newPass1: newPass1,
			newPass2: newPass2,
		},
		success (data){
			if(data.status){
				alert('Вы успешно изменили пароль');
				document.location.href = window.location.href;
			}
			else{
				if(data.type === 1){
					data.fields.forEach(function (field){
						$(`input[name="${field}"]`).addClass('error');
					})
				}
				if(data.type === 2){
					data.fields.forEach(function (field){
						$(`input[name="${field}"]`).addClass('error');
					})
				}
				$('.errorMessageRedPass').text(data.message);
				let oldPass = $('input[name="oldPass"]').val(''),
					newPass1 = $('input[name="newPass1"]').val(''),
					newPass2 = $('input[name="newPass2"]').val('');
			}
		}
	});
});

//!-----------------------------------------------------------------

// !Ajax для оформления заказа
for(let i = 1; i < 1000; i++){
	let file = false;
	$('input[name="file' + i +'"]').change(function(e){
		file = e.target.files[0];
	});
	$('.buttonOrder' + i).click(function(e){
		$(`input`).removeClass('error');
		e.preventDefault();

		let quantity = $('input[name="quantity' + i +'"]').val(),
			description_order = $('textarea[name="description_order' + i +'"]').val(),
			delivery = $('input[name="delivery' + i +'"]').val(),
			count = i;
		console.log(quantity);
		let formData = new FormData();
		formData.append('quantity', quantity),
		formData.append('description_order', description_order),
		formData.append('delivery', delivery),
		formData.append('file', file),
		formData.append('count', count);


			$.ajax({
			url: "app/controllers/orders.php",
			type: 'POST',
			dataType: 'json',
			processData: false,
			contentType: false,
			cache: false,
			data: formData,
			success (data){
				if(data.status){
					alert("Заказ успешно обработан!");
					document.location.href = window.location.href;
				}
				else{
					if(data.type === 1){
						data.fields.forEach(function (field){
							$(`input[name="${field + i}"]`).addClass('error');
						})
					}
					if(data.type === 2){
						data.fields.forEach(function (field){
							$(`input[name="${field + i}"]`).addClass('error');
						})
					}
					$('.errorMessageOrder').text(data.message);
				}
		}});
	});
}

//!-----------------------------------------------------------------