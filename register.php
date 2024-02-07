<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<?php include("database_connect.php"); ?>
<style>
body
{
    background-image: url(image/background.png);
}


.header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            background-color: white;
        }

        .LOGO{
            display: inline-block;
            text-align: left;
        }

        .header-text{
            position: relative;
            border: none;
            border-radius: 10em;
            list-style: none;
            display: flex;
            text-align: right;
            margin-left: 2;
            list-style: none;
            padding: 10px;
            box-shadow: 2px 2px 2px black;
            background-color: #f5f5f5;
        }

        .header-text li a{
            position: relative;
            padding: 15px 30px;
            font: 500 24px;
            font-family: fantasy;
            border: none;
            outline: none;
            text-decoration: none;
            color: rgb(70,100,180);
        }

        .header-text li a:hover {
            background-color: red;
            
        }

h1
{
    font-family: 'Comic Sans MS';
}
.reg label,.reg input 
{
    display: inline-block;
    vertical-align: top; 
    margin-bottom: 10px;
}

.reg label 
{
    width: 250px; 
    font-family: 'Comic Sans MS';
}
.reg input[type="text"],input[type="password"], input[type="date"]
{
    width: 275px; 
    height: 25px;
    border-radius: 4.5px;
    font-family: 'Comic Sans MS';
    border-top: 0px;
    border-left: 0px;
    border-right: 0px;
}
.reg input[type="radio"]
{
    font-family: 'Comic Sans MS';
}

.body
{
    background-color:white;
}
</style>
<body>
    <div class="header-container">
        <div class="LOGO">
            <a href="index.html"><image src="image/logo.png" width=200px height="40px"></image></a>
        </div>
        
            <ul class="header-text">
                <li><a href="xx.html">Login</a> | </li> 
                <li><a href="xx.html">Register</a> | </li>
                <li><a href="about_us.html">About Us</a> |</li>
                <li><a href="xx.html">Contact Us</a> |</li>
            </ul>
        
    </div>

    
    <p><h1>Create an Account</h1></p>
    <p>Please fill in the required information to create an account.</p>
    
    <div class="body">
    <hr>

    <form id="register" name="register" method="post" action="#">  
    <div class="reg">

    <P>
    <label><b>NAME</b></label>
    <input type="text" name="username" id="username" placeholder="Set a username" required></P>

    <label><b>EMAIL</b></label>
    <input type = "text" name="email" id="email" placeholder="Enter a valid email" required>
    
    <p><label><b>PASSWORD</b></label>
    <input type="password" id="password" name="password" pattern="^(?=.*\d)(?=.*[a-zA-Z]).{8,}$" title="At least one number and one letter, and at least 8 or more characters" required>
    <span id = "message" style="color:red"> </span>
    <input type = "checkbox" onclick="myFunction()">Check
    </p>

    <label><b>Confirm PASSWORD</b></label>
    <input type ="password" name="rpsw" id="rpsw" required/>

    <p>
    <label><b>POSTAL CODE</b></label>
    <input type="text" name="code" id="name" placeholder="#####" pattern="\d{5}" title ="Please enter a 5-digit for postal code !" required>
    </p>

    <p>
        <label><b>BIRTHDAY</b></label>
        <input type = "date" name="bday" id="bday" required>
    </p>
    <p>
        <label><b>GENDER</b></label>
        <input type ="radio" name="gender" value="male" required>Male
        <input type ="radio" name="gender" value="female" required>Female
        <input type ="radio" name="gender" value="secret" required>Secret
</p>
</div>

    <hr>
    </div>

    <p><u></u>You have to agree our terms of use and privacy policy before creating an account.</p>
    <a href="#/">TERMS OF USE</a>
    |||
    <a href="#/">PRIVACY POLICY</a>
    <p>
    <input type="checkbox" required>I agree to SKT clothing's TERMS OF USER and PRIVACY POLICY.
    </p>

    <button type ="submit" name="reg_button" class="reg_button" id="reg_button" value="reg_button">REGISTER</button>
    </div>
    </form>

<script>
function myFunction() 
{
    var x = document.getElementById("password");
    if (x.type === "password") 
    {
        x.type = "text";
    } 
    else 
    {
        x.type = "password";
    }
}
    </script>
</body>
</html>

<?php

if (isset($_POST["reg_button"]))
{
    $un = $_POST["username"];
    $e = $_POST["email"];
    $pass = $_POST["password"];
    $rpass = $_POST["rpsw"];
    $c = $_POST["code"];
    $b = $_POST["bday"];
    $g = $_POST["gender"];

    if($rpass != $pass)
    {
        ?>
        <script>
        alert("Please make sure confirm password match with password ! ");
        </script>

        <?php
    }
    else
        {
            ?>
            <script>
                alert("Account created successfully");
            </script>
            <?php
        }
        mysqli_query($connect, "insert into user_register (username, email, password, postal_code, birthday, gender)values('$un', '$e', '$pass', '$c', '$b', '$g')");
    
}

?>

