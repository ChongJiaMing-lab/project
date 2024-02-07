<?php include("database_connect.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adding color</title>
</head>

<body>
    <form method="post" action="#">
        <p><label>Choose a color that you want to add : </label>
        <input type="color" name="color"></p>
        <p>Name the color : <input type="text" name="color_desc">
        <p><input type="submit" name="color_submit" value="ADD"></p>
</form>
</body>
</html>

<?php
if(isset($_POST["color_submit"]))
{
    $c = $_POST["color"];
    $cd = $_POST["color_desc"];

    mysqli_query($connect, "insert into color (color, color_desc) values ('$cd', '$c')");
    $color_added = true;
	
	
    if ($color_added) 
    {
        ?>
    <script type="text/javascript">
        alert("<?php echo 'new color ' . $cd . ' is added'; ?>");
        window.close();
    </script>
    <?php
    }
    ?>
<?php
}
?>