<?php 

session_start();
include 'dbconnection.php';
include 'sql.php';
$sql = new sql();





if (isset($_POST['updateEmail'])) {

  $updateUserEmail = $sql->updateUserEmail($_POST['newEmail'], $_SESSION['username']);



  if ($updateUserEmail[0] == true) {

    header("Location:index.php?page=userAccount&emailUpdated=emailUpdated&infant_ID=0");

  } else {



    header("Location:index.php?page=userAccount&emailNotUpdated=emailNotUpdated&infant_ID=0");


  }


}









if (isset($_POST['updatePhone'])) {


  $updatePhoneNumber = $sql->updatePhoneNumber($_POST['pNuumber'], $_SESSION['username']);

  if ($updatePhoneNumber[0] == true) {

    header("Location:index.php?page=userAccount&phoneUpdated=phoneUpdated&infant_ID=0");

  } else {



    header("Location:index.php?page=userAccount&phoneNotUpdated=phoneNotUpdated&infant_ID=0");


  }

}








if (isset($_POST['addCradle'])) {



  $checkProduct = $sql->checkProduct($_POST['product_ID']);
  $productAlradeyInUse = $sql->cradleInUse($_POST['product_ID'], $_SESSION['username']);
   // echo "<pre>";
   // print_r($productAlradeyInUse);
   // die();



  if ($checkProduct[1] == 0) {


    
    header("Location:index.php?page=userAccount&cradleNotAdded=cradleNotAdded&infant_ID=0");

  } else if ($productAlradeyInUse[1] > 0) {


    header("Location:index.php?page=userAccount&cradleNotAdded=cradleNotAdded&infant_ID=0");


  } else {


    $insertProduct = $sql->inserProduct($_POST['product_ID'], $_SESSION['username']);

    if ($insertProduct[0] == true) {

      $insertHeratRate = $sql->insertHeratDevice("heartRate", $_POST['product_ID'], "off");
      $insertTemp = $sql->insertHeratDevice("temp", $_POST['product_ID'], "off");
      $insertSound = $sql->insertHeratDevice("sound", $_POST['product_ID'], "off");
      $insertWeight = $sql->insertHeratDevice("weight", $_POST['product_ID'], "off");

      if ($insertHeratRate[0] == true and $insertTemp[0] == true and $insertSound[0] == true and $insertWeight[0] == true) {


                                             // inserted successfully

        header("Location:index.php?page=userAccount&cradleAdded=cradleAdded&infant_ID=0");

      } else {

                                            // echo "do something";
        header("Location:index.php?page=userAccount&cradleNotAdded=cradleNotAdded&infant_ID=0");



      }


    } else {

      header("Location:index.php?page=userAccount&cradleNotAdded=crafdleNotAdded&infant_ID=0");


    }




  }


}









if (isset($_POST['deleteAccount'])) {



  $deleteAccount = $sql->deleteAccount($_SESSION['username']);


  if ($deleteAccount[0] == true) {

    unset($_SESSION['username']);
    session_destroy();
    header("Location:login.php?accountDeleted=accountDeleted");


  } else {


    header("Location:index.php?page=deleteAccount&notDeleted=notDeleted");

  }


}











if (isset($_POST['changePassword'])) {





  $changePassword = $sql->getLogin($_SESSION['username'], $_POST['oldPassword']);

  if ($changePassword[2] > 0) {







    $updatedPassword = $sql->updatePassword($_POST['newPassword'], $_SESSION['username']);

    if ($updatedPassword[0] == true) {


      header("Location:index.php?page=userAccount&infant_ID=0&changed=changed");


    } else {


      header("Location:index.php?page=userAccount&infant_ID=0&notchanged=notchanged");

    }


  } else {



    header("Location:index.php?page=userAccount&infant_ID=0&wrongOldPassword=wrongOldPassword");


  }


}