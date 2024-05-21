<?php
include_once("function/koneksi.php");


if(isset($_GET['pesanan_id'])){
    $pesanan_id = $_GET['pesanan_id'];

    $sql = "DELETE FROM pesanan WHERE pesanan_id=$pesanan_id";
    $query = mysqli_query($koneksi, $sql);

    if($query){
        echo "<script>window.location.href = '".BASE_URL."index.php?page=my_profile&module=pesanan&action=list';</script>";
    }
}
?>