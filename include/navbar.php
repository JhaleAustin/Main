<div class= "navigationbar">
<div class="div" style="background-color:#FFEF00">
  <img src="image/SPS_Logo.png" style="width:175px ; height:115px; " class="img-fluid rounded mx-auto d-block" alt="...">
  <p class="m-0 navbar-brand text-black text-center fs-3" href="index.php">Student Personnel Services UPHSL</p>
</div>  
<nav class="navbar navbar-expand-lg  text-center " style="background-color:#002366">
  <div class="container-fluid justify-content-center">

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse flex-grow-0 " id="navbarScroll">
      <ul class="navbar-nav my-2 my-lg-0 navbar-nav-scroll text-center fs-5" style="--bs-scroll-height: 100px;">
        <li class="nav-item">
          <a class="nav-link active text-white" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="#">Apply for entrance EXAM </a>
        </li>
        <li class="nav-item ">
          <a class="nav-link text-white" href="#">About</a>
        </li>
        <?php
        if(isset($_SESSION['auth']))
        {
          ?>
          <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
           <?= $login_session;?>
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">profile</a></li>
            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
            <li><a class="dropdown-item" href="#"> my Reference number</a></li>

          </ul>
        </li>

          <?php
        }
        else
        {
          ?>
         <a href="login.php" class="btn  btn-primary text-black text-decoration-none btn-block float-end fs-5">Log-in</a>;
         <?php
        }
        ?>

        
        
      </ul>

      



    </div>
  </div>
</nav>
</div>

