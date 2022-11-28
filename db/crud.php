<?php 
    class crud
    {
        // private database object\
        private $db;
        
        //constructor to initialize private to the database connection
        function __construct($conn){
            $this->db = $conn;
        }

        //function to insert a new record into the incident database
        public function insertIncident($fname, $lname, $dob, $idty, $idnum, $addr, $offence, $email,$phone,$investigator, $avatar_path){
            try {
                // define sql statement to be executed
                $sql = "INSERT INTO incidents (firstname,lastname,dateofbirth,idtype,idnumber,address,offence,email,phone,investigatorid,avatar_path) VALUES (:fname,:lname,:dob,:idty,:idnum,:addr,:offence,:email,:contact,:investigator,:avatar_path)";
                //prepare the sql statement for execution
                $stmt = $this->db->prepare($sql);
                // bind all placeholders to the actual values
                //$stmt->bindparam(":id",$id);
                $stmt->bindparam(':fname',$fname);
                $stmt->bindparam(':lname',$lname);
                $stmt->bindparam(':dob',$dob);
                $stmt->bindparam(':idty',$idty);
                $stmt->bindparam(':idnum',$idnum);
                $stmt->bindparam(':addr',$addr);
                $stmt->bindparam(':offence',$offence);
                $stmt->bindparam(':email',$email); //was email
                $stmt->bindparam(':contact',$phone); //was contact
                $stmt->bindparam(':investigator',$investigator);
                $stmt->bindparam(':avatar_path',$avatar_path);
                // execute statement
                $stmt->execute();
                return true;




            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }
        public function editIncident($id, $fname, $lname, $dob, $idty, $idnum, $addr, $offence, $email,$phone,$investigator) {   
        
           try{
              $sql = "UPDATE `incidents` SET `firstname` =:fname, `lastname` =:lname,
            `dateofbirth`=:dob, `idtype`=:idty, `idnumber`=:idnum, `address`=:addr, `offence`=:offence, `email`=:email, `phone`=:contact, `investigatorid` =:investigator WHERE incidentid = :id";

              //prepare the sql statement for execution
              $stmt = $this->db->prepare($sql);
              //bind all placeholders to the actual values
              $stmt->bindparam(':id', $id);
              $stmt->bindparam(':fname',$fname);
              $stmt->bindparam(':lname',$lname);
              $stmt->bindparam(':dob',$dob);
              $stmt->bindparam(':idty',$idty);
              $stmt->bindparam(':idnum',$idnum);
              $stmt->bindparam(':addr',$addr);
              $stmt->bindparam(':offence',$offence);
              $stmt->bindparam(':email',$email); 
              $stmt->bindparam(':contact',$phone);
              $stmt->bindparam(':investigator',$investigator);
              //$stmt->bindparam(':avatar_path',$avatar_path);
              //execute statement
              $stmt->execute();
              return true;
         } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }
     
    
        public function getIncident(){ 
            try{
               $sql = "SELECT * FROM `incidents` a inner join investigators s on a.investigatorid = s.investigatorid";
               $result = $this->db->query($sql);
               return $result;
        }  catch (PDOException $e) {
             echo $e->getMessage();
             return false;
        }
    }

        public function getIncidentDetails($id){
             try{
                $sql = "select * from incidents a inner join investigators s on a.investigatorid = s.investigatorid where incidentid = :id";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':id', $id);
                $stmt->execute();
                $result = $stmt->fetch();
                return $result;
         } catch (PDOException $e) {
             echo $e->getMessage();
             return false;
        }
    }

        public function deleteIncident($id){ 
            try{
               $sql = "delete from incidents where incidentid = :id";
               $stmt = $this->db->prepare($sql);
               $stmt->bindparam(':id', $id);
               $stmt->execute();
               return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }


        }
         public function getInvestigator(){
            try{
               $sql = "SELECT * FROM `investigators`"; 
               $result = $this->db->query($sql);
               return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        
        
        }

        }




        public function getInvestigatorById($id)
        {
    
            try {
                $sql = "SELECT * FROM `investigators` where investigatorid = :id";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':id', $id);
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
