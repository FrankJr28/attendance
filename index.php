
<?php 
    $title = 'Index';
    require_once 'includes/header.php';
    require_once 'db/conn.php';
    $result = $crud->getSpecialities();
?>


    <h1 class="text-center">Registretion for Networking Conference</h1>

    <form method="post" action="success.php">
        <div class="mb-3">
            <label for="firstname" class="form-label">First Name:</label>
            <input type="text" class="form-control" id="firstName" placeholder="Enter First Name" name="firstname">
        </div>
        <div class="mb-3">
            <label for="lastname" class="form-label">Last Name:</label>
            <input type="text" class="form-control" id="lastName" placeholder="Enter Last Name" name="lastname">
        </div>
        <div class="mb-3">
            <label for="dob" class="form-label">Date of Birth:</label>
            <input type="date" class="form-control" id="dob" name="dob">
        </div>
        <div class="mb-3">
            <label for="specialty" class="form-label">Area of Expertise:</label>
            <select class="form-select" aria-label="Default select example" name="specialty">
                <?php while($r = $result->fetch(PDO::FETCH_ASSOC)){?>
                    <option value="<?=$r["specialty_id"] ?>"><?= $r["name"]?></option>
                <?php }?>
            </select>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email Address:</label>
            <input type="email" class="form-control" id="email" name="email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Contact Number:</label>
            <input type="text" class="form-control" id="phone" name="phone">
            <small id="phoneHelp" class="form-text text-muted">We'll never share your number with anyone else.</small>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
    
<?php require_once 'includes/footer.php' ?>

    