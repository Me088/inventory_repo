<?php
$servername = "localhost";
$username = "root";
$password ="";
$database = "inventory2";

$connection = new mysqli($servername, $username, $password, $database);

$name = "";
$piecebox = "";
$boxcontainer = "";

$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST["name"]  ? $_POST["name"] : "";
    $piecebox = $_POST["piecebox"]  ? $_POST["piecebox"] : "";
    $boxcontainer = $_POST["boxcontainer"]  ? $_POST["boxcontainer"] : "";


    do {

        if (empty($name) || empty($piecebox) || empty($boxcontainer)) {
            $errorMessage = "All the fields are required";
            break;
        }

        $sql = "INSERT INTO products (name, piecebox, boxcontainer) " . 
                "VALUES ('$name', '$piecebox', '$boxcontainer')";
        $result = $connection->query($sql);
        $last_id = $connection->insert_id;

        $add_sql = "INSERT INTO pbc_table (p_id, piece, box, `case`) " . 
                "VALUES ($last_id, '0', '0', '0')";
        $query = $connection->query($add_sql);

        if (!$result) {
            $errorMessage = "Invalid query: " . $connection->error;
            break;
        }

        $name = "";
        $piecebox = "";
        $boxcontainer = "";

        $successMessage = "Item added correctly";

        header("location: /inventory2/index.php");
        exit;
        
    } while (false);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.1/font/bootstrap-icons.min.css">
    
    <style>
        .form-container {
            max-width: 800px;
            margin: 40px auto;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }
        
        .header {
            border-radius: 10px 10px 0 0;
            padding: 20px 30px;
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
        }
        
        .form-body {
            padding: 30px;
        }
        
        .form-label {
            font-weight: 500;
        }
        
        .btn-primary {
            background-color: #0d6efd;
            padding: 10px 20px;
        }
        
        .btn-primary:hover {
            background-color: #0b5ed7;
        }
    </style>
</head>
<body class="bg-light">
    <div class="container">
        <div class="form-container bg-white">
            <div class="header bg-primary-subtle">
                <h2 class="text-primary mb-0"><i class="bi bi-box-seam me-2"></i>Add Inventory Item</h2>
            </div>
            
            <div class="form-body">
                <?php
                if (!empty($errorMessage)) {
                    echo "
                    <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        <strong><i class='bi bi-exclamation-triangle-fill me-2'></i>Error!</strong> $errorMessage
                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>
                    ";
                }
                ?>
                
                <form method="post" class="needs-validation" novalidate>
                    <div class="row mb-4">
                        <label for="name" class="col-sm-3 col-form-label form-label">Product Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="name" name="name" value="<?php echo $name; ?>" placeholder="Enter Product Name" required>
                            <div class="invalid-feedback">Please enter a product name.</div>
                        </div>
                    </div>
                    
                    <div class="row mb-4">
                        <label for="piecebox" class="col-sm-3 col-form-label form-label">Piece Per Box</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input type="number" class="form-control" id="piecebox" name="piecebox" value="<?php echo $piecebox; ?>" placeholder="Enter Quantity" required min="1">
                                <div class="invalid-feedback">Please enter a valid quantity .</div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row mb-4">
                        <label for="boxcontainer" class="col-sm-3 col-form-label form-label">Box Per Container</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input type="number" class="form-control" id="boxcontainer" name="boxcontainer" value="<?php echo $boxcontainer; ?>" placeholder="Enter Quantity" required min="1">
                                <div class="invalid-feedback">Please enter a valid quantity.</div>
                            </div>
                        </div>
                    </div>
                    
                    <?php
                    if (!empty($successMessage)) {
                        echo "
                        <div class='alert alert-success alert-dismissible fade show' role='alert'>
                            <strong><i class='bi bi-check-circle-fill me-2'></i>Success!</strong> $successMessage
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                        </div>
                        ";
                    }
                    ?>
                    
                    <div class="row mt-4">
                        <div class="col-sm-9 offset-sm-3">
                            <button type="submit" class="btn btn-primary me-2">
                                <i class="bi bi-plus-circle me-2"></i>Add Item
                            </button>
                            <a class="btn btn-outline-secondary" href="/inventory2/index.php" role="button">
                                <i class="bi bi-x-circle me-2"></i>Cancel
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>