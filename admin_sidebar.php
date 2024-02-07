<?php include("database_connect.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>

.sidebar{
            margin: 0;
            padding: 0;
            width: 10%;
            background-color: #f1f1f1;
            position: fixed;
            height: 100%;
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

        .sidebar a:hover:not(.active) {
        background-color: #555;
        color: white;
        }

    </style>

</head>
<body>
<div class="sidebar">
<?php session_start(); ?>
        <span class="welcome">Welcome admin</span>
        <a href="Landing.php" class="active"><b>DASHBOARD</b></a>

        <a href="manage_staff.php">Staffs</a>
        <a href="admin_member.php">Members</a>
        <a href="admin_category.php">Product Category</a>
        <a href="product.php">Product</a>
        <a href="manage_order.php">Order</a>
        <a href="sales_report.php">Sales Report</a>
     </div>

     
</body>

<script>
        var links = document.querySelectorAll('.sidebar a');

        links.forEach(function(link) {
            link.classList.remove('active');
        });

        links.forEach(function(link) {
            link.addEventListener('click', function() {

                links.forEach(function(link) {
                    link.classList.remove('active');
                });


                link.classList.add('active');


                localStorage.setItem('activeLink', link.getAttribute('href'));
            });
        });

        var storedActiveLink = localStorage.getItem('activeLink');
        if (storedActiveLink) {
            document.querySelector('.sidebar a[href="' + storedActiveLink + '"]').classList.add('active');
        }
    </script>

</html>