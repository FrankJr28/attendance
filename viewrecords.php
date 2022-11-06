<?php 
    $title = 'Index';
    require_once 'includes/header.php';
    require_once 'db/conn.php';
    $result = $crud->getAttendees();
?>
<table class="table">
    <tr>
        <th>#</th>
        <th>First Name</th>
        <th>Last Name</th>
        
        <th>Specialty</th>
        <th>Actions</th>
    </tr>
    <?php while($r = $result->fetch(PDO::FETCH_ASSOC)){  ?>
        <tr>
            <td><?= $r['attendee_id'] ?></td>
            <td><?= $r['firstname'] ?></td>
            <td><?= $r['lastname'] ?></td>
            
            <td><?= $r['name'] ?></td>
            <td>
                <a href="view.php?id=<?= $r['attendee_id'] ?>" class="btn btn-primary">view</a>
                <a href="edit.php?id=<?= $r['attendee_id'] ?>" class="btn btn-warning">edit</a>
                <a onclick="return confirm('Are you sure you want to delete this record?')" href="delete.php?id=<?= $r['attendee_id'] ?>" class="btn btn-danger">delete</a>
            </td>
        </tr>
    <?php } ?>
    <?php
    /*
    var_dump($result);
    echo "<br>";
    $result = $result->fetch(PDO::FETCH_ASSOC);

    var_dump($result);

    foreach($dato as $result){
        echo "<tr><td>".$dato["firstname"]."</td><td>"
            .$dato["lastname"]."</td><td>"
            .$dato["dateofbirth"]."</td><td>"
            .$dato["emailaddress"]."</td><td>"
            .$dato["contactnumber"]."</td><td>"
            .$dato["specialty"]."</td></tr>";
    }
    */
    ?>
</table>
<?php require_once 'includes/footer.php' ?>
