<?php

    session_start();
    include_once("function/koneksi.php");
    include_once("function/helper.php");
    $page = isset($_GET['page']) ? $_GET['page'] : false;

    $user_id = isset ($_SESSION['user_id']) ? $_SESSION['user_id'] : false;
    $nama = isset ($_SESSION['nama']) ? $_SESSION['nama'] : false;
    $level = isset ($_SESSION['level']) ? $_SESSION['level'] : false;
    $keranjang = isset($_SESSION['keranjang']) ? $_SESSION['keranjang'] : array();
    $totalBarang = count($keranjang);
    

    if($user_id == false){
        session_start();
        $_SESSION['proses_pesanan.php'] = true;
        header("location: " .BASE_URL."login.php?page=login");
        exit;
    }


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kessaku</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="index2.css">
    <link rel="icon" href="image/btr.jfif" type="jfif">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat&display=swap');

        @media only screen and (min-width: 768px) {
            .parent:hover .child {
                opacity: 1;
                height: auto;
                overflow: none;
                transform: translateY(0);
            }

            .child {
                opacity: 0;
                height: 0;
                overflow: hidden;
                transform: translateY(-10%);
            }
        }

        ::-webkit-scrollbar {
            display: none;
        }
    </style>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'ECF2FC': '#ECF2FC',
                        'BDBDBD': '#BDBDBD',
                        'primary': '#161B40',
                        'oren': '#efa500',
                        'pink': '#f40058',
                        'butonblue': '#43bee5',
                        'hijo': '#41b853',
                    },
                }
            }
        }
    </script>
</head>

