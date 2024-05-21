<?php
include_once("function/koneksi.php");


if(isset($_GET['kota_id'])){
    $kota_id = $_GET['kota_id'];

    $sql = "DELETE FROM kota WHERE kota_id=$kota_id";
    $query = mysqli_query($koneksi, $sql);

    if($query){
        echo "<script>window.location.href = '".BASE_URL."index.php?page=my_profile&module=kota&action=list';</script>";
    }
}
?>