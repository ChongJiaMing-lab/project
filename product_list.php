<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
</head>
<?php include("database_connect.php"); ?>
<style>
.header-container 
{
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px;
    background-color: white;
}

.LOGO
{
    display: inline-block;
    text-align: left;
}

.header-text
{
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

.header-text li a
{
    position: relative;
    padding: 15px 30px;
    font: 500 24px;
    font-family: fantasy;
    border: none;
    outline: none;
    text-decoration: none;
    color: rgb(70,100,180);
}

.header-text li a:hover 
{
    background-color: red;
}

.wr
{
    max-width:1300px;
    position :relative;
    margin:auto;
}

.wr img
{
    max-height:250px;
}
.pic
{
    display:none;
}

.prev, .nxt
{
    cursor:pointer;
    position:absolute;
    top:45%;
    width:auto;
    margin-top:-22px;
    padding:16px;
    color:white;
    font-weight:bold;
    font-size:18px;
    transition:0.6s ease;
    border-radius:0 3px 3px 0;
    user-select: none;
    font-size:50px;
}

.nxt
{
    right:0;
    border-radius:3px 0 0 3px;
}

.prev:hover, .nxt:hover
{
    background-color:#C5D6E2;
    border-radius:50px;
}

.dot
{
    cursor:pointer;
    height:15px;
    width:15px;
    margin:0 2px;
    background-color:#bbb;
    border-radius:50%;
    display:inline-block;
    transition:background-color 0.6s ease;
}

.active, .dot:hover
{
    background-color: #717171;
}

body
{
    background-image: url(image/background.png);
}

.sidebar{grid-area: menu;
}

.products{grid-area:products;}
.filter{grid-area:header2;
display:flex;
justify-content: flex-end; 
align-items: flex-end; 
padding: 10px;
}
.result{grid-area:header1;}

.sort 
{
    display: flex;
}

.collection-sort
{
    margin-right: 10px;
}

.product-card
{
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  width:100px;
  margin: auto;
  text-align: center;
  font-family: arial;
}

.grid-container
{
    display: grid;
    grid-template-areas: 'header1 header2'
                         'menu products';
}
.sidebar
{
  float:left;
  background:#fff;
  width:150px;  
  padding:13px 0 0 45px;
  height:1400px;
  border-right: 1px solid #eee;
}

.sidebar a 
{
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 25px;
  color: #2196F3;
  display: block;
  position:relative;
  right:30px;
  color:gray;
}

.sidebar h2
{
    position: relative;
    right:30px;
    color:#002ea6;
}
.grid-container2 button
{
  border: none;
  outline: 0;
  padding: 12px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

.grid-container2 button:hover
{
    transition:0.6s ease;
}
.grid-container2 button:hover
{
    background-color:gray;
    color:yellow;
    font-size:20px;
}

.item
{
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  width: 215px;
  margin: auto;
  text-align: center;
  font-family: Comic;
  background-color: #eeeeee;
}

.item img
{
    width:200px;
    height:200px;
}
.price 
{
  font-weight: bold;
  color:rgb(110, 110, 110);
  font-size: 22px;
}

.card button 
{
  border: none;
  outline: 0;
  padding: 12px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

.grid-container2
{
    display:grid;
    grid-template-areas: 'auto auto auto auto ';
    grid-gap:30px;
}

.size-option, .category-option, .color-option
{
    display:grid;
    grid-template-columns: max-content max-content;
    gap:10px;
}

.item h6
{
    text-align: right;
}
</style>

<script>
    let index=1;
    window.onload = function() {
        show(index);
    };
    function plus_pic(n)
    {
        show(index += n);
    }

    function current(n)
    {
        show(index = n);
    }

    function show(n)
    {
        let i;
        let pics = document.getElementsByClassName("pic") 
        let dots = document.getElementsByClassName("dot")

        if(n > pics.length)
        {
            index = 1;
        }
        if(n < 1)
        {
            index = pics.length;
        }

        for(i=0; i<pics.length; i++)
        {
            pics[i].style.display = "none";
        }
        for(i=0; i<dots.length; i++)
        {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        pics[index-1].style.display = "block";
        dots[index-1].className += " active";
    }
    
</script>
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

    <h1>Weekly Recommended</h1>
    
    <div class="wr">

        <div class="pic fade">
        <img src="image/wr1.jpg" style="width:100%; height:100%;">
    </div>
    <div class="pic fade">
        <img src="image/r11.jpeg" style="width:100%">
    </div>
    <div class="pic fade">
        <img src="image/r11.jpeg" style="width:100%">
    </div>
    <div class="pic fade">
        <img src="image/r11.jpeg" style="width:100%">
    </div>
    </div>

    <a class="prev" onclick="plus_pic(-1)" style="color:black;"><</a>
    <a class="nxt" onclick="plus_pic(1)" style="color:black;">></a>

    <div style="text-align:center">
        <span class="dot" onclick="current(1)"></span>
        <span class="dot" onclick="current(2)"></span>
        <span class="dot" onclick="current(3)"></span>
        <span class="dot" onclick="current(4)"></span>
    </div>

<hr>
<div class="grid-container">
<div class="result">
</div>
    <p><h4 id ="count"></h4></p>
</div>
    
    <div class="filter">
    <div class="sort">
    <div class="collection-sort">
        <form method="REQUEST" action="#">
            <label>SORT : </label>
            <select name="sort" style="border-radius: 20px; font-size: 17px;">
            <option value="featured">Featured</option>
                <option value="atoz">A-Z</option>
                <option value="ztoa">Z-A</option>
                <option value="low1">Price-low to high</option>
                <option value="high2">Price-high to low</option>
            </select>
    </div>
</div>
</div>

</div>

<div class="sidebar">

        <h2 style="color:#002ea6">Category</h2>
        <div class="category-option">
            <?php
                mysqli_select_db($connect, "iwp_project");
                $result = mysqli_query($connect, "select * from category");

                while($row = mysqli_fetch_assoc($result))
                {
                ?>
                    <input type="checkbox" name ="category[]" value="<?php echo $row["category"];?>"/>
                    <label><?php echo $row["category"]; ?></label>
                <?php
                }
            ?>
        </div>

        <h2>Size</h2>
        <div class="size-option">
            <?php
                mysqli_select_db($connect, "iwp_project");
                $result = mysqli_query($connect, "select * from size");
                $i=15;
                while($row = mysqli_fetch_assoc($result))
                {
                ?>            
                    <input type="checkbox" name="size[]" value="<?php echo $row["size"];?>"/>
                    <label style="font-size:<?php echo $i; ?>px"><?php echo $row["size"]; ?></label>
                <?php
                    $i += 2;
                }
            ?>
        </div>

        <h2>Color</h2>
        <div class="color-option">
            <?php
                mysqli_select_db($connect, "iwp_project");
                $result = mysqli_query($connect, "select * from color");
                while($row = mysqli_fetch_assoc($result))
                {
                ?>        
                    <input type="checkbox" name="color[]" value="<?php echo $row["color"];?>"/>
                    <button style="width: 35px; height: 35px; background-color: <?php echo $row["color"]; ?>"></button>
                <?php
                }
            ?>
        </div>

        <button type="submit" name="search" value="search" style="margin-top:45px; width:150px;"> SEARCH</button>
    </form>
</div><!--close sidebar-->


<div class="product">
    <div class="grid-container2">
        <?php
        mysqli_select_db($connect, "iwp_project");
        $sql = "SELECT * FROM product where 1 ";
        $sort = "";

        if (isset($_REQUEST["sort"])) 
        {
            $type = $_REQUEST["sort"];
            switch ($type) 
            {
                case "atoz":
                    $sort = " ORDER BY product_name ASC";
                    break;
                case "ztoa":
                    $sort = " ORDER BY product_name DESC";
                    break;
                case "low1":
                    $sort = " ORDER BY product_price ASC";
                    break;
                case "high2":
                    $sort  = " ORDER BY product_price DESC";
                    break;
            }
        }


        if (isset($_REQUEST["search"])) {
            if (isset($_REQUEST["category"]) && is_array($_REQUEST["category"]) && !empty($_REQUEST["category"])) {
                $ctgy = implode("','", $_REQUEST["category"]);
                $sql .= " AND category IN('".$ctgy."')";
            }
            if (isset($_REQUEST["size"]) && is_array($_REQUEST["size"]) && !empty($_REQUEST["size"])) {
                $sz = implode("','", $_REQUEST["size"]);
                $sql .= " AND size IN('".$sz."')";
            }
            if (isset($_REQUEST["color"]) && is_array($_REQUEST["color"]) && !empty($_REQUEST["color"])) {
                $clr = implode("','", $_REQUEST["color"]);
                $sql .= " AND color IN('".$clr."')";
            }
        }

        $sql .= $sort;
        $result = mysqli_query($connect, $sql);

        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <div class="item">
                <img src="<?php echo $row["product_img"]; ?>">
                <h6><?php echo $row["size"];?></h6>
                <h1><?php echo $row["product_name"]; ?></h1>
                <p class="price"><?php echo "RM".$row["product_price"];?></p>
                <p><button>Add to Cart</button></p>
            </div>
            <?php
        }
       $result = mysqli_query($connect, $sql );
        $count = mysqli_num_rows($result);
        ?>
    </div>
</div>


<script>
    function myFunction()
    {
        return "Showing <?php echo $count?> result.";
    }
    document.getElementById("count").innerHTML = myFunction();
</script>

</body>
</html>
