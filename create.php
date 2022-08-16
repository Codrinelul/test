<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "testmanu";
//Create conection
$connection = new mysqli($servername, $username, $password, $database);


$id = "";
$name = "";
$email = "";
$phone = "";
$address = "";
$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];

    do {
        if (empty($name) || empty($email) || empty($phone) || empty($address)) {
            $errorMessage = "All the fields are required";
            break;
        }


        //add entry
        $sql = "INSERT INTO clients (name, email, phone, address)" . "VALUES('$name','$email','$phone','$address')";
        $result = $connection->query($sql);

        if (!$result) {
            $errorMessage = "Inavalid query: " . $connection->error;
            break;
        }


        //add new in data base
        $name = "";
        $email = "";
        $phone = "";
        $address = "";

        $successMessage = "Add successfully";



        header("location: /TEST/index.php");
        exit;
    } while (false);
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
    <title>Create</title>
</head>

<body>
    <div class="container my-5">
        <h2>Create entry</h2>
        <?php
        if (!empty($errorMessage)) {
            echo "
            <div class='offset-sm-3 col-sm-6'>
                <div class='row mb-3'>
                    <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                    <strong>$errorMessage</strong>
                    <button type='button'class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>
                </div>
            </div>
        
        
            ";
        }
        ?>
        <form method="POST">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Name</label>
                <div class="col-sm-6">
                    <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-6">
                    <input type="text" name="email" class="form-control" value="<?php echo $email; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Phone</label>
                <div class="col-sm-6">
                    <input type="text" name="phone" class="form-control" value="<?php echo $phone; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Address</label>
                <div class="col-sm-6">
                    <input type="text" name="address" class="form-control" value="<?php echo $address; ?>">
                </div>
            </div>

            <?php
            if (!empty($successMessage)) {
                echo "
                <div class='alert alert-success alert-dismissible fade show' role='alert'>
                <strong>$successMessage</strong>
                <button type='button'class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>
    ";
            }
            ?>

            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>

                <div class="col-sm-3 d-grid">
                    <a href="/TEST/index.php" class="btn btn-primary">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</body>

</html>