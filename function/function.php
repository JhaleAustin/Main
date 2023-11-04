<?php
session_start();
include('database/dbcon.php');

function redirect($url, $message)
{
    $_SESSION['message'] = $message;
    header('Location: '.$url);
    exit();
}
?>