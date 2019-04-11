<?php

print_r($_POST);
?>

<html>
<head>
<link href="plugin/dist/css/component-chosen.css" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.6/chosen.jquery.min.js"></script>
</head>
<body>
<form action="#" method="post">
<select name="val[]" id="optgroup_clickable" class="form-control form-control-chosen-optgroup" title="clickable_optgroup" data-placeholder="Please select..." multiple>
                <optgroup label="Label A">
                  <option>Option One</option>
                  <option>Option Two</option>
                  <option>Option Three</option>
                  <option>Option Four</option>
                </optgroup>
                <optgroup label="Label B">
                  <option>Option Five</option>
                  <option>Option Six</option>
                  <option>Option Seven</option>
                  <option>Option Eight</option>
                </optgroup>
              </select>
              <input type="submit" value="Submit">
</form>

<script>
$('.form-control-chosen-optgroup').chosen({
  width: '100%'
});
$(function() {
  $('[title="clickable_optgroup"]').addClass('chosen-container-optgroup-clickable');
});
</script>
                    
</body>
</html>