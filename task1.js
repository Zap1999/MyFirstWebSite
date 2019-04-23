function validteEmail(email) {
  if(/[A-Z0-9._%+-]+@[A-Z0-9.-]+.[A-Z]{2,4}/igm.test(email)) {
    return (true);
  } else {
    return (false);
  }
}

function validateName(name) {
  if(/^[a-z ,.'-]+$/i.test(name)) {
    return true;
  }else {
    return false;
  }
}

function validatePhone(phone) {
  if(/^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/.test(phone)) {
    return true;
  }else {
    return false;
  }
}

function validateInputs() {
  var wasSuccessful = true;

  var mail = document.getElementById('email-input').value;
  if(!validteEmail(mail)) {
    alert("Invalid e-mail!");
    wasSuccessful = false;
  }

  var name = document.getElementById('name-input').value;
  if(!validateName(name)) {
    alert("Invalid name");
    wasSuccessful = false
  }

  var number = document.getElementById('number-input').value  ;
  if(!validatePhone(number)) {
    alert("Invalid phone number");
    wasSuccessful = false;
  }
  return wasSuccessful;
}
