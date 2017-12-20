 <?php 
include 'dbconnection.php';
include 'sql.php';
session_start();
$sql = new sql();





if (isset($_GET['productID']) && isset($_GET['heartValue'])) {


  $username = $sql->getUsernameByProductID($_GET['productID']);




  $product = $_GET['productID'];
  $heart = $_GET['heartValue'];
  $productID = (int)$product;
  $heartValue = (float)$heart;
  $date = date("Y-m-d");

  $dateWithTime = date("Y-m-d h:i:sa");



  $insertTemp = $sql->insertHeartRate($heartValue, $date, $productID);

  // remeber to set it to the right range
  if ($_GET['heartValue'] > 37 || $_GET['heartValue'] < 36) {
    // include it dateWithTime
    $insertTemp = $sql->saveNotif("heartRate", "2017-11-08 00:00:00", 1, null, $username[1][0]['user_name']);

  }

