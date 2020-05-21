<?php
require_once "../db/db.php";
require_once "../function/function.php";

ob_start();
session_start();

if (isset($_SESSION['username'])) header('location:table.php');

if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  login($username, $password);
}

require_once "../assets/view/header.php";
?>
<div class="row mt-2">
  <div class="col">
    <p><a href="../index.php">Home</a></p>
  </div>
</div>

<div class="row">
  <div class="col">
    <h1>Login</h1>
  </div>
</div>
<div class="row">
  <div class="col">
    <form method="post">
      <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" id="username" name="username" required>
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password" required>
      </div>
      <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>
  </div>
</div>