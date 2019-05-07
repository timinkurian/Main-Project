
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
        
        $model = $(this).val();
        // alert($model);
        $.ajax({
            url: 'data/variant.php',
            method: 'post',
            data: { 'model': $model },
            success: function (data) {
                $("#variant").html(data);
            }
        });
    })
    $("#model1").on("change", function () {
        //alert();
        $model = $(this).val();
        $.ajax({
            url: 'data/centerfuel.php',
            method: 'post',
            data: { 'model': $model },
            success: function (data) {
                $("#fuel1").html(data);
            }
        });
    })
    $("#fuel1").on("change", function () {
        //alert();
        $fuel = $(this).val();
        $model=$("#model1").val();
        $.ajax({
            url: 'data/centerpart.php',
            method: 'post',
            data: { 'fuel': $fuel,'model':$model },
            success: function (data) {
                console.log(data);
                
                $("#parts").html(data);
            }
        });
    })

    // $("#variant").on("change", function () {
    //     //alert();
    //     $variant = $(this).val();
    //     $.ajax({
    //         url: 'data/fuel.php',
    //         method: 'post',
    //         data: { 'variant': $variant },
    //         success: function (data) {
    //             $("#fuel").html(data);
    //         }
    //     });
    // })


    $(".adm-nav").on("click", function (e) {
        //alert();
        $url = "";
        e.preventDefault();
        $type = $(this).data('type');

        switch ($type) {
            case 'approval':
           // alert ('hi');
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
           case 'viewservicetype':
                $url='data/viewservicetype.php';
            break;
            case 'spareparts':
                $url='data/viewspare.php';
            break;
            case 'department':
            $url='data/viewdepartment.php';
            break
            
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
    // alert($type);
    switch ($type) {
        
            case 'viewSchemes':
            $url = 'data/viewschemes.php';
           
            break;
            case 'viewappointment':
            $url = 'data/centerappointment.php';
            break;
            case 'viewleave':
            $url = 'data/viewleaveemployee.php';
            break;
            case 'viewemployee':
            $url = 'data/viewemployee.php';
            break;
            case 'respondleave':
            $url='data/centerdata.php';
            break;
            case 'startedworks':
            $url='data/centerstartedwork.php';
            break;
            case 'pendingwork':
            $url='data/centerpendingwork.php';
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
            alert(data);

            //  $("#pageData").html(data);
            if (data == 1) {
                $("#servControl" + $id).html('Started!');
            }
            if (data == 2) {
                $("#servControl" + $id).html('Completed!');
            }
            if (data == 3) {
                $("#servControl" + $id).html('Approved!');
            }
            if (data == 4) {
                $("#servControl" + $id).html('Rejected!');
            }
            if (data == 5) {
                $("#servControl" + $id).html('Removed');
            }
        }
    });
});


$("body").on("click", ".center-click", function (e) {
    // e.preventDefault();
   var data;
    $type = $(this).data('type');
    // alert($type);
    // $id = $(this).data('id');
    switch($type){
       case 'searchdepartment':{
            $dept = $("body #department").val();
            if($dept=="-1"){
                alert('select a department');
                die();
            }
            data={ 'type': $type, 'dept': $dept };
        }
        break;
        case 'searchscheme':{
            // alert();
            $model = $("body #model").val();
            $variant = $("body #variant").val();
            // alert($model);
            if(!$model){
                alert('select a model');
                die();
            }
            data={ 'type': $type, 'model': $model,'variant':$variant };
        }
        break;
        case 'searchappointment':{
        $apdate = $("body #apdate").val();
        // alert($apdate);
        // die();
        if($apdate==""){
            alert('select a Date');
            die();
        }
        data={ 'type': $type, 'date': $apdate };
    }
    break;
    case 'searchleave':{
        $lvdate = $("body #lvdate").val();
        // alert($apdate);
        // die();
        if($lvdate==""){
            alert('select a Date');
            die();
        }
        data={ 'type': $type, 'date': $lvdate };
    }
        default:
        break;

   }
  $.ajax({

        url: 'data/centerdata.php',
        method: 'post',
        data: data,
        success: function (data) {
            console.log(data);
            //  $("#pageData").html(data); 
            // $("body #tbbody").html("xx");         
            $("body #tbbody").html(data);
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
    // alert($type);
    $.ajax({

        url: 'data/userdata.php',
        method: 'post',
        data: { 'type': $type, 'id': $id },
        success: function (data) {
            console.log(data);

            //  $("#pageData").html(data);
            if (data == 1) {
                $("#userControl" + $id).html('Cancelled');
                $("#userControl1" + $id).html(' ');
            }
            if (data == 2) {
                $("#userControl" + $id).html('Booked');
            }
        }
    });
});


$("body").on("click", ".employee-click", function (e) {
    // e.preventDefault();
   
    $type = $(this).data('type');
    $id = $(this).data('id');
    // alert($type);
    $.ajax({

        url: 'data/employeedata.php',
        method: 'post',
        data: { 'type': $type, 'id': $id },
        success: function (data) {
            console.log(data);

            //  $("#pageData").html(data);
            if (data == 1) {
                $("#employeeControl" + $id).html('Completed');
                $("#employeeControl1" + $id).html(' ');
            }
            if (data == 2) {
                $("#employeeControl" + $id).html('Completed');
            }
        }
    });
});
 