<body class="bg-ECF2FC">
    <!-- nav -->
    <nav class="relative px-4 py-[1.7%] flex justify-between items-center bg-white shadow-xs sticky top-0 z-50">
        <a class="text-3xl font-semibold leading-none ml-12 select-none">
            KESSAKU <span class="text-oren">|</span><span class='font-light'> Keranjang</span>
        </a>
        <div class="lg:hidden">
            <button class="navbar-burger flex items-center text-black p-3">
                <svg class="block h-4 w-4 fill-current" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <title>Mobile menu</title>
                    <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
                </svg>
            </button>
        </div>
        <!-- menu -->

        <ul
            class="hidden md:px-2 ml-auto md:flex md:space-x-2 absolute md:relative top-full left-0 right-0 lg:space-x-12 ">
            <!-- akun -->
            <li class=""><a class="text-yellow-400 font-semibold" href="index.php">Home</a></li>
            <li class="relative parent">
                <?php
                    if($user_id){
                        echo "<a class='select-none flex justify-between md:inline-flex font-semibold hover:text-gray-700 items-center space-x-2'>
                    <span>$nama</span>
                    <svg xmlns='http://www.w3.org/2000/svg' class='w-2 h-4 fill-current pt-1' viewBox='0 0 24 24'><path d='M0 7.33l2.829-2.83 9.175 9.339 9.167-9.339 2.829 2.83-11.996 12.17z'/></svg>
                </a>
                <ul class='child transition md:absolute top-[120%] right-0 md:w-48 bg-white md:shadow-lg border-t-2 border-black'>
                <li>
                 <a href='index.php?page=my_profile&module=pesanan&action=list' class='flex px-4 py-3 hover:bg-gray-100'>
                    Profile
                    </a>
                </li>
                </ul>";
            }else{
                echo "<a class='select-none flex justify-between md:inline-flex mt-3 font-semibold hover:text-gray-700 items-center space-x-2'>
                <span>Akun</span>
                <svg xmlns='http://www.w3.org/2000/svg' class='w-2 h-4 fill-current pt-1' viewBox='0 0 24 24'><path d='M0 7.33l2.829-2.83 9.175 9.339 9.167-9.339 2.829 2.83-11.996 12.17z'/></svg>
            </a>
                        <ul class='child transition md:absolute top-[120%] right-0 md:w-48 bg-white md:shadow-lg border-t-2 border-black'>
                    <li>
                        <a href='login.php' class='flex px-4 py-3 hover:bg-gray-100'>
                            Masuk
                        </a>
                    </li>
                    <li>
                        <a href='register.php' class='flex px-4 py-3 hover:bg-gray-100'>
                            Register
                        </a>
                    </li>
                </ul>";
                    }
                ?>

            </li>

            <li class=""><a class="text-sm font-semibold hover:text-gray-700 mt-2" href="keranjang.php">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </a>
            </li>
            <!-- navbar2 -->
    </nav>
    <div class="navbar-menu relative z-50 hidden">
        <div class="navbar-backdrop fixed inset-0 bg-gray-800 opacity-25"></div>
        <nav
            class="fixed top-0 left-0 bottom-0 flex flex-col w-5/6 max-w-sm py-6 px-6 bg-white border-r overflow-y-auto">
            <div class="flex items-center mb-8">
                <!-- logo -->
                <a class="mr-auto text-3xl font-semibold leading-none" href="#">
                    KESSAKU
                </a>
                <button class="navbar-close">
                    <svg class="h-6 w-6 text-gray-400 cursor-pointer hover:text-gray-500"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>
            </div>
            </li>
            <!-- akun -->
            <div>
                <ul>
                    <?php
                        if($user_id){
                            echo "<li class='mb-1'>
                            <li>
                            <a href='index.php?' class='flex px-4 py-3 text-yellow-300 bg-white'>
                                Home
                            </a>
                            </li>
                            <a class='block p-4 text-sm font-semibold hover:text-gray-700' select-none>$nama</a>
                            <ul>
                            <li>
                            <a href='index.php?page=my_profile&module=pesanan&action=list' class='flex px-4 py-3 hover:text-gray-700 bg-white'>
                                Profile
                            </a>
                        </li>
                            </ul>
                        </li>";
                        }else{
                            echo "<li class='mb-1'>
                            <a class='block p-4 text-sm font-semibold hover:text-gray-700 select-none'>Akun</a>
                            <ul>
                            <li>
                            <a href='login.php' class='flex px-4 py-3 hover:text-gray-700 bg-white'>
                                Masuk
                            </a>
                        </li>
                        <li>
                            <a href='register.php' class='flex px-4 py-3 hover:text-gray-700 bg-white'>
                                 Register
                            </a>
                        </li>
                            </ul>
                        </li>";
                        }
                    ?>
                    <!-- seervice -->
                    <li class="mb-1">
                        <a class="block p-4 text-sm font-semibold hover:text-gray-700" href="#">Service</a>
                    </li>
                    <!-- cart -->
                </ul>
            </div>
        </nav>
    </div>
    <!-- content -->
    <div class="">
        <div id="content">
            <?php
        
        if($totalBarang == 0){
            echo "<div class=' w-9/12 mx-auto'>
                      <img src='image/tidakadabarang.png' class=' flex justify-center items-center opacity-75'>
                  </div>";
        } else {
            
            
            $no=1;
            echo "<div class='overflow-x-auto mt-2'>
    <table id='barangTable' class='mx-auto max-w-full w-[98%] whitespace-nowrap rounded-sm bg-white divide-y divide-gray-300 overflow-hidden'>
        <thead class='bg-gray-600'>
            <tr>
                <th class='px-6 py-2 text-xs text-white' style='font-size: 12px;width: 30px;'>No</th>
                <th class='px-6 py-2 text-xs text-white'>Gambar</th>
                <th class='px-6 py-2 text-xs text-white'>Barang</th>
                <th class='px-6 py-2 text-xs text-white'>Qty</th>
                <th class='px-6 py-2 text-xs text-white'>Harga Satuan</th>
                <th class='px-6 py-2 text-xs text-white'>Total</th>
                <th class='px-6 py-2 text-xs text-white'>Opsi</th>
            </tr>
        </thead>
        <tbody>";

    $subtotal = 0;
    foreach($keranjang AS $key => $value){
        $barang_id = $key;
        $nama_barang = $value['nama_barang'];
        $quantity = $value['quantity'];
        $gambar   = $value['gambar'];
        $harga    = $value['harga'];

        $total = $quantity * $harga;
        $subtotal = $subtotal + $total;

        echo "<tr>
        <td class='px-6 py-4 text-sm text-gray-500 text-center border'>$no</td>
        <td class='px-6 py-4 text-sm text-gray-500 text-center border flex justify-center'>
        <img src='".BASE_URL."image/barang/$gambar' style='height:100px;' /></td>
        <td class='px-6 py-4 text-sm text-gray-500 text-center border'>$nama_barang</td>
        <td class='px-6 py-4 text-sm text-gray-500 text-center border'>
            <input type='text' name='$barang_id' value='$quantity' class='w-12 text-center update-quantity' />
        </td>
        <td class='px-6 py-4 text-sm text-gray-500 text-center border'>".rupiah($harga)."</td>
        <td class='px-6 py-4 text-sm text-gray-500 text-center border'>".rupiah($total)."</td>
        <td class='px-6 py-4 text-sm text-gray-500 border'>
            <div class='flex justify-center'>
                <a href='hapus_item.php?barang_id=$barang_id'>
                    <svg xmlns='http://www.w3.org/2000/svg' class='w-6 h-6 text-red-600' fill='none' viewBox='0 0 24 24' stroke='currentColor'>
                        <path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16' />
                    </svg>
                </a>
            </div>
        </td>
    </tr>";
                $no++;
            }

           
            
                  echo "</tbody></table></div>";
                // subtotal
             echo "<div class='md:container md:mx-auto'>
                <div class='flex justify-end pb-10 py-2 px-5'>
                    <div cosplan='5' class=''><b>Sub Total&nbsp;</b></div>
                    <div class=''><b></b>".rupiah($subtotal)."</div>
                  </div>";
                // opsi lanjut
            echo "<div class='flex justify-between p-4 mb-10'>
                    <a class='bg-pink text-white py-2 px-5 border rounded' href='".BASE_URL."index.php'>Kembali</a>
                    <a class='bg-hijo text-white py-2 px-5 border rounded' href='".BASE_URL."index.php?page=data_pemesan'>Lanjut Pemesanan</a>
                    </div>";
        }
    ?>
        </div>
    </div>
    <script>
        $(document).ready(function() {
  $("body").on("input keyup", ".update-quantity", function(e) {
    if (e.which === 13) { // enter key
      e.preventDefault();
      const barang_id = $(this).attr("name");
      const value = $(this).val();

      if (value !== "") {
        $.ajax({
          method: "POST",
          url: "update_keranjang.php",
          data: { barang_id: barang_id, value: value }
        })
        .done(function() {
          location.reload();
        })
        .fail(function() {
          console.log("Failed to update quantity.");
        });
      }
    }
  });
});

