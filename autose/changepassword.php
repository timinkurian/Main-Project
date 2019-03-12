<?php 
require('layouts/app_top');
require('data/session.php');

if(isset($_SESSION['logid'])){
    switch($_SESSION['utype']){
        case '1':
            header('location:user.php');
            break;
        default:
            break;
    }
}

if(!getSession('logid'))
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
          <div class="offset-4 col-md-4 mb-4" ">

<!--Card-->
<div class="card">

  <!--Card content-->
  <div class="card-body">

    <!-- Form -->
    <form name="" id="login" method="post" action="data/userdata.php" enctype="multipart/form-data" class="mt-5">
      <!-- Heading -->
      
      <input type="text" hidden value="changepass" name="type">
      <h3 class="dark-grey-text text-center">
        <strong>CHANGE PASSWORD</strong>
      </h3>
      <hr>
      <div class="md-form">                  
        <input type="password" id="password" class="form-control validate" name="pswd">
        <label for="form3">New Password</label>
      </div>
     <div class="md-form">                  
            <input type="password" id="password-confirm" class="form-control validate" name="cpswd">
            <label for="form3">Confirm Password</label>
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
