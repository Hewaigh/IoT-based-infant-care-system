  <?php
  $sql = new sql();
  $infant = $sql->infantInfo($_GET['infant_ID']);


  ?>

        
<div class="infantName color-white"> Edit Infant Info
<div style="width: 65px; height: 30px; padding-top: 3px; margin: 0px 0px 0px -10px; background-color: white; border-radius: 10px; color: rgb(0, 153, 204)"><a href="index.php?page=infantAccount&infant_ID=<?php echo $_GET['infant_ID']; ?>" style="text-decoration: none;">Back</a></div></div>

  <div class="overview container ">


 <div class="addInfantForm">




<form name="vform" onsubmit="return Validate()" action="updateInfant.php" method="POST">
						
						<p><input type="text" name="infantName" placeholder="Infant Name" value="<?php echo $infant[1][0]['infant_name']; ?>"></p>
						<div id="infantName_error"></div>
						<p><input type="input" placeholder="YYYY-MM-DD" pattern="\d{4}-\d{1,2}-\d{1,2}" name="infantbirthday" value="<?php echo $infant[1][0]['date_of_birth']; ?>"></p>

						<input type="hidden" name="infantID" value="<?php echo $_GET['infant_ID']; ?>">

						<button id="addinfabtbtn" class="btn btn-primary" name="update">update</button>


					</form>










   


</div>

 <?php 
if (isset($_GET['notupdated'])) { ?>
  
                     <div class="alert alert-danger alert-dismissable">
             		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  				    <strong>Faild!</strong> Not Updated...please try again.
				    </div>

                      
                 <?php 
              } ?>


   <?php
  if (isset($_GET['updated'])) { ?>
  
                     <div class="alert alert-success alert-dismissable">
             		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  				    <strong>Success!</strong> Infant Info Upadated Successfully.
				    </div>

<?php

}
?>
   </div>







     <script>

var infantName =  document.forms["vform"]["infantName"];
var dateOfBirth =  document.forms["vform"]["dateOfBirth"];



var infantName_error = document.getElementById("infantName_error");
var dateOfBirth_error = document.getElementById("dateOfBirth_error");


infantName.addEventListener("blur", infantNameVerify, true);
dateOfBirth.addEventListener("blur", dateOfBirthVerify, true);










function Validate(){


if(infantName.value == "" || infantName.value.length < 3 || infantName.value.length > 30){


        infantName.style.border = "1px solid red";
        infantName_error.textContent = "Infant Name must be between 3 - 30";
        infantName.focus();
       
        return false;
     }









}




function infantNameVerify(){

     if(infantName.value != "" && infantName.value.length > 2 && infantName.value.length < 31)
     {
        
        infantName.style.border = " 1px solid  #007bff";
        infantName_error.innerHTML = "";
        return true;



     }

}




</script>









