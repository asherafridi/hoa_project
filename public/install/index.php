<!DOCTYPE html>
<html>
<head>
    <title>HOA Installer</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        h1 {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
        }

        form {
            background-color: #fff;
            width: 300px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 5px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
        }

        input[type="submit"] {
            background-color: #333;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #555;
        }

        p {
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <h1>HOA Installer</h1>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $host = $_POST['db_host'];
        $database = $_POST['db_name'];
        $username = $_POST['db_user'];
        $password = $_POST['db_pass'];
        $sqlFile = 'database.sql';

        // Test database connection
        $conn = @mysqli_connect($host, $username, $password, $database);

        if (!$conn) {
            echo '<p style="color: red;">Failed to connect to the database. Check your credentials.</p>';
        } else {
            // If the connection is successful, upload the SQL file
            $sql = file_get_contents($sqlFile);

            if (mysqli_multi_query($conn, $sql)) {
                echo '<p style="color: green;">Application Installed!</p>';
echo '<script>window.location.href = "/";</script>';
            } else {
                echo '<p style="color: red;">Error uploading SQL file: ' . mysqli_error($conn) . '</p>';
            }

            mysqli_close($conn);
        }
    }
    ?>

    <form method="post">
        <label for="db_host">Database Host:</label>
        <input type="text" id="db_host" name="db_host" required>

        <label for="db_name">Database Name:</label>
        <input type="text" id="db_name" name="db_name" required>

        <label for="db_user">Database User:</label>
        <input type="text" id="db_user" name="db_user" required>

        <label for="db_pass">Database Password:</label>
        <input type="password" id="db_pass" name="db_pass">

        <input type="submit" value="Install HOA">
    </form>
</body>
</html>
