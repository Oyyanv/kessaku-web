<?php

    $pesanan_id = $_GET['pesanan_id'];

?>

<div class="">
    <div class="flex flex-col lg:flex-row justify-center">
        <div class="w-full max-w-md px-6">
        <form action="<?php echo BASE_URL . "module/pesanan/action.php?pesanan_id=" . $pesanan_id; ?>.php" method="POST" class="bg-white shadow-lg shadow-butonredpink rounded-sm mt-12 px-8 py-12">
                <h1 class="text-gray-800 text-sm mb-9 flex justify-center">
                    <span class="">Silahkan Lakukan Pembayaran Ke <span class='font-semibold'>BANK BNI</span><br/>
                        No Account : 0000-0000-0000-0-0 (KESSAKU BUSINESS).<br/>
                        Setelah Melakukan Pembayaran Silahkan Lakukan Konfirmasi Pembayaran</span>
                </h1>

                <label class="mb-2 ml-4 block font-medium text-sm text-gray-700">Nomor Rekening</label>
                <div class="border-2 py-2 px-3 rounded-sm mb-4">
                    <input class="pl-2 outline-none border-none w-full" name="nomor_rekening" type="number" />
                </div>

                <label class="mb-2 ml-4 block font-medium text-sm text-gray-700 mt-2">Nama Account</label>
                <div class="flex items-center border-2 py-2 px-3 rounded-sm">
                    <input class="pl-2 outline-none border-none w-full" name="nama_account" type="text" />
                </div>

                <label class="mb-2 ml-4 block font-medium text-sm text-gray-700 mt-2">Tanggal</label>
                <div class="flex items-center border-2 py-2 px-3 rounded-sm">
                    <input class="pl-2 outline-none border-none w-full" type="date" name="tanggal_transfer" />
                </div>

                <div class="mt-8 flex">
                    <input type="submit" name="button" value="Konfirmasi" class="w-36 bg-gray-500 text-white font-semibold py-2 px-4 rounded-sm hover:bg-gray-600 focus:outline-none focus:bg-gray-600">
                </div>
            </form>
        </div>