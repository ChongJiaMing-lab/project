<?php include("database_connect.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adding category</title>
</head>

<body>
    <form method="post" action="#">
        <p>Enter a new category: <input type="text" name="category">
        <p><input type="submit" name="cate_submit" value="ADD"></p>
</form>
</body>
</html>

<?php
if(isset($_POST["cate_submit"]))
{
    $c = $_POST["category"];

    mysqli_query($connect, "insert into category (category) values ('$c')");
    $cate_added = true;
	
    if ($cate_added)
    {
        ?>
    <script type="text/javascript">
        alert("<?php echo 'new category ' . $c . ' is added'; ?>");
        window.close();
    </script>
    <?php
    }
    ?>
<?php
}
?>