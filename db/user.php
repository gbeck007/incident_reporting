<?php 
    class user{
         
         private $db; 

         
         function __construct($conn){ 
         
             $this->db = $conn;   
         }                          
    
         
         public function insertUser($username,$password){
            try {  
                  
                $result = $this->getUserbyUsername($username);
                if($result['num'] > 0){
                    return false;
                }else{

                    //Password Encryption
                    $new_password = md5($password.$username);

                     //define sql statement to be executed
                $sql = "INSERT INTO users (username, password) VALUES (:username,:password)";

                //prepare the sql statement for execution
                $stmt = $this->db->prepare($sql);

                //bind all placeholders to the actual values
                $stmt->bindparam(':username',$username);
                $stmt->bindparam(':password',$new_password);
                
                //execute statement
                $stmt->execute();
                return true;

                }

              
            } catch (PDOException $e) {
                echo $e->getMessage(); //"e" represents the object of a class
                return false;

         }
        }
         public function getUser($username,$password){

            try {
                $sql = "select * from users where username = :username AND password = :password";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':username', $username);
            $stmt->bindparam(':password', $password);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;
            
        } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        
         }
                    //THIS is to ensure you dont enter two users with the same username
         public function getUserbyUsername($username){
            try {
                echo "getiing user by username: " ;
                $sql = "select count(*) as num FROM users WHERE username = :username";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':username', $username);
            
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;
            
        } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }

         }
    }

?>