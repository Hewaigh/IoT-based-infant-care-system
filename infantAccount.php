<?php

     //include "dbconnection.php"; 
    // include "sql.php";
$sql = new sql();



if (!isset($_GET['infant_ID']) || $_GET['infant_ID'] === 0) {
  header("Location:index.php?infant_ID=0");
}


if (isset($_GET['infant_ID'])) {


  $infantInfo = $sql->infantInfo($_GET['infant_ID']);

$CheckInfantAssignment = $sql->CheckInfantAssignment($_GET['infant_ID'], $_SESSION['username']);


if($CheckInfantAssignment[1] > 0){
         $grabIllnessInfo = $sql->UnExpiredMed($CheckInfantAssignment[2][0]['product_ID'], 1);
                                }



$getProductByInfantID = $sql->selectProductByInfantID($_GET['infant_ID']);
}


 



if ($getProductByInfantID[1] > 0) {

  $getProductByInfantIDHeart = $sql->checkDevice('heartRate', $getProductByInfantID[2][0]['product_ID']);
  $getProductByInfantIDTemp = $sql->checkDevice('temp', $getProductByInfantID[2][0]['product_ID']);
  $getProductByInfantIDSound = $sql->checkDevice('sound', $getProductByInfantID[2][0]['product_ID']);
  $getProductByInfantIDWeight = $sql->checkDevice('weight', $getProductByInfantID[2][0]['product_ID']);

}




//$grabIllnessInfo = $sql->UnExpiredMed($CheckInfantAssignment[2][0]['product_ID'], 1);



