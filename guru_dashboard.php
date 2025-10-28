<?php
session_start();
include 'config.php';

if ($_SESSION['role'] != 'guru') {
  header("Location: index.php");
  exit;
}

if (isset($_POST['tambah'])) {
  $isi = $_POST['isi'];
  mysqli_query($conn, "INSERT INTO pengumuman (isi) VALUES ('$isi')");
}

if (isset($_GET['hapus'])) {
  $id = $_GET['hapus'];
  mysqli_query($conn, "DELETE FROM pengumuman WHERE id='$id'");
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Dashboard Guru</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <h2>👩‍🏫 Dashboard Guru – Kelas 9 IT</h2>
    <form method="POST">
      <textarea name="isi" placeholder="Tulis pengumuman baru..." required></textarea><br>
      <button type="submit" name="tambah">Tambah Pengumuman</button>
    </form>

    <h3>📢 Daftar Pengumuman</h3>
    <ul>
      <?php
      $data = mysqli_query($conn, "SELECT * FROM pengumuman ORDER BY id DESC");
      while ($row = mysqli_fetch_array($data)) {
        echo "<li>{$row['isi']} <a href='?hapus={$row['id']}' onclick='return confirm(\"Hapus pengumuman?\")'>🗑️</a></li>";
      }
      ?>
    </ul>
    <a href="logout.php" class="logout">Logout</a>
  </div>
</body>
</html>
