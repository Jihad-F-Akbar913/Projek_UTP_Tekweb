<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Products - Maroon Audio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/style.css">
    <style>
        html, body {
            height: 100%;
            margin: 0;
        }

        body {
            background: #0f0f10;
            color: #fff;
            font-family: 'Segoe UI', sans-serif;
            display: flex;
            flex-direction: column;
        }

        .main-content {
            flex: 1 0 auto;
            padding-bottom: 50px;
        }

        footer {
            flex-shrink: 0; 
        }

        .navbar {
            background: #111;
            border-bottom: 1px solid #222;
        }

        .card {
            background: #1a1a1a;
            border: 1px solid #2a2a2a;
            transition: 0.3s;
            border-radius: 12px;
            overflow: hidden;
        }

        .card:hover {
            transform: translateY(-5px);
            border-color: #ff3b3b;
            box-shadow: 0 10px 20px rgba(255, 59, 59, 0.1);
        }

        .product-name {
            color: #ffffff; 
            font-weight: 600;
            margin-top: 10px;
        }

        .btn-primary {
            background: #ff3b3b;
            border: none;
            font-weight: 500;
        }

        .btn-primary:hover {
            background: #e63232;
        }

        .product-img {
            height: 250px; 
            object-fit: cover;
            border-radius: 8px;
            background: #fff;
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

<div class="main-content">
    <div class="container mt-5">
        <h2 class="mb-4 fw-bold">All Products</h2>

        <div class="row">
            <?php
            $result = mysqli_query($conn, "SELECT * FROM products");
            if(mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)){
            ?>
            <div class="col-md-4 mb-4">
                <div class="card p-3 h-100">
                    <img src="assets/<?= $row['image']; ?>" class="product-img mb-3 w-100">
                    <h5 class="product-name text-truncate"><?= $row['name']; ?></h5>
                    <p class="text-secondary">Rp <?= number_format($row['price'], 0, ',', '.'); ?></p>

                    <div class="mt-auto">
                        <a href="detail.php?id=<?= $row['id']; ?>" class="btn btn-primary w-100">
                            View Details
                        </a>
                    </div>
                </div>
            </div>
            <?php 
                } 
            } else {
                echo "<div class='col-12 text-center py-5'><p class='text-secondary fs-4'>No products found.</p></div>";
            }
            ?>
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