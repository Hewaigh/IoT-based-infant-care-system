<?php
include "dbconnection.php";
include 'sql.php';
   //session_start();
$sql = new sql();



if (isset($_POST['sound']) || isset($_POST['temp']) || isset($_POST['heart']) || isset($_POST['weight'])) {

  $infant_ID = $_POST['infantID'];

}





$productID = $sql->selectProductByInfantID($infant_ID);
$checkDevice = $sql->checkDevice("sound", $productID[2][0]['product_ID']);
$checkDeviceTemp = $sql->checkDevice("temp", $productID[2][0]['product_ID']);
$checkDeviceHeart = $sql->checkDevice("heartRate", $productID[2][0]['product_ID']);
$checkDeviceWeight = $sql->checkDevice("weight", $productID[2][0]['product_ID']);




if (isset($_POST['sound']) && $checkDevice[2][0]['state'] == 'off') {


    // $infant_ID = $_POST['infantID'];

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








if (isset($_POST['sound']) && $checkDevice[2][0]['state'] == 'on') {

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



///  END OF SOUND SENSOR



/// START WITH TEMPERATURE SENSOR







if (isset($_POST['temp']) && $checkDeviceTemp[2][0]['state'] == 'off') {

  $infant_ID = $_POST['infantID'];

  $productID = $sql->selectProductByInfantID($infant_ID);







  if ($productID[1] > 0) {

    // $checkDevice = $sql->checkDevice("temp",$productID[2][0]['product_ID']);








    if ($checkDeviceTemp[1] > 0 && $checkDeviceTemp[2][0]['state'] == 'off') {





      $updateDeviceState = $sql->updateDeviceState("temp", $productID[2][0]['product_ID'], "on");



      if ($updateDeviceState) {

        //echo "changed";
        $x = "temp";
        $y = $productID[2][0]['product_ID'];
        shell_exec("python tempSender.py $x $y > /dev/null 2>/dev/null &");
        header("Location:index.php?page=infantAccount&infant_ID=$infant_ID&sensorON=sensorON");
      }


    } else if ($checkDeviceTemp[1] > 0 && $checkDeviceTemp[2][0]['state'] == 'on') {

            //echo "the sensor is on";
      header("Location:index.php?page=infantAccount&infant_ID=$infant_ID&alreadyOn=alreadyOn");
    } else {

      header("Location:index.php?page=infantAccount&infant_ID=$infant_ID&noSuch=noSuch");

    }




  } else {


         // echo "no infant with this name sleeping on this cradle";
    header("Location:index.php?page=infantAccount&infant_ID=$infant_ID&noAssigned=noAssigned");
  }



}






if (isset($_POST['temp']) && $checkDeviceTemp[2][0]['state'] == 'on') {


  $infant_ID = $_POST['infantID'];

  $productID = $sql->selectProductByInfantID($infant_ID);




  if ($productID[1] > 0) {

     //$checkDevice = $sql->checkDevice("temp",$productID[2][0]['product_ID']);


    if ($checkDeviceTemp[1] > 0 && $checkDeviceTemp[2][0]['state'] == 'on') {





      $updateDeviceState = $sql->updateDeviceState("temp", $productID[2][0]['product_ID'], "off");



      if ($updateDeviceState) {

      //  echo "changed";
        header("Location:index.php?page=infantAccount&infant_ID=$infant_ID&sensorOFF=sensorOFF");
      }


    } else if ($checkDeviceTemp[1] > 0 && $checkDeviceTemp[2][0]['state'] == 'off') {

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




// END OF TEMPERATURE SENSOR 











// START WITH HEART RATE SENSOR


if (isset($_POST['heart']) && $checkDeviceHeart[2][0]['state'] == 'off') {

  $infant_ID = $_POST['infantID'];

  $productID = $sql->selectProductByInfantID($infant_ID);







  if ($productID[1] > 0) {

    $checkDevice = $sql->checkDevice("heartRate", $productID[2][0]['product_ID']);








    if ($checkDevice[1] > 0 && $checkDevice[2][0]['state'] == 'off') {





      $updateDeviceState = $sql->updateDeviceState("heartRate", $productID[2][0]['product_ID'], "on");



      if ($updateDeviceState) {

        //echo "changed";
        $x = "heartRate";
        $y = $productID[2][0]['product_ID'];
        shell_exec("python heartSender.py $x $y > /dev/null 2>/dev/null &");
        header("Location:index.php?page=infantAccount&infant_ID=$infant_ID&sensorON=sensorON");
      }


    } else if ($checkDevice[1] > 0 && $checkDevice[2][0]['state'] == 'on') {

            //echo "the sensor is on";
      header("Location:index.php?page=infantAccount&infant_ID=$infant_ID&alreadyOn=alreadyOn");
    } else {

      header("Location:index.php?page=infantAccount&infant_ID=$infant_ID&noSuch=noSuch");

    }




  } else {


         // echo "no infant with this name sleeping on this cradle";
    header("Location:index.php?page=infantAccount&infant_ID=$infant_ID&noAssigned=noAssigned");
  }



}






if (isset($_POST['heart']) && $checkDeviceHeart[2][0]['state'] == 'on') {


  $infant_ID = $_POST['infantID'];

  $productID = $sql->selectProductByInfantID($infant_ID);




  if ($productID[1] > 0) {

    // $checkDeviceHeart = $sql->checkDevice("heartRate",$productID[2][0]['product_ID']);


    if ($checkDeviceHeart[1] > 0 && $checkDeviceHeart[2][0]['state'] == 'on') {





      $updateDeviceState = $sql->updateDeviceState("heartRate", $productID[2][0]['product_ID'], "off");



      if ($updateDeviceState) {

      //  echo "changed";
        header("Location:index.php?page=infantAccount&infant_ID=$infant_ID&sensorOFF=sensorOFF");
      }


    } else if ($checkDeviceHeart[1] > 0 && $checkDeviceHeart[2][0]['state'] == 'off') {

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






// END WITH HEART RATE SENSOR 







// START WITH WEIGHT SENSOR 




if (isset($_POST['weight']) && $checkDeviceWeight[2][0]['state'] == 'off') {

  $infant_ID = $_POST['infantID'];

  $productID = $sql->selectProductByInfantID($infant_ID);







  if ($productID[1] > 0) {

     // $checkDeviceWeight = $sql->checkDevice("weight",$productID[2][0]['product_ID']);








    if ($checkDeviceWeight[1] > 0 && $checkDeviceWeight[2][0]['state'] == 'off') {





      $updateDeviceState = $sql->updateDeviceState("weight", $productID[2][0]['product_ID'], "on");



      if ($updateDeviceState) {

        //echo "changed";
        $x = "weight";
        $y = $productID[2][0]['product_ID'];
        shell_exec("python weightSender.py $x $y > /dev/null 2>/dev/null &");
        header("Location:index.php?page=infantAccount&infant_ID=$infant_ID&sensorON=sensorON");
      }


    } else if ($checkDeviceWeight[1] > 0 && $checkDeviceWeight[2][0]['state'] == 'on') {

            //echo "the sensor is on";
      header("Location:index.php?page=infantAccount&infant_ID=$infant_ID&alreadyOn=alreadyOn");
    } else {

      header("Location:index.php?page=infantAccount&infant_ID=$infant_ID&noSuch=noSuch");

    }




  } else {


         // echo "no infant with this name sleeping on this cradle";
    header("Location:index.php?page=infantAccount&infant_ID=$infant_ID&noAssigned=noAssigned");
  }



}






if (isset($_POST['weight']) && $checkDeviceWeight[2][0]['state'] == 'on') {


  $infant_ID = $_POST['infantID'];

  $productID = $sql->selectProductByInfantID($infant_ID);




  if ($productID[1] > 0) {

    $checkDevice = $sql->checkDevice("weight", $productID[2][0]['product_ID']);


    if ($checkDevice[1] > 0 && $checkDevice[2][0]['state'] == 'on') {





      $updateDeviceState = $sql->updateDeviceState("weight", $productID[2][0]['product_ID'], "off");



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
















