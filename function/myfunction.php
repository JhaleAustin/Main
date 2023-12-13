<?php
include('C:\xampp\htdocs\Main\database\dbcon.php');

function getAll($table)
{
    global $con;
    $query ="SELECT * FROM $table";
    $query_run = mysqli_query($con, $query);
    return $query_run;
}

function getONE($table, $id)
{
    global $con;
    $query ="SELECT * FROM $table WHERE id = $id";
    $query_run = mysqli_query($con, $query);
    return mysqli_fetch_assoc($query_run);
}

function redirect($url, $message)
{
$_SESSION['message'] = $message;
header('location: ' .$url);
exit();
}

?>