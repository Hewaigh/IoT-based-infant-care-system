<?php 



class sql extends dbconnection
{

  public function __construct()
  {

    $this->initDBO();

  }




  public function getLogin($user, $pass)
  {


    $db = $this->dblocal;






    try {
      $stmt = $db->prepare("select * from User_Info where user_name = :user and user_password = :pass");
      $stmt->bindParam("user", $user);
      $stmt->bindParam("pass", $pass);
      $stmt->execute();
      $stat[0] = true;
      $stat[1] = $stmt->fetchAll(PDO::FETCH_ASSOC);
      $stat[2] = $stmt->rowCount();
      return $stat;

    } catch (PDOException $ex) {

      $stat[0] = false;
      $stat[1] = $ex->getMessage();
      return $stat;


    }
  }




  public function checkAdminLogin($username, $password)
  {
    $db = $this->dblocal;


    try {
      $stmt = $db->prepare("select * from admin where username = :username and password = :password");
      $stmt->bindParam("username", $username);
      $stmt->bindParam("password", $password);
      $stmt->execute();
      $stat[0] = true;
      $stat[1] = $stmt->fetchAll(PDO::FETCH_ASSOC);
      $stat[2] = $stmt->rowCount();
      return $stat;

    } catch (PDOException $ex) {

      $stat[0] = false;
      $stat[1] = $ex->getMessage();
      return $stat;


    }





  }



  public function listUser()
  {
    $db = $this->dblocal;

    try {


      $stmt = $db->prepare("select * from User_Info");
      $stmt->execute();
      $stat[0] = true;
      $stat[1] = $stmt->fetchAll(PDO::FETCH_ASSOC);
      $stat[2] = $stmt->rowCount();
      return $stat;



    } catch (PDOException $ex) {

      $stat[0] = false;
      $stat[1] = $ex->getMessage();
      return $stat;

    }
  }











  public function listInfantsBasedOnUser($username)
  {
    $db = $this->dblocal;

    try {


      $stmt = $db->prepare("SELECT * from infant WHERE user_name ='$username'");
      $stmt->bindParam("username", $username);
      $stmt->execute();
      $stat[0] = true;
      $stat[1] = $stmt->fetchAll(PDO::FETCH_ASSOC);
      $stat[2] = $stmt->rowCount();
      return $stat;




    } catch (PDOException $ex) {

      $stat[0] = false;
      $stat[1] = $ex->getMessage();
      return $stat;

    }



  }





  public function chooseSpecificInfant($infantID)
  {
    $db = $this->dblocal;

    try {


      $stmt = $db->prepare("SELECT * from Infant WHERE infant_ID ='$infantID'");
      $stmt->bindParam("infantID", $infantID);
      $stmt->execute();
      $stat[0] = true;
      $stat[1] = $stmt->fetchAll(PDO::FETCH_ASSOC);
      $stat[2] = $stmt->rowCount();
      return $stat;




    } catch (PDOException $ex) {

      $stat[0] = false;
      $stat[1] = $ex->getMessage();
      return $stat;

    }



  }









  public function checkUsername($username)
  {
    $db = $this->dblocal;

    try {

      $stmt = $db->prepare("SELECT * from User_Info WHERE user_name='$username'");
      $stmt->execute();
      $stat[0] = true;
      $stat[1] = $stmt->rowCount();
      $stat[2] = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $stat;



    } catch (PDOException $ex) {

      $stat[0] = false;
      $stat[1] = $ex->getMessage();
      return $stat;



    }

  }



  public function checkEmail($email)
  {
    $db = $this->dblocal;

    try {


      $stmt = $db->prepare("SELECT * from User_Info WHERE user_email='$email'");
      $stmt->execute();
      $stat[0] = true;
      $stat[1] = $stmt->rowCount();
      return $stat;



    } catch (PDOException $ex) {

      $stat[0] = false;
      $stat[1] = $ex->getMessage();
      return $stat;



    }
  }



  public function checkProduct($Product)
  {
    $db = $this->dblocal;


    try {


      $stmt = $db->prepare("SELECT * from ProductValidation WHERE product_ID='$Product'");
      $stmt->bindParam("Product", $Product);
      $stmt->execute();
      $stat[0] = true;
      $stat[1] = $stmt->rowCount();
      return $stat;



    } catch (PDOException $ex) {

      $stat[0] = false;
      $stat[1] = $ex->getMessage();
      return $stat;


    }

  }





