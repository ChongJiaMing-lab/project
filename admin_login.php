<?php include("database_connect.php"); ?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body, html 
{
  height: 100%;
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

* {
  box-sizing: border-box;
}

.bg-image {
  /* The image used */
  background-image: url("Asian-Male-Models.jpg");
  
  /* Add the blur effect */
  filter: blur(8px);
  -webkit-filter: blur(8px);
  
  /* Full height */
  height: 100%; 
  
  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}

/* Position text in the middle of the page/image */
.bg-text {
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0, 0.4); /* Black w/opacity/see-through */
  color: white;
  font-weight: bold;
  border: 3px solid #f1f1f1;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  z-index: 2;
  width: 80%;
  padding: 20px;
  text-align: center;
}
.header-container {
		display: flex;
		justify-content: space-between;
		background-color: white;
		background-repeat: no-repeat;
    	background-size: cover;
    	background-attachment: fixed;
		align-items: center;
		padding: 10px;
		margin-left: 650px;
		
	}
   input[type="submit"]:hover
   {
    background-color:gray;
   }
   
   input[type="name"]::placeholder,
   input[type="password"]::placeholder 
   {
    color: black; /* Replace with your desired color code or name */
    font-weight: bold;
}
   
</style>



</head>
<body>

    <div class="header-container">
        <div class="LOGO">
            <a href="index.html"><image src="image logo.jpg" width=200px height="40px"></image></a>
    </div>

    </div>
<div class="bg-image"></div>

<div class="bg-text">
    <div id="login-title">
		<h4 style="color: #ddd;;font-family: Arial;margin-left: 20px;font-size: 30px;font-style: italic;font-weight: bolder;">Admin Login</h4>
	</div>
    <form name="loginfrm" method="POST" action="">
			<p style="font-weight: bolder; margin-left: 35px; margin-bottom: 30px;">Name :<input type="name" name="user_name" placeholder="enter name" style="background-color: gray; " /></p>
			<p style="font-weight: bolder; color: ;">Password :<input type="password" name="user_password"  placeholder="enter password" style="background-color: gray;"/></p>
			<p ><input type="submit" name="loginbtn" value="LOGIN" style="font-weight: bolder;width:300px;padding:10px;border:none;margin-right: 0px; "/></p>
		</form>

        
</div>

</body>
</html>

<?php

// Check if the form is submitted

if (isset($_POST["loginbtn"]) && $_POST["loginbtn"] == "LOGIN")
{
    $x = $_POST["user_name"];
    $y = $_POST["user_password"];
    $a=mysqli_query ( $connect,"SELECT * FROM admin WHERE username  = '{$x}'AND password = '{$y}'");
    $row =mysqli_fetch_array($a);
}

if( empty($row))
{
    echo'Invalid Password and username';
}
 
else
{
    echo'Username and Password is correct';
}
?>