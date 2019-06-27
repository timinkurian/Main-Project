<?php
require('layouts/app_top');
require('data/session.php');
if (!getSession('email')) {
  header('Location:index.php');
}
?>

<body>
  <!--style="background-image: url('userimg.png'); background-repeat: no-repeat; background-size: cover;"-->
  <div class="view full-page-intro" style="background-image: url('realdeal.jpg'); background-repeat: repeat; background-size: cover;">

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
          <div class="offset-4 col-md-4 mb-4">

            <!--Card-->
            <div class="card">

              <!--Card content-->
              <div class="card-body">

                <!-- Form -->
                <form name="" id="login" method="post" enctype="multipart/form-data" class="mt-5">
                  <!-- Heading -->


                  <h3 class="dark-grey-text text-center">
                    <strong>Confirm Your OTP</strong>
                  </h3>
                  <hr>
                  <div class="md-form">
                    <input type="text" id="otp" class="form-control" name="otp" required>
                    <label for="form3">Enter 6 digit OTP</label>
                  </div>

                  <div class="text-center">
                    <input type="button" id="confirm" value="Confirm">
                    <input type="button" id="resend" value="Resend">
                    <hr>
                    <!-- <fieldset class="form-check">
          <input type="checkbox" class="form-check-input" id="checkbox1">
          <label for="checkbox1" class="form-check-label dark-grey-text">Rememer Me</label>-->
                    </fieldset>
                  </div>
                  <div>OTP will expired in <span id="time">00:00</span> minutes!
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
  <script>
    $(document).ready(function() {
      $("#resend").hide();



      var fiveMinutes = <?php

                        if (getSession('time')) {
                          echo ceil((time() - getSession('time')) / 60);
                        } else {
                          echo '0';
                        }

                        ?>,


        display = document.querySelector('#time');

      if (fiveMinutes > 5) {
        $("#resend").show();
        $("#confirm").hide();
      } else {
        fiveMinutes =(5 - fiveMinutes )* 60;
        startTimer(fiveMinutes, display);
      }





      function startTimer(duration, display) {
        var timer = duration, //seconds
          minutes, seconds;
        var timerId = setInterval(function() {
          minutes = parseInt(timer / 60, 10)
          seconds = parseInt(timer % 60, 10);

          minutes = minutes < 10 ? "0" + minutes : minutes;
          seconds = seconds < 10 ? "0" + seconds : seconds;

          display.textContent = minutes + ":" + seconds;

          --timer;
          // if (--timer < 0) {
          //     ;
          // }
        }, 1000);


        setTimeout(() => {
          clearInterval(timerId);
          $("#resend").show();
          $("#confirm").hide();

        }, duration * 1000 + 1000);

      }


    });


    $("#resend").on("click", function() {

      $.ajax({
        url: 'data/data.php',
        method: 'post',
        data: {
          'type': "resendotp"
        },
        success: function() {
          $("#resend").hide();
          $("#confirm").show();
          alert('Authentication Success Please check your mail');
          window.location = 'otpconfirm.php';
          startTimer(5 * 60, display);
        }
      });
    });


    $("#confirm").on("click", function() {
      // alert();
      $.ajax({

        url: 'data/data.php',
        method: 'post',
        data: {
          'type': "forgototp",
          'otp': $("#otp").val()
        },
        success: function(data) {
          if (data == 1) {
            alert('Authentication Success');
            window.location = 'passwordchangeotp.php';
          }
          if (data == 2) {
            alert('Wrong OTP');
          }
          if (data == 3) {
            alet('Time expired');
          }
        }
      });
    });
  </script>
</body>

</html>