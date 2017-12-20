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
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet"> 

  
</head>
<body>
<div class="container-fuild login-header"><h2>ISitter</h2></div>
 <div class="infantName color-white" style="margin: 30px 0px 0px 200px; "><legend><h4>Login</h4></legend></div>

    <div class="container  overview login">


          <div class="login-form">
         

         
      <form action="checkLogin.php" method="post">
				         
				     
                  <?php 
                    if (isset($_GET['invalid'])) { ?>

                       <p class="wrong">Invalid username or password</p>
                 <?php 
            } ?>


                   


					        <fieldset>	   

							  <div class="inputGroupContainer reg-Divinput">
							  <div class="input-group ">   
							  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
							  <input id="login-usernamr" name="username" placeholder="Username" class="form-control "  type="text">
					    	  </div>
					  	      </div>
					          <br>
					  	      <div class="inputGroupContainer reg-Divinput">
							  <div class="input-group">   
							  <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
							  <input  name="password" placeholder="Password" class="form-control "  type="password">
					    	  </div>
					  	      </div>

					        </fieldset>
					  
					        <br>




	                        
	                        
	                          <button id="loginB" name="login" class="btn btn-primary"><span class="glyphicon glyphicon-log-in"></span> Log In</button>
	                          
<div class="links">
	                       <a href="forgetPassword">Forget Password</a><br>
	                       <a href="registration.php">Create Account</a></div>
                        
			
				 </form>





	</div>
    



						 <?php 
        if (isset($_GET['accountDeleted'])) { ?>
  
                     <div class="alert alert-success alert-dismissable">
             		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  				    <strong>Success!</strong> Your account has been deleted successfully.
				    </div>

                      
                 <?php 
            } ?>


                 <?php 
                if (isset($_GET['accountCreated'])) { ?>
  
                     <div class="alert alert-success alert-dismissable">
             		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  				    <strong>Success!</strong> Your account has been created successfully... please use your username and password to login
				    </div>

                      
                 <?php 
            } ?>

						
						 


    </div>










     <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="../../assets/js/vendor/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>


</body>



</html>






   

