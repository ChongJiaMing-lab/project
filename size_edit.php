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
		    $s_id = $_REQUEST["sz_id"];

			$result = mysqli_query($connect, "Select * from size where size = '$s_id'");
			$row = mysqli_fetch_assoc($result);
			}
		?>


    <form method="post" action="#">
    <p>Selected Category  : <input type="text" name="s_id"  value="<?php echo $row['size']; ?>"  disabled>
    <hr>
    <p>New Category name : <input type="text" name="s"  value="">

	<p><input type="submit" name="s_submit" value="UPDATE">
</form>
</body>
</html>

<?php
if(isset($_POST["s_submit"]))
{
    $s = $_POST["s"];

    mysqli_query($connect,"update size set size = '$s' where size = '$s_id'");
    $size_edited = true;
	
    if ($size_edited)
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