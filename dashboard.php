<?php
include "koneksi.php";

/* JUMLAH ARTICLE */
$sql_article = "SELECT COUNT(*) AS total FROM article";
$query_article = mysqli_query($conn, $sql_article);
$data_article = mysqli_fetch_assoc($query_article);
$jumlah_article = $data_article['total'];

/* JUMLAH RESEP */
$sql_resep = "SELECT COUNT(*) AS total FROM article";
$query_resep = mysqli_query($conn, $sql_resep);
$data_resep = mysqli_fetch_assoc($query_resep);
$jumlah_resep = $data_resep['total'];
?>

<div class="row row-cols-1 row-cols-md-4 g-4 justify-content-center pt-4">

    <div class="col">
        <div class="card border border-danger mb-3 shadow" style="max-width:18rem;">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="card-title">
                        <i class="bi bi-newspaper"></i> Article
                    </h5>
                    <span class="badge rounded-pill text-bg-danger fs-2">
                        <?php echo $jumlah_article; ?>
                    </span>
                </div>
            </div>
        </div>
    </div>

    <div class="col">
        <div class="card border border-success mb-3 shadow" style="max-width:18rem;">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="card-title">
                        <i class="bi bi-journal-text"></i> Resep
                    </h5>
                    <span class="badge rounded-pill text-bg-success fs-2">
                        <?php echo $jumlah_resep; ?>
                    </span>
                </div>
            </div>
        </div>
    </div>

</div>