<?php
include 'config.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buku Tamu Dinamis</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- ...existing code for navbar/header... -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Buku Tamu Dinamis</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Isi Buku Tamu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#daftar-tamu">Daftar Tamu</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Form Buku Tamu -->
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Formulir Buku Tamu</h5>
                    </div>
                    <div class="card-body">
                        <?php if(isset($_GET['success'])): ?>
                            <div class="alert alert-success">Pesan berhasil dikirim!</div>
                        <?php endif; ?>
                        <form action="proses.php" method="POST">
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="nama" name="nama" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="pesan" class="form-label">Pesan</label>
                                <textarea class="form-control" id="pesan" name="pesan" rows="3" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Kirim</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Daftar Tamu -->
    <div class="container my-5" id="daftar-tamu">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-header bg-success text-white">
                        <h5 class="mb-0">Daftar Tamu</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            <?php
                            $query = "SELECT * FROM tamu ORDER BY id DESC";
                            $result = mysqli_query($conn, $query);
                            while($row = mysqli_fetch_assoc($result)):
                            ?>
                            <li class="list-group-item">
                                <strong><?= htmlspecialchars($row['nama']) ?></strong> (<?= htmlspecialchars($row['email']) ?>)<br>
                                <span><?= nl2br(htmlspecialchars($row['pesan'])) ?></span>
                                <div class="text-end"><small class="text-muted"><?= $row['waktu'] ?></small></div>
                            </li>
                            <?php endwhile; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="text-center py-3 bg-light mt-auto">
        <small>&copy; 2024 Buku Tamu Dinamis. All rights reserved.</small>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
