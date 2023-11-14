<?php include('include/header.php'); ?>
<style>
  .carousel-inner .carousel-item img {
    height: 550px;
    object-fit: cover;
  }

  div.gallery {
    margin: 100px;
    border: 1px solid #ccc;
    float: right;
    width: 180px;
    left: 100;
  }

  div.gallery:hover {
    border: 1px solid #777;
  }

  div.gallery img {
    width: 100%;
    height: auto;
  }

  div.desc {
    padding: 20px;
    text-align: center;

    

  }
  .icons{
    display: flex;
    justify-content: center;
  }

  .flex1 {
      min-height: 100px;
  }

  .flex2 {
    min-height: 100px;
  }

  .flex3 {
    min-height: 100px;
  }

  .flex4 {
    min-height: 100px;
    
  }
</style>
<div class="container text-center " style="margin-top:10 px; padding-left: 10px; padding-right: 10px; background-color:#002366; ">
  <div id="demo" class="carousel slide" data-bs-ride="carousel">

    <!-- Indicators/dots -->
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
      <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
      <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
      <button type="button" data-bs-target="#demo" data-bs-slide-to="3"></button>
    </div>

    <!-- The slideshow/carousel -->
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="image/purps.jpg" alt="#" class="d-block" style="width:100%">
      </div>
      <div class="carousel-item">
        <img src="image/test1.jpg" alt="#" class="d-block" style="width:100%">
      </div>
      <div class="carousel-item">
        <img src="image/pic1.jpg" alt="#" class="d-block" style="width:100%">
      </div>
      <div class="carousel-item">
        <img src="image/entranceexam.jpg" alt="#" class="d-block" style="width:100%">
      </div>
    </div>

    <!-- Left and right controls/icons -->
    <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
      <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
      <span class="carousel-control-next-icon"></span>
    </button>
  </div>
</div>

<div class="icons">
  <div class="gallery flexbox-1">
    <a target="_blank" href="img_5terre.jpg">
      <img src="image/motiv.png" alt="Cinque Terre" width="600" height="400" style="border-radius: 50%;">
    </a>
    <div class="desc">Motivation</div>
  </div>

  <div class="gallery flexbox-2">
    <a target="_blank" href="img_forest.jpg">
      <img src="image/discip.png" alt="Forest" width="600" height="400" style="border-radius: 50%;">
    </a>
    <div class="desc">Discipline
      
    </div>
  </div>

  <div class="gallery flexbox-3">
    <a target="_blank" href="img_lights.jpg">
      <img src="image/enca.png" alt="Northern Lights" width="600" height="400" style="border-radius: 70%;">
    </a>
    <div class="desc">Encouragement</div>
  </div>

  <div class="gallery flexbox-4">
    <a target="_blank" href="img_mountains.jpg">
      <img src="image/diligence.png" alt="Mountains" width="600" height="400" style="border-radius: 50%;">
    </a>
    <div class="desc">Diligence</div>
  </div>
</div>


<?php include('include/footer.php'); ?>