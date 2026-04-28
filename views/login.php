<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login - SiLab RPL</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { height: 100vh; display: flex; align-items: center; background-color: #f8f9fa; }
        .login-card { width: 100%; max-width: 400px; padding: 15px; margin: auto; }
    </style>
</head>
<body>

<div class="login-card">
    <div class="card shadow-sm">
        <div class="card-body">
            <h3 class="text-center mb-4">SiLab Login</h3>
            
            <?php if(isset($_GET['pesan']) && $_GET['pesan'] == 'gagal'): ?>
                <div class="alert alert-danger text-center">Username atau Password salah!</div>
            <?php endif; ?>

            <form action="index.php?action=login_proses" method="POST">
                <div class="mb-3">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <button type="submit" name="login" class="btn btn-primary w-100">Masuk</button>
            </form>
        </div>
    </div>
</div>

</body>
</html>