<?php 
session_start();  
$servername = "localhost"; 
$username = "root"; 
$password =""; 
$database = "inventory2";  

$connection = new mysqli($servername, $username, $password, $database);  

$id = ""; 
$name = ""; 
$piecebox = ""; 
$boxcontainer = "";     

$errorMessage = ""; 
$successMessage = "";   
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
            background-color: #f0f8ff;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;    
        }   
        .container {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            padding: 25px;
        }
        .page-header {
            padding-bottom: 15px;
            margin-bottom: 20px;
            border-bottom: 1px solid #eee;
        }
        .table {
            border-radius: 5px;
            overflow: hidden;
        }
        .btn-group {
            margin-right: 15px;
        }
        .action-buttons a {
            margin: 2px;
        }
        .table thead {
            background-color: #4a89dc;
            color: white;
        }
        .navbar-brand {
            font-weight: bold;
            font-size: 1.5rem;
        }
        .add-btn {
            background-color: #37bc9b;
            border-color: #37bc9b;
        }
        .add-btn:hover {
            background-color: #2fa085;
            border-color: #2fa085;
        }
    </style> 
</head> 
<body>      
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
        <div class="container-fluid">
        <a class="navbar-brand" href="/inventory2/index.php"><i class="bi bi-box-seam me-2"></i>Inventory System</a>
        <button class="navbar-toggler btn btn-outline-light shadow-lg" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
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

    <div class="container">
        <div class="page-header d-flex justify-content-between align-items-center">
            <h2><i class="bi bi-grid-3x3-gap-fill"></i> Products</h2>
            <a class="btn add-btn text-white" href="/inventory2/add.php" role="button">
                <i class="bi bi-plus-circle"></i> Add New Product
            </a>
        </div>
        
        <div class="card mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th><i class="bi bi-tag"></i> Product Name</th>
                                <th><i class="bi bi-box"></i> Pieces Per Box</th>
                                <th><i class="bi bi-truck"></i> Boxes Per Container</th>
                                <th><i class="bi bi-gear"></i> Actions</th>
                            </tr>
                        </thead>
                        <tbody>
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
                            
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "
                                    <tr>
                                        <td>$row[name]</td>
                                        <td>$row[piecebox]</td>
                                        <td>$row[boxcontainer]</td>
                                        <td class='action-buttons'>
                                            <a class='btn btn-sm btn-outline-primary' href='/inventory2/edit.php?id=$row[p_id]'>
                                                <i class='bi bi-pencil'></i> Edit
                                            </a>
                                            <a class='btn btn-sm btn-outline-danger' href='/inventory2/delete.php?id=$row[p_id]' 
                                               onclick='return confirm(\"Are you sure you want to delete this product?\")'>
                                                <i class='bi bi-trash'></i> Delete
                                            </a>
                                        </td>
                                    </tr>
                                    ";
                                }
                            } else {
                                echo "<tr><td colspan='4' class='text-center'>No products found. Add a product to get started.</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
    <script>
        // Add active class to current page in navbar
        document.addEventListener('DOMContentLoaded', function() {
            const currentPage = window.location.pathname;
            const navLinks = document.querySelectorAll('.nav-link');
            
            navLinks.forEach(link => {
                if (currentPage.includes(link.getAttribute('href'))) {
                    link.classList.add('active');
                } else if (link !== navLinks[0]) {
                    link.classList.remove('active');
                }
            });
        });
    </script>
</body> 
</html>