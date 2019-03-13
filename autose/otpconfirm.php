<?php 
require('layouts/app_top');
require('data/session.php');
if(!getSession('email'))
{
  header('Location:index.php');
}
?>

<body>
<!--style="background-image: url('userimg.png'); background-repeat: no-repeat; background-size: cover;"-->
<div class="view full-page-intro" >

  <!-- Navbar -->
  
 <nav>
  <ul id='menu'>
    <li><a class='home' href='user.php'>Home</a></li>
  </ul>
</nav>
  <!-- Navbar -->

  <div class="main">
      <!-- Content -->
      <div class="container">

        <!--Grid row-->
        <div class="row wow fadeIn">

          <!--Grid column-->

          <!--Grid column-->
          <div class="offset-4 col-md-4 mb-4" >

<!--Card-->
<div class="card">

  <!--Card content-->
  <div class="card-body">

    <!-- Form -->
    <form name="" id="login" method="post" action="data/data.php" enctype="multipart/form-data" class="mt-5">
      <!-- Heading -->
      
      <input type="text" hidden value="forgototp" name="type">
      <h3 class="dark-grey-text text-center">
        <strong>Confirm Your OTP</strong>
      </h3>
      <hr>
      <div class="md-form">                  
        <input type="text" id="otp" class="form-control validate" name="otp" required>
        <label for="form3">Enter 6 digit OTP</label>
      </div>

      <div class="text-center">
        <input type="submit" class="btn btn-indigo" value="Change"> 
        <hr>
    <!-- <fieldset class="form-check">
          <input type="checkbox" class="form-check-input" id="checkbox1">
          <label for="checkbox1" class="form-check-label dark-grey-text">Rememer Me</label>-->
        </fieldset>
      </div>

    </form>
    <!-- Form -->

  </div>

</div>
<!--/.Card-->

</div>
<!--Grid column-->

</div>
<!--Grid row-->

</div>
<!-- Content -->
</div>

<?php
require('layouts/app_end');
?>
</div>
</body>

</html>
