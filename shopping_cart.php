<?php include 'database_connect.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    
    <style>
        html, body {
    width: 100%;
    margin: 0 auto;
    background: url(image/Background_user.png) no-repeat center fixed;
    background-size: cover;
}

        .shopping{
            background-color: white;
            border: 2px solid red;
            margin: 100px 10%;
            border-radius: 25px;
            padding-bottom: 50px;      
        }
        .shopping h3{
            text-align: center;
        }
        .shopping hr{
            height: 1px;
            background-color: gray;
        }

        .product{
            border-bottom: 2px solid gray;
            margin: 20px 0 20px 0;
            display: flex;
            align-items: center;
            padding-bottom: 20px;
            padding-left: 10px;
        }

        button#btndelete{
            padding: 0px;
            margin: 0px 10px 10px 10px;
            border-color: transparent;
            cursor: pointer;
            margin-left: auto;
            background: url(image/delete.png) no-repeat center;
            background-size: 30px;
            width: 35px;
            height: 35px;
        }

        .desc{
            width: 400px; 
            height: 100px; 
            border: 1px solid transparent; 
            padding: 10px; 
            box-sizing: border-box;
            overflow-wrap: break-word;
            overflow:hidden;
            text-align: center;
        }

        .desc:hover{
            overflow: auto;
        }

        .option{
            margin-left: 50px;
        }

        .unit_price{
            margin-left: 130px;
        }

        .qty{
            margin-left: 30px;
            display: flex;
            align-items: center;
        }

        input[type="number"]::-webkit-inner-spin-button,   /*to hide the arrow or number input*/
        input[type="number"]::-webkit-outer-spin-button {  /*part 2*/
            -webkit-appearance: none;                      /*part 3*/
        }

        .qty input{
            width: 32px;
            border: none;
            text-align: center;
            
        }

        .qty button{
            border-color: transparent;
            border: none;
            cursor: pointer;
        }
        .qty button#btn_add{
            background: url(image/plus.png) no-repeat center; 
            background-size: 20px;
            width: 35px;
            height: 35px;
        }
        .qty button#btn_minus{
            background: url(image/minus.png) no-repeat center; 
            background-size: 20px;
            width: 35px;
            height: 35px;
        }

        .t_price{
            margin-left: 50px;
        }

        .sticky{
            position: fixed;
            bottom:0;
            background-color:white;
            padding: 20px;
            width: 100%;
            height: 8%;
            margin: 0 20px 0 20px;
            text-align: left;
            font-size: 18px;
        }

        .sticky span#total_price{
            margin-left:85%;
            color: red;
        }
        
        .sticky button{
            margin-left: 90%;
            margin-bottom: 10%;
            background-color: red;
            height: 30px;
        }
        .sticky a{
            color: white;
            text-decoration: none;
        }


    </style>

    <script type="text/javascript">

        

        function add(index){
            var qtyinput,qty;

            qtyinput= document.getElementById('ipt_qty_' + index);
            qty = parseInt(qtyinput.value) 
            qty++

            qtyinput.value = qty;
            update(index,qty);
        }

        function minus(index){
            var qtyinput,qty;

            qtyinput= document.getElementById('ipt_qty_' + index);
            qty = parseInt(qtyinput.value) 
            if(qty == 1)
            {
                alert("quantity cannot be 0!");
            }

            else
            {
                qty--;
                qtyinput.value = qty;
                update(index,qty);
            }
        }

        function update(index,qty){
            var unit_price = document.getElementById('u_p'+index);
            var price = parseFloat(unit_price.innerText);
            var total_price_unit = document.getElementById('t_price' + index);
            var total = price * qty;

            total_price_unit.innerHTML = "RM"+total.toFixed(2);

        }


    </script>
</head>

<body>
    

    <div class="shopping">
        <h3>Shopping Cart</h3>
        <hr>
        <?php
        //            session_start();
        //            $current_user = $_SESSION['username'];
        $current_user = 'jacky';
        $result = mysqli_query($connect, "SELECT * FROM shopping_cart 
    JOIN product ON shopping_cart.prod_id = product.product_id 
    WHERE shopping_cart.username='$current_user'");

        $count = 1;
        $ttotal =0;
        while($row = mysqli_fetch_assoc($result)) { 
        $count++;
        echo '<div class="product">';
        echo $row['product_img'] ;

        echo  '<span class="desc">';
        echo $row['product_name'] ;
        echo    '</span>';

        echo    '<span class="option">';
        echo $row['color'] ;
        echo    '</span>';

        echo   '<span class="unit_price">';
        echo       'RM <span id="u_p'.$count.'">'.$row['product_price'].'</span>';
        
        echo   '</span>';

        echo  '<span class="qty">';
        echo      '<button id="btn_minus" onclick="minus('.$count.')"></button>';
        echo      '<input type="number" id="ipt_qty_'.$count.'" value= '.$row['amount'].'>';
        echo      '<button id="btn_add" onclick="add('.$count.')"></button>';
        echo   '</span>';

             

        echo    '<span id="t_price'.$count.'">';
        $total = $row['product_price']*$row['amount'];
        $ttotal += $total;
        echo        'RM'.$total;
        echo    '</span>';

        echo    '<button id="btndelete">';
        echo    '</button>';
        echo'</div>';
        
} ?>
        
    </div>

    <div class="sticky">
        Total <span id="amount"> <?php echo $count ?> </span> item <span id="total_price"> Rm<?php echo $ttotal ?></span>
        <p><button><a href="payment.php">checkout now</a></button></p>
    </div>

</body>
</html>