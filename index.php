<?php
session_start();
require_once 'config/database.php';
require_once 'models/BarangModel.php';
require_once 'models/AuthModel.php';

$model = new BarangModel();

// ================= ACTION =================

// LOGIN
if (isset($_GET['action']) && $_GET['action'] == 'login_proses') {

    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    $user = loginUser($username, $password);

    if ($user) {
        $_SESSION['user'] = $user;
        header("Location: index.php");
        exit;
    } else {
        header("Location: index.php?page=login&pesan=gagal");
        exit;
    }
}

// LOGOUT
if (isset($_GET['action']) && $_GET['action'] == 'logout') {
    session_destroy();
    header("Location: index.php?page=login");
    exit;
}

// HAPUS
if (isset($_GET['action']) && $_GET['action'] == 'hapus') {
    $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
    if ($id > 0) {
        $model->delete($id);
    }
    header("Location: index.php?page=home&pesan=hapus");
    exit;
}

// TAMBAH
if (isset($_POST['simpan_barang'])) {

    $nama = isset($_POST['nama']) ? $_POST['nama'] : '';
    $id_kat = isset($_POST['id_kat']) ? (int)$_POST['id_kat'] : 0;
    $stok = isset($_POST['stok']) ? (int)$_POST['stok'] : 0;
    $kondisi = isset($_POST['kondisi']) ? $_POST['kondisi'] : '';

    if ($nama != '' && $id_kat > 0) {
        $model->insert($_POST);
    }

    header("Location: index.php?page=home&pesan=tambah");
    exit;
}

// UPDATE
if (isset($_POST['update_barang'])) {

    $id = isset($_POST['id']) ? (int)$_POST['id'] : 0;

    if ($id > 0) {
        $model->update($id, $_POST);
    }

    header("Location: index.php?page=home&pesan=update");
    exit;
}

// ================= VIEW =================

$page = isset($_GET['page']) ? $_GET['page'] : 'home';

if (!isset($_SESSION['user']) && $page != 'login') {
    header("Location: index.php?page=login");
    exit;
}

if ($page == 'login') {

    include 'views/login.php';

} else {

    include 'views/layouts/header.php';

    // ALERT
    if (isset($_GET['pesan'])) {
        echo "<div class='alert alert-success'>Data berhasil diproses</div>";
    }

    // ================= TAMBAH =================
    if ($page == 'tambah') {
?>
        <div class="card p-4 shadow-sm">
            <h4>Tambah Barang</h4>
            <form method="POST">
                <input type="text" name="nama" class="form-control mb-2" placeholder="Nama Barang" required>
                <input type="number" name="id_kat" class="form-control mb-2" placeholder="ID Kategori" required>
                <input type="number" name="stok" class="form-control mb-2" placeholder="Stok" required>

                <select name="kondisi" class="form-control mb-2">
                    <option value="Baik">Baik</option>
                    <option value="Rusak">Rusak</option>
                </select>

                <button name="simpan_barang" class="btn btn-success">Simpan</button>
                <a href="index.php" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
<?php
    }

    // ================= EDIT =================
    elseif ($page == 'edit') {

        $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
        $data = $model->getById($id);
?>
        <div class="card p-4 shadow-sm">
            <h4>Edit Barang</h4>
            <form method="POST">

                <input type="hidden" name="id" value="<?php echo $data['id_barang']; ?>">

                <input type="text" name="nama" class="form-control mb-2"
                    value="<?php echo $data['nama_barang']; ?>" required>

                <input type="number" name="id_kat" class="form-control mb-2"
                    value="<?php echo $data['id_kategori']; ?>" required>

                <input type="number" name="stok" class="form-control mb-2"
                    value="<?php echo $data['stok']; ?>" required>

                <select name="kondisi" class="form-control mb-2">
                    <option value="Baik" <?php if($data['kondisi']=='Baik') echo 'selected'; ?>>Baik</option>
                    <option value="Rusak" <?php if($data['kondisi']=='Rusak') echo 'selected'; ?>>Rusak</option>
                </select>

                <button name="update_barang" class="btn btn-warning">Update</button>
                <a href="index.php" class="btn btn-secondary">Kembali</a>

            </form>
        </div>
<?php
    }

    // ================= LIST =================
    else {
        include 'views/barang/index.php';
    }

    include 'views/layouts/footer.php';
}
?>