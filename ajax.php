<?php 


SESSION_START();
include "isLogin.php";
include "dbconnection.php";
include "sql.php";


$sql = new sql();
$array = array();

$rows = array();



$listnotif = $sql->listNotifUser($_SESSION['username']);
 // $listnotif = $sql->listNotifUser("besher");

 // echo "<pre>";
 // print_r($listnotif);
 // die();







foreach ($listnotif[1] as $key) {
	$data['title'] = 'Notification Title';

	$data['type'] = $key['type'];


	//$data['icon'] = 'index.png';


	// $data['url'] = 'https://seegatesite.com';





	$rows[] = $data;
	// update notification database
	date_default_timezone_set('Asia/Kuala_Lumpur');
	//$nextime = date('Y-m-d H:i:s',strtotime(date('Y-m-d H:i:s'))+($key['notif_repeat']*60));
	//$sql->updateNotif($key['id'],$nextime);
	$sql->updateNotif($key['noti_ID'], 0);
}





$array['notif'] = $rows;
$array['count'] = $listnotif[2];
$array['result'] = $listnotif[0];




echo json_encode($array);

?>