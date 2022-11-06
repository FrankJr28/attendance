<?php 
    require_once 'db/conn.php';
    if(isset($_GET["id"])){
        $id = $_GET["id"];
        $isSuccess = $crud->delete($id);

        if($isSuccess){
            include 'includes/errormessage.php';
            header("Location: viewrecords.php");
        }
        else{
            echo '<h1 class="text-center text-danger">There was an error in procesing</h1>';
        }
    }
?>