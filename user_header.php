<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
    
    .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            background-color: white;
        }

    .container{
        width: 40%;
        font-size: 20px;
        display: inline-grid;
        grid-template-columns: 25% 25% 25% 25%;
        margin-left:auto;

    }

    .header a{
        text-align: center;
        padding-right: 20%;
        padding-left: 10%;
        border-right: solid black 2px;
        text-decoration: none;
        color:black;
    }

    .header a:hover{
        color:blue;
    }

    </style>

</head>
<body>
    
<div class="header-container">
        <div class="LOGO">
            <a href="index.html"><image src="image/LOGO.png" width=200px height="40px"></image></a>
       </div>

    <div class="container">
        <div class="header">
        <a href="xxx.php"> Login </a>
        </div>
        <div class="header">
        <a href="xxx.php"> Register </a>
        </div>
        <div class="header">
        <a href="xxx.php"> About Us </a>
        </div>
        <div class="header">
        <a href="xxx.php"> Contact Us </a>
        </div>

    </div>
</div>
<hr style="height: 2px;background-color: gray; margin: 0;">
</body>
</html>