<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$database = "inventory2";

$connection = new mysqli($servername, $username, $password, $database);

if ($connection->connect_error) {
  die("Connection failed: " . $connection->connect_error);
}





?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inventory System</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css"> 
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <style>
    body {
      background-color: #f8f9fa;
    }
    .table thead {
      background-color: #4a89dc;
      color: white;
    }
    .navbar-brand {
      font-weight: bold;
      font-size: 1.5rem;
    }
    .inventory-visual {
      min-height: 180px;
    }
    .item-count {
      font-size: 1.2rem;
      font-weight: bold;
    }
  </style>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
    <div class="container-fluid">
      <a class="navbar-brand" href="/inventory2/index.php"><i class="bi bi-box-seam me-2"></i>Inventory System</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="/inventory2/index.php"><i class="bi bi-stack me-1"></i>Inventory</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/inventory2/products.php"><i class="bi bi-tags me-1"></i>Products</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <?php
    $servername = "localhost";
    $username = "root";
    $password ="";
    $database = "inventory2";
    
    $connection = new mysqli($servername, $username, $password, $database);
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }
            
    $sql = "SELECT * FROM products";
    $result = $connection->query($sql);
    
    if (!$result){
        die ("Invalid query: " . $connection->error);
    }

    $rows = [];
    while ($row = $result->fetch_assoc()) {
      $rows[] = $row;
    }
    

    foreach ($rows as $row)  {
        $p_id = $row["p_id"]; 
        $productname = $row["name"];
        $piecebox = $row["piecebox"];
        $boxcontainer = $row["boxcontainer"];
        

        // Prepare the SQL statement to prevent SQL injection
        $stmt = $connection->prepare("SELECT * FROM pbc_table WHERE p_id = ?");
        $stmt->bind_param("i", $p_id);
        $stmt->execute();
        $res = $stmt->get_result()->fetch_assoc();

        // Ensure $res is not null before accessing its values
        $total_pen = isset($res['piece']) ? (int) $res['piece'] : 0;
        $total_boxes = isset($res['box']) ? (int) $res['box'] : 0;
        $total_cases = isset($res['case']) ? (int) $res['case'] : 0;

        include 'item.php';
      }


  ?>


</body>
</html>