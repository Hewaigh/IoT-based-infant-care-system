 <?php 
include 'dbconnection.php';
include 'sql.php';
session_start();
$sql = new sql();



if (isset($_GET['productID']) && isset($_GET['soundValue'])) {


  $username = $sql->getUsernameByProductID($_GET['productID']);




  $product = $_GET['productID'];
  $sound = $_GET['soundValue'];
  $productID = (int)$product;
  $date = date("Y-m-d");

  $dateWithTime = date("Y-m-d h:i:sa");




  $insertTemp = $sql->insertTemp($sound, $date, $productID);
// if not inserted, maybe you go and modify the device table to off

   // include it dateWithTime
  $insertTemp = $sql->saveNotif("sound", "2017-11-08 00:00:00", 1, null, $username[1][0]['user_name']);
// if not inserted, maybe you go and modify the device table to off

 



