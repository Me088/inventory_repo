<?php
if ( isset($_GET["id"])) {
    $id =$_GET["id"];

    $servername = "localhost";
    $username = "root";
    $password ="";
    $database = "inventory2";

    $connection = new mysqli($servername, $username, $password, $database);

    $sql = "DELETE FROM products WHERE p_id=$id";
    $result = $connection->query($sql);

    $sql = "DELETE FROM pbc_table WHERE p_id=$id";
    $result = $connection->query($sql);

}
header ("location: /inventory2/index.php");
exit;
?>