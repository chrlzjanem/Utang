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
          <p class="display-5 fw-bold">Add Utang</p>
        </div>
        <div class="row">
          <form class="form" action="../handlers/add_todo_handler.php" method="POST">
            <div class="my-3">
              <label>Name</label>
              <textarea class="form-control"  type="text" name="name"></textarea>
            </div>
            <div class="my-3">
              <label>Amount</label>
              <textarea class="form-control" name="description" id="digitOnlyTextarea" oninput="this.value = this.value.replace(/\D/g, '')"></textarea>
              </div>
            <div class="my-3">
              <label>Date</label>
              <input class="form-control" type="date" name="description" required />
              </div>
            <div class="my-3">
              <button type="submit" class="btn btn-outline-dark">Add Utang</button>
            </div>
          </form>
        </div>
      </div>
    </div>
</body>

</html>
