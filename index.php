<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Liste des employés</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f6f8f8;
        }
        .container {
            background-color: #fff;
            padding: 25px;
            box-shadow: 0 0 10px rgba(0,0,0,0.2);
            border-radius: 6px;
            width: 100%;
            max-width: 800px;
        }
        .my-4 {
            margin-top: 20px;
            margin-bottom: 30px;
            font-weight: 500;
            text-transform: uppercase;
            text-align: center;
        }
        .btn-primary {
            background-color: #2bc48a;
            border-color: #2bc48a;
            text-transform: uppercase;
            font-weight: 500;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
        }
        .btn-primary:hover {
            background-color: #28a745;
            border-color: #28a745;
        }
        .btn-primary i {
            margin-right: 5px;
        }
        .table {
            border-collapse: collapse;
            color: #404040;
            width: 100%;
        }
        th {
            font-size: 16px;
            border-bottom: 3px solid #ffcb61;
            padding: 5px 20px;
            font-weight: 500;
            text-align: center;
        }
        td {
            font-weight: 400;
            padding: 5px 30px;
            font-size: 14px;
            text-align: center;
        }
        img {
            max-height: 50px;
            max-width: 50px;
        }
        tr:nth-child(2n){
            background-color: #f6f8f8;
        }
        tr:nth-child(2n) td {
            border-bottom: 1px solid #e0e0e0;
            border-top:  1px solid #e0e0e0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="my-4">Liste des employés</h2>
        <a href="add.php" class="btn btn-primary"><i class="fas fa-plus me-2"></i>Ajouter un nouvel employé</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom de famille</th>
                    <th>Prénom</th>
                    <th>Âge</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'db.php';

                $sql = "SELECT * FROM employees order by id desc";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>".$row["id"]."</td>";
                        echo "<td>".$row["family_name"]."</td>";
                        echo "<td>".$row["first_name"]."</td>";
                        echo "<td>".$row["age"]."</td>";
                        echo "<td><img src='".$row["image"]."' alt='Image de l'employé'></td>";
                        echo "<td>
                                <a href='consult.php?id=".$row["id"]."' class='btn btn-info'><i class='fas fa-eye'></i></a>
                                <a href='update.php?id=".$row["id"]."' class='btn btn-warning'><i class='fas fa-edit'></i></a>
                                <a href='delete.php?id=".$row["id"]."' class='btn btn-danger'><i class='fas fa-trash'></i></a>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>Aucun employé trouvé</td></tr>";
                }
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
    <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
