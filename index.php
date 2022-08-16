<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <title>TabelManu</title>
</head>

<body>
    <div class="container my-5">
        <h2>Your list</h2>
        <a class="btn btn-primary" href="/TEST/create.php" role="button">New Entry</a>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Adress</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $database = "testmanu";
                //Create conection
                $connection = new mysqli($servername, $username, $password, $database);

                //check conection
                if ($connection->connect_error) {
                    die("Conection failed" . $connection->connect_error);
                }
                //read everything from database table
                $sql = "SELECT * FROM clients";
                $result = $connection->query($sql);

                if (!$result) {
                    die("Invalid Query" . $connection->error);
                }

                while ($row = $result->fetch_assoc()) {
                    echo "
                    <tr>
                    <td>$row[id]</td>
                    <td>$row[name]</td>
                    <td>$row[email]</td>
                    <td>$row[phone]</td>
                    <td>$row[address]</td>
                    <td>$row[created_at]</td>
                    <td>
                        <a class='btn btn-primary' href='/TEST/edit.php?id=$row[id]'>Edit</a>
                        <a class='btn btn-danger' href='/TEST/delete.php?id=$row[id]'>Delete</a>
                    </td>
                    </tr>
                    ";
                }

                ?>


            </tbody>
        </table>
    </div>
</body>

</html>