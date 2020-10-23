let baground = document.querySelector(".baground");
let bg = document.querySelector(".bg");

// ===============================================
if(bg != null){
	bg.onclick = function(){
		if(document.location.href != "teacher-chat.php"){
			document.location.href = "/pages/teacher-chat.php";
		}
		bg.style.display = "none";
	}
}
if(baground != null){
	baground.onclick = function(){
		if(document.location.href != "child-chat.php"){
			document.location.href = "/pages/child-chat.php";
		}
		baground.style.display = "none";
	}
}

