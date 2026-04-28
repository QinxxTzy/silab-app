<?php
require_once 'config/database.php';

class BarangModel {

    public function getAll() {
        global $conn;
        $query = "
            SELECT barang.*, kategori.nama_kategori 
            FROM barang 
            JOIN kategori ON barang.id_kategori = kategori.id_kategori
        ";
        return mysqli_query($conn, $query);
    }

    public function getById($id) {
        global $conn;
        $id = (int)$id;

        $query = "SELECT * FROM barang WHERE id_barang=".$id;
        $result = mysqli_query($conn, $query);

        return mysqli_fetch_assoc($result);
    }

    public function insert($data) {
        global $conn;

        $nama     = mysqli_real_escape_string($conn, $data['nama']);
        $kategori = (int)$data['id_kat'];
        $stok     = (int)$data['stok'];
        $kondisi  = mysqli_real_escape_string($conn, $data['kondisi']);

        $query = "
            INSERT INTO barang (nama_barang, id_kategori, stok, kondisi)
            VALUES ('".$nama."', '".$kategori."', '".$stok."', '".$kondisi."')
        ";

        mysqli_query($conn, $query);
    }

    public function update($id, $data) {
        global $conn;

        $id       = (int)$id;
        $nama     = mysqli_real_escape_string($conn, $data['nama']);
        $kategori = (int)$data['id_kat'];
        $stok     = (int)$data['stok'];
        $kondisi  = mysqli_real_escape_string($conn, $data['kondisi']);

        $query = "
            UPDATE barang SET
                nama_barang='".$nama."',
                id_kategori='".$kategori."',
                stok='".$stok."',
                kondisi='".$kondisi."'
            WHERE id_barang=".$id;

        mysqli_query($conn, $query);
    }

    public function delete($id) {
        global $conn;

        $id = (int)$id;

        $query = "DELETE FROM barang WHERE id_barang=".$id;
        mysqli_query($conn, $query);
    }
}
?>