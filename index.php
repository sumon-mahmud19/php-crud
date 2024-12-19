<?php
session_start();
$title = "Home Page";
include 'includes/header.php';
?>

<div class="container">
    <div class="row align-items-center">
    
        <div class="col-md-6 text-center text-md-start">
            <h1 class="display-4 fw-bold">Welcome to the CRUD App</h1>
            <p class="lead">
                Manage your data effortlessly with our user-friendly interface. Add, edit, delete, and view records with ease.
            </p>
        </div>

        <div class="col-md-6 text-center">
            <img src="img/crud.png" alt="Hero Image" class="img-fluid rounded">
        </div>
    </div>
</div>



<?php
include 'includes/footer.php';
?>