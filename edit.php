<?php 
    $title = 'Edit Record';
    require_once 'includes/header.php';
    require_once 'db/conn.php';
    if(!isset($_GET["id"])){
        include 'includes/errormessage.php';
        header("Location: viewrecords.php");
    }
    else{
        $id = $_GET['id'];
        $attendee = $crud->getAttendeeDetails($id);
        $result = $crud->getSpecialities();
?>


    <h1 class="text-center">Edit Record</h1>

    <form method="post" action="editpost.php">
        <input type="hidden" value="<?=$attendee["attendee_id"]?>" name="id">
        <div class="mb-3">
            <label for="firstname" class="form-label">First Name:</label>
            <input type="text" class="form-control" value="<?=$attendee["firstname"]?>" id="firstName" placeholder="Enter First Name" name="firstname">
        </div>
        <div class="mb-3">
            <label for="lastname" class="form-label">Last Name:</label>
            <input type="text" class="form-control" value="<?=$attendee["lastname"]?>" id="lastName" placeholder="Enter Last Name" name="lastname">
        </div>
        <div class="mb-3">
            <label for="dob" class="form-label">Date of Birth:</label>
            <input type="date" class="form-control" value="<?=$attendee["dateofbirth"]?>" id="dob" name="dob">
        </div>
        <div class="mb-3">
            <label for="specialty" class="form-label">Area of Expertise:</label>
            <select class="form-select" aria-label="Default select example" name="specialty">
                <?php while($r = $result->fetch(PDO::FETCH_ASSOC)){?>
                    <option value="<?=$r["specialty_id"] ?>" <?php if($r["specialty_id"]==$attendee["specialty"]) echo "selected" ?>><?= $r["name"]?></option>
                <?php }?>
            </select>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email Address:</label>
            <input type="email" class="form-control" value="<?=$attendee["emailaddress"]?>" id="email" name="email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Contact Number:</label>
            <input type="text" class="form-control" value="<?=$attendee["contactnumber"]?>" id="phone" name="phone">
            <small id="phoneHelp" class="form-text text-muted">We'll never share your number with anyone else.</small>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
    
<?php 
    }
    require_once 'includes/footer.php' 
?>