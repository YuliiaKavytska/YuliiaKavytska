var search = document.querySelector("#search");
if(search != null){
	search.onsubmit = function(e){
		e.preventDefault();
		var searchPhrase = search.querySelector("input[name='find-user']");
		var chat = search.querySelector("input[name='chat']");
		var data = "find=1&find_user=" + searchPhrase.value + "&chat=" + chat.value;
		
		var query = new XMLHttpRequest();
			 query.open("POST", search.action, false);
			 query.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
			 query.send(data);

		var replace = document.querySelector("#chat-list");
			 replace.innerHTML = query.response;
	}
}

var messageForm = document.querySelector("#send-form");
var resetMessages = document.querySelector("#messages");
messages.scrollTop = messages.scrollHeight;
if(messageForm != null){
	messageForm.onsubmit = function(ev){
		ev.preventDefault();
		var message = messageForm.querySelector("textarea");
		var sender = messageForm.querySelector("input[name='sender']");
		var recipient = messageForm.querySelector("input[name='recipient']");

		var datamessage = "show=1&message=" + message.value +
		"&sender=" + sender.value +
		"&recipient=" + recipient.value;

		var response = new XMLHttpRequest();
			 response.open("POST", messageForm.action, false);
			 response.setRequestHeader('Content-Type', "application/x-www-form-urlencoded");
			 response.send(datamessage);
			 
		resetMessages.innerHTML = response.response;
		messages.scrollTop = messages.scrollHeight;
		message.value = "";
	}
}