</script>
<!-- footer -->

<footer class="relative px-4 pt-4 flex justify-between items-center bg-primary text-white">
        <div class="container mx-auto px-4">
            <div class="flex flex-wrap text-left lg:text-left">
                <div class="w-full lg:w-6/12 px-4">
                    <h4 class="text-3xl fonat-semibold">KESSAKU</h4>
                    <h5 class="text-lg mt-0 mb-2 text-blueGray-600">
                        Si Paling Wibu Se Xd
                    </h5>
                </div>
                <div class="w-full lg:w-6/12 px-4">
                    <div class="flex flex-wrap items-top mb-6 justify-end">
                        <div class="w-full lg:w-4/12 px-4">
                            <span class="block uppercase text-blueGray-500 text-sm font-semibold mb-2">Instagram</span>
                            <ul class="list-unstyled">
                                <li>
                                    <a class="hover:text-oren font-semibold block pb-2 text-sm"
                                        href="https://www.instagram.com/oyyn._/" target="_blank">Royyan XD</a>
                                </li>
                                <li>
                                    <a class="hover:text-oren font-semibold block pb-2 text-sm"
                                        href="https://www.instagram.com/ra.mhndra/" target="_blank">Rafi XD</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="my-1 border-blueGray-300">
            <div class="flex flex-wrap items-center md:justify-between justify-center">
                <div class="w-full md:w-4/12 px-4 mx-auto ml-10">
                    <div class="text-2xl font-semibold py-1 flex">
                        Jalan jalan ke kebun raya
                        Nyuaakss
                        Jangan lupa bikin konser
                        Nyuaakss
                    </div>
                </div>
                <div class="w-full md:w-3/12 px-4 mx-auto md:text-center mr-10">
                    <img src="image/quadrakessoku.png" alt="" class="max-w-full h-auto">
                </div>
            </div>

        </div>
    </footer>
</body>
</html>