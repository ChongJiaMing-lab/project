<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>

    <style>
    body{
            margin:0;
            padding: 0;
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

        .header-text li a:hover{
            background-color: red;
            
        }

    img.imgmember{
        height: 100%;
        width: 100%;
        object-fit: cover;
    }

    .desc{
        margin: 0 0 0 10px;
    }

    .grid-container{
        margin: 100px;
        gap: 20px 10px;
        display: grid;
        grid-template-columns: 400px 400px 400px;
        height: 400px;
        text-align: center;
        
    }

    .member {
        position:relative;
        border: 1px solid black;
        border-radius: 50%;
        height: auto;
        overflow: hidden;
        align-items: center;
    }

    .member .text-overlay{
        position: absolute;
        top: 50%;
        left: 35%;
        align-items: center;
        opacity: 0;
        transition: opacity 0.3s;
        pointer-events: none;
        color: blue;
    }

    img.imgmember:hover{
        filter: blur(4px);
    }

    img.imgmember:hover + .text-overlay{
        opacity: 1;
    }


    .break{
        padding-top: 100px;
    }

    .footer{
        position: flex;
        bottom: 0;
        background-color: black;
        color: white;
    }



    </style>
</head>
<body>
        
        <?php include 'user_header.php'?>
        

        <div class="desc">
            <h2>About Us</h2>
            Welcome to SKT CLOTHINGS!
            <h2>Our Member Information:</h2>
            <sub>Hover over to get more information.</sub>
        </div>

            <div class="grid-container">

                <div class="member">
                    <img src="image/LJY.png" alt="" class="imgmember">
                    <div class="text-overlay">
                        <p>LIM JUN YONG</p>
                        <P>1221201499</P>
                    </div>
                </div>
                <div class="member">
                    <img src="image/LWL.jpg" alt="" class="imgmember">
                    <div class="text-overlay">
                        <p>LAM WEI LEONG</p>
                        <P>1221201835</P>
                    </div>
                </div>
                <div class="member">
                    <img src="image/CJM.jpg" alt="" class="imgmember" width="300px">
                    <div class="text-overlay">
                        <p>CHONG JIA MING</p>
                        <P>1221202126</P>
                    </div>
                </div>
                    
            </div>
            <div class="break"></div>
            <div class="footer">
                <sup>&#174;SKT CLOTHINGS</sup>

            </div>
</body>
</html>