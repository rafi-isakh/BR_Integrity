<!DOCTYPE html>
<html>
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="assets/css/styles.css" />

<title>Business Rule</title>
</head>

<?php 
  require ('sql_connect.inc');
  //$rulename = $_GET['rule'];
  //sql_connect('blog');
	$stmt = $conn->prepare("SELECT `name` FROM `table`");
  $stmt->execute();
  $record = array();
  $i = 0;

  while ($result = $stmt->fetch()) {
    $record[$i] = $result['name'];
    $i++;
  }

  $conn = null;
?>

<body class="default">
<div class="wrapper">

  <div class="dynamic-form">

    <a href="#" id="add">Add</a> | <a href="#" id="remove">Remove</a>  | <a href="#" id="reset">Reset</a>  

    <form class="form-horizontal" role="form" method="post" action="insert_param.php">
      <div class="inputs">
        <!--
        <div class="form-group">
          <label class="control-label col-sm-2" for="conjunction"></label>
            <div class="col-sm-10">
              <input type="text" name="dynamic[]" class="form-control"/>
            </div>
          <br>
        </div> -->
        <div class="input">
        <div class="form-group">
          <label class="control-label col-sm-2" for="source">Source</label>
            <div class="col-sm-10">
              <select class="form-control" id="source1" name="dynamic[]" onchange="fetch_select(this.value, this.id);">
                <?php
                  $i = 0;
                  while ($i<sizeof($record)) {
                ?>    
                <option><?php echo $record[$i]; ?></option>
                <?php
                  $i++; 
                  }
                  //$conn = null;
                ?>
              </select>
            </div>
          <br>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="target">Target</label>
            <div class="col-sm-10">
              <select class="form-control" id="target1" name="dynamic[]">  
              
              </select>
             </div>
          <br>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="conjunction"></label>
            <div class="col-sm-10">
              <input type="text" name="dynamic[]" class="form-control"/>
            </div>
          <br>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="source">Source</label>
            <div class="col-sm-10">
              <select class="form-control" id="source2" name="dynamic[]" onchange="fetch_select(this.value, this.id);">
                <?php
                  $i = 0;
                  while ($i<sizeof($record)) {
                ?>    
                <option><?php echo $record[$i]; ?></option>
                <?php
                  $i++; 
                  }
                  //$conn = null;
                ?>
              </select>
            </div>
          <br>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="target">Target</label>
            <div class="col-sm-10">
              <select class="form-control" id="target2" name="dynamic[]">  
              
              </select>
             </div>
          <br>
        </div> 
        <div class="form-group">
          <label class="control-label col-sm-2" for="conjunction"></label>
            <div class="col-sm-10">
              <select class="form-control" id="conjunction" name="dynamic[]">  
                <option>AND</option>
                <option>OR</option>
                <option></option>  
              </select>
            </div>
          <br><hr>
        </div>
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-default">Submit</button>
        </div>
      </div>
    </div>  
    </form>
  </div>  

</div>
<script type="text/javascript" src="assets/js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/param.js"></script>

<script type="text/javascript">

function fetch_select(val,id)
{
   $.ajax({
     type: 'post',
     url: 'fetch_data.php',
     data: {
       get_option:val
     },
     success: function (response) {
       //var holder = document.
       var pos = id.substring(6);
       var target = "target"+pos;

       document.getElementById(target).innerHTML=response;
     }
     
   });
}

</script>

</body>
</html>