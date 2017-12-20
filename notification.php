 <?php $infantInfo = $sql->infantInfo($_GET['infant_ID']);
$notification = $sql->InfantNotification($_GET['infant_ID']); 
// $notification[2] = 54;

?>
<div class="infantName color-white"><?php echo strtoupper($infantInfo[1][0]['infant_name']); ?></div> 
<?php include("subnav.php"); ?>

              <div class="overview container" style="padding-top: 80px; overflow-y: scroll;">
      

               <?php
                if ($notification[2] > 0) {

                        $index = 0;
                        do { ?>

               
               <div class="notification card">
               	<p>ali</p>
               </div>

                   <?php $index++;
                } while ($index < $notification[2]);




        } else {

                ?>

                        <div class="notification card" style="margin: 100px 0px 0px 350px; width: 450px; text-align: center; padding-top: 40px; ">
     					<h1 >  No Notifications</h1>
     					</div>


                	<?php	
        }



        ?>
         


              

              </div>