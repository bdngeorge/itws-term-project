/*
Form Validation
*/

function validateLogin(formObj) {
  var message = "";
  if(formObj.email.value == "") {
    message = "Please enter an email.\n";
  }
  if(formObj.password.value == "") {
    message += "Please enter a password.";
  }
  if(message != "") alert(message);
  else {
    

  }
}
