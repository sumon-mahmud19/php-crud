<?php
session_start();
$title = "Add Customers";
include 'includes/header.php';
include 'db/config.php';

if(isset($_POST['submit'])){

    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);

    $sql = "INSERT INTO `customers`(`fname`, `lname`, `email`, `phone`, `address`) 
    VALUES ('$fname','$lname','$email','$phone','$address')";

    $data = mysqli_query($conn, $sql);

    if($data){

        $_SESSION['success'] = "Customer created successfully!";
        header('Location: customers.php');
    }

}

?>

<div class="container">
    <div class="row col-md-6 mx-auto mt-3 mb-3">

        <form method="post">

            <div class="col">
                <div class="mb-3">
                    <label>First Name: </label>
                    <input type="text" name="fname" class="form-control">
                </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <label>Last Name: </label>
                    <input type="text" name="lname" class="form-control">
                </div>
            </div>

            <div class="col-md-12">

                <div class="mb-3">
                    <label>Email Address: </label>
                    <input type="text" name="email" class="form-control">
                </div>
            </div>

            <div class="col-md-12">
                <div class="mb-3">
                    <label>Phone: </label>
                    <input type="text" name="phone" class="form-control">
                </div>
            </div>


            <div class="col-md-12">
                <div class="mb-3">
                    <label>Address: </label>
                    <textarea name="address" class="form-control" cols="30" rows="5"></textarea>
                </div>
            </div>

            <div class="col-md-12">
                <div class="mb-3">
                    <input type="submit" value="Submit" name="submit" class="btn btn-primary w-100">
                </div>
            </div>

        </form>


    </div>
</div>

<?php
include 'includes/footer.php'
?>