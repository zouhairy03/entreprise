<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mettre à jour l'employé</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f2f2f2;
            font-family: Arial, sans-serif;
        }
        .container {
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: 50px auto;
            max-width: 600px;
            padding: 30px;
        }
        h2 {
            color: #333;
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 30px;
            text-align: center;
        }
        label {
            color: #333;
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        input[type="text"], input[type="number"], input[type="file"] {
            border: 1px solid #ccc;
            border-radius: 3px;
            box-sizing: border-box;
            font-size: 16px;
            margin-bottom: 20px;
            padding: 10px;
            width: 100%;
        }
        input[type="file"] {
            margin-top: 10px;
        }
        .form-group {
            margin-bottom: 30px;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
            border-radius: 3px;
            color: #fff;
            font-size: 16px;
            font-weight: bold;
            padding: 10px 20px;
            text-transform: uppercase;
        }
        .btn-primary:hover {
            background-color: #0069d9;
            cursor: pointer;
        }
        img {
            display: block;
            margin-bottom: 10px;
            max-width: 70%;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Mettre à jour l'employé</h2>
        <?php
        $id = $_GET['id'];
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "entreprise";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("La connexion a échoué : " . $conn->connect_error);
        }

        $sql = "SELECT * FROM employees WHERE id=$id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            ?>
            <form action="update_process.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <div class="form-group">
                    <label for="family_name">Nom de famille :</label>
                    <input type="text" id="family_name" name="family_name" value="<?php echo $row['family_name']; ?>">
                </div>
                <div class="form-group">
                    <label for="first_name">Prénom :</label>
                    <input type="text" id="first_name" name="first_name" value="<?php echo $row['first_name']; ?>">
                </div>
                <div class="form-group">
                    <label for="age">Âge :</label>
                    <input type="number" id="age" name="age" value="<?php echo $row['age']; ?>">
                </div>
                <div class="form-group">
                    <label for="image">Image actuelle :</label>
                    <img src="<?php echo $row['image']; ?>">
                    <label for="new_image">Mettre à jour l'image :</label>
                    <input type="file" id="new_image" name="new_image">
                </div>
                <button type="submit" class="btn btn-primary" style="margin-left: 200px;">Mettre à jour</button>
            </form>
            <!-- <br> -->
            <a href="index.php" style="text-align: center;margin-left: 240px;">Retour</a>

            <?php
        } else {
            echo "Aucun employé trouvé avec l'ID fourni";
        }
        $conn->close();
        ?>
    </div>
</body>
</html>
