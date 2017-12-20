<!DOCTYPE html>
<html>
<head>
	<title>ISitter - Registration </title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">


    <!-- Custom styles for this template -->
   
    <link rel="stylesheet" type="text/css" href="css/custom.css">
     <link rel="stylesheet" type="text/css" href="css/font-awesome.css">
    <link href="carousel.css" rel="stylesheet">


  
</head>
<body>


 

 <div class="infantName color-white" style="margin-left: 200px;"><legend><h4>Recover Password</h4></legend></div>

    <div class="container login overview">
          <div class="login-form">
         
	                          

                        
			
				<form action="resetPassword.php" method="POST">

		   <fieldset>

						 
						   
						 
						  <input style="width: 400px; height: 50px; margin-bottom: 30px;" name="ResetEmail" placeholder="Enter Your Username" type="text" class="admin-username"><br>
				    	  

		   </fieldset>
		    
		      <button  id="loginB" name="resetPassword" class="btn btn-primary"><span class="glyphicon glyphicon-log-in"></span>Send</button>
		      <div style="margin-top: 20px;"><a href="login.php">Login</a></div>


	<?php 


if (isset($_GET['sent'])) {
	?>
       	<p style="color: black; font-weight: bold; margin-left: 60px;">Your new password sent to your email address.</p>
       	<?php

						}

						if (isset($_GET['notsent'])) { ?>
       	<p style="color: black; font-weight: bold; margin-left: 60px;">Something goes wrong...please try again</p><?php

																																																																																																																}




																																																																																																																?>

		 



	</form>





	</div>

    </div>

</body>

<div class="progress"></div>

</html>






		






   

