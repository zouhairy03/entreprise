<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $family_name = $_POST['family_name'];
    $first_name = $_POST['first_name'];
    $age = $_POST['age'];
    
    $image = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    $image_type = $_FILES['image']['type'];
    $image_size = $_FILES['image']['size'];

    // Move the uploaded file to a new location
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($image);
    move_uploaded_file($image_tmp, $target_file);

    $sql = "INSERT INTO employees (family_name, first_name, age, image) VALUES ('$family_name', '$first_name', $age, '$target_file')";

    if ($conn->query($sql) === TRUE) {
        // Redirect the user to the index.php page
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();
?>