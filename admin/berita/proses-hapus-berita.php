<?php
include '../db.php'; // Sesuaikan jalur untuk sesuai dengan lokasi yang benar db.php

if (isset($_GET['idb'])) { // Menghapus berita
    $berita_id = $_GET['idb'];

    $berita_query = mysqli_query($conn, "SELECT berita_img FROM tb_berita WHERE berita_id = '$berita_id'");
    if ($berita_query) {
        if (mysqli_num_rows($berita_query) > 0) {
            $b = mysqli_fetch_object($berita_query);

            // Sesuaikan jalur berdasarkan lokasi sebenarnya dari folder berita_img
            $gambar_path = '../../berita_img/'.$b->berita_img;

            if (file_exists($gambar_path)) {
                unlink($gambar_path);
            } else {
                echo 'Gambar tidak ditemukan: ' . $gambar_path;
            }

            $delete_berita = mysqli_query($conn, "DELETE FROM tb_berita WHERE berita_id = '$berita_id'");
            if ($delete_berita) {
                echo '<script>window.location="data-berita.php"</script>';
            } else {
                echo 'Gagal menghapus berita: ' . mysqli_error($conn);
            }
        } else {
            echo 'Berita tidak ditemukan';
        }
    } else {
        echo 'Galat saat mengambil data berita: ' . mysqli_error($conn);
    }
} else {
    echo 'Permintaan tidak valid';
}
?>
