function validateForm() {
  var name = document.forms["myForm"]["name"].value;
  var phone=document.forms["myForm"]["phno"].value;
  var email = document.forms["myForm"]["email"].value;
  var message = document.forms["myForm"]["message"].value;


  var emailRegex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
  if (!emailRegex.test(email)) {
    alert("Invalid email address");
    return false;
  }
  return true;
}


    