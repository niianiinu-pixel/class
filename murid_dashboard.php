<?php
session_start();
include 'config.php';

if ($_SESSION['role'] != 'murid') {
  header("Location: index.php");
  exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Dashboard Murid</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <h2>👨‍🎓 Dashboard Murid – Kelas 9 IT</h2>
    <h3>📅 Jadwal Pelajaran</h3>
    <table>
      <tr><th>Hari</th><th>Jam</th><th>Mata Pelajaran</th><th>Guru</th></tr>
      <tr><td>Senin</td><td>07.00-08.00</td><td>Matematika</td><td>Pak Budi</td></tr>
      <tr><td>Selasa</td><td>08.00-09.00</td><td>IPA</td><td>Bu Sinta</td></tr>
    </table>

    <h3>📢 Pengumuman Terbaru</h3>
    <ul>
      <?php
      $data = mysqli_query($conn, "SELECT * FROM pengumuman ORDER BY id DESC");
      while ($row = mysqli_fetch_array($data)) {
        echo "<li>{$row['isi']}</li>";
      }
      ?>
    </ul>

    <a href="logout.php" class="logout">Logout</a>
  </div>
</body>
</html>
