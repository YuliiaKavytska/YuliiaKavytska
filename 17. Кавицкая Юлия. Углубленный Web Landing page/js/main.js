var burger = document.querySelector(".burger");
var menu = document.querySelector(".header__nav");
burger.onclick = function(e){	
	if(burger.className === "burger burger_active"){
		burger.classList.toggle("burger_active");
		menu.style.opacity = "0";
	}else{
		burger.classList.toggle("burger_active");
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
console.log(window.screen.width);
if(window.screen.width > 768 ){
	menu.style.opacity = "1";
}else{
	menu.style.opacity = "0";
}

$(document).mouseup(function (e){ // событие клика по веб-документу
	var div = $(".header__nav"); // тут указываем ID элемента
	if (!div.is(e.target) // если клик был не по нашему блоку
		 && div.has(e.target).length === 0 && menu.style.opacity == "1") { // и не по его дочерним элементам
			if(e.target.parentElement.className != "burger burger_active"){
				menu.style.opacity = "0";
				burger.classList.toggle("burger_active");
			}
			
	}
});