var add = document.querySelector("#add");
if(add != null){
	add.onsubmit = function(event){
		event.preventDefault();
		var date = add.querySelector("input[name='date']");
		var home = add.querySelector("input[name='home']");
		var teacher = add.querySelector("input[name='teacher']");

		var data = "add-home=1&date=" + date.value + "&home=" + home.value + "&teacher=" + teacher.value;
		
		var q = new XMLHttpRequest();
			 q.open("POST", add.action, false);
			 q.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
			 q.send(data);

		var admin = document.querySelector("#admin-home");
			 admin.innerHTML = q.response;
	}
}

function deleteProduct(element){
	var addRequest = new XMLHttpRequest();
		 addRequest.open("GET", element.dataset.link, false);
		 addRequest.send();

	var table = document.querySelector("#admin-home");
		 table.innerHTML = addRequest.response;
}

var addRating = document.querySelector("#add-rating");
if(addRating != null){
	addRating.onsubmit = function(event){
		event.preventDefault();
		var day = addRating.querySelector("input[name='date']");
		var rating = addRating.querySelector("input[name='rating']");
		var stud = addRating.querySelector("select");
		var teac = addRating.querySelector("input[name='teacher']");

		var data = "add-rating=1&date=" + day.value + "&rating=" + rating.value + "&student=" + stud.value + "&teacher=" + teac.value;

		var addQuery = new XMLHttpRequest();
			 addQuery.open("POST", addRating.action, false);
			 addQuery.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
			 addQuery.send(data);

		var admin = document.querySelector("#admin-home");
			 admin.innerHTML = addQuery.response;
	}
}