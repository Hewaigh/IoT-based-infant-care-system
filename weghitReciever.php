 <?php 

include 'dbconnection.php';
include 'sql.php';
session_start();
$sql = new sql();






//$dbConnection = new Mysqli("localhost", "root", "root", "TestDataCollection");



if (isset($_GET['productID']) && isset($_GET['weightValue'])) {








 // $theRequestValue = $_GET['productID'];
 // $liquidValue = $_GET['weightValue'];

 // $sqlStatement = "INSERT INTO `data` VALUES(NULL, '" . $theRequestValue . "', '" . $liquidValue . "')";

 // if ($dbConnection->query($sqlStatement)) {
 //   echo 'Data inserted successfully!';
 // } else {
 //   echo 'something goes wrong!';
 // }











 $product = $_GET['productID'];    // 123456
 //$productID = (int)$product;     // i dont need it 



 // grab the usename :
    $grabUsername = $sql->cradleState($product);

    


 //$bottleLiquid = $_GET['weightValue'];  // obtain weightValue (Total with gram)
 //$liquidValue = (float)$bottleLiquid;   // convert it to float for calculation    but in datavase it is integer
$liquidValue = $_GET['weightValue'];



   // getting the value with g 

   $boottleLiquidML =  $liquidValue;     // it equl bottle + liquid = 680 ml   /// we conver the total from gram to ml

   $date =  date("Y-m-d"); 

                       // we obtain current date     ... we may need the time too



// -----1--------------------------------------------------------------------------

  /// first we take care of if the bottle is placed on sensor or not.
// if the value less than 10 gram or equl to 0 we modify devices table to off 
  // and we try let the user know that the sensor didnt detecte a bottle.
if ($liquidValue > 10){


    // ---2----------------------------------------------------------------------------

      // must check the legiued wight in database where the product ID = $_GET['productID'];

     $checkForLiquid = $sql->checkForLiquid($product, 1); //bring the one that is not expired state = 1


     // echo "<pre>";
     // print_r($checkForLiquid);
     // die();



      if($checkForLiquid[1] > 0){  // check for liquid if it is expired or not   -------go else that says it is expired
   



      


              if($checkForLiquid[2][0]['bottleMl'] == null){    // first time  (null)  ----> when the bottle value is null in database  

                 $liguidConvertedToGram = $checkForLiquid[2][0]['liquidValue'] * 1.263;

      // $bottleWeightML =  $boottleLiquidML - $liguidConvertedToGram;   // we need just the bottle weight (bottle w with ML)
                 $bootleWeight =  $boottleLiquidML - $liguidConvertedToGram;    // gram
                 $updateBottle = $sql->updateBottle($bootleWeight, $product, 1);

    



              }else if ($checkForLiquid[2][0]['bottleMl'] != null){   // after first time   (not Null)----> after updating the bottle value in database 


                   if($checkForLiquid[2][0]['morning_ml'] == "morning"){   // valid when morning_ml in database is equal to morning 

                         $ThatTime ="08:00:00";
                         $ThatTime2 ="10:00:00";
                         if(time() >= strtotime($ThatTime)  && time() <= strtotime($ThatTime2)) // if time between 8 and 10
                          {

                          //  $liguidConvertedToGram = $checkForLiquid[2][0]['liquidValue'] * 1.263;
                             
                             $newLiquidValueWithGram = $boottleLiquidML - $checkForLiquid[2][0]['bottleMl'];
                              $newLiquidValue = $newLiquidValueWithGram / 1.263;

                              
                              if(($newLiquidValue <= ($checkForLiquid[2][0]['liquidValue'] + 5) &&  $newLiquidValue >= ($checkForLiquid[2][0]['liquidValue'] - 5)) && ($date != $checkForLiquid[2][0]['dateGiven_mo'])) // comingLiqiud == databaseLiqiud and current date != database date
                                {
                                            //  echo $newLiquidValue;      //&& $date != $checkForLiquid[2][0]['givenDate']
                                          
                                    //$_SESSION[1][0]['user_name']

                                          // send notification
                          $insertTemp = $sql->saveNotif("weightGiveMo", "2017-11-08 00:00:00", 1, null, $grabUsername[2][0]['user_name']); 
                                }

                                else if($newLiquidValue < $checkForLiquid[2][0]['liquidValue']){ // comingLiquid < databaseLiquid current date != database date


                                        // update liq and dateGiven
                                  $updateLiquidLevelToLower = $sql->updateLiquidLevel($newLiquidValue, $date , $product, 1);
                                  

                                              

                                    // if($newLiquidValueWithGram <= $checkForLiquid[2][0]['bottleMl']){
                                   if($newLiquidValueWithGram <= 5){

                                             // sensd phone notification
                                             //and update the expired attriburte to 0;
                                          $insertTemp = $sql->saveNotif("weightFinish", "2017-11-08 00:00:00", 1, null, $grabUsername[2][0]['user_name']); 
                                           //    echo "<pre>";
                                           //    echo "sosososo";
                                           // print_r($insertTemp);
                                           // die();
                                           $updateLiquidState = $sql->updateLiquidState($product, 0);

                                       
                                     }




                                }

                                
                          }else{

                            // do something 
                          }


                   }



                   if($checkForLiquid[2][0]['afternoon_ml'] == "afternoon"){  // valid when morning_ml in database is equal to afternoon and a_given is equal no
                    $ThatTime ="14:00:00";
                         $ThatTime2 ="16:00:00";
                         if(time() >= strtotime($ThatTime)  && time() <= strtotime($ThatTime2)) // if time between 8 and 10
                          {

                          //  $liguidConvertedToGram = $checkForLiquid[2][0]['liquidValue'] * 1.263;
                             
                             $newLiquidValueWithGram = $boottleLiquidML - $checkForLiquid[2][0]['bottleMl'];
                              $newLiquidValue = $newLiquidValueWithGram / 1.263;

                              
                              if(($newLiquidValue <= ($checkForLiquid[2][0]['liquidValue'] + 5) &&  $newLiquidValue >= ($checkForLiquid[2][0]['liquidValue'] - 5)) && ($date != $checkForLiquid[2][0]['dateGiven_af'])) // comingLiqiud == databaseLiqiud and current date != database date
                                {
                                            //  echo $newLiquidValue;      //&& $date != $checkForLiquid[2][0]['givenDate']
                                     //echo "aftdohdochoernoon";       
                                 // die();    //$_SESSION[1][0]['user_name']

                                          // send notification
                          $insertTemp = $sql->saveNotif("weightGiveAfter", "2017-11-08 00:00:00", 1, null, $grabUsername[2][0]['user_name']); 
                                }

                                else if($newLiquidValue < $checkForLiquid[2][0]['liquidValue']){ // comingLiquid < databaseLiquid current date != database date


                                        // update liq and dateGiven
                                  $updateLiquidLevelToLower = $sql->updateLiquidLevel_Afternoon($newLiquidValue, $date , $product, 1);
                                  

                                              

                                     //if($newLiquidValueWithGram <= $checkForLiquid[2][0]['bottleMl']){
                                   if($newLiquidValueWithGram <= 5){

                                             // sensd phone notification
                                             //and update the expired attriburte to 0;
                                          $insertTemp = $sql->saveNotif("weightFinish", "2017-11-08 00:00:00", 1, null, $grabUsername[2][0]['user_name']); 
                                           //    echo "<pre>";
                                           //    echo "sosososo";
                                           // print_r($insertTemp);
                                           // die();
                                           $updateLiquidState = $sql->updateLiquidState($product, 0);

                                       
                                     }




                                }

                                
                          }else{

                            // do something 
                          }
   

                   }


                   if($checkForLiquid[2][0]['night_ml'] == "night"){  // valid when morning_ml in database is equal to night and n_given is equal no
                    $ThatTime ="20:00:00";
                         $ThatTime2 ="21:00:00";
                         if(time() >= strtotime($ThatTime)  && time() <= strtotime($ThatTime2)) // if time between 8 and 10
                          {

                          //  $liguidConvertedToGram = $checkForLiquid[2][0]['liquidValue'] * 1.263;
                             
                             $newLiquidValueWithGram = $boottleLiquidML - $checkForLiquid[2][0]['bottleMl'];
                              $newLiquidValue = $newLiquidValueWithGram / 1.263;

                              
                              if(($newLiquidValue <= ($checkForLiquid[2][0]['liquidValue'] + 5) &&  $newLiquidValue >= ($checkForLiquid[2][0]['liquidValue'] - 5)) && ($date != $checkForLiquid[2][0]['dateGiven_ni'])) // comingLiqiud == databaseLiqiud and current date != database date
                                {
                                            //  echo $newLiquidValue;      //&& $date != $checkForLiquid[2][0]['givenDate']
                                           // echo "sjfosfhfih";
                                 // die();    //$_SESSION[1][0]['user_name']

                                          // send notification
                          $insertTemp = $sql->saveNotif("weightGiveNig", "2017-11-08 00:00:00", 1, null, $grabUsername[2][0]['user_name']); 
                                }

                                else if($newLiquidValue < $checkForLiquid[2][0]['liquidValue']){ // comingLiquid < databaseLiquid current date != database date


                                        // update liq and dateGiven
                                  $updateLiquidLevelToLower = $sql->updateLiquidLevel_Night($newLiquidValue, $date , $product, 1);
                                  

                                              

                                     //if($newLiquidValueWithGram <= $checkForLiquid[2][0]['bottleMl']){
                                       if($newLiquidValueWithGram <= 5){

                                             // sensd phone notification
                                             //and update the expired attriburte to 0;
                                          $insertTemp = $sql->saveNotif("weightFinish", "2017-11-08 00:00:00", 1, null, $grabUsername[2][0]['user_name']); 
                                           //    echo "<pre>";
                                           //    echo "sosososo";
                                           // print_r($insertTemp);
                                           // die();
                                           $updateLiquidState = $sql->updateLiquidState($product, 0);

                                       
                                     }




                                }

                                
                          }else{

                            // do something 
                          }



                   }




          


              }

              

                 } else{    // it is expired === which means the bottle is empty

                   // bottle finished 
                     echo "string";
                     $saveNotif = $sql->saveNotif("This medicine is expired .off", "2017-11-08 00:00:00", 1, null, $grabUsername[2][0]['user_name']); 


                 }





    



       

   } else {




       // there is no a bottle on the sensor ... do something 
        
        }


 }




//}