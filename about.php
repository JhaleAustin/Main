<?php
include('session.php');
include('database/dbcon.php');
include('include/header.php');
?>
<!DOCTYPE html>
<html lang="en">
<style>
    .adress {
        display: flex;
        align-items: center;
        justify-content: left;
        left: 16px;
        margin-left: 20px;
        font-size: 20px;
    }

    .email {
        display: flex;
        align-items: center;
        justify-content: left;
        left: 16px;
        margin-top: 20px;
        margin-left: 20px;
        font-size: 20px;
    }

    .weblinks {
        display: flex;
        align-items: center;
        justify-content: left;
        left: 16px;
        margin-top: 20px;
        margin-left: 20px;
        font-size: 20px;
    }

    .link {
        display: flex;
        align-items: center;
        justify-content: left;
        left: 16px;
        margin-top: 20px;
        margin-left: 20px;
        font-size: 20px;
    }
    
</style>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- Sidebar -->
    <div class="w3-sidebar w3-light-grey w3-bar-block" style="width:20%; font-size: 20px;">
        <h3 class="w3-bar-item">About Student Personel Services</h3>
        <a href="#" class="w3-bar-item w3-button">Contact Info</a>
        <a href="#" class="w3-bar-item w3-button">FAQs</a>

    </div>

    <!-- Page Content -->
    <div style="margin-left:20%">
        <div class="w3-container w3-teal">
            <h1>Categories</h1>
        </div>
        <div class="w3-container">
            <h2>Contact info</h2>
            <div class="container" style="width: 50%; height: 50vh;">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3865.6606787139863!2d121.08281817677135!3d14.33113208361384!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33bd63ad4c1a178d%3A0x76688d7ab7914234!2sUniversity%20of%20Perpetual%20Help%20System%20Laguna!5e0!3m2!1sen!2sph!4v1702586459632!5m2!1sen!2sph" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>

        </div>
        <div class="adress">
            <i class="fa-solid fa-house fa-2xl"></i>
            <div class="add">Sto. Niño, Biñan, Philippines, 4024</div>
        </div>
        <div class="email">
            <i class="fa-solid fa-envelope fa-2xl"></i>
            <div class="mail">sps@uphsl.edu.ph</div>
        </div>
        
        <div class="weblinks">
        <i class="fa-solid fa-link"></i>
        <b> Website and Social Links</b>
        </div>
        <div class="link">
        <i class="fa-brands fa-facebook"></i>
        <a href="https://www.facebook.com/UPHSLSPS">Student Personel Services facebook</a>
        </div>

    </div>


</body>

</html>