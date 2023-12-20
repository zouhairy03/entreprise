<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];
    echo "<script>
            var result = confirm('Are you sure you want to delete this employee?');
            if (result) {
                window.location.href = 'delete_process.php?id=$id';
            } else {
                window.location.href = 'index.php';
            }
          </script>";
}
?>
