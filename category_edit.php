<?php include("database_connect.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editing category</title>
</head>

<body>
    <?php
		    if(isset($_REQUEST["edit"]))
			{
		    $c_id = $_REQUEST["cate_id"];

			$result = mysqli_query($connect, "Select * from category where category = '$c_id'");
			$row = mysqli_fetch_assoc($result);
			}
		?>


    <form method="post" action="#">
    <p>Selected Category : <input type="text" name="c_id"  value="<?php echo $row['category']; ?>"  disabled>
    <hr>
    <p>New Category name : <input type="text" name="c_name"  value="">

    		
	<p><input type="submit" name="cate_submit" value="UPDATE">
</form>
</body>
</html>

<?php
if(isset($_POST["cate_submit"]))
{
    $c = $_POST["c_name"];

    mysqli_query($connect,"update category set category = '$c' where category = '$c_id'");
    $cate_edited = true;
	
    if ($cate_edited)
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