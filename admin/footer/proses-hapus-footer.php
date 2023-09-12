<?php
session_start();
include '../db.php';
if ($_SESSION['status_login'] != true) {
    echo '<script>window.location="../login.php"</script>';
}

if (isset($_GET['idf'])) {
    $footer_id = $_GET['idf'];
    
    $queryHapusFooter = "DELETE FROM tb_footer WHERE footer_id = $footer_id";
    $resultHapusFooter = mysqli_query($conn, $queryHapusFooter);

    if ($resultHapusFooter) {
        echo '<script>alert("Footer berhasil dihapus");window.location="data-footer.php"</script>';
    } else {
        echo '<script>alert("Gagal menghapus footer: ' . mysqli_error($conn) . '")</script>';
    }
} else {
    echo '<script>window.location="data-footer.php"</script>';
}
?>
