<?php
require_once "../db/db.php";
require_once "../function/function.php";
require_once "../assets/view/header.php";

if(isset($_SESSION['username'])) header('location:table.php');

if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  
  login($username, $password);
}
?>

<div class="row mt-2">
  <p><a href="../index.php">Home</a></p>
</div>

<div class="row">
  <h1>Login</h1>
</div>
<div class="row">
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