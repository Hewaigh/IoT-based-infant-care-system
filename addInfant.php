        
<div class="infantName color-white">Add New Infant</div>
  <div class="overview container">



            <div class="addInfantForm">
					<form name="vform" onsubmit="return Validate()" action="insertInfant.php" method="POST">
						
						<p><input type="text" name="infantName" placeholder="Infant Name"></p>
						<div id="infantName_error"></div>
						<p><input type="input" placeholder="YYYY-MM-DD" pattern="\d{4}-\d{1,2}-\d{1,2}" name="infantbirthday"></p>

						<button class="btn btn-primary" name="insertInfant">Add</button>


					</form>


		    </div>


             <?php
            if (isset($_GET['inserted'])) { ?>     
  
                     <div class="alert alert-success alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Success!</strong> New Infant Added Successfully.
                    </div>

<?php

}
?>			



 <?php
if (isset($_GET['oldAge'])) { ?>     <!--   oldAge -->
  
                     <div class="alert alert-danger alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Faild!</strong> Sorry...ISitter only support children with age from 1 up to 16 months.
                    </div>

<?php

}
?>   


 <?php
if (isset($_GET['limitedNo'])) { ?>     <!--   oldAge -->
  
                     <div class="alert alert-danger alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Faild!</strong> Sorry...ISitter only support up to 5 Infants.
                    </div>

<?php

}
?>   



     <?php
    if (isset($_GET['notinserted'])) { ?>
  
                     <div class="alert alert-danger alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Success!</strong> Something Went Wrong Please Try Again.
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







