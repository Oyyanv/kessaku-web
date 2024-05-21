<?php
include_once("function/koneksi.php");


if(isset($_GET['barang_id'])){
    $barang_id = $_GET['barang_id'];

    $sql = "DELETE FROM barang WHERE barang_id=$barang_id";
    $query = mysqli_query($koneksi, $sql);

    if($query){
        echo "<script>window.location.href = '".BASE_URL."index.php?page=my_profile&module=barang&action=list';</script>";
    }
}
?>