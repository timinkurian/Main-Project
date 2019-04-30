<?php
require "connect.php";
require "session.php";
$val1=getSession('licenceno');
?>
<html>  
<style>
        td, th {
           border: 1px solid black; 
            padding: 25px;   
                }
            th {
                background-color: gray;
                color: white;
                }
                td{
                    background-color:white;
                    color:black;
                }
                td img{
                    width:100px;
                    height:auto;
                }
            </style>      
        <body>
        <div class="mt-4 py-2">
<div>
<form class="float-right py-2 px-5 mx-5">
<!-- Find service center near you -->
<select class="form-control" name="model" id="model" required>
    <?php
        include('modelbybrand.php');
    ?> 
    </select >
<select class=" form-control" name="variant" id="variant">        
echo '<option value disabled selected>Choose Variant</option>';
</select > 
<input type="button" class="center-click" data-type="searchscheme" data-id="department" value="Search">
</form>
</div>
        <div class="py-5 offset-md-2">
        <table>
        <thead>
                <tr>
                    <!-- <th>Service Id</th> -->
                    <th>Service Type</th>
                    <!-- <th>Brand</th> -->
                    <th>Model</th>
                    <th>Variant</th>
                    <!-- <th>Fuel</th> -->
                    <th>Replacing Parts</th>
                    <th>Inspecting Parts</th>
                    <th> Approximate Amount</th>               
                </tr>
            </thead>
            <?php
        $sql = "SELECT * FROM `tbl_servicescheme` WHERE model_id IN(SELECT distinct model_id FROM tbl_model WHERE tbl_model.brand_id=(SELECT brand_id FROM tbl_servicecenter WHERE licenceno='$val1'))";
        $val=mysqli_query($conn,$sql);
       if($val){
        ?>
            <tbody id="tbbody">
            <?php
            while($result=mysqli_fetch_array($val)){
                $sql3="SELECT variant_name FROM tbl_variant WHERE variant_id=$result[variant_id]";
                $val3=mysqli_query($conn,$sql3);
                $result3=mysqli_fetch_assoc($val3);

                $sql4="SELECT model_name FROM tbl_model WHERE model_id=$result[model_id]";
                $val4=mysqli_query($conn,$sql4);
                $result4=mysqli_fetch_assoc($val4);
                $sql5="SELECT servicetype FROM tbl_servicetype WHERE servicetype_id=$result[servicetype_id]";
                $val5=mysqli_query($conn,$sql5);
                $result5=mysqli_fetch_assoc($val5);

            ?>
            <tr>
                <td>
                    <?php echo $result5['servicetype']; ?>
                </td>
                <td>
                    <?php echo $result4['model_name']; ?>
                </td>
                <td>
                    <?php echo $result3['variant_name']; ?>
                </td>
                <td>
                    <?php
                $sql6="SELECT * FROM tbl_spare JOIN tbl_replacing ON tbl_spare.spare_id=tbl_replacing.spare_id JOIN tbl_servicescheme ON tbl_replacing.scheme_id=tbl_servicescheme.scheme_id  AND tbl_servicescheme.scheme_id='$result[scheme_id]'";     
                $val6=mysqli_query($conn,$sql6);
                $count=mysqli_num_rows($val6);
                $i=1;
                if($count>0){
                while($result6=mysqli_fetch_assoc($val6)){
                    ?>
                    <?php echo $result6['spare'];?>
                    <?php
                         if($i!=$count){
                            echo ",";
                            $i=$i+1;
                        }
                }
            }?>
                </td>
                <td>
                <?php
                $sql6="SELECT * FROM tbl_spare JOIN tbl_checking ON tbl_spare.spare_id=tbl_checking.spare_id JOIN tbl_servicescheme ON tbl_checking.scheme_id=tbl_servicescheme.scheme_id AND tbl_servicescheme.scheme_id='$result[scheme_id]'";     
                $val6=mysqli_query($conn,$sql6);
                $count=mysqli_num_rows($val6);
                $i=1;
                if($count>0){
                while($result6=mysqli_fetch_assoc($val6)){
                    
                    ?>
                    <?php echo $result6['spare']; ?>
                    <?php
                    if($i!=$count){
                        echo ",";
                        $i=$i+1;
                    }
                    
                }
                
            }?>
                    
                </td>
                <td>
                    <?php echo $result['amount']; ?>
                </td>
            </tr>
                <?php
            }
            ?>
        </tbody>

<?php
   }
 else {
    echo "0 results";
}?>
</table>
</div>
<script type="text/javascript" src="assets/js/main.js"></script>
</body>
</html>