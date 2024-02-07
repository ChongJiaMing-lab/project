<?php

include("database_connect.php");

if (isset($_REQUEST["id"])) 
{
    $staff_id = $_REQUEST["id"];
    mysqli_query($connect, "DELETE FROM staff WHERE staff_id = '$staff_id'");
    
    header("Location: manage staff.php"); // Refresh the page
}

?>

?>

<html>
<head>
    <title></title>
    <link href="design.css" type="text/css" rel="stylesheet" />

    <script type="text/javascript">
        // create a JavaScript function named confirmation()
        function confirmation() {
            select = confirm("Do you want to delete this product?");
            return select;
        }
    </script>
</head>
<body>

<div id="wrapper">
    <div id="left">
        <?php include("manage staff.php"); ?>
    </div>

    <div id="right">
        <h1>List of Products</h1>

        <table border="1">
            <tr>
                                <th>Staff Name</th>
                                <th>Staff ID</th>
                                <th>Position</th>
            </tr>
            
            <?php
            mysqli_select_db($connect, "iwp_project");
            $result = mysqli_query($connect, "SELECT * FROM staff;");    
            $count = mysqli_num_rows($result); // used to count the number of rows
            
            while ($row = mysqli_fetch_assoc($result)) {
            ?>            

            <tr>
                    <td><?php echo $row["staff_name"] ?></td>
                    <td><?php echo $row["staff_id"] ?></td>
                    <td><?php echo $row["position"] ?></td>
                   
                    <td>
        <a href="staff(edit).php?id=<?php echo $row['staff_id']; ?>" id="edit-button">Edit</a>
        <a href="staff(delete).php?id=<?php echo $row['staff_id']; ?>" onclick="return confirm('Are you sure you want to delete this product?')" class="deletebtn">Delete</a>
    </td>
                </td>
            </tr>
            <?php
            }
            ?>
        </table>

        <p> Number of records : <?php echo $count; ?></p>
    </div>
</div>

</body>
</html>