  public function insertUser($username, $email, $password, $phoneNumber)
  {
    $db = $this->dblocal;


    try {

      $stmt = $db->prepare("insert into User_Info(user_name, user_email, user_password, user_phone) values(:username , :email , :password , :phoneNumber ) ");
      $stmt->bindParam("username", $username);
      $stmt->bindParam("email", $email);
      $stmt->bindParam("password", $password);
      $stmt->bindParam("phoneNumber", $phoneNumber);
      $stmt->execute();
      $stat[0] = true;
      $stat[1] = 'Inserted';
      return $stat;


    } catch (PDOException $ex) {

      $stat[0] = false;
      $stat[1] = $ex->getMessage();
      return $stat;


    }

  }



  public function inserProduct($productID, $username)
  {
    $db = $this->dblocal;
    try {

      $stmt = $db->prepare("insert into Product(product_ID, infant_ID, user_name) values(:productID , null , :username) ");
      $stmt->bindParam("productID", $productID);
      $stmt->bindParam("username", $username);
      $stmt->execute();
      $stat[0] = true;
      $stat[1] = 'Inserted';
      return $stat;


    } catch (PDOException $ex) {

      $stat[0] = false;
      $stat[1] = $ex->getMessage();
      return $stat;


    }
  }

  public function insertHeratDevice($name, $productID, $state)
  {


    $db = $this->dblocal;
    try {

      $stmt = $db->prepare("insert into device(name, state, product_ID) values(:name , :state , :productID) ");
      $stmt->bindParam("name", $name);
      $stmt->bindParam("productID", $productID);
      $stmt->bindParam("state", $state);
      $stmt->execute();
      $stat[0] = true;
      $stat[1] = 'Inserted';
      return $stat;


    } catch (PDOException $ex) {

      $stat[0] = false;
      $stat[1] = $ex->getMessage();
      return $stat;


    }




  }


  public function selectProductByInfantID($infantID)
  {

    $db = $this->dblocal;
    try {

      $stmt = $db->prepare("SELECT * from Product WHERE infant_ID='$infantID' ");
      $stmt->bindParam("infantID", $infantID);
      $stmt->execute();
      $stat[0] = true;
      $stat[1] = $stmt->rowCount();
      $stat[2] = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $stat;


    } catch (PDOException $ex) {

      $stat[0] = false;
      $stat[1] = $ex->getMessage();
      return $stat;


    }




  }


  public function checkDevice($name, $productID)
  {

    $db = $this->dblocal;
    try {

      $stmt = $db->prepare("SELECT * from device WHERE product_ID='$productID' AND name ='$name'");
      $stmt->bindParam("name", $name);
      $stmt->bindParam("productID", $productID);
      $stmt->execute();
      $stat[0] = true;
      $stat[1] = $stmt->rowCount();
      $stat[2] = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $stat;


    } catch (PDOException $ex) {

      $stat[0] = false;
      $stat[1] = $ex->getMessage();
      return $stat;


    }



  }







  public function cradleState($productID)
  {


    $db = $this->dblocal;
    try {

      $stmt = $db->prepare("SELECT * from product WHERE product_ID='$productID'");
      $stmt->bindParam("productID", $productID);
      $stmt->execute();
      $stat[0] = true;
      $stat[1] = $stmt->rowCount();
      $stat[2] = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $stat;


    } catch (PDOException $ex) {

      $stat[0] = false;
      $stat[1] = $ex->getMessage();
      return $stat;


    }





  }




  public function cradleInUse($productID, $username)
  {


    $db = $this->dblocal;
    try {

      $stmt = $db->prepare("SELECT * from product WHERE product_ID=:productID AND user_name=:username");
      $stmt->bindParam("productID", $productID);
      $stmt->bindParam("username", $username);
      $stmt->execute();
      $stat[0] = true;
      $stat[1] = $stmt->rowCount();
      $stat[2] = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $stat;


    } catch (PDOException $ex) {

      $stat[0] = false;
      $stat[1] = $ex->getMessage();
      return $stat;


    }

  }



