//form submit
$("#login").submit(function (e) {
    e.preventDefault();
    if (!hasEmptyInvalidFields()) {
        $foo = $("#password-confirm");
        if (jQuery.contains(document, $foo[0])) {
            if ($('#password').val() != $('#password-confirm').val()) {
                userAlert("Passwords doesn't match");
            } else {
                $("#login").unbind().submit();
            }
        } else {
            $("#login").unbind().submit();
        }
        // $("#regForm").unbind().submit();

    } else {
        userAlert("Invalid details");
    }
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
    $telPattern = /(7|8|9|1|6)\d{8}$/;
    $numberPattern = /^([0-9])?$/;
    $licPattern = /\d{4}$/;
    $textPattern = /([A-Za-z])$/;
    $modelPattern = /[A-Za-z0-9]$/;
    $enginePattern=/[A-Z]{1}[0-9]{1}[A-Z]{2}[0-9]{7}/;
    $chasisPattern=/[A-Z]{2}[0-9]{1}[A-Z]{3}[0-9]{2}[A-Z]{1}[0-9]{8}[A-Z]{2}/;
    $namePattern =  /([a-zA-Z])$/;
    $pswdPattern = /[\@]{1}/;
    $emailPattern = /\@{1}.{1}/;
    $namePattern = /[A-Za-z]/;
    $vehnoPattern=/[A-Z]{2}\s[0-9]{2}\s[A-Z]{1,2}\s[0-9]{4}/;
    // dd/mm/yyyy
    $datePattern = /^([0-2]{1}[0-9]{1}|[0-3]{1}[0-1]{1}|[0-9]{1})\/([0]{1}[0-9]{1}|[0-1]{1}[0-2]{1}|[0-9]{1})\/([1]{1}[9]{1}[4-9]{1}[0-9]{1}|[2]{1}[0]{1}[0-1]{1}[0-9]{1})/;
    switch ($type) {
        case "number":
            pattern = $numberPattern;
            $message = "Only digits please";
            break;
        case "tel":
            pattern = $telPattern;
            $message = "10 digits needed";
            break;
        case "text":
            
            if ($class == "name") {
                pattern = $textPattern;
                $message = "Should contain letters only."
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
                $message = "Should contain numbers only."
            }
            if ($class == "lic") {
                pattern = $licPattern;
                $message = "Should contain numbers only."
            }
            //else{
             //   pattern = $textPattern;
            //}
            break;
        case "password":
                pattern = $pswdPattern;
                $message = "min. 6 characters, atleast 1 special character /"
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