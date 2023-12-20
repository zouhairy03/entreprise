<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de l'employé</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }
        .container {
            margin-top: 50px;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
            max-width: 800px;
            margin: 0 auto;
        }
        h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #007bff;
        }
        img {
            display: block;
            margin: 0 auto;
            margin-top: 20px;
            margin-bottom: 20px;
            max-width: 100%;
            height: auto;
            border-radius: 10px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.2);
        }
        p {
            font-size: 18px;
            line-height: 1.6;
            margin-bottom: 10px;
            color: #333;
        }
        .error-message {
            color: #dc3545;
            text-align: center;
            font-size: 18px;
        }
        .back-button {
            display: block;
            margin-top: 20px;
            margin-bottom: 20px;
            padding: 10px 20px;
            font-size: 16px;
            text-align: center;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }
        .back-button:hover {
            background-color: #0056b3;
        }
        a{
            margin-left: 350px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Détails de l'employé</h1>
        <?php
        include 'db.php';

        if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
            $id = $_GET['id'];

            $sql = "SELECT * FROM employees WHERE id=$id";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                // Display the employee details
                echo "<p>ID: " . $row["id"] . "</p>";
                echo "<p>Nom de famille: " . $row["family_name"] . "</p>";
                echo "<p>Prénom: " . $row["first_name"] . "</p>";
                echo "<p>Âge: " . $row["age"] . "</p>";
                echo "<img src='" . $row["image"] . "' alt='Image de l'employé'><br>";
                // Back button
                echo "<a class='back'  href='javascript:history.go(-1)'>Retour</a>";
            } else {
                echo "<p class='error-message'>Aucun employé trouvé avec l'ID fourni</p>";
            }
        } else {
            echo "<p class='error-message'>Requête invalide</p>";
        }
        $conn->close();
        ?>
    </div>
</body>
</html>
