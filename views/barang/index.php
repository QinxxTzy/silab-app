<?php
// Ambil data dari model
$data = $model->getAll();
?>

<div class="card p-3 shadow-sm">
<h4>Data Barang</h4>

<a href="index.php?page=tambah" class="btn btn-primary mb-3">+ Tambah</a>

<table class="table table-bordered table-striped">
<tr>
    <th>No</th>
    <th>Nama</th>
    <th>Kategori</th>
    <th>Stok</th>
    <th>Kondisi</th>
    <th>Aksi</th>
</tr>

<?php $no=1; while($row = mysqli_fetch_assoc($data)): ?>
<tr>
    <td><?php echo $no++; ?></td>
    <td><?php echo $row['nama_barang']; ?></td>
    <td><?php echo $row['nama_kategori']; ?></td>
    <td><?php echo $row['stok']; ?></td>
    <td><?php echo $row['kondisi']; ?></td>
    <td>
        <a href="index.php?page=edit&id=<?php echo $row['id_barang']; ?>" class="btn btn-warning btn-sm">Edit</a>
        
        <span style="position:relative; display:inline-block;">
    <button 
        class="btn btn-danger btn-sm"
        onclick="toggleConfirm<?php echo $row['id_barang']; ?>()">
        Hapus
    </button>

    <div id="confirmBox<?php echo $row['id_barang']; ?>" 
         style="display:none; position:absolute; top:110%; left:0; background:#fff; border:1px solid #ddd; padding:8px 10px; border-radius:8px; box-shadow:0 5px 15px rgba(0,0,0,0.1); z-index:10; min-width:150px;">

        <div class="small text-danger mb-2">Yakin hapus?</div>

        <div class="d-flex gap-1">
            <a href="index.php?action=hapus&id=<?php echo $row['id_barang']; ?>" 
               class="btn btn-danger btn-sm w-100">Ya</a>

            <button class="btn btn-secondary btn-sm w-100" 
                onclick="toggleConfirm<?php echo $row['id_barang']; ?>()">
                Batal
            </button>
        </div>
    </div>
</span>

<script>
function toggleConfirm<?php echo $row['id_barang']; ?>() {
    const el = document.getElementById('confirmBox<?php echo $row['id_barang']; ?>');
    el.style.display = (el.style.display === 'none') ? 'block' : 'none';
}
</script>
    </td>
</tr>
<?php endwhile; ?>
</table>
</div>