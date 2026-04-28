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
        
        <a href="index.php?action=hapus&id=<?php echo $row['id_barang']; ?>" 
           onclick="return confirm('Yakin hapus?')" 
           class="btn btn-danger btn-sm">Hapus</a>
    </td>
</tr>
<?php endwhile; ?>
</table>
</div>