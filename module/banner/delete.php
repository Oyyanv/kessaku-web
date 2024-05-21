<?php
include_once("function/koneksi.php");


if(isset($_GET['banner_id'])){
    $banner_id = $_GET['banner_id'];

    $sql = "DELETE FROM banner WHERE banner_id=$banner_id";
    $query = mysqli_query($koneksi, $sql);

    if($query){
        echo "<script>window.location.href = '".BASE_URL."index.php?page=my_profile&module=banner&action=list';</script>";
    }
}
?>