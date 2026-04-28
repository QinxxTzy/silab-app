<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SiLab RPL - Inventaris</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/silab-app/public/css/style.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container">
        <a class="navbar-brand fw-bold" href="/silab-app/index.php">SiLab <span class="text-primary">RPL</span></a>
        <?php if(isset($_SESSION['user'])): ?>
        <div class="ms-auto">
            <span class="text-light me-3">User: <?= $_SESSION['user']['username'] ?></span>
            <a href="/silab-app/index.php?action=logout" class="btn btn-outline-danger btn-sm">Logout</a>
        </div>
        <?php endif; ?>
    </div>
</nav>
<div class="container">