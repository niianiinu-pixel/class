<?php
session_start();
include 'config.php';

if (isset($_POST['login'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $query = mysqli_query($conn, "SELECT * FROM users WHERE username='$username' AND password='$password'");
  $data = mysqli_fetch_array($query);

  if ($data) {
    $_SESSION['username'] = $username;
    $_SESSION['role'] = $data['role'];

    if ($data['role'] == 'guru') {
      header("Location: guru_dashboard.php");
    } else {
      header("Location: murid_dashboard.php");
    }
  } else {
    echo "<script>alert('Username atau password salah!');</script>";
  }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Login | Kelas 9 IT</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <h2>🌿 Website Kelas 9 IT – MTSN Kota Probolinggo</h2>
    <form method="POST">
      <input type="text" name="username" placeholder="Username" required><br>
      <input type="password" name="password" placeholder="Password" required><br>
      <button type="submit" name="login">Login</button>
    </form>
  </div>
</body>
</html>
