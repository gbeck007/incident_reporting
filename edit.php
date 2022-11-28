<?php 
     $title = 'Edit Record'; 
     require_once 'includes/header.php';
     require_once 'includes/auth_check.php';
     require_once 'db/conn.php';

    $results = $crud->getInvestigator(); 



   //EDIT
if (!isset($_GET['id'])) {
   
   include 'includes/errormessage.php'; //generic Error Message
   header("Location: viewrecords.php ");
} else {
    $id = $_GET['id'];
    $incident = $crud->getIncidentDetails($id);
     
?>

     <!--
        - First name
        - Last name
        - Date of Birth (Use DatePicker)
        - Speciality (Database Admin, Software Developer, Web Administrator, Other)
        - Email Address
        - Contact Number
     -->   

<h1 class="text-center">Edit Record</h1>

<form method="post" action="editpost.php">
    <div class="form-group">

    <input type="hidden" name="id" value="<?php echo $incident['incidentid'] ?>" />


         <label for="firstname">First Name</label>
         <!-- <input type="text" class="form-control" id="firstname" name="firstname">  -->
         <input type="text" class="form-control" value="<?php echo $incident['firstname'] ?>" id= "firstname" name="firstname" > 
    </div>
    <div class="form-group">
        <label for="lastname">Last Name</label>
        <input type="text" class="form-control" value="<?php echo $incident['lastname'] ?>" id="lastname" name="lastname">
    </div>
    <div class="form-group">
         <label for="dob">Date of Birth</label>
         <input type="text" class="form-control" value="<?php echo $incident['dateofbirth'] ?>" id="dob" name="dob">
    </div>

    <div class="form-group">
        <label for="idtype">Id Type</label>
        <select name="idtype">
          <option value="<?php echo $incident['idtype'] ?>"><?php echo $incident['idtype']; ?></option>
          <option value="Passport">Passport</option>
          <option value="Driver licence">Driver licence</option>
          <option value="National Id">National Id</option>          
       </select>        
    </div>
    <div class="form-group">
         <label for="idnumber">Id Number</label>
         <input type="text" class="form-control" value="<?php echo $incident['idnumber'] ?>" id="idnumber" name="idnumber">
    </div>
    <div class="form-group">
         <label for="address">Address</label>
         <input type="text" class="form-control" value="<?php echo $incident['address'] ?>" id="address" name="address">
    </div>
    <div class="form-group">
        <label for="offence">Offence</label>
        <select id="offence" name="offence">
        <option value="<?php echo $incident['offence'] ?>"><?php echo $incident['offence']; ?></option>
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
         <input type="email" class="form-control" value="<?php echo $incident['email'] ?>" id="email" aria-describedby="emailHelp" name="email">
         <small id="emailHelp" class="form-text text-muted">
        we'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
         <label for="phone">Contact Number</label>
         <input type="text" class="form-control" value="<?php echo $incident['phone'] ?>" id="phone" aria-describedby="phoneHelp" name="phone">
         <small id="phoneHelp" class="form-text text-muted">
        we'll never share your number with anyone else.</small>
    </div>
    
     <button type="submit" name="submit" class="btn btn-success btn-block">Save Changes</button>

     <a href="viewrecords.php" class="btn btn-info">Back to List</a>
</form>



<?php } ?>
<br>
<br>
<br>
<br>
<br>
<?php require_once 'includes/footer.php';?>

          