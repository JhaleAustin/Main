<?php
include('../function/myfunction.php');
if(isset($_SESSION['auth']))
{
    if($_SESSION['role_as'] == 0)
    {
        redirect("../index.php","you are not authorized to access this page" );
       
    }

}
else
{
    redirect("../Login.php","Login to continue" );

}
?>