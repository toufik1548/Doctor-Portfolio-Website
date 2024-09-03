<?php include("configs/config.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Login page for Dr. Maruf Al Hasan Dashboard">
  <title>Login to Dr. Maruf Al Hasan Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>

  <header class="container text-center mt-1 p-3 bg-primary rounded bg-opacity-25">
    <h1>Dr. Maruf Al Hasan Login</h1>
  </header>

  <main class="container p-3">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <form action="mvc/check.php" method="POST">
          <div class="mb-3">
            <label for="usermail" class="form-label pt-2 fw-bolder">Usermail</label>
            <input type="email" class="form-control" id="usermail" aria-describedby="emailHelp" placeholder="Enter Usermail" name="email" required>
          </div>
          <div class="mb-3">
            <label for="password" class="form-label pt-2 fw-bolder">Password</label>
            <input type="password" class="form-control" id="password" placeholder="Enter Password" name="password" required>
          </div>
          <button type="submit" name="submit" class="btn btn-primary">Login</button>
        </form>
      </div>
    </div>
  </main>

  <footer>
    <hr>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
