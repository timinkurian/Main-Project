<?php 
require('layouts/app_top');

?>
<body>

<!--style="background-image: url('https://mdbootstrap.com/img/Photos/Others/images/78.jpg'); background-repeat: no-repeat; background-size: cover-->
<!--<div class="view full-page-intro";">-->

 <!-- Navbar -->
 <nav class="navbar fixed-top navbar-expand-lg navbar-dark scrolling-navbar">
   <div class="container">

     <!-- Brand -->
     <a class="navbar-brand" href="adminhome.php">
       <strong>HOME</strong>
     </a>

       </ul>

    
    </div>

 </nav>
 <!-- Navbar -->
 <!--</div>-->
 <div class="main">
     <!-- Content -->
     <div class="container">

       <!--Grid row-->
       <div class="row wow fadeIn">


         <!--Grid column-->

         <!--Grid column-->
         <div class="offset-0 col-md-7 mb-4" ">
         <form name="" id="login" method="post" action="data/admindata.php" enctype="multipart/form-data" class="mt-5">
                  <!-- Heading -->
                  
                  <input type="text" hidden value="approvecenter" name="type">
        <?php include('data/servicecenter.php');
        ?>
 
        </form>

       <!--Grid row-->

     </div>
     <!-- Content -->
 </div>

<?php
   require('layouts/end');
?>
</div>
</body>

</html>
