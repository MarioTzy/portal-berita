<?php
include '../db.php'; // Ubah path ke direktori database

if (isset($_GET['idk'])) {
    $kategori_id = $_GET['idk'];

    // Periksa apakah ada berita yang terkait dengan kategori ini
    $berita_check = mysqli_query($conn, "SELECT * FROM tb_berita WHERE category_id = '$kategori_id'");
    
    if (mysqli_num_rows($berita_check) > 0) {
        echo '<script>alert("Tidak dapat menghapus kategori ini karena terdapat berita yang terkait.")</script>';
        echo '<script>window.location="data-kategori.php"</script>';
    } else {
        $delete_kategori = mysqli_query($conn, "DELETE FROM tb_category WHERE category_id = '$kategori_id'");
        if ($delete_kategori) {
            echo '<script>alert("Kategori berhasil dihapus")</script>';
            echo '<script>window.location="data-kategori.php"</script>';
        } else {
            echo 'Gagal menghapus kategori: ' . mysqli_error($conn);
        }
    }
} else {
    echo '<script>window.location="data-kategori.php"</script>';
}
?>
