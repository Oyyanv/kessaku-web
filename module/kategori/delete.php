<?php
include_once("function/koneksi.php");


if(isset($_GET['kategori_id'])){
    $kategori_id = $_GET['kategori_id'];

    $sql = "DELETE FROM kategori WHERE kategori_id=$kategori_id";
    $query = mysqli_query($koneksi, $sql);

    if($query){
        echo "<script>window.location.href = '".BASE_URL."index.php?page=my_profile&module=kategori&action=list';</script>";
    }
}
?>