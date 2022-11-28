<?php 
     $title = 'index'; 
     require_once 'includes/header.php';
     require_once 'db/conn.php';

    $results = $crud->getInvestigator(); //get investigator
     
?>

  

<h1 class="text-center">Registration for Report Incident</h1>

<form method="post" enctype="multipart/form-data" action="success.php">
    <div class="form-group">
         <label for="firstname">First Name</label>
         <input required type="text" class="form-control" id="firstname" name="firstname"> 
    </div>
    <div class="form-group">
        <label for="lastname">Last Name</label>
        <input required type="text" class="form-control" id="lastname" name="lastname">
    </div>
    <div class="form-group">
         <label for="dob">Date of Birth</label>
         <input type="text" class="form-control" id="dob" name="dob">
    </div>
    <div class="form-group">
        <label for="idtype">Id Type</label>
        <select name="idtype">
          <option value="Passport">Passport</option>
          <option value="Driver licence">Driver licence</option>
          <option value="National Id">National Id</option>          
       </select>        
    </div>
    <div class="form-group">
         <label for="idnumber">Id Number</label>
         <input type="text" class="form-control" id="idnumber" name="idnumber">
    </div>
    <div class="form-group">
         <label for="address">Address</label>
         <input type="text" class="form-control" id="address" name="address">
    </div>
    <div class="form-group">
        <label for="offence">Offence</label>
        <select id="offence" name="offence">
          <option value="Murder">Murder</option>
          <option value="Kidnap">Kidnap</option>
          <option value="Assault">Assault</option>          
       </select>        
    </div>
    <div class="form-group">
         <label for="investigator">Investigator</label>
         <select class="form-control" id="investigator" name="investigator">
          <?php while($r = $results->fetch(PDO::FETCH_ASSOC)) {?> 
               <option value="<?php echo $r['investigatorid']?>"><?php echo $r['name']; ?></option>
          <?php } ?>
     </select>
    </div>
    <div class="form-group">
         <label for="email">Email address</label>
         <input required type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email">
         <small id="emailHelp" class="form-text text-muted">
        we'll never disclose your personal information.</small>
    </div>
    <div class="form-group">
         <label for="phone">Contact Number</label>
         <input type="text" class="form-control" id="phone" aria-describedby="phoneHelp" name="phone">
         <small id="phoneHelp" class="form-text text-muted">
        we'll never disclose your number with anyone.</small>
    </div>




                        <!-- TO UPLOAD IMAGE -->

                        <div class="custom-file">
        
        <input type="file" accept="image/*" class="custom-file-input" id="avatar" name="avatar">
        <label class="custom-file-label" for="avatar"></label>
        <div id="avatar" class="form-text text-success">File Upload Is Optional.</div>
        
    </div>



    
     <button type="submit" name="submit" class="btn btn-primary btn-block">submit</button>
</form>
<br>
<br>
<br>
<br>
<br>
<?php require_once 'includes/footer.php';?>

          