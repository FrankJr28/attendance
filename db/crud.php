<?php
    class crud{
        private $db;

        function __construct($conn){
            $this->db = $conn;
        }

        public function insert($fname, $lname, $dob, $email, $contact, $specialty){
            try{
                $sql = "INSERT INTO attendee (firstname, lastname, dateofbirth, emailaddress, contactnumber, specialty) VALUES (:fname,:lname,:dob,:email,:contact,:specialty)";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':fname',$fname);
                $stmt->bindparam(':lname',$lname);
                $stmt->bindparam(':dob',$dob);
                $stmt->bindparam(':email',$email);
                $stmt->bindparam(':contact',$contact);
                $stmt->bindparam(':specialty',$specialty);

                $stmt->execute();
                return true;
                
            }catch(PDOException $e){
                echo $e->getMessage();
                return false;
            }
        }

        public function update($id, $fname, $lname, $dob, $email, $contact, $specialty){
            try{
                $sql = "UPDATE attendee SET firstname=:fname, lastname=:lname, dateofbirth=:dob,
                emailaddress=:email, contactnumber=:contact, specialty=:specialty WHERE attendee_id=:id";
                
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':id',$id);
                $stmt->bindparam(':fname',$fname);
                $stmt->bindparam(':lname',$lname);
                $stmt->bindparam(':dob',$dob);
                $stmt->bindparam(':email',$email);
                $stmt->bindparam(':contact',$contact);
                $stmt->bindparam(':specialty',$specialty);

                $stmt->execute();
                return true;
                
            }catch(PDOException $e){
                echo $e->getMessage();
                return false;
            }
        }

        public function delete($id){
            try{
                $sql = "DELETE FROM attendee WHERE attendee_id=:id";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':id',$id);
                $stmt->execute();
                return true;
                
            }catch(PDOException $e){
                echo $e->getMessage();
                return false;
            }
        }

        public function getAttendees(){
            try{
                $sql = "SELECT * FROM attendee a inner join specialities s on a.specialty = s.specialty_id";
                $result = $this->db->query($sql);
                return $result;
            }catch(PDOException $e){
                echo $e->getMessage();
                return false;
            }
        }

        public function getAttendeeDetails($id){
            try{
                $sql = "SELECT * FROM attendee a inner join specialities s on a.specialty = s.specialty_id WHERE attendee_id = :id";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':id',$id);
                $result = $stmt->execute();
                $result = $stmt->fetch();
                return $result;
            }catch(PDOException $e){
                echo $e->getMessage();
                return false;
            }
        }

        public function getSpecialities(){
            try{
                $sql="SELECT * FROM specialities";
                $result = $this->db->query($sql);
                return $result;
            }catch(PDOException $e){
                echo $e->getMessage();
                return false;
            }
        }



    }
?> 