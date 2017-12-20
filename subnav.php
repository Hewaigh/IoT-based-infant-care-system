<?php
$infantID = $_GET['infant_ID'];

?>



               <!-- <div class="infantName color-white">Ahmad</div> -->
               <div class="subNav color-white">
                   <ul>
                   <?php if ($_GET['page'] == 'infantAccount') { ?>
                  
                       <li><a href="index.php?page=watch&infant_ID=<?php echo $infantID ?>">Watch</a></li>
                        <li><a href="index.php?page=notification&infant_ID=<?php echo $infantID ?>">Notification</a></li>
                         <li><a href="index.php?page=illness&infant_ID=<?php echo $infantID ?>"><div>Illness</div></a></li>
                      
                       <?php 
                    } ?>


                       <?php if ($_GET['page'] == 'watch') { ?>
                        <li><a href="index.php?page=notification&infant_ID=<?php echo $infantID ?>">Notification</a></li>
                        <li><a href="index.php?page=infantAccount&infant_ID=<?php echo $infantID ?>">Overview</a></li>
                         <li><a href="index.php?page=illness&infant_ID=<?php echo $infantID ?>">Illness</a></li>
                      
                        <?php 
                      } ?>


                          <?php if ($_GET['page'] == 'notification') { ?>
                          <li><a href="index.php?page=watch&infant_ID=<?php echo $infantID ?>">Watch</a></li>
                           <li><a href="index.php?page=infantAccount&infant_ID=<?php echo $infantID ?>">Overview</a></li>
                            <li><a href="index.php?page=illness&infant_ID=<?php echo $infantID ?>">Illness</a></li>
                      
                       <?php 
                    } ?>



                         <?php if ($_GET['page'] == 'illness') { ?>
                         <li><a href="index.php?page=watch&infant_ID=<?php echo $infantID ?>">Watch</a></li>
                            <li><a href="index.php?page=infantAccount&infant_ID=<?php echo $infantID ?>">Overview</a></li>
                          <li><a href="index.php?page=notification&infant_ID=<?php echo $infantID ?>">Notification</a></li>
                       
                        <?php 
                      } ?>
                   </ul>
               </div>