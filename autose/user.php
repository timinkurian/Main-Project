<?php 
require('layouts/app_top');

require('data/session.php');
if(!getSession('user_id'))
{
  header('Location:index.php');
}
?>
<body>

  <!-- Navbar -->
  <nav class="mb-1 navbar navbar-expand-lg navbar-dark purple lighten-1">
                  
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-5" aria-controls="navbarSupportedContent-5" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent-5">
                      <ul class="navbar-nav mr-auto">
                          <li class="nav-item active">
                              <a class="nav-link waves-effect waves-light" href="#">Home
                                  <span class="sr-only">(current)</span>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link waves-effect waves-light" href="#">Features</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link waves-effect waves-light" href="#">Pricing</a>
                          </li>
                          <li class="nav-item dropdown">
                              <a class="nav-link dropdown-toggle waves-effect waves-light" id="navbarDropdownMenuLink-5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown
                              </a>
                              <div class="dropdown-menu dropdown-secondary" aria-labelledby="navbarDropdownMenuLink-5">
                                  <a class="dropdown-item waves-effect waves-light" href="#">Action</a>
                                  <a class="dropdown-item waves-effect waves-light" href="#">Another action</a>
                                  <a class="dropdown-item waves-effect waves-light" href="#">Something else here</a>
                              </div>
                          </li>
                      </ul>
                      <ul class="navbar-nav ml-auto nav-flex-icons">
                          <li class="nav-item">
                              <a class="nav-link waves-effect waves-light">1
                                  <i class="fas fa-envelope"></i>
                              </a>
                          </li>
                          <li class="nav-item avatar dropdown">
                              <a class="nav-link dropdown-toggle waves-effect waves-light" id="navbarDropdownMenuLink-5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  <img src="https://mdbootstrap.com/img/Photos/Categories/Components/img(31).jpg" class="img-fluid rounded-circle z-depth-0" alt="Material Design for Bootstrap - example photo">
                              </a>
                              <div class="dropdown-menu dropdown-menu-right dropdown-secondary" aria-labelledby="navbarDropdownMenuLink-5">
                                  <a class="dropdown-item waves-effect waves-light" href="#">Action</a>
                                  <a class="dropdown-item waves-effect waves-light" href="#">Another action</a>
                                  <a class="dropdown-item waves-effect waves-light" href="#">Something else here</a>
                              </div>
                          </li>
                      </ul>
                  </div>
              <a class="navbar-brand" href="#">Navbar</a></nav>
  <!-- Navbar -->
  

  <!-- Full Page Intro -->
  <div  id="pageData"  class="view full-page-intro" >

    <!-- Mask & flexbox options-->
    <div class="mask d-flex justify-content-center align-items-center">

      <!-- Content -->
      <div class="container-fluid">

        <!--Grid row-->
        <div class="row wow fadeIn">

          <!--Grid column-->
          <div  class="col-md-12">
          <h4>
                Welcome! User 
              </h4>
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
    require('layouts/app_end');
 ?>
</body>

</html>
