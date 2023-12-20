<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "entreprise";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $family_name = $_POST['family_name'];
    $first_name = $_POST['first_name'];
    $age = $_POST['age'];

    if ($_FILES['new_image']['name']) {
        $targetDirectory = "uploads/";
        $targetFile = $targetDirectory . basename($_FILES["new_image"]["name"]);
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
            echo "Sorry, only JPG, JPEG, PNG files are allowed.";
        } else {
            if (move_uploaded_file($_FILES["new_image"]["tmp_name"], $targetFile)) {
                $image_path = $targetFile;

                // Update employee information including the new image path
                $sql = "UPDATE employees SET family_name='$family_name', first_name='$first_name', age=$age, image='$image_path' WHERE id=$id";

                if ($conn->query($sql) === TRUE) {
                    echo "Record updated successfully";
                    header('Location: index.php'); // Redirect to the index page
                } else {
                    echo "Error updating record: " . $conn->error;
                }
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    } else {
        // Update employee information without changing the image
        $sql = "UPDATE employees SET family_name='$family_name', first_name='$first_name', age=$age WHERE id=$id";

        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
            header('Location: index.php'); // Redirect to the index page
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }
} else {
    echo "Invalid request";
}

$conn->close();
?>
