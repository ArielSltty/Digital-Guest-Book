<?php
include 'config.php';

$nama  = $_POST['nama'];
$email = $_POST['email'];
$pesan = $_POST['pesan'];

$query = "INSERT INTO tamu (nama, email, pesan, waktu) VALUES (?, ?, ?, NOW())";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "sss", $nama, $email, $pesan);
mysqli_stmt_execute($stmt);

header("Location: index.php?success=1");
exit;
?>
