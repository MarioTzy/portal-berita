$(document).ready(function() {
    // Gunakan AJAX untuk mengambil data tren berita
    $.ajax({
        url: 'data-berita.php', // Sesuaikan dengan URL data-berita.php Anda
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            var trendingNewsHtml = '';

            // Loop melalui data berita dan tampilkan dalam elemen HTML
            $.each(data, function(index, berita) {
                trendingNewsHtml += `
                    <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                        <img class="thumb" src="${berita.berita_img}">
                    </div>
                    <div class="col-md-8 col-lg-8 col-sm-12 col-xs-12">
                        <a href="detail.html">
                            ${berita.judul_berita}
                        </a>
                    </div>
                `;
            });

            // Masukkan HTML hasilnya ke dalam elemen dengan ID trending-news
            $('#trending-news').html(trendingNewsHtml);
        },
        error: function() {
            console.error('Gagal mengambil data tren berita.');
        }
    });
});
