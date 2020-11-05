var burger = document.querySelector(".burger");
var menu = document.querySelector(".header__nav");
burger.onclick = function(){
	burger.classList.toggle("burger_active");
	if(menu.style.opacity === "1"){
		menu.style.opacity = "0";
	}else{
		menu.style.transition = "0.5s all linear";
		menu.style.opacity = "1";
	}
}
window.onresize = function () {
	if(window.screen.width > 768 ){
		menu.style.opacity = "1";
	}else{
		menu.style.opacity = "0";
	}
}
if(window.screen.width > 768 ){
	menu.style.opacity = "1";
}else{
	menu.style.opacity = "0";
}

$(document).mouseup(function (e){ // событие клика по веб-документу
	var div = $(".header__nav"); // тут указываем ID элемента
	if (!div.is(e.target) // если клик был не по нашему блоку
		 && div.has(e.target).length === 0 && menu.style.opacity == "1") { // и не по его дочерним элементам
			menu.style.opacity = "0";
			burger.classList.toggle("burger_active");
	}
});