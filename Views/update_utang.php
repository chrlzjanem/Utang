<?php
include '../database/database.php';

try{
    

  $id = $_GET['id']; 

  $stmt = $conn->prepare("SELECT * FROM utang WHERE id = ?");
  $stmt->bind_param("i", $id);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result && $result->num_rows > 0) {
      $utang = $result->fetch_assoc();
  } else {
      die("Utang not found");
  }
  $stmt->close();

}catch(\Exception $e){
  echo "Error: ".$e;
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> Add Utang </title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
  integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
  integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container d-flex justify-content-center mt-5">
      <div class="col-6">
        <div class="row">
          <p class="display-5 fw-bold">Update Utang</p>
        </div>
        <div class="row">
          <form class="form" action="../handler/update_utang_handler.php" method="POST">
            <input name="id" value="<?= $utang['id'] ?>"  hidden /> 
            <div class="my-3">
              <label>Name</label>
              <input class="form-control"  type="text" name="name" value="<?= $utang['name']?>"/>
            </div>
            <div class="my-3">
                <label>Amount</label> 
                <input class="form-control" type="number" name="amount" step="0.01" value="<?= $utang['utang'] ?>" required>
                </div>
            <div class="my-3">
                <label>Amount Paid</label> 
                <input class="form-control" type="number" name="amount_paid" step="0.01" required>
                </div>
            <div class="my-3">
                <label>Whose</label>
                <select class="form-control" id="whose" name="whose" required>
                    <option value="0" <?= $utang['whose'] == 0 ? 'selected' : '' ?>>Akoang Utang</option>
                    <option value="1" <?= $utang['whose'] == 1 ? 'selected' : '' ?>>Utang sa ako</option>
                </select>
            </div>
            <div class="my-3">
                <label>Status</label>
                <select class="form-control" id="status" name="status" required>
                    <option value="0" <?= $utang['stat'] == 0 ? 'selected' : '' ?>>Unpaid</option>
                    <option value="1" <?= $utang['stat'] == 1 ? 'selected' : '' ?>>Paid</option>
                </select>
            </div>
            <div class="my-3">
              <button type="submit" class="btn btn-outline-dark">Save Update</button>
            </div>
          </form>
        </div>
      </div>
    </div>
</body>
</html>