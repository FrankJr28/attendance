<?php 
    $title = 'Index';
    require_once 'includes/header.php'; 
    require_once 'db/conn.php';

    if(isset($_POST["submit"])){
        $fname = $_POST["firstname"];
        $lname = $_POST["lastname"];
        $dob = $_POST["dob"];
        $email = $_POST["email"];
        $contact = $_POST["phone"];
        $specialty = $_POST["specialty"];

        $isSuccess = $crud->insert($fname, $lname, $dob, $email, $contact, $specialty);

        if($isSuccess){
            include 'includes/successmessage.php';
        }
        else{
            include 'includes/errormessage.php';
        }


    }
?>

    <h1 class="text-center text-success">You have been registered</h1>
    
    <div class="card" style="width: 18rem;">
        <!--<img src="..." class="card-img-top" alt="...">-->
        <div class="card-body">
            <h5 class="card-title"><?= $_POST["firstname"]; ?></h5>
            <h6 class="card-subtitle mb-2 text-muted"><?= $_POST["specialty"]; ?></h6>
            <p class="card-text">
                Date Of Birth: <?= $_POST["dob"] ?>
            </p>
            <p class="card-text">
                Email: <?= $_POST["email"] ?>
            </p>
            <p class="card-text">
                Contact <?= $_POST["phone"] ?>
            </p>
            <a href="#" class="btn btn-primary">Ir a algún lugar</a>
        </div>
    </div>

<?php require_once 'includes/footer.php' ?>