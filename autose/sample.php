<?php 
require('layouts/app_top');

require('data/session.php');
if(!getSession('logid'))
{
  header('Location:index.php');
}
?>
<body>

  <!-- Navbar -->
  <nav>
  <ul id='menu'>
    <li><a class='home' href='/'>Home</a></li>
    <li><a class='prett' href='#' title='Menu'>Service center</a>
      <ul class='menus'>
        <li class='has-submenu'><a class='prett' href='Dropdown 1' title='Dropdown 1'>123</a>
          <ul class='submenu'>
            <li><a href="#" title="Sub Menu">Sub Menu</a></li>
            <li><a href="#" title="Sub Menu">Sub Menu 2</a></li>
            <li><a href="#" title="Sub Menu">Sub Menu 3</a></li>
          </ul>
        </li>
        <li><a href='#' title='Dropdown 2'>approval</a></li>
        <li><a href='#' title='Dropdown 3'>view</a></li>
      </ul>
    </li>
  </ul>
</nav>
  <!-- Navbar -->

  <!-- Full Page Intro -->
  <div class="view full-page-intro" style="background-image: url('https://mdbootstrap.com/img/Photos/Others/images/78.jpg'); background-repeat: no-repeat; background-size: cover;">

    <!-- Mask & flexbox options-->
    <div class="mask rgba-black-light d-flex justify-content-center align-items-center">

      <!-- Content -->
      <div class="container">

        <!--Grid row-->
        <div class="row wow fadeIn">

          <!--Grid column-->
          <div class="col-md-6 mb-4 white-text text-center text-md-left">

            <h1 class="display-4 font-weight-bold">Learn Bootstrap 4 with MDB</h1>

            <hr class="hr-light">

            <p>
              <strong>Best & free guide of responsive web design</strong>
            </p>

            <p class="mb-4 d-none d-md-block">
              <strong>The most comprehensive tutorial for the Bootstrap 4. Loved by over 500 000 users. Video and written versions
                available. Create your own, stunning website.</strong>
            </p>

            <a target="_blank" href="https://mdbootstrap.com/bootstrap-tutorial/" class="btn btn-indigo btn-lg">Start free tutorial
              <i class="fa fa-graduation-cap ml-2"></i>
            </a>

          </div>
          <!--Grid column-->

          <!--Grid column-->
          <div class="col-md-6 col-xl-5 mb-4">


          </div>
          <!--Grid column-->

        </div>
        <!--Grid row-->

      </div>
      <!-- Content -->

    </div>
    <!-- Mask & flexbox options-->

  </div>
  <!-- Full Page Intro -->

 <?php
    require('layouts/specialapp_end');
 ?>
</body>

</html>
