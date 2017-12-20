  <?php
  $sql = new sql();

  $userPhone = $sql->checkUsername($_SESSION['username']);

    // echo "<pre>";
    // print_r($userPhone);
    // die();





  if (isset($_GET['wrongOldPassword'])) {
    ?> 

<div class="alert alert-danger alert-dismissable ">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>FAILD!</strong> Old password is wrong.
</div>

<?php 
}


if (isset($_GET['changed'])) {
  ?> 

             <div class="alert alert-success alert-dismissable">
             <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>SUCCESS!</strong> Password Updated Successfully.
</div>

<?php 
}


 // finishe with password 




// <!-- start with phone number --> 

if (isset($_GET['phoneNotUpdated'])) {
  ?> 

<div class="alert alert-danger alert-dismissable ">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>FAILD!</strong> Something went wrong please enter valid phone number.
</div>

<?php 
}



if (isset($_GET['phoneUpdated'])) {
  ?> 

             <div class="alert alert-success alert-dismissable">
             <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>SUCCESS! </strong> Phone Number Updated Successfully.
</div>

<?php 
}





if (isset($_GET['emailUpdated'])) {
  ?> 

             <div class="alert alert-success alert-dismissable">
             <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>SUCCESS! </strong> Email Has Been Updated Successfully.
</div>

<?php 
}



if (isset($_GET['emailNotUpdated'])) {
  ?> 

             <div class="alert alert-danger alert-dismissable">
             <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>SUCCESS! </strong> Something went wrong... please try again.
</div>

<?php 
}




if (isset($_GET['cradleAdded'])) {
  ?> 

             <div class="alert alert-success alert-dismissable">
             <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>SUCCESS! </strong> New Cradle Added Successfully.
</div>

<?php 
}



if (isset($_GET['cradleNotAdded'])) {
  ?> 

             <div class="alert alert-danger alert-dismissable">
             <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>SUCCESS! </strong> Invalid Cradle Code.
</div>

<?php 
}


?>















        <div class="infantName color-white"><?php echo strtoupper($_SESSION['username']); ?></div>
              <div class="overview container" style="padding-top: 50px;">

              <div id="accordion" role="tablist" aria-multiselectable="true">


  <div class="card">
    <div class="card-header" role="tab" id="headingOne">
      <h5 class="mb-0">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          E-mail
        </a>
      </h5>
    </div>
    <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
      <div class="card-block">
        <form action="updateUserInfo.php" method="POST">
        	<p><input style="margin: 30px 0px 0px 400px; float: left; width: 240px;" type="email" value="<?php echo $userPhone[2][0]['user_email']; ?>" name="newEmail"><button name="updateEmail" style="width: 120px; margin: 30px 0px 30px 650px; height: 35px;" class="btn btn-primary">update</button></p>	
        </form>
      </div>
    </div>
  </div>





  <div class="card">
    <div class="card-header" role="tab" id="headingTwo">
      <h5 class="mb-0">
        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Phone Number
        </a>
      </h5>
    </div>
    <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo">
      <div class="card-block">
        <form action="updateUserInfo.php" method="POST">
          <p><input name="pNuumber" style="margin: 30px 0px 0px 400px; float: left;" type="tel" value="<?php echo $userPhone[2][0]['user_phone']; ?>" pattern="\d{10}"><button name="updatePhone" style="width: 120px; margin: 30px 0px 30px 650px; height: 35px;" class="btn btn-primary">update</button></p>
          
        </form>
      </div>
    </div>
  </div>






   <div class="card">
    <div class="card-header" role="tab" id="headingThree">
      <h5 class="mb-0">
        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
        Add New Cradle
        </a>
      </h5>
    </div>
    <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree">
      <div class="card-block">
        <form action="updateUserInfo.php" method="POST" onsubmit="return Validate()" name="vform">
          <p><input style="margin: 30px 0px 0px 400px; float: left;" type="text" name="product_ID" placeholder="Enter new cradle code"><button name="addCradle" style="width: 120px; margin: 30px 0px 30px 650px; height: 35px;" class="btn btn-primary">Add</button></p> 
        </form>
      </div>
    </div>
  </div>






  <div class="card">
    <div class="card-header" role="tab" id="headingFour">
      <h5 class="mb-0">
        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
         Password
        </a>
      </h5>
    </div>
    <div id="collapseFour" class="collapse" role="tabpanel" aria-labelledby="headingFour">
      <div class="card-block">
        <form action="updateUserInfo.php" method="POST" onsubmit="return PasswordValidate()" name="PVorm">
          <p><input style="margin: 30px 0px 0px 100px; float: left;" type="password" name="oldPassword" placeholder="Enter old password"></p> 

          <p><label id="password_error" style="margin-left: -480px;"></label><input style="margin: 30px 0px 0px 100px; float: left;" type="password" name="newPassword" placeholder="Enter new password">

          <label id="confirmPass_error" style="margin-left: 320px;"></label><input style="margin: 30px 0px 0px 100px; float: left;" type="password" name="confirmNewPassword" placeholder="Confirm password"> <button style="width: 120px; margin: 30px 0px 30px 450px; height: 35px;" class="btn btn-primary" name="changePassword">Update</button></p>
        </form>
      </div>
    </div>
  </div>


   <div class="card">
    <div class="card-header" role="tab" id="headingFive">
      <h5 class="mb-0">
        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
        <span style="color: red;"> Delete Account</span>
        </a>
      </h5>
    </div>
    <div id="collapseFive" class="collapse" role="tabpanel" aria-labelledby="headingFive">
      <div class="card-block">
       <form action="updateUserInfo.php" method="POST" onsubmit="return confirm('Are you sure you to delete');">
        <button class="btn btn-danger" name="deleteAccount" style="width: 150px; margin: 30px 0px 30px 450px;" >Delete Account</button>
      </form>
      </div>
    </div>
  </div>




</div>


              </div>



<script type="text/javascript">
  

  var productID =  document.forms["vform"]["product_IDl"];

  productID.addEventListener("blur", productVerify, true);





  function Validate(){


    if(productID.value == "" || productID.value.length < 10 || productID.value.length > 30){

        productID.style.border = "1px solid red";
        productID.style.color = "red";
        productID.textContent = "Product code must be between 10 - 30";
        productID.focus();
        
        return false;
     }


  }




  function productVerify(){

     if(productID.value != "" && productID.value.length > 9 && productID.value.length < 31)
     {
        
        productID.style.border = " 1px solid  #007bff";
        productID.style.color = "black";
        return true;



     }






}


// ----------------------------- End of product Validate --------------------------


var password =  document.forms["PVorm"]["newPassword"];
var confirmpassword =  document.forms["PVorm"]["confirmNewPassword"];



var password_error = document.getElementById("password_error");
var confirmpassword_error = document.getElementById("confirmPass_error");


password.addEventListener("blur", passwordVerify, true);
confirmpassword.addEventListener("blur", confirmpasswordVerify, true);



function PasswordValidate(){


  if(password.value == "" || password.value.length < 8 || password.value.length > 20){

      password.style.border = "1px solid red";
      password_error.textContent = "Password must be between 8 - 20";
      password.focus();
        return false;
      }



     if(confirmpassword.value == "" || password.value.length < 8 || password.value.length > 20){

      confirmpassword.style.border = "1px solid red";
      confirmpassword_error.textContent = "Can not be empty";
      confirmpassword.focus();
      return false;
     }


   if(confirmpassword.value != password.value)
     {

      confirmpassword.style.border = "1px solid red";
      confirmpassword_error.textContent = "Password Not Matched";
      confirmpassword.focus();
      return false;
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


</script>

