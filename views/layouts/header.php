<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SiLab RPL - Inventaris</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="/silab-app/public/css/style.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm mb-4">
    <div class="container">

        <!-- Brand -->
        <a class="navbar-brand fw-bold" href="/silab-app/index.php">
            SiLab <span class="text-primary">RPL</span>
        </a>

        <!-- Toggle (mobile) -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Content -->
        <div class="collapse navbar-collapse" id="navbarContent">
            <?php if(isset($_SESSION['user'])): ?>
            <div class="ms-auto d-flex align-items-center gap-2">
                <span class="text-light small">
                    User: <?= $_SESSION['user']['username'] ?>
                </span>
                <a href="/silab-app/index.php?action=logout" class="btn btn-outline-danger btn-sm">
                    Logout
                </a>
            </div>
            <?php endif; ?>
        </div>

    </div>
</nav>

<div class="container">