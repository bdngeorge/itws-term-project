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
  } 
  if(message != "") {
    alert(message);
    return false;
  }
  return true;
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
  if(message != ""){
    alert(message);
    return false;    
  }
  return true;
}

function validateUpload(formObj) {
  var message = "";
  if(formObj.title.value == "") {
    message += "Please enter a title.\n";
  }
  if(formObj.authors.value == "") {
    message += "Please enter an author or authors.\n";
  }
  if(formObj.desc.value == "") {
    message += "Please enter a description.\n";
  }
  if(formObj.isbn.value == "") {
    message += "Please enter an ISBN.\n";
  } else {
    let isbn = formObj.isbn.value;
    if(isbn.length != 13) {
      message += "IBSN must be 13 digits long.\n";
    } else {
      for(let i = 0; i < isbn.length; i++) {
        if(!(isbn[i] >= '0' && isbn[i] <= '9')) {
          message += "ISBN must only contain digits 0-9.\n";
          break;
        }
      }
    }
  }
  if(formObj.price.value == "") {
    message += "Please enter an price.\n";
  } else {
    let price = formObj.price.value;
    for(let i = 0; i < price.length; i++) {
      if(!price[i] == '.' && !(price[i] >= '0' && price[i] <= '9')) {
        message += "Price must only contain digits 0-9.\n";
        break;
      }
    }
  }
  if(formObj.file.value == "") {
    message += "Please provide an image for the textbook.\n";
  }

  if(message != ""){
    alert(message);
    return false;
  }
  return true;
}
