<?php 
include 'config.php'; 

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$data = mysqli_query($conn, "SELECT * FROM products WHERE id=$id");
$row = mysqli_fetch_assoc($data);

if (!$row) {
    echo "<script>alert('Produk tidak ditemukan!'); window.location='products.php';</script>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $row['name']; ?> - Detail</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #0f0f10;
            color: #fff;
            font-family: 'Segoe UI', sans-serif;
        }

        .navbar {
            background: #111;
            border-bottom: 1px solid #222;
        }

        .card-custom {
            background: #1a1a1a;
            border: 1px solid #2a2a2a;
            border-radius: 15px;
            padding: 30px;
        }

        .img-container {
            background: #222;
            border-radius: 12px;
            padding: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .img-detail {
            max-height: 400px;
            width: auto;
            object-fit: contain;
        }

        .product-title {
            color: #ffffff;
            font-size: 2.5rem;
            font-weight: 700;
        }

        .product-price {
            color: #ff3b3b;
            font-size: 1.8rem;
            font-weight: 600;
        }

        .description-text {
            color: #adb5bd;
            line-height: 1.8;
            font-size: 1.1rem;
        }

        .btn-buy {
            background: #ff3b3b;
            border: none;
            padding: 12px 30px;
            font-weight: bold;
        }

        .btn-buy:hover {
            background: #e63232;
        }
    </style>
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar px-4 py-3 sticky-top">
    <a href="index.php" class="text-white fw-bold text-decoration-none fs-4">Maroon Audio</a>
    <div class="ms-auto">
        <a href="index.php" class="btn btn-sm btn-outline-light me-2">Home</a>
        <a href="products.php" class="btn btn-sm btn-outline-light me-2">Products</a>
        <a href="admin.php" class="btn btn-sm btn-primary">Admin</a>
    </div>
</nav>

<div class="container mt-5 mb-5">
    <div class="card-custom">
        <div class="row align-items-center">
            <!-- Gambar Produk -->
            <div class="col-md-6 mb-4 mb-md-0 text-center">
                <div class="img-container">
                    <img src="assets/<?= $row['image']; ?>" class="img-fluid img-detail" alt="<?= $row['name']; ?>">
                </div>
            </div>
            
            <!-- Info Produk-->
            <div class="col-md-6 px-md-5">
                <h1 class="product-title mb-2"><?= $row['name']; ?></h1>
                <p class="product-price mb-4">Rp <?= number_format($row['price'], 0, ',', '.'); ?></p>
                
                <div class="d-grid gap-2 d-md-flex">
                    <a href="#" class="btn btn-buy btn-lg text-white">Add to Cart</a>
                    <a href="products.php" class="btn btn-outline-light btn-lg">Back</a>
                </div>
            </div>
        </div>

        <!-- Deskripsi Produk-->
        <div class="row mt-5">
            <div class="col-12">
                <hr style="border-color: #333;">
                <h4 class="text-white mb-3 fw-bold">Product Description</h4>
                <div class="description-text">
                    <?= nl2br($row['description']); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- FOOTER -->
<footer class="mt-auto pt-5 pb-3" style="background:#111; border-top:1px solid #222;">
    <div class="container">
        <div class="row">
            <!-- BRAND -->
            <div class="col-md-4 mb-4 text-center text-md-start">
                <h5 class="fw-bold text-white">Maroon Audio</h5>
                <p class="text-secondary small">
                    Premium audio gear untuk pengalaman mendengar terbaik.
                    Dirancang untuk kualitas dan gaya hidup modern.
                </p>
            </div>

            <!-- NAVIGATION -->
            <div class="col-md-4 mb-4 text-center text-md-start">
                <h6 class="fw-bold text-white">Navigation</h6>
                <ul class="list-unstyled">
                    <li><a href="index.php" class="text-secondary text-decoration-none small">Home</a></li>
                    <li><a href="products.php" class="text-secondary text-decoration-none small">Products</a></li>
                    <li><a href="admin.php" class="text-secondary text-decoration-none small">Admin</a></li>
                </ul>
            </div>

            <!-- CONTACT / SOCIAL -->
            <div class="col-md-4 mb-4 text-center text-md-start">
                <h6 class="fw-bold text-white">Connect</h6>
                <p class="text-secondary small mb-2">Email: maroonaudio@email.com</p>

                <div class="d-flex gap-2 justify-content-center justify-content-md-start">
                    <a href="#" class="btn btn-outline-light btn-sm">Shopee</a>
                    <a href="#" class="btn btn-outline-light btn-sm">Tokopedia</a>
                </div>
            </div>
        </div>

        <hr style="border-color:#222;">

        <div class="text-center text-secondary small">
            © <?= date('Y'); ?> Maroon Audio. All rights reserved.
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>