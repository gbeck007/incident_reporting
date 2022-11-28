<?php 
     $title = 'User success'; 
     require_once 'includes/header.php';
     require_once 'db/conn.php';
     
     if(isset($_POST['submit'])){
        //extract values from the $_POST ARRAY
        $uname = $_POST['username'];
        $pwd = $_POST['password'];
        $ugroup = $_POST['usergroup'];
      
        //Call function to insert and track if success or not
        $isSuccess = $user->insertUser($uname, $pwd, $ugroup);      

        if($isSuccess){
            
            include 'includes/successmessage.php';
        }
        else{          
          include 'includes/errormessage.php';
        }

     }
     ?>

<?php require_once 'includes/footer.php';?>