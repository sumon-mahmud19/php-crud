<?php
session_start();
$title = "Edit Customers";
include 'includes/header.php';
include 'db/config.php';

$id = $_GET['id'];

// Select Query
$sql = "SELECT * FROM customers WHERE id=$id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

// Update Query
if(isset($_POST['update'])){

    
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);

    $sql = "UPDATE `customers` SET `id`='$id',`fname`='$fname',`lname`='$lname',`email`='$email',`phone`='$phone',`address`='$address' WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    if($result){
        $_SESSION['success'] = "Customer updated successfully!";
        header('Location: customers.php');
    }
}

?>

<div class="container">
    <div class="row col-md-6 mx-auto mt-5 mb-3">

        <form method="post">

            <div class="col">
                <div class="mb-3">
                    <label>First Name: </label>
                    <input type="text" name="fname" value="<?php echo $row['fname']?>" class="form-control">
                </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <label>Last Name: </label>
                    <input type="text" name="lname" value="<?php echo $row['lname']?>" class="form-control">
                </div>
            </div>

            <div class="col-md-12">

                <div class="mb-3">
                    <label>Email Address: </label>
                    <input type="text" name="email" value="<?php echo $row['email']?>" class="form-control">
                </div>
            </div>

            <div class="col-md-12">
                <div class="mb-3">
                    <label>Phone: </label>
                    <input type="text" name="phone" value="<?php echo $row['phone']?>" class="form-control">
                </div>
            </div>


            <div class="col-md-12">
                <div class="mb-3">
                    <label>Address: </label>
                    <textarea name="address" class="form-control" cols="30" rows="5"><?php echo $row['address']?></textarea>
                </div>
            </div>

            <div class="col-md-12">
                <div class="mb-3">
                    <input type="submit" value="Submit" name="update" class="btn btn-primary w-100">
                </div>
            </div>

        </form>


    </div>
</div>

<?php
include 'includes/footer.php'
?>