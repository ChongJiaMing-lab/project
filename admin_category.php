<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Category</title>
</head>

<?php include("database_connect.php"); ?>
<style>
body
{
    background-image: url(image/cool-background.png);
}

div.content 
{
    margin-left: 10%;
    padding: 1px 16px;
    height: 1000px;
}
        
table 
{
  font-family: Comic sans ms;
  border-collapse: collapse;
  max-width: 100%;
  text-align: center;
}

td, th
{
  text-align: left;
  padding: 8px;
}

button
{
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    border-radius: 5px;
    border: none;
    background-color: rgb(221, 219, 219);
    cursor: pointer;
    margin-top:15px;
}

.add
{
    text-align: center;
    height:40px;
    margin-top: 10px; 
    background-color: green;
    color:white;
    margin-bottom: 10px;
    font-weight: bold;
}

input
{
    width:300px;
    height: 25px;;
}

.collap 
{
  background-color: #777;
  color: white;
  cursor: pointer;
  padding: 18px;
  width: 55%;
  border: none;
  text-align: left;
  outline: none;
  font-size: 15px;
  margin-bottom: 5px;
}

.active, .collap:hover 
{
  background-color: #555;
}

.col 
{
  padding: 0 18px;
  display: none;
  overflow: hidden;
  background-color: #f1f1f1;
  width: 52%;
}

input
{
    margin-bottom:10px;
}

.table a
{
    text-decoration:none;
    border:1px solid black;
    border-radius:5px;
}
.table a:hover
{
    border-width:3px;
    border-radius:5px;
}

.table button
{
    border-radius:5px;
    height:30px;
    weight:65px;
}
</style>

<body>
<?php include("admin_sidebar.php"); ?>
     <div class="content">
        <div class="header">
            <img src="image/logo.png" class="LOGO" width=200px height="40px">

    <h1>Managing the categories</h1>
    <hr>


</div>


    <button type="button" class="collap">CATEGORY</button>
    <div class="col">
    <table border="1" class="table">
    <tr>
		<th>Category</th>
		<th colspan="2" style="text-align:center; max-width:100px; max-height:100px;">Action</th>
	</tr>

    <?php
			mysqli_select_db($connect,"iwp_project");
			$result = mysqli_query($connect, "select * from category");	
			$count = mysqli_num_rows($result);
		?>
        <?php
			while($row = mysqli_fetch_assoc($result))
			{
			?>			
			<tr>
				<td><?php echo $row["category"]; ?></td>
                <td style="border-right:none;"><a href="#" onclick="editCategory('<?php echo $row['category']; ?>')">Edit</a></td>
				<td><a href="admin_category.php?del&cate_id='<?php echo $row ['category']; ?>'" onclick = "return cconfirmation();">Delete</a></td>
			</tr>
			<?php
			}
	?>
    </table>
    <button onclick="addCategory()" style="border-radius:5px; height:30px; weight:65px; background-color:#96FFBC;">Add Category</button>
    </div>

    <button type="button" class="collap">COLOR</button>
    <div class="col">

    <table border="1" class="table">
    <tr>
		<th>Color</th>
        <th>Description</th>
		<th colspan="2">Action</th>
	</tr>

    <?php
			mysqli_select_db($connect,"iwp_project");
			$result = mysqli_query($connect, "select * from color");	
			$count = mysqli_num_rows($result);
			
			while($row = mysqli_fetch_assoc($result))
			{
			?>			
			<tr>
				<td><div style="width: 30px; height: 30px; background-color: <?php echo $row["color_desc"]; ?>"></div></td>
                <td><?php echo $row["color"]; ?></td>
				<td style="border-right:0;"><a href="#" onclick="editColor('<?php echo $row['color']; ?>')">Edit</a></td>
				<td><a href="admin_category.php?del&clr_id='<?php echo $row ['color']; ?>'" onclick = "return coconfirmation();">Delete</a></td>
			</tr>
			<?php
			
			}
	?>
    </table>
    <button onclick="addColor()" style="border-radius:5px; height:30px; weight:65px; background-color:#96FFBC;">Add Color</button>
    </div> 

    <button type="button" class="collap">SIZE</button>

    <div class="col">
    <table border="1" class="table">
    <tr>
		<th>Size</th>
		<th colspan="2" style="">Action</th>
	</tr>

    <?php
			mysqli_select_db($connect,"iwp_project");
			$result = mysqli_query($connect, "select * from size");	
			$count = mysqli_num_rows($result);
			
			while($row = mysqli_fetch_assoc($result))
			{
			?>			
			<tr>
				<td><?php echo $row["size"]; ?></td>
				<td><a href="#" onclick="editSize('<?php echo $row['size']; ?>');">Edit</a></td>
				<td><a href="admin_category.php?del&sz_id='<?php echo $row ['size']; ?>'" onclick = "return sconfirmation();">Delete</a></td>
			</tr>
			<?php
			
			}
	?>
    </table>
    <button onclick="addSize()" style="border-radius:5px; height:30px; weight:65px; background-color:#96FFBC;">Add Size</button>
    </div>