if (isset($_GET['ProductAssigned'])) {
  ?>
     


    <div class="alert alert-success alert-dismissable ">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>SUCCESS!</strong> The infant is successfully assigned.
</div>

    <?php 
  }

  if (isset($_GET['Notassigned'])) {
    ?>
     


    <div class="alert alert-danger alert-dismissable ">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>FAILD!</strong> to be assigned.
</div>

    <?php    
  }




  if (isset($_GET['alreadyAssigned'])) {
    ?>
     


    <div class="alert alert-danger alert-dismissable ">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>FAILD!</strong> This infant is already assigned to a cradle...unassigne the infant first if you wish to assign new cradle.
</div>

    <?php    
  }




  if (isset($_GET['ProductUnAssigned'])) {
    ?>
     


    <div class="alert alert-success alert-dismissable ">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>SUCCESS!</strong> Unassigned successfully.
</div>

    <?php 
  }



  if (isset($_GET['InUse'])) {
    ?>
     


    <div class="alert alert-danger alert-dismissable ">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>FAILD!</strong> The choosen cradle is used by another infant. <a  href="index.php?page=assignCradleBackend&confirm=confirm&product_ID=<?php echo $_GET['product_ID']; ?>&infant_ID=<?php echo $_GET['infant_ID']; ?>"> Click here if you wish to continue </a><a href="index.php?page=infantAccount&infant_ID=<?php echo $infantID; ?>"></a>
</div>

    <?php 
  }


  if (isset($_GET['infantNotDeleted'])) {
    ?>
     


    
    <div class="alert alert-danger alert-dismissable ">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Faild!</strong> Something went wrong...please try again.
</div>
    <?php 
  }



   if (isset($_GET['infantIsAssigned'])) {
    ?>
     


    
    <div class="alert alert-danger alert-dismissable ">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Faild!</strong> This infant is assigned to a cradle...please unassign the infant first if you wish to delete.
</div>
    <?php 
  }


  ?>



  <br>
  

            <div class="infantName color-white"><?php echo strtoupper($infantInfo[1][0]['infant_name']); ?></div> 


               <?php include("subnav.php"); ?>

              <div class="overview container">



                 <div class="infantInfo "> 



                  <?php        // calculate Age
                  $birthday = new DateTime($infantInfo[1][0]['date_of_birth']);
                  $diff = $birthday->diff(new DateTime());
                  $months = $diff->format('%m') + 12 * $diff->format('%y');

                  ?>


	                 <div class="infantDetails"><p> Age : <b> <?php echo $months ?> months</b></p></div>

                   <?php
                  $grabCradle = $sql->selectProductByInfantID($infantInfo[1][0]['infant_ID']);
                  $cradle = $sql->displayCradles($_SESSION['username']);


                  if ($grabCradle[1] > 0) {
                    ?>

                           <div class="infantDetails"><p> <img src="images/cradleIcon.png" height="25" width="20"> : <b> <?php echo $grabCradle[2][0]['product_ID'] ?> </b>


                           <select style="width: 20px;" onChange="window.location.href=this.value">
                            <option><?php echo $grabCradle[2][0]['product_ID']; ?></option>
                             <option value="index.php?page=assignCradleBackend&makeItNull&infant_ID=<?php echo $infantID; ?>"><?php echo "NULL"; ?></option>
                           <?php
                          if ($cradle[2] > 0) {

                            $index = 0;
                            do {
                              if ($grabCradle[2][0]['product_ID'] != $cradle[1][$index]['product_ID']) {

                                ?>

                   <option value="index.php?page=assignCradleBackend&product_ID=<?php echo $cradle[1][$index]['product_ID']; ?>&infant_ID=<?php echo $infantID; ?>"><?php echo $cradle[1][$index]['product_ID']; ?></option>

                            <?php

                          } //end if 
                          $index++;
                        } while ($index < $cradle[2]);


                      } else {
                        ?>
                                                          <option disabled="">No cradle</option> 
                                         <?php

                                      }


                                      ?>

                          </select></p></div>


                                         <?php
 




       







                     // If not assgined
                                      } else { ?>


                           <div class="infantDetails"><p> <img src="images/cradleIcon.png" height="25" width="20"> : <b>?</b>

                           
                          <select style="width: 20px;" onChange="window.location.href=this.value">
                          <option></option>
                          
                           <?php
                                      // means that there is at leat one cradle under this username
                          if ($cradle[2] > 0) {

                            $index = 0;
                            do {

                              ?>

                                            <option value="index.php?page=assignCradleBackend&product_ID=<?php echo $cradle[1][$index]['product_ID']; ?>&infant_ID=<?php echo $infantID; ?>"><?php echo $cradle[1][$index]['product_ID']; ?></option>

                            <?php
                            $index++;
                          } while ($index < $cradle[2]);


                        }    

                                      // in case no cradle
                        else {
                          ?>
                                                          <option disabled="">No cradle</option> 
                                         <?php

                                      }


                                      ?>

                          </select></p></div>
                           <?php

                        }



                        ?>












                                      <div class="infantDetails1 color-white"><a onclick="return confirm('Are you sure you want to delete?')" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Delete Infant Account" href="index.php?page=deleteInfantBackend&infant_ID=<?php echo $infantID; ?>" aria-label="Delete">
                  <i class="fa fa-trash-o" aria-hidden="true"></i>
                </a> 


                  <a class="btn " data-toggle="tooltip" data-placement="top" title="Edit Infant Info" style="background-color: rgb(63, 92, 128) !important;" href="index.php?page=editInfant&infant_ID=<?php echo $infantID; ?>" aria-label="Delete">
                    <i class="fa fa-pencil-square-o " style="color: white !important;" aria-hidden="true"></i>

                  </a>

                  </div>


                 </div>



                 <div class="sensors">
                
                 	<div><form action="turnSensor.php" method="POST">
                  <input type="hidden" name="infantID" value="<?php echo $_GET['infant_ID'] ?>">   
                  <button name="sound" id="sound" data-toggle="tooltip" data-placement="top" title="Turn sound sensor on/off">
                  <?php
                  if ($getProductByInfantID[1] > 0 and $getProductByInfantIDSound[1] > 0) {

                    echo strtoupper($getProductByInfantIDSound[2][0]['state']);
                  } else {

                    echo strtoupper("OFF");
                    ?>

                      <script type="text/javascript">
                      document.getElementById("sound").style.borderColor = "yellow";
                       document.getElementById("sound").disabled = true;
                        
                      </script>

                    <?php


                  }
                  ?>
                  </button>  <label for="sound">Sound</label>
                   <?php
                  if ($getProductByInfantID[1] > 0 and $getProductByInfantIDSound[1] > 0) {

                    if ($getProductByInfantIDSound[2][0]['state'] == 'on') {

                      ?>

                         <script type="text/javascript">
                             document.getElementById("sound").style.backgroundColor = "";
                             document.getElementById("sound").style.borderColor = "green";
                           </script>


                      <?php

                    } else {
                      ?>

                       <script type="text/javascript">
                             document.getElementById("sound").style.backgroundColor = "";
                             document.getElementById("sound").style.borderColor = "red";
                           </script>


                       <?php

                    }
                  }

                  ?>

                  </form></div>
	               



                  
                    <div><form action="turnSensor.php" method="POST">
                    <input type="hidden" name="infantID" value="<?php echo $_GET['infant_ID'] ?>">   
                    <button name="temp" id="temp" data-toggle="tooltip" data-placement="top" title="Turn tempereture sensor on/off">
                      <?php 
                      if ($getProductByInfantID[1] > 0 and $getProductByInfantIDTemp[1] > 0) {

                        echo strtoupper($getProductByInfantIDTemp[2][0]['state']);

                      } else {

                        echo strtoupper("OFF");
                        ?>

                      <script type="text/javascript">
                      document.getElementById("temp").style.borderColor = "yellow";
                       document.getElementById("temp").disabled = true;
                        
                      </script>

                    <?php


                  }
                  ?>
                    </button>
                 	<label for="temp">Temp</label>
                   <?php
                  if ($getProductByInfantID[1] > 0 and $getProductByInfantIDTemp[1] > 0) {

                    if ($getProductByInfantIDTemp[2][0]['state'] == 'on') {

                      ?>

                         <script type="text/javascript">
                             document.getElementById("temp").style.backgroundColor = "";
                             document.getElementById("temp").style.borderColor = "green";
                           </script>


                      <?php

                    } else {
                      ?>

                       <script type="text/javascript">
                             document.getElementById("temp").style.backgroundColor = "";
                             document.getElementById("temp").style.borderColor = "red";
                           </script>


                       <?php

                    }
                  }

                  ?>
                  </form></div>






                 	<div><form action="turnSensor.php" method="POST">
                  <input type="hidden" name="infantID" value="<?php echo $_GET['infant_ID'] ?>">   
                  <button name="heart" id="heart" data-toggle="tooltip" data-placement="top" title="Turn heart rate sensor on/off"><?php
                                                  if ($getProductByInfantID[1] > 0 and $getProductByInfantIDHeart[1] > 0) {

                                                    echo strtoupper($getProductByInfantIDHeart[2][0]['state']);

                                                  } else {

                                                    echo strtoupper("OFF");
                                                    ?>

                      <script type="text/javascript">
                      document.getElementById("heart").style.borderColor = "yellow";
                       document.getElementById("heart").disabled = true;
                        
                      </script>

                    <?php


                  } ?>
                      
                  </button>
                 	<label for="heart">Heart</label>

                         <?php
                        if ($getProductByInfantID[1] > 0 and $getProductByInfantIDHeart[1] > 0) {
                          if ($getProductByInfantIDHeart[2][0]['state'] == 'on') {

                            ?>

                         <script type="text/javascript">
                             document.getElementById("heart").style.backgroundColor = "";
                             document.getElementById("heart").style.borderColor = "green";
                           </script>


                      <?php

                    } else {
                      ?>

                       <script type="text/javascript">
                             document.getElementById("heart").style.backgroundColor = "";
                             document.getElementById("heart").style.borderColor = "red";
                           </script>


                       <?php

                    }
                  }

                  ?>
                  <form></div>




                 	<div><form action="turnSensor.php" method="POST">
                  <input type="hidden" name="infantID" value="<?php echo $_GET['infant_ID'] ?>">  
                  <button name="weight" id="weight" data-toggle="tooltip" data-placement="top" title="Turn weight sensor on/off">
                    <?php
                    if ($getProductByInfantID[1] > 0 and $getProductByInfantIDWeight[1] > 0) {

                      echo strtoupper($getProductByInfantIDWeight[2][0]['state']);

                    } else {

                      echo strtoupper("OFF");
                      ?>

                      <script type="text/javascript">
                      document.getElementById("weight").style.borderColor = "yellow";
                       document.getElementById("weight").disabled = true;
                        
                      </script>

                    <?php


                  }
                  ?>

                  </button>
                 	<label for="weight">Weight</label>
                   <?php
                  if ($getProductByInfantID[1] > 0 and $getProductByInfantIDWeight[1] > 0) {
                    if ($getProductByInfantIDWeight[2][0]['state'] == 'on') {

                      ?>

                         <script type="text/javascript">
                             document.getElementById("weight").style.backgroundColor = "";
                             document.getElementById("weight").style.borderColor = "green";
                           </script>


                      <?php

                    } else {
                      ?>

                       <script type="text/javascript">
                             document.getElementById("weight").style.backgroundColor = "";
                             document.getElementById("weight").style.borderColor = "red";
                           </script>


                       <?php

                    }
                  }

                  ?>

                  </form></div>
            
                 	









                 
                 </div>

                 <hr>
                 <?php
                if($CheckInfantAssignment[1] > 0) {
                  if($grabIllnessInfo[2] == 0 ) {  ?>
                 <div style="margin-left: 30px;"><b>Illness Status : </b><img src="images/illnessOff.png"></div>

                 <?php }else{   ?>

                    <div style="margin-left: 30px;"><b>Illness Status : </b><img src="images/illnessOn.png"></div>

               <?php    }
             }else{   ?>

                  <div style="margin-left: 30px;"><b>Illness Status : </b> No illness Case </div>
          <?php   }

                ?>
                 <div class="overviewInfo container-fuild">
                 	
                 	<div class="temp">
                 		
                 		<div class="rounded"><i class="fa fa-thermometer-full fa-3x" aria-hidden="true"></i><label style="font-size: 30px; "> &nbsp; 60<sub>C</sub> <label>
</div>


                 	</div>



                 	<div class="heartrate">

                 		<div class="rounded"><i class="fa fa-heartbeat fa-3x" aria-hidden="true"></i><label style="font-size: 30px; "> &nbsp;60<sub>bpm</sub> <label>
</div>

                 	</div>

               
      

                    

                 	<div id="sleep">

                 		<div class="sleepDiv" id="tim"></div>
                    <div class="sleepDiv">Recommended Houes : 7</div>
                    <div class="sleepDiv">Slept Hours : 4</div>
                    <div class="sleepDiv">Left Hours  : 3</div>

                     <script type="text/javascript">
                         var myTime = setInterval(function(){ myTimer(), 1000});
                         function myTimer(){
                              var date = new Date();
                              var time = date.toLocaleTimeString();
                              document.getElementById("tim").innerHTML = date;
                         }

                     </script>


                 	</div>
                 </div>
              	            
              </div>
           
            	