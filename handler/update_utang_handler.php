<?php

  include "../database/database.php";

  try
  {

    if($_SERVER['REQUEST_METHOD']=="POST"){

      $id = $_POST['id'];  
      $name = $_POST['name'];
      $utang = $_POST['amount'];
      $total_paid = $_POST['amount_paid'];
      $whose = $_POST['whose'];
      $stat= $_POST['status'];

      $stmt = $conn->prepare("UPDATE utang SET name = ?, utang = ?, total_paid = ?, whose = ?, stat = ? WHERE id=? "); 
      $stmt->bind_param("sddiii", $name, $utang,$total_paid, $whose, $stat, $id);

      if($stmt->execute())
      {
        header("Location: /Hatdog/proj/utang.php");
        exit;
      }
      else
      {
        echo "operation failed";
      }

    }

  }
  catch(\Exception $e)
  {
    echo "Error: ".$e;
  }





?>
