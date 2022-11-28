<?php 
     $title = 'view records'; 
     require_once 'includes/header.php';
     require_once 'includes/auth_check.php';
     require_once 'db/conn.php';
     
     // Get all incident
     $results = $crud->getIncident();
?>

<table class="table">
  <tr>
  <th>#</th>
  <th>First Name</th>
  <th>Last Name</th>
  <th>Offence</th> 
  <th>Investigator</th>
  <th>Actions</th>


</tr>
<?php while($r = $results->fetch(PDO::FETCH_ASSOC)) {?>

  <tr>
          
          <td><?php echo $r['incidentid'] ?></td>
          <td><?php echo $r['firstname'] ?></td>
          <td><?php echo $r['lastname'] ?></td>
          <td><?php echo $r['offence'] ?></td>       
          <td><?php echo $r['name'] ?></td>
          <td>
            
          <a href="view.php?id=<?php echo $r['incidentid'] ?>" class="btn btn-primary">View</a>
          <a href="edit.php?id=<?php echo $r['incidentid'] ?>" class="btn btn-warning">Edit</a>
          <a onclick="return confirm('Are you sure you want to delete this record?');"
          href="delete.php?id=<?php echo $r['incidentid'] ?>" class="btn btn-danger">Delete</a></td>


     </tr>
    <?php }?>
 </table>

<br>
<br>
<br>
<br>
<?php require_once 'includes/footer.php';?>