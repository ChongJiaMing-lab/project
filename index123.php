<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SKT CLOTHING</title>

    <style type="text/css">
        body{
            margin:0;
            padding: 0;
            background-color: #E3F0FF;
            background: url(image/Background_user.png) no-repeat center fixed;
            background-size: cover;
            font-family: Arial;
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


        .show{
            padding: 100px 10px 100px 10px;
            text-align: center;
            font-size: 30px;
            color: black;
        }
        .show a{
            padding: 5px 10px 5px 10px;
            background-color: rgb(117, 117, 236);
            color: white;
            text-decoration: none
        }
        #view{
            font-style: italic;
            font-family: palatino;
        }

    </style>
</head>

<body>

<?php include 'user_header.php'?>


    <div class="box-show">
        <div class="show">
            <br>SKT CLOTHES</br>
            <br>The Suitable Clothes For You</br>
            <p><a href="product_list.php" id="view"> View Product</a></p>
        </div>
    </div>

</body>
</html>