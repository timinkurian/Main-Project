<?php
require "connect.php";
require "session.php";
?>
<html>
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

    td {
        background-color: white;
        color: black;
    }

    td img {
        width: 100px;
        height: auto;
    }

    table.center {
        margin-left: auto;
        margin-right: auto;
    }
</style>

<body>
    <div class="mt-20 py-3">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>District</th>
                            <!-- colspan="2" class="text-center" -->
                            <th></th>
                        </tr>
                    </thead>
                    <?php
                    $sql = "SELECT * FROM `tbl_district`";
                    $res = mysqli_query($conn, $sql);
                    if ($res) {
                        ?>

                        <tbody>
                            <?php
                            while ($result = mysqli_fetch_array($res)) {
                                ?>
                                <tr>
                                    <td>
                                        <?php echo $result['district']; ?>
                                    </td>
                                    <td>

                                        <form name="" id="login" method="post" action="editdistrict.php">
                                            <input type="text" hidden value="<?php echo $result['district']; ?>" name="district">
                                            <input type="text" hidden value="<?php echo $result['district_id']; ?>" name="districtid">
                                            <input type="submit" value="Edit">
                                        </form>

                                    </td>
                                </tr>
                            <?php
                        }
                        ?>
                        </tbody>

                    <?php
                } else {
                    echo "0 results";
                } ?>
                </table>
            </div>
        </div>
    </div>
</body>

</html>