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
<!-- <div class="container-fuild login-header"><h2>ISitter</h2></div> -->

 <div class="infantName color-white" style="margin-left: 200px;"><legend><h4>Sign Up</h4></legend></div>

    <div class="container registration overview">
          <div class="reg-form">
         

          <form onsubmit="return Validate()"  action="checkRegister.php" method="POST"  name="vform">


         		<fieldset>


			            <!-- Username Input -->
				   	    <div class="inputGroupContainer reg-Divinput" >
				        <div class="input-group">   
				        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
				        <input  name="username" placeholder="Username" class="form-control"  type="text" >
				        </div>
				        <div id="username_error" class="error">
				        	 <?php if (isset($_GET['username'])) { ?>
					     <p class="wrong">Username is exist</p>
					      <?php 
									} ?>
				        </div>
				        </div>
				        <br>

				        <!-- Enail Input -->
				        <div class="inputGroupContainer reg-Divinput">
					    <div class="input-group">   
					    <span class="input-group-addon"><i class="glyphicon "></i><b>@</b></span>
					    <input  name="email" placeholder="E-mail" class="form-control"  type="email"  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
					    </div>
					    <div id="email_error" class="error">
					    	<?php if (isset($_GET['email'])) { ?>
					     <p class="wrong">Gmail is exist</p>
					      <?php 
									} ?>
					    </div>
				        </div>
			            <br>


			            <!-- Password Input -->
			            <div class="inputGroupContainer reg-Divinput">
				        <div class="input-group">   
				        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
				        <input  name="password" placeholder="Password" class="form-control"  type="password" >
				        </div>
				        <div id="password_error" class="error"></div>
				        </div>
			            <br>



			            <!-- Confirm Password Input -->
				        <div class="inputGroupContainer reg-Divinput">
				        <div class="input-group">   
				        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
				        <input  name="confirmpassword" placeholder="Confirm Password" class="form-control"  type="password">
				        </div>
				        <div id="confirmPass_error" class="error"></div>
				        </div>
				        <br>


				        <div class="inputGroupContainer reg-Divinput">
				        <div class="input-group">   
				        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
				        <input  name="product_ID" placeholder="Product Code" class="form-control"  type="text">
				        </div>
				        <div id="product_error" class="error">
				         <?php if (isset($_GET['productInvalid'])) { ?>
					     <p class="wrong">Invalid Product Code</p>
					      <?php 
									} ?> </div>

				        </div>
				        <br>
				       

						<div class="inputGroupContainer reg-Divinput">
					    <div class="input-group">   
					    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
					    <input  name="pnumber" pattern="\d{10}" placeholder="Phone Number" class="form-control"  type="text" >
					    </div>
					    <div id="phone_error" class="error"></div>
			            </div>
			            <br>


			</fieldset>

       					<button id="loginB" name="signup" class="btn btn-primary">Create</button>
       					<div style="margin-top: 20px;"><a href="login.php">Login</a></div>
     </form>

	</div>


    </div>

</body>

<?php include("registration_validation.js");
?>
</html>






   