</div><!---clsoe sidebar -->

<script>
    var coll = document.getElementsByClassName("collap");
    var i;
        
    for (i = 0; i < coll.length; i++) 
    {
        coll[i].addEventListener("click", function()  {
        this.classList.toggle("active");
        var content = this.nextElementSibling;
        if (content.style.display === "block") 
        {
            content.style.display = "none";
        } 
        else 
        {
            content.style.display = "block";
        }
          });
    }

 function cconfirmation()
 {
     answer = confirm("Do you want to delete this category?");
     return answer;
 }
 function coconfirmation()
 {
     answer = confirm("Do you want to delete this color?");
     return answer;
 }
 function sconfirmation()
 {
     answer = confirm("Do you want to delete this size?");
     return answer;
 }
 
 function editCategory(cid)
 {
    var url = "category_edit.php?edit&cate_id=" + cid;
    var myWindow = window.open(url, "Edit Category", "width=500,height=300");
    var check = setInterval(function() {
        if (myWindow.closed) 
        {
            clearInterval(check);
            refreshPage();
        }
    }, 1);
}

function editColor(coid) 
{
    var url = "color_edit.php?edit&clr_id=" + coid;
    var myWindow = window.open(url, "Edit Color", "width=500,height=300");
    var check = setInterval(function() {
        if (myWindow.closed) 
        {
            clearInterval(check);
            refreshPage();
        }
    }, 1);
}

function editSize(sid) {
    var url = "size_edit.php?edit&sz_id=" + sid;
    var myWindow = window.open(url, "Edit Size", "width=500,height=300");
    var check = setInterval(function() {
        if (myWindow.closed) 
        {
            clearInterval(check);
            refreshPage();
        }
    }, 1);
}


function addCategory()
{
    var myWindow = window.open("category_add.php", "adding new category...", "width=500 , height=250");
    var check = setInterval(function() {
        if (myWindow.closed) 
        {
            clearInterval(check);
            refreshPage();
        }
    }, 1);
}

function addColor() 
{
  var myWindow = window.open("color_add.php", "adding new color...", "width=500,height=250");
  var check = setInterval(function() {
        if (myWindow.closed) 
        {
            clearInterval(check);
            refreshPage();
        }
    }, 1);
}

function addSize()
{
    var myWindow = window.open("size_add.php", "adding new size...", "width=500, height=250");
    var check = setInterval(function() {
        if (myWindow.closed) 
        {
            clearInterval(check);
            refreshPage();
        }
    }, 1);
}

function refreshPage() 
{
    location.reload();
}
</script>

</body>
</html>

<?php
 
if (isset($_REQUEST["cate_id"])) 
{
	$cate_id = $_REQUEST["cate_id"]; 
	mysqli_query($connect, "delete from category where category = $cate_id");
	
	header("Location: admin_category.php");
}

if (isset($_REQUEST["clr_id"])) 
{
	$clr_id = $_REQUEST["clr_id"]; 
	mysqli_query($connect, "delete from color where color = $clr_id");

    header("Location: admin_category.php");

}

if(isset($_REQUEST["sz_id"]))
{
    $sz_id = $_REQUEST["sz_id"];
    mysqli_query($connect, "delete from size where size = $sz_id");

    header("Location: admin_category.php");
    exit();
}
?>
