<?php

    include_once("function/helper.php");
    include_once("function/koneksi.php");

 $level         = "costumer";
 $status        = "on";
 $nama          = $_POST['nama'];
 $email         = $_POST['email'];
 $alamat        = $_POST['alamat'];
 $phone         = $_POST['phone'];
 $password      = $_POST['password'];
 $re_password   = $_POST['re_password'];

    unset($_POST['password']);
    unset($_POST['re_password']);
    $dataForm = http_build_query($_POST);

    $query = mysqli_query($koneksi, "SELECT * FROM  user WHERE email='$email'");

    if(empty($nama) || empty($email) || empty($phone) || empty ($alamat) || empty($password)){
       header("location: ".BASE_URL. "register.php?page=register&notif=require&$dataForm");
    }elseif($password != $re_password){
        header("location: ".BASE_URL. "register.php?page=register&notif=password&$dataForm");
    }elseif(mysqli_num_rows($query) == 1){
        header("location: ".BASE_URL. "register.php?page=register&notif=email&$dataForm");
    }else{
        $password = md5($password);
        mysqli_query($koneksi, "INSERT INTO user (level, nama, email, alamat, phone, password, status)
                                        VALUES ('$level', '$nama', '$email', '$alamat', '$phone', '$password', '$status') ");

        header("location:".BASE_URL."login.php");
    }
    
?>