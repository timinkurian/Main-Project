


//form submit
$("#login").submit(function (e) {
    e.preventDefault();
    if (!hasEmptyInvalidFields()) {
        $foo = $("#password-confirm");
        if (jQuery.contains(document, $foo[0])) {
            if ($('#password').val() != $('#password-confirm').val()) {
                userAlert("New And Confirm Passwords doesn't match");
            } else {
                $("#login").unbind().submit();
            }
        } else {
            $("#login").unbind().submit();
        }
        // $("#regForm").unbind().submit();

    } 
    // else {
    //     userAlert("Please enter correct data");
    // }
});

//validation
$(".validate").on("blur", function () {
    $optional = false;
    $value = $(this).val();
    $type = $(this).attr("type");
    if ($(this).hasClass("optional")) {
        $optional = true;
    }

    $class = "";
    if ($(this).attr('data-type')) {
        $class = $(this).data('type');
    }

    if (!inputValidate($value, $type, $optional, $class)) {
        //input has invalid/empty data
        $(this).addClass("invalid-data");
    } else {
        $(this).removeClass("invalid-data");
    }
});

function inputValidate($value, $type, $optional, $class) {
    if ($value == "" && $optional) {
        return true;
    }
    if ($value == "" && !$optional) {
        return false;
    }
    //regex set for validation
    var pattern;
    $telPattern = /^[7-9]{1}[0456189]{1}[01234659]{1}[12465789]{1}[0-9]{6}$/;
    $numberPattern = /^[1-9]{1}[0-9]{0,}$/;
    $numberPattern1 = /[0-9]{0,}$/;
    $licPattern = /\d{4}$/;
    $textPattern = /^[A-Z]{1}[a-zA-Z\s]{2,}$/;
    $modelPattern = /[A-Za-z0-9]$/;
    $enginePattern=/[A-Z]{1}[0-9]{1}[A-Z]{2}[0-9]{7}/;
    $chasisPattern=/[A-Z]{2}[0-9]{1}[A-Z]{3}[0-9]{2}[A-Z]{1}[0-9]{8}[A-Z]{2}/;
    $namePattern =  /^[A-Z][a-z]{2,}$/;
    $pswdPattern = /^(?=.*[0-9])(?=.*[!@#$%^&*.])[a-zA-Z0-9!@#$%^&*.]{6,10}$/;
    $emailPattern = /\@{1}.{1}/;
    $stypePattern =   /[A-Za-z\s]+$/;
    $vehnoPattern=/[A-Z]{2}\s[0-9]{2}\s[A-Z]{1,2}\s[0-9]{4}/;
    $filePattern = /\.(gif|jpg|jpeg|png)$/i;
    // dd/mm/yyyy
    $datePattern = /^([0-2]{1}[0-9]{1}|[0-3]{1}[0-1]{1}|[0-9]{1})\/([0]{1}[0-9]{1}|[0-1]{1}[0-2]{1}|[0-9]{1})\/([1]{1}[9]{1}[4-9]{1}[0-9]{1}|[2]{1}[0]{1}[0-1]{1}[0-9]{1})/;
    switch ($type) {
        case "number":
            pattern = $numberPattern1;
            $message = "Only digits please";
            break;
        case "tel":
            pattern = $telPattern;
            $message = "Please check the number";
            break;
        case "file":
            pattern=$filePattern;
            $message="Allowed only images";
            break;
        case "text":
            
            if ($class == "name") {
                pattern = $namePattern;
                $message = "First letter must be an uppercase and allows only alphabets and space is not allowed."
            }

            if ($class == "model") {
                pattern = $modelPattern;
                $message = "Should contain letters and digits only."
            }
            if ($class == "regno") {
                pattern = $vehnoPattern;
                $message = "Should enter in correct format. Eg: KL 07 XX 0001"
            }
            if ($class == "engineno") {
                pattern = $enginePattern;
                $message = "Should enter in correct format. Eg: Eg: X1XX1111111"
            }
            if ($class == "chasisno") {
                pattern = $chasisPattern;
                $message = "Should enter in correct format. Eg: XX1XXX11X11111111XX"
            }
            if ($class == "digits") {
                pattern = $numberPattern;
                $message = "Please check the number."
            }
            if ($class == "lic") {
                pattern = $licPattern;
                $message = "Should contain numbers only."
            }
            if($class=="servicetype"){
                pattern=$stypePattern;
                $message="First letter must be an uppercase and allows only alphabets."
            }
            if($class=="general")
            {
               pattern = $textPattern;
               $message="First letter must be an uppercase and allows only alphabets."
            }
            // if($class=="dat")
            // {

            // }
            break;
        case "password":
                pattern = $pswdPattern;
                $message = "min. 6 characters, atleast 1 special character and 1 digit"
            break;

        case "date":
            $value = formatDate($value);
            pattern = $datePattern;
            $message = "Invalid date";
            break;
        case "email":
            pattern = $emailPattern;
            $message = "Email is invalid";
            break;

    }
    if (!pattern.test($value)) {
        userAlert($message);
        return false;
    }
    //finally input is valid
    return true;
}

function hasEmptyInvalidFields() {
    $length = $(".validate").length;
    for (i = 0; i < $length; i++) {
        var selector = ".validate:eq(" + i + ")";
        if (
            ($(selector).val() == "" && !$(selector).hasClass("optional")) ||
            $(selector).hasClass("invalid-data")
        ) {
            $(selector).focus();
            // $(selector).addClass("invalid-data");
            $position = $(selector).offset().top;
            $("body, html").animate({
                scrollTop: $position
            });
            return true;
        }
    }
    return false;
    // console.log($(".validate:eq(0)").val());
}

function formatDate($value) {
    var date = new Date($value);
    $date = date.getDate();
    $month = date.getMonth() + 1;
    if ($month < 10) {
        $month = "0" + $month;
    }
    $date += "/" + $month;
    $date += "/" + date.getFullYear();
    return $date;
}

//user alert
function userAlert($message) {
    $(".alert-data").html($message);
    $(".alert-box")
        .fadeIn()
        .delay(4000)
        .fadeOut();
}



//custom funciton
$("#u_type").on("change", function () {
    $type = $(this).val();
    if ($type == "company") {
        $("#l_fname").html("Company Name");
        $("#divLname").fadeOut();
    } else {
        $("#l_fname").html("First Name");
        $("#divLname").fadeIn();
    }
});



$("#login").ready(function () {
    //called when key is pressed in textbox
    $("#mobno").keypress(function (e) {
       //if the letter is not digit then display error and don't type anything
       if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
          //display error message
          $message = "Should contain numbers only."
          userAlert($message);
          return false;
      }
     });
  });