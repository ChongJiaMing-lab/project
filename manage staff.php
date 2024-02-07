<?php 
include("database_connect.php");

if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($connect, $_POST['name']);
    $staffID = mysqli_real_escape_string($connect, $_POST['staffID']);
    $position = mysqli_real_escape_string($connect, $_POST['position']);

    $query = "INSERT INTO staff (staff_name, staff_id, position) VALUES ('$name', '$staffID', '$position')";
    $result = mysqli_query($connect, $query);

    if ($result) 
    {
        echo "<script> alert('Successfully added') </script>";
    } 
    else {
        echo "<script> alert('Invalid add staff') </script>";
    }
}

mysqli_close($connect);
?>

<!DOCTYPE html>
<html lang="en">

<style>


#container {
  width: 100%;
  height: 100%;
  padding: 10px;
}

#edit {
  padding: 5px;
  outline: none;
}

button {
  width: 300px;
  padding: 10px;
  margin: 0 3px;
  background-color: gray;
  outline: none;
  border: 1px solid black;
  box-shadow: 2px 2px 2px #3f3f3f;
}

#edit-button
{
 font-weight: bolder;
 font-size:large;
 font-family: Arial, Helvetica, sans-serif;
}

.deletebtn
{
font-weight: bolder;
 font-size:large;
 font-family: Arial, Helvetica, sans-serif;
}
button:hover {
  box-shadow: 2px 2px 3px ;
}

button:active {
  box-shadow: 1px 1px 3px ;
}

table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 100%;
  border: 1px solid #ddd;
}

th, td {
  text-align: center;
  padding: 16px;
}

tr:nth-child(even) {
  background-color: #f2f2f2;
}

.sidebar{
            margin: 0;
            padding: 0;
            width: 10%;
            background-color: #f1f1f1;
            float:left;
            position: fixed;
            height: 1000px;
            overflow: auto;
            text-align: center;
        }

        .welcome{
            display: block;
            color: black;
            padding: 16px;
            text-decoration: none;
            font-size: 30px;
            font-family: Arial, Helvetica, sans-serif;
            border:none;
        }

        .sidebar a{
            display: block;
            color: black;
            padding: 16px;
            text-decoration: none;
        }

        .sidebar a.active {
        background-color: red;
        color: white;
        }

        .sidebar a:hover:not(.active){
        background-color: #555;
        color: white;
        } 
        div.content {
        margin-left: 10%;
        padding: 1px 16px;
        height: 1000px;
        }

 body
 {
  background-image: url(cool-background.png);
 }

</style>

<body>
<?php include 'admin_sidebar.php' ?>

<div class="content">
    <div class="header">
        <img src="image logo.jpg" class="LOGO" width=200px height="40px">
    </div>
    <hr>

    <h2 style="font-weight: bolder;">Manage Staff</h2>

    <table border="1px" width="800px">
    <tr style="background-color: gray;">
        <th>Staff Name</th>
        <th>Staff ID</th>
        <th>Position</th>
        
        <?php
			mysqli_select_db($connect,"iwp_project");
			$result = mysqli_query($connect, "SELECT * FROM staff;");	
			$count = mysqli_num_rows($result);//used to count number of rows
			
			while($row = mysqli_fetch_assoc($result))
			{
			
			?>			

                <tr>
                    <td><?php echo $row["staff_name"] ?></td>
                    <td><?php echo $row["staff_id"] ?></td>
                    <td><?php echo $row["position"] ?></td>
                   
                    <td>
                        <a href="staff(edit).php?id=<?php echo $row['staff_id']; ?>" id="edit-button"><img src="edit icon.png" style="width:40px;height :40px; text-align:center;"alt=""></a> </td>
                        <td>  <a href="staff(delete).php?id=<?php echo $row['staff_id']; ?>" onclick="return confirm('Are you sure you want to delete this product?')" class="deletebtn"><img src="delete icon.png" style="width:40px;height :40px"alt=""></a>
                    </td>
                </tr>
			<?php
			
			}
			
			?>
             
    </tr>

    </table>

    <form method="post" action="">
        <h3>Add New Staff</h3>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="staffID">Staff ID:</label>
        <input type="text" id="staffID" name="staffID" required>

        <label for="position">Position:</label>
        <input type="text" id="position" name="position" required>

        <button type="submit" name="submit" style="font-weight: bolder; font-family: Arial, Helvetica, sans-serif; font-size: large;">Add Staff</button>
    </form>
</div>
</body>
</html>
<?php

