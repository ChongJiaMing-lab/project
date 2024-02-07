<?php include "database_connect.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manege order</title>

    <style type="text/css">
        body{
            margin: 0px;
            background: url(image/Background_admin.png) no-repeat center fixed;
            background-size: cover;
        }


        div.content {
        margin-left: 10%;
        padding: 1px 16px;
        height: 1000px;
        }

        h2{
            text-align: center;
        }

        .box-container{
            width: 97%;
            height: auto;
            display: inline-grid;
            grid-template-columns: 25% 25% 25% 25%;
            grid-template-rows: 150fr 150fr;
            border: solid black 1px;
            border-radius: 50px;
            gap: 20px 10px;
            padding: 50px;
        }

        .order{
            border: solid black 1px;
            border-radius: 20px;
            width: 75%;
            height: 80%;
            margin: 20px;
            padding: 20px;
            text-align: center;
            text-decoration: none;
        }

        .order:hover{
            background-color: lightblue;
        }

        .product{
            width: 100px;
            height: 100px;
        }
        .desc{
            text-align: left;
            display: flex;
        }

    </style>
</head>
<body>
<?php include 'admin_sidebar.php' ?>
     <div class="content">
        <div class="header">
            <img src="image/LOGO.png" class="LOGO" width=200px height="40px">
        </div>
        <hr>
        <h2>Order Manage</h2>
        <p style="text-align: center;">click order to view details</p>
        <div class="box-container">
            <?php
            //session_start();
            //$current_user = $_SESSION['username'];
            $count = 0;
            
            $result = mysqli_query($connect,"SELECT * FROM order_ ");
            while($row = mysqli_fetch_assoc($result))
            {
                
                $username = $row['username'];
                $time = $row['time'];
                $total = $row['total'];
                echo '<a href="order_details.php?oid='.$row['order_id'].'" class="order">';
                echo '<h2>Order '.++$count.'</h2>';
                echo '<br><img src="image/user.png" class="product">';
                echo '<span class="desc">';
                echo '<br>username : '.$username.'';
                echo '<br>purchase time : '.$time.'';
                echo '<br>Total Price         : RM '.$total.'';
                echo '<br></span>';
                echo '<br></a> ';
        
            }

            ?>
            
        </div>
</body>
</html>