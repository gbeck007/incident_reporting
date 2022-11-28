<?php 
     $title = 'User success'; 
     require_once 'includes/header.php';
     require_once 'db/conn.php';
     
     if(isset($_POST['submit'])){
        //extract values from the $_POST ARRAY
        $uname = $_POST['username'];
        $pwd = $_POST['password'];
      
        //Call function to insert and track if success or not
        $isSuccess = $user->insertUser($uname, $pwd);      

        if($isSuccess){

          //SendEmail::SendMail($email, 'This is an Incident Report for 2022', 'You have successfuly recorded another report for this year'); //NEW Mail


            // echo '<h1 class="text-center text-success">You Have Been Registered!</h1>';
            include 'includes/successmessage.php';
        }
        else{          
          include 'includes/errormessage.php';
        }

     }
     ?>

<?php require_once 'includes/footer.php';?>