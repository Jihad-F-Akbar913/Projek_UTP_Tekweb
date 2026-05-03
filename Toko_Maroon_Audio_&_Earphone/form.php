<?php
include 'config.php';

$id = $_GET['id'] ?? '';
$name = $price = $description = '';

if($id){
    $id = mysqli_real_escape_string($conn, $id);
    $data = mysqli_query($conn, "SELECT * FROM products WHERE id=$id");
    $row = mysqli_fetch_assoc($data);

    if($row) {
        $name = $row['name'];
        $price = $row['price'];
        $description = $row['description'];
    }
}

if(isset($_POST['submit'])){
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);

    $image = $_FILES['image']['name'];
    $tmp = $_FILES['image']['tmp_name'];

    if($image){
        move_uploaded_file($tmp, "assets/".$image);
    }

    if($id){
        if($image){
            mysqli_query($conn, "UPDATE products SET 
            name='$name', price='$price', description='$description', image='$image'
            WHERE id=$id");
        } else {
            mysqli_query($conn, "UPDATE products SET 
            name='$name', price='$price', description='$description'
            WHERE id=$id");
        }
    } else {
        mysqli_query($conn, "INSERT INTO products (name, price, description, image)
        VALUES ('$name','$price','$description','$image')");
    }

    header("Location: admin.php"); // Dialihkan ke admin setelah simpan
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $id ? 'Edit' : 'Add' ?> Product - Maroon Audio</title>
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

        .card-form {
            background: #1a1a1a;
            border: 1px solid #2a2a2a;
            border-radius: 15px;
            padding: 30px;
        }

        .form-control, .form-control:focus {
            background-color: #222;
            border: 1px solid #333;
            color: #fff;
        }

        .form-control:focus {
            border-color: #ff3b3b;
            box-shadow: none;
        }

        .btn-primary {
            background: #ff3b3b;
            border: none;
            font-weight: 600;
        }

        .btn-primary:hover {
            background: #e63232;
        }

        label {
            color: #adb5bd;
            font-size: 0.9rem;
            margin-bottom: 5px;
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
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="fw-bold"><?= $id ? 'Edit' : 'Add' ?> Product</h2>
                <a href="admin.php" class="btn btn-outline-light btn-sm">Back to Admin</a>
            </div>

            <div class="card-form shadow-sm">
                <form method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label>Product Name</label>
                        <input type="text" class="form-control" name="name" value="<?= $name ?>" placeholder="Enter product name" required>
                    </div>

                    <div class="mb-3">
                        <label>Price</label>
                        <input type="number" class="form-control" name="price" value="<?= $price ?>" placeholder="Example: 150000" required>
                    </div>

                    <div class="mb-3">
                        <label>Description</label>
                        <textarea class="form-control" name="description" rows="5" placeholder="Enter product details..." required><?= $description ?></textarea>
                    </div>

                    <div class="mb-4">
                        <label>Product Image <?= $id ? '<span class="text-warning small">(Leave blank if not changing)</span>' : '' ?></label>
                        <input type="file" name="image" class="form-control" <?= $id ? '' : 'required' ?>>
                    </div>

                    <div class="d-grid">
                        <button name="submit" class="btn btn-primary btn-lg">Save Product</button>
                    </div>
                </form>
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