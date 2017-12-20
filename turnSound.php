<?php
include "dbconnection.php";
include 'sql.php';
   //session_start();
$sql = new sql();



$checkDevice = $sql->checkDevice("sound", $productID[2][0]['product_ID']);



if (isset($_POST['sound']) && $checkDevice[2][0]['state'] == 'on') {

  $infant_ID = $_POST['infantID'];

  $productID = $sql->selectProductByInfantID($infant_ID);



  if ($productID[1] > 0) {

    // $checkDevice = $sql->checkDevice("sound",$productID[2][0]['product_ID']);



    if ($checkDevice[1] > 0 && $checkDevice[2][0]['state'] == 'off') {


      $updateDeviceState = $sql->updateDeviceState("sound", $productID[2][0]['product_ID'], "on");

      if ($updateDeviceState) {

		   	//echo "changed";
        $x = "sound";
        $y = $productID[2][0]['product_ID'];
        shell_exec("python soundSender.py $x $y > /dev/null 2>/dev/null &");
        header("Location:index.php?page=infantAccount&infant_ID=$infant_ID&sensorON=sensorON");
      }


    } else if ($checkDevice[1] > 0 && $checkDevice[2][0]['state'] == 'on') {

		      	//echo "the sensor is on";
      header("Location:index.php?page=infantAccount&infant_ID=$infant_ID&alreadyOn=alreadyOn");
    } else {

      header("Location:index.php?page=infantAccount&infant_ID=$infant_ID&noSuch=noSuch");

    }




  } else {


		     //	echo "no infant with this name sleeping on this cradle";
    header("Location:index.php?page=infantAccount&infant_ID=$infant_ID&noAssigned=noAssigned");
  }



}








if (isset($_POST['sound']) && $checkDevice[2][0]['state'] == 'off') {

  $infant_ID = $_POST['infantID'];

  $productID = $sql->selectProductByInfantID($infant_ID);


  if ($productID[1] > 0) {

     // $checkDevice = $sql->checkDevice("sound",$productID[2][0]['product_ID']);


    if ($checkDevice[1] > 0 && $checkDevice[2][0]['state'] == 'on') {





      $updateDeviceState = $sql->updateDeviceState("sound", $productID[2][0]['product_ID'], "off");



      if ($updateDeviceState) {

      //  echo "changed";
        header("Location:index.php?page=infantAccount&infant_ID=$infant_ID&sensorOFF=sensorOFF");
      }


    } else if ($checkDevice[1] > 0 && $checkDevice[2][0]['state'] == 'off') {

            //echo "the sensor is on";
      header("Location:index.php?page=infantAccount&infant_ID=$infant_ID&alreadyOFF=alreadyOFF");
    } else {

      header("Location:index.php?page=infantAccount&infant_ID=$infant_ID&noSuch=noSuch");
    }




  } else {


         // echo "no infant with this name sleeping on this cradle";
    header("Location:index.php?page=infantAccount&infant_ID=$infant_ID&noAssigned=noAssigned");
  }








}




















