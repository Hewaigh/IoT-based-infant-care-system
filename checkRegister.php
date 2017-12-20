<?php
include "dbconnection.php";

include "sql.php";

$sql = new sql();





if (isset($_POST['signup'])) {



  if (isset($_POST['username']) and isset($_POST['password']) and isset($_POST['email']) and isset($_POST['confirmpassword']) and isset($_POST['product_ID']) and isset($_POST['pnumber'])) {

    $check = $sql->checkUsername($_POST['username']);

    if ($check[1] == 1) {

      header("Location:registration.php?username=exist");

    } else {

      $checkEmail = $sql->checkEmail($_POST['email']);

      if ($checkEmail[1] == 1) {

        header("Location:registration.php?email=exist");

      } else {


        $checkProduct = $sql->checkProduct($_POST['product_ID']);

        if ($checkProduct[1] == 0) {

          header("Location:registration.php?product=invalid");

        } else {





                                       // insert data and product
          $insertUser = $sql->insertUser($_POST['username'], $_POST['email'], $_POST['password'], $_POST['pnumber']);


          $insertProduct = $sql->inserProduct($_POST['product_ID'], $_POST['username']);

                                      // echo "<pre>";
                                      // print_r($insertProduct);
                                      // die();



          if ($insertUser[0] == true and $insertProduct[0] == true) {

            $insertHeratRate = $sql->insertHeratDevice("heartRate", $_POST['product_ID'], "off");
            $insertTemp = $sql->insertHeratDevice("temp", $_POST['product_ID'], "off");
            $insertSound = $sql->insertHeratDevice("sound", $_POST['product_ID'], "off");
            $insertWeight = $sql->insertHeratDevice("weight", $_POST['product_ID'], "off");

            if ($insertHeratRate[0] == true and $insertTemp[0] == true and $insertSound[0] == true and $insertWeight[0] == true) {


                                         // inserted successfully
                                        // header("Location:index.php?page=addCradle&infant_ID=0&cradleInserted=cradleInserted");
              header("Location:login.php?accountCreated=done");

            } else {

                                            // echo "do something";
              header("Location:registration.php?registerInvalid=invalid");
                                            //  die();


            }




          } else {

            header("Location:registration.php?registerInvalid=invalid");


          }

        }

      }







    }


  }


}