  public function CheckInfantAssignment($infantID, $username)
  {

    $db = $this->dblocal;
    try {

      $stmt = $db->prepare("SELECT * from product WHERE infant_ID=:infantID AND user_name=:username");
      $stmt->bindParam("infantID", $infantID);
      $stmt->bindParam("username", $username);
      $stmt->execute();
      $stat[0] = true;
      $stat[1] = $stmt->rowCount();
      $stat[2] = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $stat;


    } catch (PDOException $ex) {

      $stat[0] = false;
      $stat[1] = $ex->getMessage();
      return $stat;




    }


  }



  public function updateDeviceState($name, $productID, $state)
  {

    $db = $this->dblocal;

    try {

      $stmt = $db->prepare("UPDATE device SET state=:state WHERE name=:name AND product_ID=:productID");
      $stmt->bindParam("name", $name);
      $stmt->bindParam("productID", $productID);
      $stmt->bindParam("state", $state);
      $stmt->execute();
      $stat[0] = true;
      return $stat;


    } catch (PDOException $ex) {

      $stat[0] = false;
      $stat[1] = $ex->getMessage();
      return $stat;

    }



  }


  public function insertIntoValidationProduct($productID, $username)
  {
    $db = $this->dblocal;
    try {

      $stmt = $db->prepare("insert into ProductValidation(product_ID, username) values(:productID , :username) ");
      $stmt->bindParam("productID", $productID);
      $stmt->bindParam("username", $username);
      $stmt->execute();
      $stat[0] = true;
      $stat[1] = 'Inserted';
      return $stat;


    } catch (PDOException $ex) {

      $stat[0] = false;
      $stat[1] = $ex->getMessage();
      return $stat;

    }
  }



  public function insertTemp($tempValue, $date, $productID)
  {
    $db = $this->dblocal;
    try {

      $stmt = $db->prepare("insert into TempReport(temp_degree, temp_report_date, product_ID) values(:tempValue, :date, :productID) ");
      $stmt->bindParam("tempValue", $tempValue);
      $stmt->bindParam("date", $date);
      $stmt->bindParam("productID", $productID);
      $stmt->execute();
      $stat[0] = true;
      $stat[1] = 'Inserted';
      return $stat;


    } catch (PDOException $ex) {

      $stat[0] = false;
      $stat[1] = $ex->getMessage();
      return $stat;

    }
  }









  public function ListInfant($username)
  {
    $db = $this->dblocal;

    try {

      $stmt = $db->prepare("SELECT * FROM Infant WHERE user_name='$username'");
      $stmt->bindParam("username", $username);
      $stmt->execute();
      $stat[0] = true;
      $stat[1] = $stmt->fetchAll(PDO::FETCH_ASSOC);
      $stat[2] = $stmt->rowCount();
      return $stat;


    } catch (PDOException $ex) {


      $stat[0] = false;
      $stat[1] = $ex->getMessage();
      return $stat;

    }

  }









  public function infantsInDangerous($infantID)
  {

    $db = $this->dblocal;

    try {

      $stmt = $db->prepare("SELECT * from TempReport WHERE product_ID = (SELECT product_ID FROM Product WHERE infant_ID =$infantID)  ORDER BY temp_ID DESC LIMIT 1");
      $stmt->bindParam("infantID", $infantID);
      $stmt->execute();
      $stat[0] = true;
      $stat[1] = $stmt->fetchAll(PDO::FETCH_ASSOC);
      $stat[2] = $stmt->rowCount();
      return $stat;




    } catch (PDOException $ex) {


      $stat[0] = false;
      $stat[1] = $ex->getMessage();
      return $stat;

    }
  }





  public function infantInfo($infantID)
  {
    $db = $this->dblocal;


    try {

      $stmt = $db->prepare("SELECT * from Infant WHERE infant_ID ='$infantID'");
      $stmt->bindParam("infantID", $infantID);
      $stmt->execute();
      $stat[0] = true;
      $stat[1] = $stmt->fetchAll(PDO::FETCH_ASSOC);
      $stat[2] = $stmt->rowCount();
      return $stat;


    } catch (PDOException $ex) {

      $stat[0] = false;
      $stat[1] = $ex->getMessage();
      return $stat;

    }
  }



