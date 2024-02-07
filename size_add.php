<?php include("database_connect.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adding new size...</title>
</head>

<body>
    <form method="post" action="#">
        <p>Enter a new size: <input type="text" name="sz">
        <p><input type="submit" name="sz_submit" value="ADD"></p>
</form>
</body>
</html>

<?php
if(isset($_POST["sz_submit"]))
{
    $s = $_POST["sz"];

    mysqli_query($connect, "insert into size (size) values ('$s')");
    $sz_added = true;
	
    if ($sz_added)
    {
        ?>
    <script type="text/javascript">
        alert("<?php echo 'new size ' . $s . ' is added'; ?>");
        window.close();
    </script>
    <?php
    }
    ?>
<?php
}
?>