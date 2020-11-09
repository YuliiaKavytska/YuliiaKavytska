/* 
TODO: план
! 1. сверстать слайдер
! 2. переключение влево вправо
! 3. переключение фотографий по клику на нижние фотографии
! 4. при клике на большую кратинку увеличивать ее
*/

var imagesArray = [
	"1.jpg",
	"2.jpg",
	"3.jpg",
	"4.jpg",
	"5.jpg",
	"6.jpg",
	"7.jpg",
	"8.jpg",
	"9.jpg",
];

// ? задаем картинку по умолчанию
var directionImg = "img/slider/";
var currentImg = 0;

// ? задаем первую картинку по умолчанию
$("#main-slider img")
	.attr("src", directionImg + imagesArray[currentImg]);

// !так задаются стили
// * .css({
// * 	"border": "1px solid #000",
// * 	"outline": "3px solid #fff",
// * });

// ? проходимся по нашему массиву и добавляем елементы в УЛ список.
for(let i = 0; i < imagesArray.length; i++){
	if(i == currentImg){
		// ? если итерация равна картинке по умолчанию, добавляем класс ектив
		$("#slides ul").append("<li class='do__item do__item_active' data-id='" + i + "'><img class='do__images' src='" + directionImg + imagesArray[i] + "' alt=''></li>");
	}else{
		$("#slides ul").append("<li class='do__item' data-id='" + i + "'><img class='do__images' src='" + directionImg + imagesArray[i] + "' alt=''></li>");
	}
}

// ? клик по спику наших картинок снизу. 
$("#slides ul li").on("click", function(e){
	// * считываем айди по датасет
	var id = e.currentTarget.dataset.id;
	// * задаем путь для картинки
	$("#main-slider img")
		.attr("src", directionImg + imagesArray[id]);
	// * меняем класс у других
	$(".do__list")[0].children[currentImg].classList.toggle("do__item_active");
	$(".do__list")[0].children[id].classList.toggle("do__item_active");
	// ! меняем текущую картинку и делаем ее числом
	currentImg = Number(id);
});

// ? клик по следующему
$("#main-slider .do__next").on("click", function(e){
	currentImg += 1;
	// ! если перепрыгиваем на следующую картинку. тоесть наше число будет больше чем длинна массива с картинками
	if(currentImg >= imagesArray.length){
		currentImg = 0;
	}
	$("#main-slider img")
		.attr("src", directionImg + imagesArray[currentImg]);
	// ! проверяем перескочили ли на следующую картинку и меняем классы
	if(currentImg == 0){
		$(".do__list")[0].children[imagesArray.length - 1].classList.toggle("do__item_active");
		$(".do__list")[0].children[currentImg].classList.toggle("do__item_active");
	}else{
		$(".do__list")[0].children[currentImg - 1].classList.toggle("do__item_active");
		$(".do__list")[0].children[currentImg].classList.toggle("do__item_active");
	}
});

// ? клик по предыдущей картинке
$("#main-slider .do__prev").on("click", function(e){
	currentImg -= 1;
	// ! проверяем пересколили ли на перыдущую (в конец массива)
	if(currentImg == -1){
		currentImg = imagesArray.length - 1;
	}
	$("#main-slider img")
		.attr("src", directionImg + imagesArray[currentImg]);
	if(currentImg == imagesArray.length - 1){
		$(".do__list")[0].children[0].classList.toggle("do__item_active");
		$(".do__list")[0].children[currentImg].classList.toggle("do__item_active");
	}else{
		$(".do__list")[0].children[currentImg + 1].classList.toggle("do__item_active");
		$(".do__list")[0].children[currentImg].classList.toggle("do__item_active");
	}
});
// ? показываем картинку при клике на нее
$(".do__photo img").on("click", function (e) {
	$(".full-img")
		.append("<img class='do__images' src='" + $(this).attr('src') + "' alt=''>")
		.css({"display" : "block"});
	$(".bg").css({"display" : "block"});
});
// ? удаляем при клике на фон
$(".bg").on("click", function (e) {
	$(".bg").css({"display" : "none"});
	$(".full-img")
		.css({"display" : "none"});
	$(".full-img img").remove();
})