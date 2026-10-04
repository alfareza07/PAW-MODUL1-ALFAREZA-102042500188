<?php
$produk = [
    [
        "nama" => "Monitor 24 Inch",
        "kategori" => "Monitor",
        "harga" => 1800000,
        "stok" => 4
    ],
    [
        "nama" => "Laptop Productivity",
        "kategori" => "Laptop",
        "harga" => 8500000,
        "stok" => 3
    ],
    [
        "nama" => "Keyboard Mechanical",
        "kategori" => "Keyboard",
        "harga" => 750000,
        "stok" => 5
    ],
    [
        "nama" => "Mouse Wireless",
        "kategori" => "Mouse",
        "harga" => 450000,
        "stok" => 0
    ],
    [
        "nama" => "Headset Gaming",
        "kategori" => "Audio",
        "harga" => 1200000,
        "stok" => 7
    ],
    [
        "nama" => "Webcam Full HD",
        "kategori" => "Camera",
        "harga" => 950000,
        "stok" => 2
    ]
];

$jumlahProduk = count($produk);

function rupiah($harga)
{
    return "Rp" . number_format($harga, 0, ',', '.');
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Cia Store</title>

    <link rel="stylesheet" href="style.css">
</head>

<body>

    <!-- ================= NAVBAR ================= -->
    <nav class="navbar">

        <div class="logo">
            Cia Store
        </div>

        <div class="menu">
            <a href="#">Home</a>
            <a href="#produk">Products</a>
            <a href="#footer">About</a>
        </div>

    </nav>


    <!-- ================= HERO ================= -->
    <section class="hero">

        <div class="hero-small">
            CIA STORE
        </div>

        <h1>Simple Tech Store.</h1>

        <p>
            Temukan berbagai perangkat dan aksesoris teknologi
            yang sesuai dengan kebutuhanmu.
        </p>

        <a href="#produk" class="hero-button">
            Lihat Produk
        </a>

    </section>


    <!-- ================= KATALOG PRODUK ================= -->
    <main class="container" id="produk">

        <div class="catalog-header">

            <div class="catalog-title">
                <small>Our Products</small>

                <h2>
                    Katalog Produk
                </h2>
            </div>

            <div class="total-produk">

                Total Produk:
                <strong>
                    <?php echo $jumlahProduk; ?>
                </strong>

            </div>

        </div>


        <!-- ================= GRID PRODUK ================= -->
        <div class="produk-grid">

            <?php foreach ($produk as $item): ?>

                <?php
                $nama = $item["nama"];
                $kategori = $item["kategori"];
                $harga = $item["harga"];
                $stok = $item["stok"];

                if ($harga >= 1000000) {

                    $persentaseDiskon = 10;

                    $jumlahDiskon = $harga * 0.10;

                    $hargaSetelahDiskon = $harga - $jumlahDiskon;

                    $mendapatDiskon = true;

                } else {

                    $mendapatDiskon = false;

                    $hargaSetelahDiskon = $harga;
                }


                // ================= STATUS STOK =================

                if ($stok > 0) {

                    $status = "Tersedia";
                    $classStatus = "tersedia";

                } else {

                    $status = "Stok Habis";
                    $classStatus = "habis";
                }
                ?>


                <!-- ================= CARD PRODUK ================= -->
                <div class="card">

                    <div class="kategori">
                        <?php echo $kategori; ?>
                    </div>

                    <h3>
                        <?php echo $nama; ?>
                    </h3>


                    <!-- ================= HARGA ================= -->

                    <?php if ($mendapatDiskon): ?>

                        <div class="diskon">

                            DISKON
                            <?php echo $persentaseDiskon; ?>%

                        </div>

                        <div class="harga-normal">

                            <?php echo rupiah($harga); ?>

                        </div>

                        <div class="harga">

                            <?php echo rupiah($hargaSetelahDiskon); ?>

                        </div>

                    <?php else: ?>

                        <div class="harga">

                            <?php echo rupiah($harga); ?>

                        </div>

                    <?php endif; ?>


                    <!-- ================= STOK ================= -->

                    <div class="info-stok">

                        <div class="stok">

                            Stok:
                            <?php echo $stok; ?>

                        </div>

                        <div class="status <?php echo $classStatus; ?>">

                            <?php echo $status; ?>

                        </div>

                    </div>


                    <!-- ================= TOMBOL ================= -->

                    <?php if ($stok > 0): ?>

                        <a href="#" class="beli">

                            Beli Sekarang

                        </a>

                    <?php else: ?>

                        <div class="disabled">

                            Tidak Tersedia

                        </div>

                    <?php endif; ?>

                </div>

            <?php endforeach; ?>

        </div>

    </main>


    <!-- ================= FOOTER ================= -->

    <footer id="footer">

        <p>

            &copy; 2026
            <strong>Cia Store</strong>.
            Simple Tech Store.

        </p>

    </footer>

</body>

</html>