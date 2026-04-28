<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login - SiLab RPL</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* ===== BACKGROUND ANIMASI ===== */
body {
    height: 100vh;
    display: flex;
    align-items: center;
    background: linear-gradient(-45deg, #667eea, #764ba2, #ff758c, #42e695);
    background-size: 400% 400%;
    animation: gradientBG 10s ease infinite;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

/* animasi gradient */
@keyframes gradientBG {
    0% {background-position: 0% 50%;}
    50% {background-position: 100% 50%;}
    100% {background-position: 0% 50%;}
}

/* ===== CARD LOGIN ===== */
.login-card {
    width: 100%;
    max-width: 400px;
    padding: 15px;
    margin: auto;
    animation: fadeInUp 0.8s ease;
}

/* card effect */
.card {
    border: none;
    border-radius: 20px;
    backdrop-filter: blur(12px);
    background: rgba(255,255,255,0.9);
    box-shadow: 0 15px 40px rgba(0,0,0,0.2);
    transition: 0.3s;
}

.card:hover {
    transform: translateY(-5px) scale(1.01);
}

/* ===== TITLE ===== */
h3 {
    font-weight: bold;
    background: linear-gradient(45deg, #667eea, #ff758c);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

/* ===== INPUT ===== */
.form-control {
    border-radius: 12px;
    transition: 0.3s;
}

.form-control:focus {
    border-color: #667eea;
    box-shadow: 0 0 10px rgba(102,126,234,0.4);
}

/* ===== BUTTON ===== */
.btn-primary {
    border-radius: 12px;
    background: linear-gradient(45deg, #667eea, #764ba2);
    border: none;
    transition: 0.3s;
}

.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 20px rgba(102,126,234,0.4);
}

/* ===== ALERT ===== */
.alert {
    border-radius: 10px;
    animation: shake 0.4s;
}

/* efek shake kalau error */
@keyframes shake {
    0% {transform: translateX(0);}
    25% {transform: translateX(-5px);}
    50% {transform: translateX(5px);}
    75% {transform: translateX(-5px);}
    100% {transform: translateX(0);}
}

/* ===== ANIMASI MASUK ===== */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* ===== EXTRA ===== */
label {
    font-weight: 500;
}

::placeholder {
    font-size: 0.9rem;
}

/* smooth semua */
* {
    transition: all 0.2s ease-in-out;
}
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