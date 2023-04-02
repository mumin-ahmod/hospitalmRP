
<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add records</title>
</head>
<body>

<?php include_once "header.html"; ?>

<!-- navbar ended -->

<br>

<form action= "add.php" method="post">


<div class="row">
  <div class="col">
    <input type="text" class="form-control" placeholder="Doctors Name" name="dname">
  </div>
  <div class="col">
    <input type="text" class="form-control" placeholder="Speciality" name="dspeciality">
  </div>
</div>
<br>
<div class="row">
  <div class="col">
    <input type="text" class="form-control" placeholder="Degrees" name="degrees" >
  </div>
</div>
 <br>
<div class="row">
  <div class="col-md-5">
    <input type="date" class="form-control" placeholder="Joined" name="joined" >
  </div>
  
</div>
<br>
<button class= " btn btn-success" type = "submit">Save Record</button>


</form>

<?php





?>
    
</body>
</html>


