<?php



?>


<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
</head>
<body>


<form action="..\auth.php" method="post">
<div class="mb-3">
  <label for="formGroupExampleInput" class="form-label">Username:</label>
  <input type="text" class="form-control" id="formGroupExampleInput" placeholder="username" name="username">
</div>
<div class="mb-3">
  <label for="formGroupExampleInput2" class="form-label">Password:</label>
  <input type="password" class="form-control" id="formGroupExampleInput2" placeholder="password" name="password">
</div>
<br>
<button type="submit" class="btn btn-success">Log In</button>
  
</form>


</body>
</html>