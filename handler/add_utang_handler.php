<?php

  include "../database/database.php";

  try
  {

    if($_SERVER['REQUEST_METHOD']=="POST"){

      $name = $_POST['name'];
      $utang = $_POST['amount'];
      $total_paid = 0;
      $whose = $_POST['whose'];
      $stat= 0;

      $stmt = $conn->prepare("INSERT INTO utang (name, utang, total_paid, whose, stat) VALUES (?, ?, ?, ?, ?)"); 
      $stmt->bind_param("sddii", $name, $utang, $total_paid, $whose, $stat);

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
