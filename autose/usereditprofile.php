<?php 
require('layouts/app_top');
require('data/session.php');
require('data/connect.php');
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
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark scrolling-navbar">
    <div class="container">

      <!-- Brand -->
      <a class="navbar-brand" href="user.php">
        <strong>Home</strong>
      </a>

   
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Links -->
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        </ul>

      </div>

    </div>
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
      
      <input type="text" hidden value="profileupdate" name="type">
      <h3 class="dark-grey-text text-center">
        <strong>UPDATE YOUR PROFILE</strong>
      </h3>
      <hr>
      <?php
      $logid=getSession('logid');
      $sql = "SELECT * FROM `user` WHERE `logid`='$logid'";
      $val=mysqli_query($conn,$sql);
      if ($val) {
          ?>
      <table>
      <tbody id="tbbody">
            <?php
            while($result=mysqli_fetch_array($val)){

            ?>
      <tr>
      <td>
      First Name
      </td>
      <td>
      <div class="md-form">                  
        <input type="text" id="fname" class="form-control validate" name="fname" value=<?php echo $result['fname']; ?> data-type="name" required>
      <!--  <label for="form3">Service Name</label>-->
     </div>
     </td>
      </tr>
      <tr>
      <td>
      Last Name
      </td>
      <td>
      <div class="md-form">                  
        <input type="text" id="lname" class="form-control validate" name="lname" value=<?php echo $result['lname']; ?>  data-type="name" required>
      <!--  <label for="form3">Service Name</label>-->
     </div>
     </td>
     <tr>
      <td>
      Mobile Name
      </td>
      <td>
      <div class="md-form">                  
        <input type="tel" id="mobile" class="form-control validate" name="mobile" value=<?php echo $result['mobile']; ?>  required>
      <!--  <label for="form3">Service Name</label>-->
     </div>
     </td>
      </tr>
      <tr>
      <td>
      District
      </td>
      <td>
      <div class="md-form">  
      <input type="text" id="district" class="form-control validate" name="district" value=<?php echo $result['district']; ?>  data-type="name" required>
      <!--  <label for="form3">Service Name</label>-->
     </div>
     </td>
      </tr>
      <tr>
      <td>
      Place
      </td>
      <td>
      <div class="md-form">                  
        <input type="text" id="place" class="form-control validate" name="place" value=<?php echo $result['place']; ?>  data-type="name" required>
      <!--  <label for="form3">Service Name</label>-->
     </div>
     </td>
      </tr>
      <?php
            }
            ?>
        </tbody>
      </table>
      <div class="text-center">
        <input type="submit" class="btn btn-indigo" value="Update"> 
        <hr>

        </fieldset>
      </div>
      <?php
   }?>
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
require('layouts/specialapp_end');
?>
</div>
</body>

</html>
