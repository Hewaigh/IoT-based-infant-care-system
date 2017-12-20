<?php 


$sql = new sql();




if (isset($_GET['makeItNull']) && isset($_GET['infant_ID'])) {





      $makeItNull = $sql->UnAssign($_GET['infant_ID'], null);


      if ($makeItNull[0] == true) {

            $infantID = $_GET['infant_ID'];
            header("Location:index.php?page=infantAccount&ProductUnAssigned=ProductUnAssigned&infant_ID=$infantID");

      } else {
            $infantID = $_GET['infant_ID'];
            header("Location:index.php?page=infantAccount&Notassigned=Notassigned&infant_ID=$infantID");

      }

}


if (isset($_GET['product_ID']) && isset($_GET['infant_ID'])) {



$CheckInfantAssignment = $sql->CheckInfantAssignment($_GET['infant_ID'], $_SESSION['username']);


if($CheckInfantAssignment[1] > 0){


      $productID = $_GET['product_ID'];
     $infantID = $_GET['infant_ID'];
    header("Location:index.php?page=infantAccount&alreadyAssigned=alreadyAssigned&product_ID=$productID&infant_ID=$infantID");

}else{




      if (isset($_GET['confirm'])) {

            $assign = $sql->assignCradle($_GET['product_ID'], $_GET['infant_ID']);



            if ($assign[0] == true) {





                  $infantID = $_GET['infant_ID'];
                  header("Location:index.php?page=infantAccount&ProductAssigned=ProductAssigned&infant_ID=$infantID");




            } else {

                  $productID = $_GET['product_ID'];
                  $infantID = $_GET['infant_ID'];

                  header("Location:index.php?page=infantAccount&Notassigned=Notassigned&product_ID=$productID&infant_ID=$infantID");





            }




      }
        //echo "ssssfjsfos";
       // die();





      else {




   // check if cradle already in use

            $cradleState = $sql->cradleState($_GET['product_ID']);


            if ($cradleState[2][0]['infant_ID'] == NULL) {





                  $assign = $sql->assignCradle($_GET['product_ID'], $_GET['infant_ID']);



                  if ($assign[0] == true) {





                        $infantID = $_GET['infant_ID'];
                        header("Location:index.php?page=infantAccount&ProductAssigned=ProductAssigned&infant_ID=$infantID");




                  } else {

                        $productID = $_GET['product_ID'];
                        $infantID = $_GET['infant_ID'];
                        header("Location:index.php?page=infantAccount&Notassigned=Notassigned&product_ID=$productID&infant_ID=$infantID");



                  }

            } else {







                  $productID = $_GET['product_ID'];
                  $infantID = $_GET['infant_ID'];


                  header("Location:index.php?page=infantAccount&InUse=InUse&product_ID=$productID&infant_ID=$infantID");



            }


      }





  }


}





