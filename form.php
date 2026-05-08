<?php 
include 'koneksi.php'; 
$id = isset($_GET['id']) ? $_GET['id'] : '';
$data = ['nama_produk' => '', 'harga' => '', 'stok' => '', 'foto' => ''];

if($id) {
    $res = mysqli_query($conn, "SELECT * FROM produk WHERE id = $id");
    $data = mysqli_fetch_assoc($res);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Form Produk</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h3>Form <?= $id ? 'Edit' : 'Tambah' ?> Produk</h3>
        <form action="proses.php" method="POST" enctype="multipart/form-data" id="formProduk">
            <input type="hidden" name="id" value="<?= $id ?>">
            
            <label>Nama Produk:</label>
            <input type="text" name="nama" id="nama" value="<?= $data['nama_produk'] ?>">
            
            <label>Harga:</label>
            <input type="number" name="harga" id="harga" value="<?= $data['harga'] ?>">
            
            <label>Stok:</label>
            <input type="number" name="stok" id="stok" value="<?= $data['stok'] ?>">
            
            <label>Foto:</label>
            <input type="file" name="foto" id="foto">
            <?php if($id): ?><br><small>Foto lama: <?= $data['foto'] ?></small><?php endif; ?>
            
            <br><br>
            <button type="submit" name="simpan" class="btn btn-tambah">Simpan Data</button>
            <a href="index.php">Batal</a>
        </form>
    </div>
    <script src="script.js"></script>
</body>
</html>