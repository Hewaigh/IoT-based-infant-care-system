

<?php class dbconnection
{

    public $dblocal;


    public function __construct()
    {

    }

    public function initDBO()
    {

        $this->dblocal = new PDO("mysql:host=localhost;dbname=MyFYP;charset=latin1", "root", "root", array(PDO::ATTR_PERSISTENT => true));

        $this->dblocal->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



    }







}


?>