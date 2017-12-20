 <?php 
include 'dbconnection.php';
include 'sql.php';
session_start();
$sql = new sql();

  // echo "<pre>";
  // print_r($_SESSION['username']);
  // die();


  // $username = $sql->getUsernameByProductID(1111);

  //  echo "<pre>";
 // print_r($username);
 // die();



if (isset($_GET['productID']) && isset($_GET['tempValue'])) {


  $username = $sql->getUsernameByProductID($_GET['productID']);




  $product = $_GET['productID'];
  $temp = $_GET['tempValue'];
  $productID = (int)$product;
  $tempValue = (float)$temp;
  $date = date("Y-m-d");

  $dateWithTime = date("Y-m-d h:i:sa");



// after recieving the temperature data, we insert it in the tempertureRecieiver table in our database 
  $insertTemp = $sql->insertTemp($tempValue, $date, $productID);



  // and then we check if the tempereture is abnormal. if so, data must be inserted in the notification and noti tables (which will be combined)  
  if ($_GET['tempValue'] > 37 || $_GET['tempValue'] < 36) {
    // include it dateWithTime
    $insertTemp = $sql->saveNotif("Temprature", "2017-11-08 00:00:00", 1, null, $username[1][0]['user_name']);

  }

}



 

