  public function updateInfant($name, $dateOfBirth, $infantID)
  {
    $db = $this->dblocal;


    try {

      $stmt = $db->prepare("UPDATE Infant SET infant_name=:name, date_of_birth=:dateOfBirth WHERE infant_ID=:infantID");
      $stmt->bindParam("name", $name);
      $stmt->bindParam("dateOfBirth", $dateOfBirth);
      $stmt->bindParam("infantID", $infantID);
      $stmt->execute();
      $stat[0] = true;
      return $stat;


    } catch (PDOException $ex) {

      $stat[0] = false;
      $stat[1] = $ex->getMessage();
      return $stat;

    }
  }


  public function deleteInfant($infantID)
  {
    $db = $this->dblocal;


    try {

      $stmt = $db->prepare("DELETE FROM Infant WHERE infant_ID=:infantID");
      $stmt->bindParam("infantID", $infantID);
      $stmt->execute();
      $stat[0] = true;
      return $stat;


    } catch (PDOException $ex) {

      $stat[0] = false;
      $stat[1] = $ex->getMessage();
      return $stat;

    }
  }



  public function updatePhoneNumber($pnumber, $username)
  {
    $db = $this->dblocal;


    try {

      $stmt = $db->prepare("UPDATE User_Info SET user_phone=:pnumber WHERE user_name=:username");
      $stmt->bindParam("pnumber", $pnumber);
      $stmt->bindParam("username", $username);
      $stmt->execute();
      $stat[0] = true;
      return $stat;


    } catch (PDOException $ex) {

      $stat[0] = false;
      $stat[1] = $ex->getMessage();
      return $stat;

    }
  }



  public function updateUserEmail($email, $username)
  {


    $db = $this->dblocal;


    try {

      $stmt = $db->prepare("UPDATE User_Info SET user_email=:email WHERE user_name=:username");
      $stmt->bindParam("email", $email);
      $stmt->bindParam("username", $username);
      $stmt->execute();
      $stat[0] = true;
      return $stat;


    } catch (PDOException $ex) {

      $stat[0] = false;
      $stat[1] = $ex->getMessage();
      return $stat;

    }



  }










  public function heartRateInfo($infantID)
  {
    $db = $this->dblocal;


    try {

      $stmt = $db->prepare("SELECT * from HeartRateReport WHERE product_ID in (SELECT product_ID from Product WHERE infant_ID =$infantID)");
      $stmt->bindParam("infantID", $infantID);
      $stmt->execute();
      $stat[0] = true;
      $stat[1] = $stmt->fetchAll(PDO::FETCH_ASSOC);
      $stat[2] = $stmt->rowCount();
      return $stat;


    } catch (PDOException $ex) {

      $stat[0] = false;
      $stat[1] = $ex->getMessage();
      return $stat;

    }
  }



  public function tempInfo($infantID)
  {
    $db = $this->dblocal;


    try {

      $stmt = $db->prepare("SELECT * from TempReport WHERE product_ID in (SELECT product_ID from Product WHERE infant_ID =$infantID)");
      $stmt->bindParam("infantID", $infantID);
      $stmt->execute();
      $stat[0] = true;
      $stat[1] = $stmt->fetchAll(PDO::FETCH_ASSOC);
      $stat[2] = $stmt->rowCount();
      return $stat;


    } catch (PDOException $ex) {

      $stat[0] = false;
      $stat[1] = $ex->getMessage();
      return $stat;

    }
  }



  public function insertInfant($name, $dateOfBirth, $username)
  {
    $db = $this->dblocal;


    try {

      $stmt = $db->prepare("INSERT INTO Infant (infant_name, date_of_birth, user_name) VALUES (:name, :dateOfBirth, :username)");
      $stmt->bindParam("name", $name);
      $stmt->bindParam("dateOfBirth", $dateOfBirth);
      $stmt->bindParam("username", $username);
      $stmt->execute();
      $stat[0] = true;
      $stat[1] = "inserted";
      return $stat;


    } catch (PDOException $ex) {

      $stat[0] = false;
      $stat[1] = $ex->getMessage();
      return $stat;

    }
  }






