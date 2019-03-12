
$(document).ready(function () {
    // Animations initialization
    new WOW().init();
    $var = 123;


    // $("#login").on("submit", function(e){
    //     e.preventDefault();
    //     console.log($(this).serialize());
    // });


    $("#brand").on("change", function () {
        // alert();
        $brand = $(this).val();
        $.ajax({
            url: 'data/model.php',
            method: 'post',
            data: { 'brand': $brand },
            success: function (data) {
                $("#model").html(data);
            }
        });
    })

    $("#model").on("change", function () {
        //alert();
        $model = $(this).val();
        $.ajax({
            url: 'data/variant.php',
            method: 'post',
            data: { 'model': $model },
            success: function (data) {
                $("#variant").html(data);
            }
        });
    })

    $("#variant").on("change", function () {
        //alert();
        $variant = $(this).val();
        $.ajax({
            url: 'data/fuel.php',
            method: 'post',
            data: { 'variant': $variant },
            success: function (data) {
                $("#fuel").html(data);
            }
        });
    })


    $(".adm-nav").on("click", function (e) {
        //alert();
        e.preventDefault();
        $type = $(this).data('type');

        switch ($type) {
            case 'approval':
                $url = 'data/servicecenter.php';
                break;
            case 'view':
                //alert();
                $url = 'data/viewservicecenter.php';
                break;
            case 'addbrand':
                //alert();
                $url = '../adminbrand.php';
                break;
            case 'viewbrand':
                //alert();
                $url = 'data/viewbrand.php';
                // alert();
                break;
            case 'viewuser':
                $url = 'data/viewuser.php';
                break;
            case 'viewdistrict':
             //alert();
                $url = 'data/districtview.php';
            break;
            case 'Caraprove':
           // alert();
               $url = 'data/aprovecar.php';
           break;
           case 'viewcar':
           // alert();
               $url = 'data/adminviewcar.php';
           break;
        }

        $.ajax({
            url: $url,
            method: 'post',
            data: { 'type': $type },
            success: function (data) {
                $("#pageData").html(data);
            }
        });
    });


    $("body").on("click", ".adm-click", function (e) {
        // e.preventDefault();
        $type = $(this).data('type');
        $id = $(this).data('id');
        $.ajax({

            url: 'data/admindata.php',
            method: 'post',
            data: { 'type': $type, 'id': $id },
            success: function (data) {
                console.log(data);

                //  $("#pageData").html(data);
                if (data == 1) {
                    $("#servControl" + $id).html('approved!');
                }
                if (data == 2) {
                    $("#servControl" + $id).html('rejected!');
                }
            }
        });
    });

});

$("body").on("click", ".admn-click", function (e) {
    // e.preventDefault();
    $brand = $("body #brand").val();
    $model = $("body #model").val();
    if($brand==""){
        alert('Choose a brand');
        die();
    }
    if($model==""){
        alert('Choose a model');
        die();
    }
    $type = $(this).data('type');
    //$id=$(this).data('id');
    //alert($type);
    $.ajax({

        url: 'data/admindata.php',
        method: 'post',
        data: { 'type': $type, 'brand': $brand, 'model': $model },
        success: function (data) {
            console.log(data);
            //  $("#pageData").html(data);          
            $("body #tbbody").html(data);
        }
    
     });
 });


$(".cntr-nav").on("click", function (e) {
    //alert();
    e.preventDefault();
    $type = $(this).data('type');

    switch ($type) {
            case 'viewschemes':
            $url = 'data/centerdata.php';
            break;
            case 'viewappointment':
            $url = 'data/centerappointment.php';
            break;
            case 'startedworks':
            $url = 'data/startedworks.php';
            break;
            default:
            break;

    }

    $.ajax({
        url: $url,
        method: 'post',
        data: { 'type': $type },
        success: function (data) {
            $("#pageData").html(data);
        }
    });
});

$("body").on("click", ".cntr-click", function (e) {
    // e.preventDefault();
   
    $type = $(this).data('type');
    $id = $(this).data('id');
   
    $.ajax({

        url: 'data/centerdata.php',
        method: 'post',
        data: { 'type': $type, 'id': $id },
        success: function (data) {
            console.log(data);

            //  $("#pageData").html(data);
            if (data == 1) {
                $("#servControl" + $id).html('Started!');
            }
            if (data == 2) {
                $("#servControl" + $id).html('Completed!');
            }
        }
    });
});


$(".user-nav").on("click", function (e) {
    //alert();
    e.preventDefault();
    $type = $(this).data('type');

    switch ($type) {
        case 'appointment':
            $url = 'data/usercenterview.php';
            break;
        case 'viewcar':
            $url='data/viewcar.php';
        break;
        case 'status':
            $url = 'data/appointmentstatus.php';
        break;
        case 'profile':
            $url = 'data/userprofile.php';
        break; 
                case 'status':
            $url = 'data/appointmentstatus.php';
        break;      


    }

    $.ajax({
        url: $url,
        method: 'post',
        data: { 'type': $type },
        success: function (data) {
            $("#pageData").html(data);
        }
    });
});
$("body").on("click", ".user-click", function (e) {
    // e.preventDefault();
    $dist = $("body #district").val();
    $brand = $("body #brand").val();
    if($dist==""){
        alert('select a district');
        die();
    }
    if($brand==""){
        alert('select a brand');
        die();
    }
    $type = $(this).data('type');
    //$id=$(this).data('id');
    //alert($type);
    $.ajax({

        url: 'data/userdata.php',
        method: 'post',
        data: { 'type': $type, 'dist': $dist, 'brand': $brand },
        success: function (data) {
            console.log(data);
            //  $("#pageData").html(data);          
            $("body #tbbody").html(data);
        }
    
     });
 });

 $("body").on("click", ".usr-click", function (e) {
    // e.preventDefault();
   
    $type = $(this).data('type');
    $id = $(this).data('id');
    //alert($id);
    $.ajax({

        url: 'data/userdata.php',
        method: 'post',
        data: { 'type': $type, 'id': $id },
        success: function (data) {
            console.log(data);

            //  $("#pageData").html(data);
            if (data == 1) {
                $("#servControl" + $id).html('Cancelled');
            }
            if (data == 2) {
                $("#servControl" + $id).html('Booked');
            }
        }
    });
});

 