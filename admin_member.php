<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member Management </title>
</head>
<?php include("database_connect.php"); ?>
<style>

div.content 
{
    margin-left: 10%;
    padding: 1px 16px;
    height: 1000px;
}

body
{
    font-family: Comic Sans MS;
    background-image: url(image/cool-background.png);
}
table
{
    border-collapse: collapse;
    margin: auto;
}
.header
{
    width:90%;
    height:10%;
    display:flex;
    justify-content: space-between;
    align-items: center;
}

.header .search-box
{
    width:35%;
    height:50%;
    background-color: rgb(241, 241, 241);
    border-radius: 9px;
}

.search-box input
{
    width:13%;
    background-color: black;
    border:none;
    outline:none;
    border-radius:10px;
    height:25px;
    font-size:15px;
    color:white;
}
.searchb
{
    transition:0.6s ease;
}
.searchb:focus
{
    width:35%;
}
.searchb::placeholder
{
    color:white;
}

.status
{
    width:30px;
}
td,th
{
    border:0.5px solid black;
    text-align: left;
    padding:8px;
}

time
{
    font-family: Lucida Console;
}
button
{
    border: none;
    color: #fff;
    padding: 10px 20px;
    cursor: pointer;
    border-radius: 5px;
    font-size:14.5px;
}

.button-r
{
    background-color: rgb(246, 116, 65);
    color:black;
}
.btn 
{
    width:425px;
}
.time
{
    width:160px;
}
tr:nth-child(even) 
{
  background-color: #dddddd;
}

</style>

<body>
<?php include("admin_sidebar.php"); ?>
<hr>
    
<div class="content">
    <h1>Members</h1>
    <hr>
    <form method="post" action="">
    <div class="search-box">
        <img src="image/search.png" style="width:20px; height:20px;">
        <input type="text" class="searchb" name="search" name ="sear" placeholder="Search with username...">
        <p hidden><input type="submit" value="search"></p>
    </div>
    </form>
    <?php
        mysqli_select_db($connect, "iwp_project");

if (isset($_POST["search"])) 
{
    $search = mysqli_real_escape_string($connect, $_POST["search"]);
    $q = "SELECT * FROM user_register WHERE username LIKE '%$search%'";
} else 
{
    $q = "SELECT * FROM user_register";
}

$result = mysqli_query($connect, $q);
$count = mysqli_num_rows($result);
?>

<p><?php echo "Showing " . $count . " result(s)"; ?></p>

<table>
    <tr>
        <th>User ID</th>
        <th>Username</th>
        <th>Email</th>
        <th>Password</th>
        <th>Postal Code</th>
        <th>Birthday</th>
        <th>Gender</th>
        <th>Action</th>
    </tr>

    <tr class="members">
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
            <tr>
                <td><?php echo $row["user_id"]; ?></td>
                <td><?php echo $row["username"]; ?></td>
                <td><?php echo $row["email"]; ?></td>
                <td><?php echo $row["password"]; ?></td>
                <td><?php echo $row["postal_code"]; ?></td>
                <td><?php echo $row["birthday"]; ?></td>
                <td><?php echo $row["gender"]; ?></td>
                <td>
                <button class="button-r" onclick="confirmDel('<?php echo $row['user_id']; ?>')">
                    <img src="image/big-x.png" style="width:15px; height:15px">Remove
                </button>
                </td>
            </tr>
        <?php
        }
        ?>
    </tr>
</table>
</div> 
</body>
</html>


<script>
function confirmDel(user) 
{
    if (confirm('Are you sure you want to delete?')) 
        {
            window.location.href = 'admin_member.php?del&user=' + user;
        }
}
</script>

<?php 
if (isset($_REQUEST["user"])) 
{
	$id = $_REQUEST["user"]; 
	mysqli_query($connect, "delete from user_register where user_id = $id");
}    
?>
