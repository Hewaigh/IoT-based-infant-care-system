 <?php
include "dbconnection.php";
include "sql.php";
$sql = new sql();
    //  $user = $sql->listUser();



$infants = $sql->listInfantsBasedOnUser($_SESSION['username']);


      // echo "<pre>";
      // print_r($infant);
      // die();




?>










    <nav id="header" class="navbar navbar-expand-lg navbar-dark bg-unique fixed-top scrolling-navbar" style="background-color: rgb(63, 92, 128); height: 65px; padding: 0px 120px 0px 120px;">
            <a class="navbar-brand" href="index.php?page=home&infant_ID=0"><strong>ISitter</strong></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-6" aria-controls="navbarSupportedContent-6" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent-6">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" style="color: white;" href="index.php?page=home&infant_ID=0">Home <span class="sr-only">(current)</span></a>
           
                    <li class="nav-item dropdown">
                        <a class="nav-link" style="color: white;" dropdown-toggle" id="navbarDropdownMenuLink-6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Infants </a>
                        <div class="dropdown-menu dropdown-unique" aria-labelledby="navbarDropdownMenuLink-6">
                          <?php
                            $index = 0;
                            if ($infants[2] > 0) {

                                do {

                                    ?>

                                        <a class="dropdown-item" href="index.php?page=infantAccount&infant_ID=<?php echo $infants[1][$index]['infant_ID']; ?>"><?php echo ucfirst($infants[1][$index]['infant_name']); ?></a>


                           <?php
                            ob_start();
                            $index = $index + 1;
                        } while ($index < $infants[2]);

                    } else { ?>

          
                                     <p style="margin-left: 30px;"> No Infants</p>
          

                                    <?php 
                                } ?>



                          
                            <hr>
                            <a class="dropdown-item" href="index.php?page=addInfant&infant_ID=0">Add New</a>
                        </div>
                    </li>
                </ul>


                <ul class="nav navbar-nav nav-flex-icons ml-auto">


                <li class="nav-item">
                        <a style="color: white;" class="nav-link" href=""><?php echo strtoupper($_SESSION['username']); ?> <span class="sr-only">(current)</span></a>
                </li>
             
  
                <li class="nav-item dropdown">
                    <a class="nav-link" style="color: white;" dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-user"></i>
                        <span class="clearfix  d-none d-sm-inline-block">Setting</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="index.php?page=userAccount&infant_ID=0">Account</a>
                        <a class="dropdown-item" href="logout.php">Logout</a>

                       
                    </div>
                </li>
            </ul>
           
            </div>

        </nav> 


