<?php
require "connect.php";
$sql = "SELECT * FROM `tbl_brand` ";
$val = mysqli_query($conn, $sql);
if ($val) {
    ?>
<html>

<head>

    <style>
        td,
        th {
            border: 1px solid black;
            padding: 25px;
        }

        th {
            background-color: gray;
            color: white;
        }

        td img {
            width: 100px;
            height: auto;
        }

        td {
            background-color: white;
            color: black;
        }
    </style>

</head>

<body>
    <div class="mt-20 py-3">


        <div class="row">
            <div class="col-md-6 offset-md-3">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th class="">Brand Name</th>
                            <!-- <th>Model</th>
                <th>Variant</th>
                <th>Fuel Type</th> -->
                        </tr>
                    </thead>
                    <tbody id="tbbody">
                        <?php
                        while ($result = mysqli_fetch_array($val)) {

                            ?>
                        <tr class="">
                            <td>
                                <?php echo $result['brand_name']; ?>
                            </td>

                        </tr>
                        <?php

                    }
                    ?>
                    </tbody>
                    <?php

                } else {
                    echo "0 results";
                }
                ?>
                </table>
            </div>
        </div>


    </div>
    <?php
    require('../layouts/specialapp_end');
    ?>
</body>

</html> 