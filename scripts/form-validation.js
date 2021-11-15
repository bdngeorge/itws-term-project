/*
Form Validation
*/

function validateLogin(formObj) {
  var message = "";
  const email_regex = /^[A-Za-z0-9._%+-]+@rpi.edu$/;
  const pass_regex = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/
  if(formObj.email.value == "") {
    message += "Please enter an email.\n";
  } else {
    if(!email_regex.test(formObj.email.value)) {
      message += "Please enter a valid RPI email.\n";
      formObj.email.value = "";
    }
  }
  if(formObj.password.value == "") {
    message += "Please enter a password.";
  } else {
    if(!pass_regex.test(formObj.password.value)) {
      message += "Password must:\n";
      message += "- Contain at least 8 characters\n";
      message += "- Contain at least 1 number\n";
      message += "- Contain at least 1 special character\n";
      formObj.password.value = "";
    }
  }
  if(message != "") alert(message);
  else {
    //Send to backend to check if email and pass are in the database
    return true;
  }

  return false;
}

function validateSignUp(formObj) {
  var message = "";
  const email_regex = /^[A-Za-z0-9._%+-]+@rpi.edu$/;
  const pass_regex = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/
  if(formObj.fname.value == "") {
    message += "Please enter a first name.\n";
  }
  if(formObj.lname.value == "") {
    message += "Please enter a last name.\n";
  }
  if(formObj.email.value == "") {
    message += "Please enter an email.\n";
  } else {
    if(!email_regex.test(formObj.email.value)) {
      message += "Please enter a valid RPI email.\n"
      formObj.email.value = "";
    }
  }
  if(formObj.password.value == "") {
    message += "Please enter a password.";
  } else {
    if(!pass_regex.test(formObj.password.value)) {
      message += "Password must:\n";
      message += "- Contain at least 8 characters\n";
      message += "- Contain at least 1 number\n";
      message += "- Contain at least 1 special character\n";
      formObj.password.value = "";
    }
  }
  if(message != "") alert(message);
  else {
    //Send to backend to check if email and pass are in the database
    return true;
  }

  return false;
}