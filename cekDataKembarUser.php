<?php
require "fungsi.php";
if (isset($_POST['username'])) {
  $username = $_POST['username'];
  // Prepared statement untuk mencegah SQL injection
  $stmt = $koneksi->prepare("SELECT username FROM user WHERE username = ?");
  $stmt->bind_param("s", $username);
  $stmt->execute();
  $result = $stmt->get_result();
  if ($result->num_rows > 0) {
    echo "exists";
  } else {
    echo "not_exists";
  }
  $stmt->close();
}
