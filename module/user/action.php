<?php
    
    include_once("../../function/koneksi.php");
    include_once("../../function/helper.php");

    $user_id = $_POST['user_id'];

    $nama       = $_POST['nama'];
    $email      = $_POST['email'];
    $phone      = $_POST['phone'];
    $alamat     = $_POST['alamat'];
    $status     = $_POST['status'];
    $level      = $_POST['level'];

            mysqli_query($koneksi, "UPDATE user SET nama='$nama',
                                                    email='$email',
                                                    phone='$phone',
                                                    alamat='$alamat',
                                                    level='$level',
                                                    status='$status'
                                                    WHERE user_id='$user_id'");

    header("location: ".BASE_URL."index.php?page=my_profile&module=user&action=list");
?> 