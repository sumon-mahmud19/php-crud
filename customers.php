<?php
session_start();
$title = "All Customers";
include 'includes/header.php';
include 'db/config.php';


$sql = "SELECT * FROM `customers` ORDER BY id DESC";
$result = mysqli_query($conn, $sql);


// Handle delete request
if (isset($_GET['delete_id'])) {
    $id = intval($_GET['delete_id']);
    $sql = "DELETE FROM customers WHERE id = $id";
    if ($conn->query($sql) === TRUE) {

        $_SESSION['error'] = "Customer deleted successfully!";
        header('Location: customers.php');

    } else {
        echo "Error deleting record: " . $conn->error;
    }
}


?>

<div class="container">
    <?php include 'includes/success.php'; ?>
</div>

<div class="container">
    <?php include 'includes/error.php'; ?>
</div>

<div class="container my-3">
    <h2 class="text-center mb-4">Customer Lists</h2>

    <div class="table-responsive">
        <table class="table table-striped table-hover table-bordered align-middle">
            <thead class="table-dark">
                <tr>
                    <th scope="col">#Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Address</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <th scope="row"><?php echo $row['id'] ?></th>
                        <td><?php echo $row['fname']." ". $row['lname'] ?></td>
                        <td><?php echo $row['email'] ?></td>
                        <td><?php echo $row['phone'] ?></td>
                        <td><?php echo $row['address'] ?></td>
                        <td>
                            <a href="edit-customer.php?id=<?php echo $row['id']?>" class="btn btn-primary btn-sm">Edit</a>
                            
                            <button class="btn btn-danger btn-sm" onclick="confirmDelete(<?= $row['id'] ?>)">Delete</button>
                        </td>


                    <?php
                }
                    ?>


                    </tr>

            </tbody>
        </table>
    </div>
</div>


<script>
        // Confirmation alert
        function confirmDelete(id) {
            if (confirm("Are you sure you want to delete this record?")) {
                window.location.href = `?delete_id=${id}`;
            }
        }
    </script>

<?php
include 'includes/footer.php';
?>