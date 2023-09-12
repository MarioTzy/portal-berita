<?php
// Query untuk mengambil data footer dari database
$queryFooter = "SELECT footer_title FROM tb_footer";
$resultFooter = mysqli_query($conn, $queryFooter);

// Inisialisasi array untuk menampung data footer
$footers = [];

while ($rowFooter = mysqli_fetch_assoc($resultFooter)) {
    $footers[] = $rowFooter;
}
?>

<footer class="navbar navbar-expand-lg navbar-dark bg-dark py-3">
    <div class="container">
        <ul class="navbar-nav ml-auto">
            <?php
            $footerCount = count($footers); // Menghitung jumlah footer
            $index = 0;

            foreach ($footers as $footer) {
                // Tautkan ke detail-footer.php dengan parameter footer_title
                $detailFooterLink = 'detail-footer.php?footer_title=' . urlencode($footer['footer_title']);

                echo '<li class="nav-item" style="margin-right: 5px;"><a href="' . $detailFooterLink . '">' . $footer['footer_title'] . '</a>';

                // Tambahkan separator jika bukan footer terakhir
                if ($index < $footerCount - 1) {
                    echo ' | ';
                }

                echo '</li>';
                $index++;
            }
            ?>
        </ul>
    </div>
</footer>
