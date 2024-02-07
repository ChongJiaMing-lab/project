<?php include("database_connect.php");

session_start();
?>
<!DOCTYPE html>
<html>
<head>

<style type="text/css">
    body
    {
        background-image: url("background.png");
    }
	#login-title{
		height:40px;
		background-color: #DDD;
		background-image: url(image/padlock.png);
		background-repeat: no-repeat;
		background-position: 7px 7px;
		background-size: 24px 24px;
		border-top-left-radius: 8px;
		border-top-right-radius: 8px;
        
	}
	
	#login-form input[type="submit"]{
		display:block;
	margin-top:15px;
	width:100%;
	padding:15px;
	border:none;
	border-radius:20px;
	background-color:#22a1b9;
	color:white;
	font-size:15px;
	}
	#login-form input[type="submit"]:hover{
		background-color: #2C61B7;
		cursor:pointer;
	}
	#login-form [href]{
		text-decoration: none;
		font-family: "Arial Narrow";
		font-size: 0.8em;
		text-align: center;
	}
	#login-form [href]:hover{
		color:red;
		font-style: italic;
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
		
		
	}

    .header-text{
		display: flex;
		text-align: right;
		margin-left: 2;
		list-style: none;
        font-size:20px;
        
	}

    div#register
{
	/border:1px solid red;/
	width:600px;
	height:500px;
	text-align:center;
	display:inline-block;
	margin-left:120px;
	vertical-align:center;
}

div#box
{
	width:1450px;
	height:630px;
	margin:50px 40px;
	/border:1px solid black;/
    background-color: white;
	

}

label
{
	display:block;
	padding:10px 0px;
	font-weight:bold;
    text-align:
}

input
{
    display:block;
	padding:15px 10px;
	width:100%;
	border-radius:20px;
}
</style>

</head>

<body>




    <?php include 'user_header.php' ?>
	


<div id="box"style="width:700px;padding: unset;margin:100px auto;border:1px solid #DDD;border-radius: 10px;">

	<div id="login-title" style="text-align:center">
		<h4 style="color:black;font-weight:bold;font-family: Arial;margin:unset;padding-top: 12px;padding-bottom: 12px;padding-left: 40px;padding-right: 40px; ">Login Panel</h4>
	</div>
	
	<div id="login-form" method="POST" action="#">
        <form method="post" name="loginfrm" action="#">
            <label>Username<br></label>
			<p><input type="name"  placeholder="enter your name" name="user_name" /></p>
            <label>Password<br></label>
			<p><input type="password"  placeholder="enter your password" name="user_password" /></p>
			<p><input type="submit" name="loginbtn" value="LOGIN" /></p>
		</form>
		
		
		
	</div>

	
	
</div>



</body>



</html>

<?php

// Check if the form is submitted

if ( @ $_POST["loginbtn"] == "LOGIN") 
{
    $x = $_POST["user_name"];
    $y = $_POST["user_password"];
    $a=mysqli_query ( $connect,"SELECT * FROM user_register WHERE username  = '{$x}'AND password = '{$y}'");
    $row =mysqli_fetch_array($a);
}

if( empty($row))
{
    echo'Invalid Password and username';
	$_SESSION['username']=$username;
}
 
else
{
    echo'Username and Password is correct';
}
?>