  public function updatePassword($newPassword, $username)
  {
    $db = $this->dblocal;


    try {

      $stmt = $db->prepare("UPDATE User_Info SET user_password=:newPassword WHERE user_name=:username");
      $stmt->bindParam("newPassword", $newPassword);
      $stmt->bindParam("username", $username);
      $stmt->execute();
      $stat[0] = true;
      return $stat;


    } catch (PDOException $ex) {

      $stat[0] = false;
      $stat[1] = $ex->getMessage();
      return $stat;

    }
  }




  public function listNotifUser($username)
  {
    $db = $this->dblocal;
    try {
      $stmt = $db->prepare("SELECT * FROM Notif
        WHERE user_name= :username
        AND notif_read > 0
        AND notif_time <= CURRENT_TIMESTAMP()");
      $stmt->bindParam("username", $username);
      $stmt->execute();
      $stat[0] = true;
      $stat[1] = $stmt->fetchAll(PDO::FETCH_ASSOC);
      $stat[2] = $stmt->rowCount();
      return $stat;
    } catch (PDOException $ex) {
      $stat[0] = false;
      $stat[1] = $ex->getMessage();
      return $stat;
    }
  }





  public function saveNotif($type, $time, $read, $publish_date, $username)
  {


    $db = $this->dblocal;


    try {
      $stmt = $db->prepare("insert into Notif (type, notif_time, notif_read, publish_date,user_name) values(:type , :time , :read , :publish_date,:username) ");

      $stmt->bindParam("type", $type);
      $stmt->bindParam("time", $time);
      $stmt->bindParam("read", $read);
      $stmt->bindParam("publish_date", $publish_date);
      $stmt->bindParam("username", $username);
      $stmt->execute();
      $stat[0] = true;
      $stat[1] = 'sukses';
      return $stat;
    } catch (PDOException $ex) {
      $stat[0] = false;
      $stat[1] = $ex->getMessage();
      return $stat;
    }
  }


  public function updateNotif($id, $notif_read)
  {
    $db = $this->dblocal;
    try {
      $stmt = $db->prepare("update notif set notif_read = :notif_read, publish_date=CURRENT_TIMESTAMP() where noti_ID=:id ");
      $stmt->bindParam("id", $id);
      $stmt->bindParam("notif_read", $notif_read);
      $stmt->execute();
      $stat[0] = true;
      $stat[1] = 'sukses';
      return $stat;
    } catch (PDOException $ex) {
      $stat[0] = false;
      $stat[1] = $ex->getMessage();
      return $stat;
    }
  }



  public function listNotif()
  {
    $db = $this->dblocal;
    try {
      $stmt = $db->prepare("select * from Notif");
      $stmt->execute();
      $stat[0] = true;
      $stat[1] = $stmt->fetchAll(PDO::FETCH_ASSOC);
      $stat[2] = $stmt->rowCount();
      return $stat;
    } catch (PDOException $ex) {
      $stat[0] = false;
      $stat[1] = $ex->getMessage();
      return $stat;
    }
  }




  public function getUsernameByProductID($productID)
  {
    $db = $this->dblocal;
    try {
      $stmt = $db->prepare("select * from Product WHERE product_ID = :productID");
      $stmt->bindParam("productID", $productID);
      $stmt->execute();
      $stat[0] = true;
      $stat[1] = $stmt->fetchAll(PDO::FETCH_ASSOC);
      $stat[2] = $stmt->rowCount();
      return $stat;
    } catch (PDOException $ex) {
      $stat[0] = false;
      $stat[1] = $ex->getMessage();
      return $stat;
    }
  }





  public function deleteAccount($username)
  {



    $db = $this->dblocal;

    try {


      $stmt = $db->prepare("DELETE FROM User_Info WHERE user_name=:username");
      $stmt->bindParam("username", $username);
      $stmt->execute();
      $stat[0] = true;
      $stat[1] = 'AccountDeleted';
      return $stat;


    } catch (PDOException $ex) {


      $stat[0] = false;
      $stat[1] = $ex->getMessage();
      return $stat;



    }
  }


  public function displayCradles($username)
  {

    $db = $this->dblocal;



    try {


      $stmt = $db->prepare("select * from Product WHERE user_name = :username");
      $stmt->bindParam("username", $username);
      $stmt->execute();
      $stat[0] = true;
      $stat[1] = $stmt->fetchAll(PDO::FETCH_ASSOC);
      $stat[2] = $stmt->rowCount();
      return $stat;
    } catch (PDOException $ex) {
      $stat[0] = false;
      $stat[1] = $ex->getMessage();
      return $stat;


    }


  }


  public function assignCradle($productID, $infantID)
  {

    $db = $this->dblocal;


    try {


      $stmt = $db->prepare("UPDATE Product SET infant_ID=:infantID WHERE product_ID=:productID");
      $stmt->bindParam("productID", $productID);
      $stmt->bindParam("infantID", $infantID);
      $stmt->execute();
      $stat[0] = true;
      return $stat;



    } catch (PDOException $ex) {

      $stat[0] = false;
      $stat[1] = $ex->getMessage();
      return $stat;

    }





  }




  public function checkForLiquid($productID, $state)
  {

    $db = $this->dblocal;



    try {


      $stmt = $db->prepare("SELECT * from WeightReciever WHERE product_ID=:productID AND state=:state");
      $stmt->bindParam("productID", $productID);
      $stmt->bindParam("state", $state);
      $stmt->execute();
      $stat[0] = true;
      $stat[1] = $stmt->rowCount();
      $stat[2] = $stmt->fetchAll(PDO::FETCH_ASSOC);

      return $stat;
    } catch (PDOException $ex) {
      $stat[0] = false;
      $stat[1] = $ex->getMessage();
      return $stat;


    }


  }






  public function updateLiquidLevel($liquidValue, $dateGiven, $productID, $state)
  {



    $db = $this->dblocal;


    try {

      $stmt = $db->prepare("UPDATE WeightReciever SET liquidValue=:liquidValue, dateGiven_mo=:dateGiven WHERE product_ID=:productID AND state=:state");
      $stmt->bindParam("liquidValue", $liquidValue);
      $stmt->bindParam("dateGiven", $dateGiven);
      $stmt->bindParam("productID", $productID);
      $stmt->bindParam("state", $state);
      $stmt->execute();
      $stat[0] = true;
      return $stat;



    } catch (PDOException $ex) {

      $stat[0] = false;
      $stat[1] = $ex->getMessage();
      return $stat;

    }




  }


  public function updateLiquidLevel_Afternoon($liquidValue, $dateGiven, $productID, $state)
  {



    $db = $this->dblocal;


    try {

      $stmt = $db->prepare("UPDATE WeightReciever SET liquidValue=:liquidValue, dateGiven_af=:dateGiven WHERE product_ID=:productID AND state=:state");
      $stmt->bindParam("liquidValue", $liquidValue);
      $stmt->bindParam("dateGiven", $dateGiven);
      $stmt->bindParam("productID", $productID);
      $stmt->bindParam("state", $state);
      $stmt->execute();
      $stat[0] = true;
      return $stat;



    } catch (PDOException $ex) {

      $stat[0] = false;
      $stat[1] = $ex->getMessage();
      return $stat;

    }




  }




  public function updateLiquidLevel_Night($liquidValue, $dateGiven, $productID, $state)
  {



    $db = $this->dblocal;


    try {

      $stmt = $db->prepare("UPDATE WeightReciever SET liquidValue=:liquidValue, dateGiven_ni=:dateGiven WHERE product_ID=:productID AND state=:state");
      $stmt->bindParam("liquidValue", $liquidValue);
      $stmt->bindParam("dateGiven", $dateGiven);
      $stmt->bindParam("productID", $productID);
      $stmt->bindParam("state", $state);
      $stmt->execute();
      $stat[0] = true;
      return $stat;



    } catch (PDOException $ex) {

      $stat[0] = false;
      $stat[1] = $ex->getMessage();
      return $stat;

    }




  }


  public function updateBottle($bottleMl, $productID, $state){

      $db = $this->dblocal;


    try {

      $stmt = $db->prepare("UPDATE WeightReciever SET bottleMl=:bottleMl WHERE product_ID=:productID AND state=:state");
      $stmt->bindParam("bottleMl", $bottleMl);
      $stmt->bindParam("productID", $productID);
      $stmt->bindParam("state", $state);
      $stmt->execute();
      $stat[0] = true;
      return $stat;



    } catch (PDOException $ex) {

      $stat[0] = false;
      $stat[1] = $ex->getMessage();
      return $stat;

    }








  }




  function updateLiquidState($productID, $state)
  {



    $db = $this->dblocal;


    try {


      $stmt = $db->prepare("UPDATE WeightReciever SET state=:state WHERE product_ID=:productID");
      $stmt->bindParam("productID", $productID);
      $stmt->bindParam("state", $state);
      $stmt->execute();
      $stat[0] = true;
      return $stat;



    } catch (PDOException $ex) {

      $stat[0] = false;
      $stat[1] = $ex->getMessage();
      return $stat;

    }



  }



  public function InfantNotification($infantID)
  {
    $db = $this->dblocal;



    try {


      $stmt = $db->prepare("SELECT * from Notification WHERE infant_ID=:infantID");
      $stmt->bindParam("infantID", $infantID);
      $stmt->execute();
      $stat[0] = true;
      $stat[1] = $stmt->fetchAll(PDO::FETCH_ASSOC);
      $stat[2] = $stmt->rowCount();

      return $stat;
    } catch (PDOException $ex) {
      $stat[0] = false;
      $stat[1] = $ex->getMessage();
      return $stat;


    }




  }



  public function UnAssign($infantID, $value)
  {


    $db = $this->dblocal;


    try {


      $stmt = $db->prepare("UPDATE product SET infant_ID=:value WHERE infant_ID=:infantID");
      $stmt->bindParam("infantID", $infantID);
      $stmt->bindParam("value", $value);
      $stmt->execute();
      $stat[0] = true;
      return $stat;



    } catch (PDOException $ex) {

      $stat[0] = false;
      $stat[1] = $ex->getMessage();
      return $stat;

    }



  }



  public function insertMed($liqLevel, $MPD, $morning, $afternoon, $night, $bottleW, $username, $infantID, $state)
  {



    $db = $this->dblocal;


    try {
      $stmt = $db->prepare("INSERT INTO WeightReciever (liquidValue, ml_doses, morning_ml, afternoon_ml,night_ml, bottleMl, product_ID, infant_ID, state) values(:liqLevel , :MPD , :morning , :afternoon,:night, :bottleW, :username, :infantID, :state) ");

      $stmt->bindParam("liqLevel", $liqLevel);
      $stmt->bindParam("MPD", $MPD);
      $stmt->bindParam("morning", $morning);
      $stmt->bindParam("afternoon", $afternoon);
      $stmt->bindParam("night", $night);
      $stmt->bindParam("bottleW", $bottleW);
      $stmt->bindParam("username", $username);
      $stmt->bindParam("infantID", $infantID);
      $stmt->bindParam("state", $state);
      $stmt->execute();
      $stat[0] = true;

      return $stat;
    } catch (PDOException $ex) {
      $stat[0] = false;
      $stat[1] = $ex->getMessage();
      return $stat;
    }


  }



  public function UnExpiredMed($productID, $state)
  {



    $db = $this->dblocal;



    try {


      $stmt = $db->prepare("SELECT * from WeightReciever WHERE product_ID=:productID AND state=:state");
      $stmt->bindParam("productID", $productID);
      $stmt->bindParam("state", $state);
      $stmt->execute();
      $stat[0] = true;
      $stat[1] = $stmt->fetchAll(PDO::FETCH_ASSOC);
      $stat[2] = $stmt->rowCount();

      return $stat;
    } catch (PDOException $ex) {
      $stat[0] = false;
      $stat[1] = $ex->getMessage();
      return $stat;


    }

  }






public function deleteMedInfo($productID, $state){


$db = $this->dblocal;


    try {

      $stmt = $db->prepare("DELETE FROM WeightReciever WHERE product_ID=:productID AND state=:state");
      $stmt->bindParam("productID", $productID);
      $stmt->bindParam("state", $state);
      $stmt->execute();
      $stat[0] = true;
      return $stat;


    } catch (PDOException $ex) {

      $stat[0] = false;
      $stat[1] = $ex->getMessage();
      return $stat;

    }

}





                                      }









   




	     




  