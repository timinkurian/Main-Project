<?php 

// require('data/connect.php');
// require('data/session.php');
// if(!getSession('user_id'))
// {
//   header('Location:index.php');
// }
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
                              <a class="nav-link waves-effect waves-light" href="employeehome.php">Home
                                  <span class="sr-only">(current)</span>
                              </a>
                          </li>
                          <!-- <li class="nav-item">
                              <a class="nav-link waves-effect waves-light" >Car</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link waves-effect waves-light" href="#">Pricing</a>
                          </li> -->
                          <!-- <li class="nav-item dropdown">
                              <a class="nav-link dropdown-toggle waves-effect waves-light" id="navbarDropdownMenuLink-5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Car Details
                              </a>
                              <div class="dropdown-menu dropdown-secondary" aria-labelledby="navbarDropdownMenuLink-5">
                                  <a class="dropdown-item waves-effect waves-light" href="addcar.php">Add Car</a>
                                  <a class="dropdown-item waves-effect waves-light" href="viewcar.php">View Car</a>
                              </div>
                          </li> -->
                          <li class="nav-item dropdown">
                              <a class="nav-link dropdown-toggle waves-effect waves-light" id="navbarDropdownMenuLink-5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Appointment
                              </a>
                              <div class="dropdown-menu dropdown-secondary" aria-labelledby="navbarDropdownMenuLink-5">
                              <a class="dropdown-item waves-effect waves-light" href="#">View Appointment</a>    
                              <!-- <a class="dropdown-item waves-effect waves-light" href="viewcar.php">Make Appointment</a> -->
                                  
                              </div>
                          </li>
                          <li class="nav-item dropdown">
                              <a class="nav-link dropdown-toggle waves-effect waves-light" id="navbarDropdownMenuLink-5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Leave
                              </a>
                              <div class="dropdown-menu dropdown-secondary" aria-labelledby="navbarDropdownMenuLink-5">
                              <a class="dropdown-item waves-effect waves-light" href="leaveapply.php">Apply Leave</a> 
                              <a class="dropdown-item waves-effect waves-light" href="#">View Leave Status</a>
                              <!-- <a class="dropdown-item waves-effect waves-light" href="viewcar.php">Make Appointment</a> -->
                                  
                              </div>
                          </li>
                      </ul>
                      <ul class="navbar-nav ml-auto nav-flex-icons">
                          <!-- <li class="nav-item">
                              <a class="nav-link waves-effect waves-light">1
                                  <i class="fas fa-envelope"></i>
                              </a>
                          </li> -->
                          <style>
                              .avatar{
                                  vertical-align:middle;
                                margin-right:100px;
                              }
                              </style>
                          <li class="nav-item avatar dropdown">
                              <a class="nav-link dropdown-toggle waves-effect waves-light" id="navbarDropdownMenuLink-5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                 <?php
                                    $val=getSession('user_id');
                                    $sql="SELECT * FROM tbl_employee WHERE user_id=$val";
                                    $img=mysqli_query($conn,$sql);
                                    $result=mysqli_fetch_array($img)?>
                                  <img src="data/<?php echo $result['photo']; ?>" class="img-fluid rounded-circle z-depth-0" alt="Material Design for Bootstrap - example photo" class="avatar">
                              </a>
                              <div class="dropdown-menu dropdown-menu-right dropdown-secondary" aria-labelledby="navbarDropdownMenuLink-5">
                                  <a class="dropdown-item waves-effect waves-light" href="#">Profile</a>
                                  <a class="dropdown-item waves-effect waves-light" href="#">Change Password</a>
                                  <a class="dropdown-item waves-effect waves-light" href="components/logout.php">Logout</a>
                              </div>
                          </li>
                      </ul>
                  </div>
              <!-- <a class="navbar-brand" href="#">Navbar</a> -->
              </nav>
  <!-- Navbar -->
  </body>
  </html>