<?php

$connect= mysqli_connect("localhost","root","","iwp_project");

if(!$connect)
{
    die("Connection failed : ". myqsli_connect_error());
}
?>
