<?php 
     $title = 'Add Users'; 
     require_once 'includes/header.php';
     require_once 'includes/auth_check.php';
     require_once 'db/conn.php'; 
     
     $usergroup = $user->getUserGroup($_SESSION['username']);
     if($usergroup['usergroup'] != "admin"){
          include 'includes/insufficientprivilege.php'; 
     }
     else{         
?>

     <h1 class="text-center"><?php echo $title ?> </h1>
<form method="post" action="usersuccess.php">
<div class="form-group">
         <label for="username">Username</label>
         <input required type="text" class="form-control" id="username" name="username"> 
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input required type="password" class="form-control" id="password" name="password">
    </div>
    <div class="form-group">
         <label for="usergroup">User group</label>
         <input required type="text" class="form-control" id="usergroup" name="usergroup"> 
    </div>
    <br />
    <br />
    <br />
    <input type="submit" name="submit" value="Submit" class="btn btn-primary btn-block"><br />    

</form>
<?php } ?> 
<br>
<br>
<br>
<br>
<br>
<?php require_once 'includes/footer.php';?>

          