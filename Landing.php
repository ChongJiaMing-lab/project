<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>

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

        .header{
            border: 1px solid transparent;
            padding: 25px 0 25px 0;
            background: white;
        }

        .LOGO{
            display: flex;
            margin: auto;
        }

        .grid-container{
            display: inline-grid;
            margin-left: 10%;
            
        }
        .grid-item{
            
            border: 1px solid black;
            margin: 5px;
            padding: 5px;
            height: 140px;
            width: 1000px;
            text-align: center;
            font-size: 25px;
        }
        .grid-item a{
            text-decoration: none;
            color:chocolate;
            
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
        <div class="grid-container">
            <div class="grid-item"><a href="xx.php">Staff Manage</a></div>
            <div class="grid-item"><a href="xx.php">Member Manage</a></div>
            <div class="grid-item"><a href="xx.php">Product Category Manage</a></div>
            <div class="grid-item"><a href="xx.php">Product Manage</a></div>
            <div class="grid-item"><a href="xx.php">Order Manage</a></div>
            <div class="grid-item"><a href="xx.php">View and Print Sales Report</a></div>
            <div class="grid-item"><a href="xx.php">7</a></div>
            <div class="grid-item"><a href="xx.php">8</a></div>
            <div class="grid-item"><a href="xx.php">9</a></div>
          </div>
     </div>
</body>
</html>