<?php
include 'koneksi.php';

// PROSES SIMPAN/EDIT
if(isset($_POST['simpan'])) {
    $id    = $_POST['id'];
    $nama  = $_POST['nama'];
    $harga = $_POST['harga'];
    $stok  = $_POST['stok'];
    
    $foto_name = $_FILES['foto']['name'];
    $tmp_name  = $_FILES['foto']['tmp_name'];

    if($foto_name != "") {
        $ext = pathinfo($foto_name, PATHINFO_EXTENSION);
        $new_name = time() . "." . $ext;
        move_uploaded_file($tmp_name, "uploads/" . $new_name);
        
        if($id) {
            $q = "UPDATE produk SET nama_produk='$nama', harga=$harga, stok=$stok, foto='$new_name' WHERE id=$id";
        } else {
            $q = "INSERT INTO produk VALUES (NULL, '$nama', $harga, $stok, '$new_name')";
        }
    } else {
        $q = "UPDATE produk SET nama_produk='$nama', harga=$harga, stok=$stok WHERE id=$id";
    }
    
    if(mysqli_query($conn, $q)) {
        echo "<script>alert('Data Berhasil Disimpan!'); window.location='index.php';</script>";
    }
}

// PROSES HAPUS
if(isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    mysqli_query($conn, "DELETE FROM produk WHERE id=$id");
    header("Location: index.php");
}
?>