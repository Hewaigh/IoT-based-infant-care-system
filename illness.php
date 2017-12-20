
<?php

    // include "dbconnection.php"; 
    // include "sql.php";
$sql = new sql();






 $date =  date("Y-m-d"); 

$CheckInfantAssignment = $sql->CheckInfantAssignment($_GET['infant_ID'], $_SESSION['username']);

// echo "<pre>";
// print_r($CheckInfantAssignment);
// die();


if($CheckInfantAssignment[1] > 0){

$grabIllnessInfo = $sql->UnExpiredMed($CheckInfantAssignment[2][0]['product_ID'], 1);

}

$getInfantName = $sql->infantInfo($_GET['infant_ID']);







$infantInfo = $sql->infantInfo($_GET['infant_ID']); ?>




  <div class="infantName color-white"><?php echo strtoupper($infantInfo[1][0]['infant_name']); ?></div>  
<?php include("subnav.php"); ?>

              <div class="overview container">


              <?php 

                if ($CheckInfantAssignment[1] > 0) { ?>
                <!-- the form placed here  -->

                  <div class="illnessDiv">
						
						<form action="addIllnessInfo.php" method="POST">

  							<p><input type="number" min="0" name="LiqLevel" placeholder="Liquid Size in the bottle (min 0)"></p>
  							<p><input type="number" min="0" name="MPD" placeholder="ML Per Doses (min 0)"></p>


   

                <ul class="list-group Med-Times" style="background-color: ; width: 300px;" >
                    <li class="list-group-item">
                        Morning
                        <div class="material-switch pull-right">
                            <input  name="Morning" type="hidden" value="no" />
                            <input id="Morning" name="Morning" type="checkbox" value="morning" />
                            <label for="Morning" class="label-default"></label>
                        </div>
                    </li>
                    <li class="list-group-item">
                        Afternoon
                        <div class="material-switch pull-right">
                              <input  name="Afternoon" type="hidden" value="no" />
                            <input id="Afternoon" name="Afternoon" type="checkbox" value="afternoon" />
                       
                            <label for="Afternoon" class="label-primary"></label>
                        </div>
                    </li>
                    <li class="list-group-item">
                        Night
                        <div class="material-switch pull-right">
                        	<input  name="Night" type="hidden" value="no" />
                            <input id="Night" name="Night" type="checkbox" value="night" />
                            <label for="Night" class="label-primary"></label>
                        </div>
                    </li>

                    </ul>

                   <input type="hidden" name="infant_ID" value="<?php echo $_GET['infant_ID'] ?>">
                   <input type="hidden" name="productID" value="<?php echo $CheckInfantAssignment[2][0]['product_ID']; ?>">

  							<button name="addMed" class="btn btn-primary">Add</button>
							

						</form>  

                 	


                  </div>

                  
                      <p style="margin-top: 38px;">
  <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
   Check Medicine Status
  </a>
  
</p>

<div class="collapse" id="collapseExample">
  <div class="card card-body">
  
  <?php if($grabIllnessInfo[2] > 0){ ?>
    <table border="1">
      <thead>
        <th>Liquid Value</th>
        <th>ML Per Doses</th>
        <th>Morning</th>
        <th>Afternoon</th>
         <th>Night</th>
        <th>Infant</th>
        <th>Cradle</th>
        <th>Today Morning</th>
         <th>Today Afternoon</th>
        <th>Today Night</th>
        <th rowspan="2"><a onclick="return confirm('Are you sure you want to delete?')" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Delete Medicine Info" href="index.php?page=deleteMedInfo&infant_ID=<?php echo $infantID; ?>&product_ID=<?php echo $CheckInfantAssignment[2][0]['product_ID']; ?>" aria-label="Delete">
                  <i class="fa fa-trash-o" aria-hidden="true"></i>
                </a></th>
      
      </thead>
      <tbody>
        <td><?php echo $grabIllnessInfo[1][0]['liquidValue']; ?></td>   <!-- 1 -->
         <td><?php echo $grabIllnessInfo[1][0]['ml_doses']; ?></td>   <!-- 2 -->

          <td><?php  
             if($grabIllnessInfo[1][0]['morning_ml'] == "morning"){
               
               echo "Yes";

             }else{
              echo "No";
             }
            ?></td>                                                   <!-- 3 --> 


           <td><?php  
             if($grabIllnessInfo[1][0]['afternoon_ml'] == "afternoon"){
               
               echo "Yes";

             }else{
              echo "No";
             }
            ?></td>                                                   <!-- 4 -->


              <td><?php  
             if($grabIllnessInfo[1][0]['night_ml'] == "night"){
               
               echo "Yes";

             }else{
              echo "No";
             }
            ?></td>                                                   <!-- 5 -->


          <td><?php echo ucfirst($getInfantName[1][0]['infant_name']); ?></td>      <!-- 7 -->


           <td><?php echo $CheckInfantAssignment[2][0]['product_ID']; ?></td>   <!-- 8 -->


              <td>  <!-- today date -->
                <?php  
              if($grabIllnessInfo[1][0]['morning_ml'] == "morning"){  
             if($grabIllnessInfo[1][0]['dateGiven_mo'] == $date){
               
               echo "Given";

             }else{
              echo "Not Given";
             }
           }else{

            echo "-";
           }
            ?>
              </td>

                                                                    <!-- 9 -->
         <td> <?php

            if($grabIllnessInfo[1][0]['afternoon_ml'] == "afternoon"){  
             if($grabIllnessInfo[1][0]['dateGiven_af'] == $date){
               
               echo "Given";

             }else{
              echo "Not Given";
             }
           }else{

            echo "-";
           }
            ?></td> 

                                                     <!-- 6 -->                  
         <td>
            <?php 
             if($grabIllnessInfo[1][0]['night_ml'] == "night"){ 
             if($grabIllnessInfo[1][0]['dateGiven_ni'] == $date){
               
               echo "Given";

             }else{
              echo "Not Given";
             }

           }else{

             echo "-";

           }
            ?>
         </td>    <!-- 6 -->                                                      
       
      </tbody>
      
    </table>
    <?php }else{    ?>


    
     <h4 style="margin-left: 200px;">You dont have medicine in use now... You can add one</h4>



 <?php }  ?>
       
  </div>
</div>





   

              	<?php 
            } else { ?>
              
              		<div class="notification card" style="margin: 100px 0px 0px 350px; width: 450px; text-align: center; padding-top: 40px; ">
     					<h3 > <?php echo $infantInfo[1][0]['infant_name']; ?> not assigned to a cradle   </h3>
     					<!-- <a href="index.php?page=infantAccount&infant_ID=<?php echo $infantInfo[1][0]['infant_ID']; ?>"><img src="images/cradleIcon.png" height="30" width="35"></a> -->
     					</div>

<?php


}


if (isset($_GET['medInserted'])) {

    ?> 

             <div class="alert alert-success alert-dismissable">
             <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				  <strong>SUCCESS!</strong> Added Successfully.
				</div>

     <?php

}
if (isset($_GET['medNotInserted'])) {

    ?> 

             <div class="alert alert-danger alert-dismissable">
             <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				  <strong>Faild!</strong> Something went wrong... please try again.
				</div>

             <?php

        }



        if (isset($_GET['UnExpired'])) {

            ?> 

             <div class="alert alert-danger alert-dismissable">
             <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				  <strong>Faild!</strong> You have one medcine already in use.
				</div>

             <?php

        }
        


        if (isset($_GET['medInfoDeleted'])) {

            ?> 

             <div class="alert alert-success alert-dismissable">
             <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>SUCCESS!</strong> Medicine Info Has Been Deleted Successfully .
        </div>

             <?php

        }


        if (isset($_GET['medInfoDeleted'])) {

            ?> 

             <div class="alert alert-danger alert-dismissable">
             <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>FAILD!</strong> Something went wrong...please try again.
        </div>

             <?php

        }


       




        ?>




              

              </div>