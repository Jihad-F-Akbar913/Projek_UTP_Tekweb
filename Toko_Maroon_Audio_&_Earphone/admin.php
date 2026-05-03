<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Maroon Audio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        html, body {
            height: 100%;
        }

        body {
            background: #0f0f10;
            color: #fff;
            font-family: 'Segoe UI', sans-serif;
            display: flex;
            flex-direction: column;
        }

        .main-content {
            flex: 1;
        }

        .navbar {
            background: #111;
            border-bottom: 1px solid #222;
        }

        .table-admin {
            background: #1a1a1a;
            border: 1px solid #2a2a2a;
            border-radius: 12px;
            overflow: hidden;
        }

        .table-dark {
            --bs-table-bg: #1a1a1a;
            --bs-table-border-color: #2a2a2a;
        }

        .btn-primary {
            background: #ff3b3b;
            border: none;
        }

        .btn-primary:hover {
            background: #e63232;
        }

        .btn-warning {
            background: #ffc107;
            border: none;
            color: #000;
        }

        .table hover tbody tr:hover {
            background-color: #222 !important;
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

<!-- MAIN CONTENT -->
<div class="main-content">
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold">Admin Dashboard</h2>
            <a href="form.php" class="btn btn-primary px-4">+ Add New Product</a>
        </div>

        <div class="table-admin p-3">
            <div class="table-responsive">
                <table class="table table-dark table-hover align-middle">
                    <thead class="text-secondary small text-uppercase">
                        <tr>
                            <th class="ps-3">Product Name</th>
                            <th>Price</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $result = mysqli_query($conn, "SELECT * FROM products");
                        if(mysqli_num_rows($result) > 0) {
                            while($row = mysqli_fetch_assoc($result)){
                        ?>
                        <tr>
                            <td class="ps-3 fw-semibold text-white"><?= $row['name']; ?></td>
                            <td class="text-secondary">Rp <?= number_format($row['price'], 0, ',', '.'); ?></td>
                            <td class="text-center">
                                <a href="form.php?id=<?= $row['id']; ?>" class="btn btn-warning btn-sm px-3 me-1">Edit</a>
                                <a href="delete.php?id=<?= $row['id']; ?>" class="btn btn-danger btn-sm px-3" onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">Delete</a>
                            </td>
                        </tr>
                        <?php 
                            } 
                        } else {
                            echo "<tr><td colspan='3' class='text-center py-4 text-secondary'>No products available.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
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