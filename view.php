<?php 
    $title = 'Index';
    require_once 'includes/header.php';
    require_once 'db/conn.php';
    
    if(isset($_GET["id"])){
        $result = $crud->getAttendeeDetails($_GET["id"]);
    }else{
        echo "<h2 class='text-danger'>Please check details and try again</h2>";
    }

    

?>

<div class="card" style="width: 18rem;">
    <!--<img src="..." class="card-img-top" alt="...">-->
    <div class="card-body">
        <h5 class="card-title"><?= $result["firstname"]; ?></h5>
        <h6 class="card-subtitle mb-2 text-muted"><?= $result["lastname"]; ?></h6>
        <p class="card-text">
            Specialty: <?= $result["name"] ?>
        </p>
        <p class="card-text">
            Date Of Birth: <?= $result["dateofbirth"] ?>
        </p>
        <p class="card-text">
            Email: <?= $result["emailaddress"] ?>
        </p>
        <p class="card-text">
            Contact <?= $result["contactnumber"] ?>
        </p>
        <a href="#" class="btn btn-primary">Ir a algún lugar</a>
    </div>
</div>

<a href="viewrecords.php" class="btn btn-info">Back to List</a>
<a href="edit.php?id=<?= $result['attendee_id'] ?>" class="btn btn-warning">edit</a>
<a onclick="return confirm('Are you sure you want to delete this record?')" href="delete.php?id=<?= $result['attendee_id'] ?>" class="btn btn-danger">delete</a>


<?php require_once 'includes/footer.php' ?>