<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maroon Audio - Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #0f0f10;
            color: #fff;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .navbar {
            background: #111;
            border-bottom: 1px solid #222;
        }

        .hero-section {
            background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('assets/maroon_audio.png');
            background-size: cover;
            background-position: center;
            height: 60vh;
            display: flex;
            align-items: center;
        }

        .card {
            background: #1a1a1a;
            border: 1px solid #2a2a2a;
            transition: all 0.3s ease;
            border-radius: 10px;
            overflow: hidden;
        }

        .card:hover {
            transform: translateY(-8px);
            border-color: #ff3b3b;
            box-shadow: 0 10px 20px rgba(255, 59, 59, 0.1);
        }

        .product-name {
            color: #ffffff;
            font-weight: 600;
            margin-top: 10px;
            text-decoration: none;
        }

        .btn-primary {
            background: #ff3b3b;
            border: none;
            padding: 10px 25px;
        }

        .btn-primary:hover {
            background: #e63232;
        }

        .promo-banner {
            background: #1a1a1a;
            border: 1px solid #222;
            border-radius: 12px;
            transition: 0.3s;
        }
        
        .promo-banner:hover {
            background: #222;
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

<!-- HERO -->
<section class="hero-section">
    <div class="container">
        <div class="col-lg-6">
            <h1 class="display-3 fw-bold">Premium Audio Experience</h1>
            <p class="lead text-light">Upgrade your sound. Feel every detail with our curated collection.</p>
            <a href="products.php" class="btn btn-primary btn-lg mt-3">Shop Now</a>
        </div>
    </div>
</section>

<!-- PRODUCTS SECTION -->
<section class="container mt-5 pt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">New Arrivals</h2>
        <a href="products.php" class="text-danger text-decoration-none">View All →</a>
    </div>

    <div class="row">
        <?php
        $result = mysqli_query($conn, "SELECT * FROM products LIMIT 8");
        while($row = mysqli_fetch_assoc($result)):
        ?>
        <div class="col-6 col-md-3 mb-4">
            <a href="detail.php?id=<?= $row['id']; ?>" class="text-decoration-none">
                <div class="card p-3 text-center h-100">
                    <img src="assets/<?= $row['image']; ?>" class="img-fluid rounded" style="height:200px; object-fit:cover;" alt="<?= $row['name']; ?>">
                    <div class="card-body px-0 pb-0">
                        <h6 class="product-name text-truncate"><?= $row['name']; ?></h6>
                        <p class="text-secondary small">Rp <?= number_format($row['price'], 0, ',', '.'); ?></p>
                    </div>
                </div>
            </a>
        </div>
        <?php endwhile; ?>
    </div>
</section>

<!-- BANNER SECTION -->
<section class="container mt-5">
    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="p-5 promo-banner text-center">
                <h3 class="fw-bold">Immersive Sound</h3>
                <p class="text-secondary">Experience audio like never before.</p>
                <a href="products.php" class="btn btn-outline-danger mt-2">Explore Now</a>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="p-5 promo-banner text-center">
                <h3 class="fw-bold">Wireless Freedom</h3>
                <p class="text-secondary">Cut the cords, keep the quality.</p>
                <a href="products.php" class="btn btn-outline-danger mt-2">Explore Now</a>
            </div>
        </div>
    </div>
</section>

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