 
 <?php


  $CheckInfantAssignment = $sql->CheckInfantAssignment($_GET['infant_ID'], $_SESSION['username']);
  $infantInfo = $sql->infantInfo($_GET['infant_ID']); ?>


 <div class="infantName color-white"><?php echo strtoupper($infantInfo[1][0]['infant_name']); ?></div> 
<?php include("subnav.php"); ?>

              <div class="overview container">
             

              <?php 

                if ($CheckInfantAssignment[1] > 0) { ?>


         
              <div class="watchframe">
              	wtach here 
              </div>
              <button class="btn btn-primary swingBtn">Swing</button>


              <?php }else{  ?>


                  <div class="notification card" style="margin: 100px 0px 0px 350px; width: 450px; text-align: center; padding-top: 40px; ">
     					<h3 > <?php echo $infantInfo[1][0]['infant_name']; ?> not assigned to a cradle   </h3>
     					<!-- <a href="index.php?page=infantAccount&infant_ID=<?php echo $infantInfo[1][0]['infant_ID']; ?>"><img src="images/cradleIcon.png" height="30" width="35"></a> -->
     					</div>



            <?php  	} ?>


              

              </div>