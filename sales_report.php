<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales Report </title>
</head>
  <?php include("database_connect.php"); ?>

<style>
div.content 
{
  margin-left: 10%;
  padding: 1px 16px;
  height: 1000px;
}
        
body
{
  font-family:Comic Sans ms;
  background-image: url(cool-background.png);
} 
.sales-report
{
    display:grid;
    grid-template-areas: 'auto auto auto auto';
    width:90%;
}

span
{
  text-align: center;
  max-width: 300px;
  height: 175px;
  border-radius: 5px;
  background-color: white;
  font-size: 24px;
  border:1px solid black;
  margin:auto;
}

button
{
  width: 100%;
  border:none;
  background-color:white;
  border-top: 1px solid black;
  cursor:pointer;
  font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
  font-weight: bold;
  border-top:none;
}

.data
{
    font-size:75px;
    border:none;
}
.purchased
{
    color:rgb(59, 233, 68);
  box-shadow: 5px 5px rgb(59, 233, 68);
}

.refunded
{
  color:rgb(77, 77, 196);
  box-shadow: 5px 5px rgb(77, 77, 196);
}

.incart
{
  color:rgb(216, 216, 68);
  box-shadow: 5px 5px rgb(216, 216, 68);
}

.pro
{
  color:red;
  box-shadow:5px 5px red;
  width:500px;
}

.bar
{
  border-radius:15px;
  text-align:center;
}

.progress-container
{
  width:70%;
  border-radius:15px;
  border:1px solid black;
  height:24px;
  margin-bottom: 30px;
}

.print
{
  font-size:15px;
  height:45px;
  width:170px;
  border:none;
  background-color: antiquewhite;
  border-radius: 30px;
  margin-top:15px;
}

</style>

<body>
  <?php include("admin_sidebar.php"); ?>
   <div class="content">
      <div class="header">
          <img src="image logo.jpg" class="LOGO" width=200px height="40px">
      </div>
      <hr>

      <?php
      mysqli_select_db($connect,"iwp_project");	
      $order = mysqli_query($connect, "SELECT * FROM order_details");
      $cart = mysqli_query($connect, "SELECT * FROM shopping_cart");
      $qtt = mysqli_query($connect, "SELECT SUM(amount) AS totalAmount FROM order_details");
      $profit = mysqli_query($connect, "SELECT SUM(price) as profit FROM order_details");

      $order_c = mysqli_num_rows($order);
      $cart_c = mysqli_num_rows($cart);
      $amount = mysqli_fetch_assoc($qtt)['totalAmount'];
      $pro = mysqli_fetch_assoc($profit)['profit'];

        ?>

    <h1>Sales report</h1>
    <div class="sales-report">
    <span class="purchased">
    Purchased<br>
    <span class="data">
        <?php echo $order_c ?>
        </span>

    <br><button></button></span>
    <span class="incart">
    In-Cart<br>
    <span class="data">
    <?php echo $cart_c ?>
        </span>
    

    <br><button></button></span>
    <span class="refunded">
    Total Pieces-SellOut<br>
    <span class="data">
    <?php echo $amount ?>
        </span>


      <br><button></button></span>
    <span class="pro">
    Profit<br>
    <span class="data">
      <?php echo $pro ?>
        </span>
</div>
    <br>
    <hr>
    <h1>Target</h1>

  <div class="progress-bar">

    <label>Purchased : </label>
    <div class="progress-container">
  <div class="bar" style="height:24px;width:<?php echo ($order_c / 100) * 100 ."%" ?>; background-color:rgb(59, 233, 68);"><?php echo ($order_c / 100) * 100 ."%" ?>
  </div><?php echo $order_c ."/100"?>
   </div>
   
<label>In-Cart</label>
<div class="progress-container">
    <div class="bar" style="height:24px;width:<?php echo ($cart_c / 100) * 100 ."%" ?>; background-color:rgb(216, 216, 68);"><?php echo ($cart_c / 100) * 100 ."%" ?></div>
    <?php echo $cart_c ."/100"?>
</div>

   <label>Total-SellOut :</label>
   <div class="progress-container">
  <div class="bar" style="height:24px;width:<?php echo ($amount / 100) * 100 ."%" ?>; background-color:rgb(77, 77, 196); color:white;"><?php echo ($amount / 100) * 100 ."%"?></div>
  <?php echo $amount ."/100"?>
</div>

<label>Profit</label>
<div class="progress-container">
   <div class="bar" style="height:24px;width:<?php echo ($pro / 100) * 100 ."%" ?>; background-color:red; color:white;"><?php echo ($pro / 10000) * 100 ."%" ?></div>
   <?php echo $pro ."/100"?>
 </div>
</div>
 <hr>
<button class="print" onclick="window.print()">Print out the report</button>
</div>

</body>
</html>