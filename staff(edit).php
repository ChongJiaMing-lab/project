<?php
include("database_connect.php");

if (isset($_GET['id'])) {
    $staff_id = mysqli_real_escape_string($connect, $_GET['id']);
    $result = mysqli_query($connect, "SELECT * FROM staff WHERE staff_id = '$staff_id'");
    $row = mysqli_fetch_assoc($result);
} else {
    echo "Staff ID not provided.";
    exit();
}

if (isset($_POST['updatebtn'])) {
    $name = mysqli_real_escape_string($connect, $_POST['name']);
    $staffID = mysqli_real_escape_string($connect, $_POST['staffID']);
    $position = mysqli_real_escape_string($connect, $_POST['position']);

    $result = mysqli_query($connect, "UPDATE staff 
                                      SET staff_name = '$name', 
                                          position = '$position' 
                                      WHERE staff_id = '$staffID'");

    if (!$result) {
        die('Error: ' . mysqli_error($connect));
    } else {
        echo "Record updated successfully";
        // Redirect to the staff list page
        header("Location: manage staff.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Staff</title>
</head>
<style>
    body
    {
        background-image: url("cool-background.png");
        text-align:Center;
        font-weight:bolder;
    }
    h2
    {
        font-weight:bolder;
    }
   
input[type="submit"] {
  padding: 10px 20px; 
  font-size: 16px;
  background-color: orange; 
  color: black;
  border: none; 
  border-radius: 5px;
  cursor: pointer;
  
}


input[type="submit"]:hover {
  background-color: blue;
}

form {
  max-width: 600px;
  margin: 20px auto;
  background-color: skyblue;
  padding: 20px;
  border-radius: 8px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

form p {
  margin-bottom: 15px;
}

input[type="text"],
select {
  width: 100%;
  padding: 10px;
  margin-top: 5px;
  margin-bottom: 15px;
  box-sizing: border-box;
}

select {
  height: 40px;
}
</style>
<body>
    <h2>Edit Staff</h2>
    <form name="editfrm" method="post" action="" enctype="multipart/form-data">
        <input type="hidden" name="staff_id" value="<?php echo $row['staff_id']; ?>">
        <p>Staff Name: <input type="text" name="name" value="<?php echo $row['staff_name']; ?>"></p>
        <p>Staff ID: <input type="text" name="staffID" value="<?php echo $row['staff_id']; ?>" readonly></p>
        <p>Position: <input type="text" name="position" value="<?php echo $row['position']; ?>"></p>
        <p><input type="submit" name="updatebtn" value="Update Staff"></p>
    </form>
</body>
</html>
