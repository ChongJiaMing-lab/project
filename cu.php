<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
</head>

<style>
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

.map{grid-area: top;}

.label
{
    width:500px;
}

.d
{ 
    display: inline-block;
    vertical-align: top;
}

body
{
    font-family: "Comic Sans MS";
    background-image: url(image/background.png);
}

.contact-us
{
    position: relative;
}
.contact-info
{
    justify-self: end;
}

.cu 
{
    display: grid;
    grid-template-areas:
    'top top'
    'auto auto';
}

label
{
    display: block;
}
.map
{
    text-align: center;
}

form 
{
        width: 200px;
        flex-direction: column;
 }
 .contact-us input[type="text"],input[type="email"], textarea
 {
    border: 1px solid black;
    background-color:#eeeeee;
    width:450px;
    height:25px;
    border-radius: 9px;
 }
 hr
 {
    width: 400px;
    margin: 0;
 }
 img
 {
    margin-right: 45px;
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

    <div class= "map" style="justify-content: center;
    align-items: center;">
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15946.946712755444!2d102.2772696!3d2.2520609!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d1e56077ee9033%3A0x32b760229ad25d0f!2sIxora%20Apartment!5e0!3m2!1szh-CN!2smy!4v1703185890769!5m2!1szh-CN!2smy" 
                width="1300px" height="250px" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
        </iframe>
        </div>
        <div class="cu">
    <div class="contact-info">
        <h2>
            Contact Info
        </h2>
        <div class="label">
            <div class="details">
        <b>Adress : </b><span class="d">Ixora Apartment, Jalan D1, 75450 Melaka</span>
        <p><b>Contact Number : </b> <span class="d">012-12312312</span>
        <p><b>Contact Email : </b><span class="d">123212312@student.mmu.edu.my</span>
        </p>
    </div>
        <p><h2><HR>Social Media</h2></p>
        <p><img src="image/fb_icon_325x325-removebg-preview.png" alt="fb" width="50" height="50">
            <img src="image/ig.jpg" alt="fb" width="50" height="50">
            <img src="image/ws.jpg" alt="fb" width="50" height="50"></p>
    </div>

    </div>
    <div class="contact-us">
        <h1>
            Contact us
        </h1>
        <h2>
            We are here to assist you.
        </h2>
        <form name="CU-form" method="REQUEST">
                
                    <label><b>Name</b></label>
                <input type="text" name="name"
                />

        
                <p>  <label><b>Email Address</b></label>
               <input type="email" name="email"
               /></p>
                    
                <p> <label><b>Leave a message</b></label>
                <textarea id="subject" name="subject" 
                style="height: 95px; width: 450px;"></textarea>
            </p>
			<p><input type="submit" name="loginbtn" value="SUBMIT" /></p>
            
        </form>
    </div>
    </div>
            
    </body>
</html>

<?php
    if(isset($_REQUEST{"loginbtn"}))
    {
        ?>
             <script>alert("We have received you message !");
             </script>
             <?php
    }
?>

