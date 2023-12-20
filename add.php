<!DOCTYPE html>
<html>
<head>
    <title>Add New Employee</title>
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
            max-width: 400px;
        }
        .my-4 {
            margin-top: 20px;
            margin-bottom: 30px;
            font-weight: 500;
            text-transform: uppercase;
            text-align: center;
        }
        .form-group label {
            font-weight: 500;
            text-transform: uppercase;
        }
        input[type="file"] {
            padding: 5px;
            border: 1px solid #999;
            outline: 0;
            margin-top: 2px;
            font-size: 14px;
        }
        input[type="file"]:focus {
            border: 1px solid #ffcb61;
        }
        input[type="submit"] {
            margin-top: 25px;
            background-color: #2bc48a;
            border: 1px solid #2bc48a;
            cursor: pointer;
            color: #fff;
            text-transform: uppercase;
            font-weight: 500;
        }
        .btn-primary {
            background-color: #2bc48a;
            border-color: #2bc48a;
            text-transform: uppercase;
            font-weight: 500;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 10px;
            margin-left: 90px;

    }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="my-4">Add New Employee</h2>
        <form action="add_process.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="family_name">Family Name:</label>
                <input type="text" class="form-control" id="family_name" name="family_name" required>
            </div>
            <div class="form-group">
                <label for="first_name">First Name:</label>
                <input type="text" class="form-control" id="first_name" name="first_name" required>
            </div>
            <div class="form-group">
                <label for="age">Age:</label>
                <input type="number" class="form-control" id="age" name="age" required>
            </div>
            <div class="form-group">
                <label for="image">Image:</label>
                <input type="file" class="form-control-file" id="image" name="image" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Employee</button>
            <!-- <button></button> -->
            <a href="index.php" style="text-align: center;margin-left: 140px;">Back</a>
        </form>
    </div>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>