


//PURPOSE: Executes when the "Send Message" button is pressed
function sendMessageClick(){
	
	  //These variables match textbox values on the webpage
	  var name = $("#name").val();
	  var email = $("#email").val();
	  var subject = $("#subject").val();
	  var message = $("#message").val();

	  //if invalid name, do the following
	  if (!validateName(name)){
		//Tell the user that their name is invalid
	    respondToUserRequest("Please enter your name.",  "yellow");
		
		//set the name textbox to empty so the user can retype it
		document.getElementById("name").value = "";
		
		//focus on the name so that they can type it
		$("#name").focus();
	  }
	  //else if invalid email, do the following
	  else if (!validateEmail(email)){
		//Tell the user that their name is invalid
	    respondToUserRequest("Please enter a valid email address.",  "yellow");
		
		//set the email textbx to empty so the user can retype it
		document.getElementById("email").value = "";
		
		//focus on the name so that they can type it
		$("#email").focus();
	  }
	  //else if invalid subject, do the following
	  else if (!validateSubject(subject)){
		//Tell the user that their subject is invalid
	    respondToUserRequest("Please enter a subject.",  "yellow");
		
		//set the email textbox to empty so the user can retype it
		document.getElementById("subject").value = "";
		
		//focus on the name so that they can type it
		$("#subject").focus();
	  }

	  //else if invalid message, do the following
	  else if (!validateMessage(message)){
		//Tell the user that their name is invalid
	    respondToUserRequest("Please enter a message.",  "yellow");
		
		//set the email textbox to empty so the user can retype it
		document.getElementById("message").value = "";
		
		//focus on the name so that they can type it
		$("#message").focus();
	  }
	  //if none of the previous are invalid, do the following
	  else {
		//send a GET request to sendmail.php (this uses JQuery)
		$.get("sendemail.php",
			//send a name, email, and message GET variable
			{
			  name: document.getElementById("name").value,
			  email: document.getElementById("email").value,
			  subject: document.getElementById("subject").value,
			  message: document.getElementById("message").value
			});
			
			//Reset all fields to empty
			document.getElementById("name").value = "";
			document.getElementById("email").value = "";
			document.getElementById("subject").value = "";
			document.getElementById("message").value = "";

			//inform the user that the message is sent
			respondToUserRequest("Your message has been sent! Thank You!", "white");
	  }
	  return false;
}

//
function respondToUserRequest(message, color){
	var responseToUserRequest = document.getElementById("responseToUserRequest");
	responseToUserRequest.innerHTML = message;
	responseToUserRequest.style.color = color;
	responseToUserRequest.style.display = "initial";
}



function validateEmail(email) {
  var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(email);
}

function validateName(name) {
  var hasData = name.length !=0;
  return hasData;
}

function validateMessage(message) {
  var hasData = message.length !=0;
  return hasData;
}

function validateSubject(subject) {
  var hasData = subject.length !=0;
  return hasData;
}