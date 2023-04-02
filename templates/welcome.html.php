
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<?php include "header.html"; ?>

<br>

<table class="table table-dark">
  <thead>
    <tr>
    <th scope="col">ID</th>
      <th scope="col">Author</th>
      <th scope="col">Title</th>
      <th scope="col">Year</th>
      <th scope="col">ISBN</th>
      <th scope="col">Category</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>


  <?php 
    $count = 1;
  while($rows>0){
  
    $row = $result->fetch_array(MYSQLI_NUM);
    $r0 = htmlspecialchars($row[0]);
    $r1 = htmlspecialchars($row[1]);
    $r2 = htmlspecialchars($row[2]);
    $r3 = htmlspecialchars($row[3]);
    $r4 = htmlspecialchars($row[4]);
    $r5 = htmlspecialchars($row[5]);

  

?>
     <tr>
      
      <td> <?php echo $count ?> </td>
      <td><?php echo $r1 ?></td>
      <td><?php echo $r2 ?></td>
      <td><?php echo $r3 ?></td>
      <td><?php echo $r4 ?></td>
      <td><?php echo $r5 ?></td>

      <td>
     
      <form action="sqltest.php" method="post">
    

      <input type='hidden' name='delete' value='yes'>

 
        <input type='hidden' name='id' value="<?php echo $r0 ?>">

     
      
      <button class= "btn btn-danger" type="submit">Delete Record</button>
    
      </form>
    
    </td>
      
    </tr>
    <?php 
  $count++;
    $rows--;
  }
  ?>
  </tbody>
</table>