<?php include 'database/database.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> UTANG101 </title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
  integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
  integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="utang.php">Home</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="utang.php?stat=unpaid">Unpaid</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="utang.php?stat=paid">Paid</a> 
        </li>
      </ul>
    </div>
  </div>
</nav>
<div class="container d-flex justify-content-center mt-5">
    <div class="col-6">
      <div class="row">
        <p class="display-5 fw-bold">UTANG101</p>
      </div>
      <div class="row">
        <a href="views/add_utang.php" class="btn btn-outline-dark btn-sm">Add Utang</a>
      </div>
      <?php
        $stat = isset($_GET['stat']) ? $_GET['stat'] : 'all';

          if ($stat == 'paid') {
            $res = $conn->query("SELECT * FROM utang WHERE stat = 1"); 
        } elseif ($stat == 'unpaid') {
            $res = $conn->query("SELECT * FROM utang WHERE stat = 0");
        } else {
            $res = $conn->query("SELECT * FROM utang"); 
        }
        
      ?>
        <?php if($res->num_rows > 0): ?>
            <?php while($row = $res->fetch_assoc()): ?>
              <div class="row border rounded p-4 my-4">
                <h5 class="fw-bold"><?= $row['name']; ?></h5>
                <p class="text-secondary fw-bold">Utang:&nbsp; <?= $row ['utang']; ?></p>
                <p class="text-secondary fw-bold">Amount Paid:&nbsp; <?= $row['total_paid']; ?> </p>
                <p class="fw-bold">
                    <small> 
                      <span <?= $row['whose'] == 0 ? "class='badge rounded-pill bg-danger'" : "class='badge rounded-pill bg-success'"; ?>>
                        <?= $row['whose'] == 0 ? "Akoang Utang" : "Utang sa ako"; ?> 
                    </small>
                </p>
                <p class="fw-bold">
                    <small> 
                      <span <?= $row['stat'] == 0 ? "class='badge rounded-pill bg-danger'" : "class='badge rounded-pill bg-success'"; ?>>
                        <?= $row['stat'] == 0 ? "Unpaid" : "Paid"; ?> 
                    </small>
                </p>
                <div class="row my-1">
                    <a href="views/update_utang.php?id=<?=$row['id'];?>" class="btn btn-sm btn-warning">Edit</a>
                </div>
                <div class="row my-1">
                    <a href="handler/delete_utang_handler.php?id=<?=$row['id'];?>" class="btn btn-sm btn-danger">Delete</a>
                </div>
              </div>
            <?php endwhile; ?>
          <?php else: ?>
            <div class="row border rounded p-3 my-3 text-center">
                <div class="col mt-3">
                    <p class="text-muted">🎉 No Utang! Time to utang again!.</p>
                </div>
            </div>
      <?php endif; ?>
    </div>  
</body>

</html>