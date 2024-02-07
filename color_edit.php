<?php include("database_connect.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editing Size</title>
</head>

<body>
    <?php
		    if(isset($_REQUEST["edit"]))
			{
		    $c_id = $_REQUEST["clr_id"];

			$result = mysqli_query($connect, "Select * from color where color = '$c_id'");
			$row = mysqli_fetch_assoc($result);
			}
		?>


    <form method="post" action="#">
    <p>Selected Color Name: <input type="color" name="coid" value="<?php echo $row['color_desc']; ?>" disabled></p>
    <p>Selected Color : <input type="text" name="coid"  value="<?php echo $row['color']; ?>"  disabled>
    <hr>
    <p><label>Choose a new color : </label><input type="color" name="coname"></p>
    <p>Name the new color : <input type="text" name="color">
    
	<p><input type="submit" name="co_submit" value="UPDATE">
</form>
</body>
</html>

<?php
if(isset($_POST["co_submit"]))
{
    $c = $_POST["coname"];
    $cd = $_POST["color"];

    mysqli_query($connect,"update color set color = '$cd', color_desc = '$c' where color = '$c_id'");
    $color_edited = true;
	
    if ($color_edited)
    {
        ?>
    <script type="text/javascript">
        alert("<?php echo 'Successfully updated !'?>");
        window.close();
    </script>
    <?php
    }
    ?>
<?php
}
?>