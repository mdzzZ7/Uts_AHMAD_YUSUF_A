<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Produk - buku</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Daftar Produk buku</h2>
        <a href="form.php" class="btn btn-tambah">+ Tambah Produk</a>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Foto</th>
                    <th>Nama</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = mysqli_query($conn, "SELECT * FROM produk ORDER BY id DESC");
                $no = 1;
                while($row = mysqli_fetch_assoc($query)): ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><img src="uploads/<?= $row['foto'] ?>" width="60" height="60"></td>
                    <td><strong><?= $row['nama_produk'] ?></strong></td>
                    <td>Rp <?= number_format($row['harga'], 0, ',', '.') ?></td>
                    <td><?= $row['stok'] ?></td>
                    <td>
                        
    

                        <a href="form.php?id=<?= $row['id'] ?>" style="color: blue;">Edit</a> | 
                        <a href="proses.php?hapus=<?= $row['id'] ?>" style="color: red;" onclick="return confirm('Yakin hapus data?')">Hapus</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
    <div id="toast"></div>
    <script src="script.js"></script>
</body>
</html>