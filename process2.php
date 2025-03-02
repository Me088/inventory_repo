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
     $stockpen = isset($_POST["pieces"]) ? $_POST["pieces"] : "";
     $stockbox = isset($_POST["box"]) ? $_POST["box"] : "";
     $stockcase = isset($_POST["case"]) ? $_POST["case"] : "";
     $id = isset($_POST["p_id"]) ? (int)$_POST["p_id"] : 0;

     $stmt = $connection->prepare("SELECT * FROM products WHERE p_id = ?");
      $stmt->bind_param("i", $id);
      $stmt->execute();
      $stockproduct = $stmt->get_result()->fetch_assoc();
      $piece_per_box = $stockproduct['piecebox'];
      $box_per_case = $stockproduct['boxcontainer'];
      $stmt->close();

     if ($stockpen){
       $sql1 = "SELECT * FROM products WHERE p_id = $id";
       $result1 = $connection->query($sql1);
       $check= $result1->fetch_assoc();

       $piece_per_box = $check['piecebox'];
       $box_per_case = $check['boxcontainer'];

   
       $sql = "SELECT * FROM pbc_table WHERE p_id = $id";
       $result = $connection->query($sql);
   
       if ($result->num_rows > 0) { 
         $stockcheckpiece = $result->fetch_assoc();
         $stockoldpiece = $stockcheckpiece['piece'];
         $stocknewpiece = $stockoldpiece + $stockpen;

           if ($stocknewpiece) {
           $stocknewbox = ceil ($stocknewpiece / $piece_per_box);
           
           if ($stocknewbox) {
               $stocknewcase = ceil ($stocknewbox / $box_per_case); 
           } 
       }

   }
  }
     if ($stockbox){
      $sql1 = "SELECT * FROM products WHERE p_id = $id";
      $result1 = $connection->query($sql1);
      $check= $result1->fetch_assoc();

      $piece_per_box = $check['piecebox'];
      $box_per_case = $check['boxcontainer'];

       $sql = "SELECT `box` FROM pbc_table WHERE p_id = $id";
       $result = $connection->query($sql);

      
   
       if ($result->num_rows > 0) {
         $stockcheckbox = $result->fetch_assoc();
         $stockoldbox = $stockcheckbox['box'];
         $stocknewbox = $stockoldbox + $stockbox;

         $sql = "SELECT * FROM pbc_table WHERE p_id = $id";
         $result = $connection->query($sql);
   
         if ($result->num_rows > 0) {
           $stockcheckpiece = $result->fetch_assoc();
           $stockoldpiece = $stockcheckpiece['piece'];
           $newpiece = $stockbox * $piece_per_box; 
           $stocknewpiece = $stockoldpiece + $newpiece;
           $stocknewcase = ceil ($stocknewbox / $box_per_case);
         }
       }
     }
   
     if ($stockcase){
      $sql1 = "SELECT * FROM products WHERE p_id = $id";
      $result1 = $connection->query($sql1);
      $check= $result1->fetch_assoc();

      $piece_per_box = $check['piecebox'];
      $box_per_case = $check['boxcontainer'];
      

       $sql = "SELECT * FROM pbc_table WHERE p_id = $id";
       $result = $connection->query($sql);
       
      
   
       if ($result->num_rows > 0) {
         $stockcheckcase = $result->fetch_assoc();
         $stockoldcase = $stockcheckcase['case'];
         $stockoldpiece = $stockcheckcase['piece'];
         $stockoldbox = $stockcheckcase['box'];
         $stocknewcase = $stockoldcase + $stockcase;
   
           $stockbox = $stockcase * $box_per_case;
           $stocknewbox = $stockoldbox + $stockbox;
           $stockpiece = $stockbox * $piece_per_box; 
           $stocknewpiece = $stockoldpiece + $stockpiece;
           } 
    }
  
     }   


     $updateStmt = $connection->prepare("UPDATE `pbc_table` SET `piece` = ?, `box` = ?, `case` = ? WHERE p_id = ?");
     $updateStmt->bind_param("iiii", $stocknewpiece, $stocknewbox, $stocknewcase, $id);
     $updateStmt->execute();
     $updateStmt->close();
     
   

   header("Location: products.php");
   exit();
?>