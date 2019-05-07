<?php
require('layouts/app_top');
require('data/session.php');
$desg = getSession('designation_id');
if (empty($desg)) {
  session_destroy();
  header('Location:index.php');
}
$userid = getSession('user_id');
if ($desg == "1") {
    $link = "user.php";
  }
if ($desg == "2") {
    $link = "adminhome.php";
  }
if ($desg == "3") {
    $link = "sevricecenterhome.php";
  }
if ($desg == "4") {
    $link = "employeehome.php";
  }
?>

<body>
  <!--style="background-image: url('userimg.png'); background-repeat: no-repeat; background-size: cover;"-->
  <div class="view full-page-intro">

    <!-- Navbar -->

    <nav>
      <ul id='menu'>
        <li><a class='home' href=<?php echo $link ?>>Home</a></li>
        <!-- 'user.php' -->
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
          <div class="offset-4 col-md-4 mb-4">

            <!--Card-->
            <div class="card">

              <!--Card content-->
              <div class="card-body">

                <!-- Form -->
                <form name="" id="login" method="post" action="data/data.php" enctype="multipart/form-data" class="mt-5">
                  <!-- Heading -->

                  <input type="text" hidden value="changepass" name="type">
                  <h3 class="dark-grey-text text-center">
                    <strong>CHANGE PASSWORD</strong>
                  </h3>
                  <hr>
                  <div class="md-form">
                    <input type="password" id="password1" class="form-control validate" name="curpswd" required>
                    <label for="form3">Current Password</label>
                  </div>
                  <div class="md-form">
                    <input type="password" id="password" class="form-control validate" name="pswd" required>
                    <label for="form3">New Password</label>
                  </div>
                  <div class="md-form">
                    <input type="password" id="password-confirm" class="form-control validate" name="cpswd" required>
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