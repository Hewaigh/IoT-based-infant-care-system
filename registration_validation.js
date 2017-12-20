<script>



      var username =  document.forms["vform"]["username"];
var email =  document.forms["vform"]["email"];
var password =  document.forms["vform"]["password"];
var confirmpassword =  document.forms["vform"]["confirmpassword"];
var pnumber =  document.forms["vform"]["pnumber"];
var productID =  document.forms["vform"]["product_ID"];



var username_error = document.getElementById("username_error");
var email_error = document.getElementById("email_error");
var password_error = document.getElementById("password_error");
var confirmPass_error = document.getElementById("confirmPass_error");
var phone_error = document.getElementById("phone_error");
var product_error = document.getElementById("product_error");


var suc_error = document.getElementById("suc");



username.addEventListener("blur", usernameVerify, true);
email.addEventListener("blur", emailVerify, true);
password.addEventListener("blur", passwordVerify, true);
confirmpassword.addEventListener("blur", confirmpasswordVerify, true);
pnumber.addEventListener("blur", pnumberVerify, true);
productID.addEventListener("blur", productVerify, true);






function Validate(){

    

      if(username.value == "" || username.value.length < 3 || username.value.length > 30){

            username.style.border = "1px solid red";
      username_error.textContent = "Username must be between 3 - 30";
      	username.focus();

      	return false;
      }




     if(email.value == ""){

            email.style.border = "1px solid red";
      email_error.textContent = "Email is required ";
      	email.focus();
      	return false;
      }





      if(password.value == "" || password.value.length < 8 || password.value.length > 20){

            password.style.border = "1px solid red";
      password_error.textContent = "Password must be between 8 - 20";
     	password.focus();
      	return false;
      }



     if(confirmpassword.value == "" || password.value.length < 8 || password.value.length > 20){

            confirmpassword.style.border = "1px solid red";
      confirmPass_error.textContent = "Can not be empty";
     	confirmpassword.focus();
     	return false;
     }

    if(confirmpassword.value != password.value)
     {

            confirmpassword.style.border = "1px solid red";
      confirmPass_error.textContent = "Password Not Matched";
     	confirmpassword.focus();
     	return false;
     }



     if(productID.value == "" || productID.value.length < 10 || productID.value.length > 30){

            productID.style.border = "1px solid red";
      product_error.textContent = "Product code must be between 10 - 30";
        productID.focus();

        return false;
     }


     if(pnumber.value == ""){

            pnumber.style.border = "1px solid red";
      phone_error.textContent = "Phone Number is required ";
     	pnumber.focus();
     	return false;
     }

  }




function usernameVerify(){



     if(username.value != "" && username.value.length > 2 && username.value.length < 31)
     {

            username.style.border = " 1px solid  #007bff";
      username_error.innerHTML = "";
        return true;



     }

 }



function emailVerify(){


      if(email.value != "" )
     {

            email.style.border = " 1px solid  #007bff";
      email_error.innerHTML = "";
        return true;

     }

}


function passwordVerify(){

	if(password.value != "" && password.value.length > 7 && password.value.length < 21)
     {

            password.style.border = " 1px solid  #007bff";
      password_error.innerHTML = "";
        return true;

     }
}



function confirmpasswordVerify(){

	if(confirmpassword.value != "" && confirmpassword.value == password.value)
     {

            confirmpassword.style.border = " 1px solid  #007bff";
      confirmPass_error.innerHTML = "";
        return true;

     }
}





function pnumberVerify(){

	if(pnumber.value != "")
     {

            pnumber.style.border = " 1px solid  #007bff";
      phone_error.innerHTML = "";
        return true;

     }



}



function productVerify(){

     if(productID.value != "" && productID.value.length > 9 && productID.value.length < 31)
     {

            productID.style.border = " 1px solid  #007bff";
      product_error.innerHTML = "";
        return true;



     }

}


</script>


