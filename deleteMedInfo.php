<?php 





$sql = new sql();


$deleteMedInfo = $sql->deleteMedInfo($_GET['product_ID'], 1);


if($deleteMedInfo[0] == true){

    $infant_ID = $_GET['infant_ID'];
    header("Location:index.php?page=illness&infant_ID=$infant_ID&medInfoDeleted");

}else{


     $infant_ID = $_GET['infant_ID'];
    header("Location:index.php?page=illness&infant_ID=$infant_ID&medInfoNotDeleted");


}