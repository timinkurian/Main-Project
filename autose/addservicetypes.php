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
  <li><a class='home' href='sevricecenterhome.php'>Home</a></li>
  </ul>
</nav>

  <div class="main py-3">
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
    <form name="" id="login" method="post" action="data/centerdata.php" enctype="multipart/form-data" class="mt-5">
      <!-- Heading -->
      
      <input type="text" hidden value="addtype" name="type">
      <h3 class="dark-grey-text text-center">
        <strong>Add Service Name</strong>
      </h3>
      <hr>
      <div class="md-form">                  
        <input type="text" id="sname" class="form-control validate" name="sname" data-type="name">
        <label for="form3">Type of service</label>
       </div>
       <div class="md-form">                  
        <input type="number" id="maximum" class="form-control validate" name="maximum">
        <label for="form3">No of Cars Servicing per Day</label>
       </div>
      <div class="text-center">
        <input type="submit" class="btn btn-indigo" value="Add"> 
        <hr>
   
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
require('layouts/specialapp_end');
?>
</div>
</body>

</html>
