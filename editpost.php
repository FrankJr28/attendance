<?php
    require_once 'db/conn.php';
    if(isset($_POST["submit"])){
        $id = $_POST["id"];
        $fname = $_POST["firstname"];
        $lname = $_POST["lastname"];
        $dob = $_POST["dob"];
        $email = $_POST["email"];
        $contact = $_POST["phone"];
        $specialty = $_POST["specialty"];

        $isSuccess = $crud->update($id, $fname, $lname, $dob, $email, $contact, $specialty);

        if($isSuccess){
            header("Location: viewrecords.php");    
        }
        else{
            echo '<h1 class="text-center text-danger">There was an error in procesing</h1>';
        }
    }

?>