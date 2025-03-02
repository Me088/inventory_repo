<?php 
$servername = "localhost";
$username = "root";
$password = "";
$database = "inventory2";

$connection = new mysqli($servername, $username, $password, $database);

if ($connection->connect_error) {
  die("Connection failed: " . $connection->connect_error);
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $id = isset($_POST["id"]) ? (int)$_POST["id"] : 0;
  $pen = isset($_POST["pieces"]) ? $_POST["pieces"] : "";
  $box = isset($_POST["box"]) ? $_POST["box"] : "";
  $case = isset($_POST["case"]) ? $_POST["case"] : "";
  $id = isset($_POST["p_id"]) ? (int)$_POST["p_id"] : 0;

  $sql = "SELECT * FROM products WHERE p_id = $id";
  $result = $connection->query($sql);
  $stockproduct = $result->fetch_assoc();
  $piece_per_box = $stockproduct['piecebox'];
  $box_per_case = $stockproduct['boxcontainer'];

  $newpiece = 0;

  if ($pen){
    $sql1 = "SELECT * FROM products WHERE p_id = $id";
       $result1 = $connection->query($sql1);
       $check= $result1->fetch_assoc();

       $piece_per_box = $check['piecebox'];
       $box_per_case = $check['boxcontainer'];


    $sql = "SELECT * FROM pbc_table WHERE p_id = $id";
    $result = $connection->query($sql);

    if ($result->num_rows > 0) { 
      $checkpiece = $result->fetch_assoc();
      $oldpiece = $checkpiece['piece'];
      $oldbox = $checkpiece['box'];


        if ($pen < $oldpiece) {
        $newpiece = $oldpiece - $pen;
        $newbox = ceil ($newpiece / $piece_per_box);
        $newcase = ceil ($newbox / $box_per_case); 
        } 
      } else {
        $newpiece = 0;
      }
    }
}
  else if ($box){
    $sql1 = "SELECT * FROM products WHERE p_id = $id";
       $result1 = $connection->query($sql1);
       $check= $result1->fetch_assoc();

       $piece_per_box = $check['piecebox'];
       $box_per_case = $check['boxcontainer'];

    $sql = "SELECT * FROM pbc_table WHERE p_id = $id";
    $result = $connection->query($sql);
    

    if ($result->num_rows > 0) {
      $checkbox = $result->fetch_assoc();
      $oldpiece = $checkbox['piece'];
      $oldbox = $checkbox['box'];
      $oldcase = $checkbox['case'];


      if ($box < $oldbox) {
        $newbox = $oldbox - $box;
        $piece = $box * $piece_per_box; 
        $newpiece = $oldpiece - $piece;
        $newcase = ceil ($newbox / $box_per_case);

        }
      else {
        $newbox = 0;
      }
    }
  }

  
  else if ($case){
    $sql1 = "SELECT * FROM products WHERE p_id = $id";
       $result1 = $connection->query($sql1);
       $check= $result1->fetch_assoc();

       $piece_per_box = $check['piecebox'];
       $box_per_case = $check['boxcontainer'];
       
    $sql = "SELECT * FROM pbc_table WHERE p_id = $id";
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
      $checkcase = $result->fetch_assoc();
      $oldcase = $checkcase['case'];
      $oldpiece = $checkcase['piece'];
      $oldbox = $checkcase['box'];

      if ($case < $oldcase) {
        $newcase = $oldcase - $case;
        $box = $case * $box_per_case;
        $newbox = $oldbox - $box;
        $piece = $box * $piece_per_box;
        $newpiece = $oldpiece - $piece;
        
      }
    }
  else {
    $newcase = 0;
}
  }
    $sql = "UPDATE `pbc_table` SET `piece`='$newpiece' , `box`='$newbox' , `case`='$newcase' WHERE p_id = $id";

    $result = $connection->query($sql);

    header("Location: products.php");
    exit();
?>