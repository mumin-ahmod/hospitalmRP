
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


<?php

?>

  <br>

  <table class="table table-dark">
  <thead>
    <tr>
    <th scope="col">ID</th>
      <th scope="col">Patient Name</th>
      <th scope="col">Phone</th>
      <th scope="col">Address</th>

      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>

  <?php
$count = 1;

$rowFetch = $result->fetchAll();

foreach ($rowFetch as $row) {

    ?>
   <tr>

    <td> <?php echo $count ?> </td>
    <td><?php echo htmlspecialchars($row['pname']) ?></td>
    <td><?php echo '0' . htmlspecialchars($row['pphone']) ?></td>
    <td><?php echo htmlspecialchars($row['paddress']) ?></td>

    <td>


    <form action= "delete.php" method="post">


    <input type='hidden' name='delete' value='yes'>


      <input type='hidden' name='id' value="<?php echo $row['pid'] ?>">



    <button class= "btn btn-danger" type="submit">Delete Record</button>

    </form>

  </td>

  </tr>
  <?php
$count++;

}
?>

  </tbody>
</table>



