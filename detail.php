<div class="kanan">
    <?php
        $barang_id = $_GET['barang_id'];

        $query = mysqli_query($koneksi,"SELECT * FROM barang WHERE barang_id='$barang_id' AND status='on'");
        $row = mysqli_fetch_assoc($query);

        echo '
        <div class="flex items-center p-5 lg:p-10 overflow-hidden relative">
            <div class="w-full max-w-6xl rounded bg-white shadow-xl p-10 lg:p-20 mx-auto text-gray-800 relative md:text-left">
                <div class="md:flex items-center -mx-10">
                    <div class="w-full md:w-1/2 px-10 mb-10 md:mb-0">
                        <div class="relative">
                            <img src="'.BASE_URL.'image/barang/'.$row['gambar'].'" class="w-full relative z-10" alt="">
                            <div class="border-4 border-oren absolute top-10 bottom-10 left-10 right-10 z-0"></div>
                        </div>
                    </div>
                    <div class="w-full md:w-1/2 px-10">
                        <div class="mb-5">
                            <h1 class="font-bold uppercase text-2x mb-3">'.$row['nama_barang'].'</h1>
                            <p class="text-sm">'.$row['spesifikasi'].'</p>
                            <p class="text-sm">Stock : '.$row['stok'].'</p>
                        </div>
                        <div class="mt-4">
                            <div class="inline-block align-bottom mr-5">
                                <span class="font-bold text-3xl leading-none align-baseline">'.rupiah($row['harga']).'</span>
                            </div>
                        </div>
                        <div class="mt-12">';
                            if ($user_id) {
                                echo '<a href="'.BASE_URL.'tambah_keranjang.php?barang_id='.$row['barang_id'].'" class="opacity-75 hover:opacity-100 bg-pink text-white rounded-full px-10 py-3 font-semibold">+ Keranjang</a>';
                            } else {
                                echo '<button class="bg-gray-300 text-gray-500 text-white rounded-full px-10 py-3 font-semibold cursor-not-allowed" disabled>+ Keranjang</button>';
                            }
                        echo '</div>
                    </div>
                </div>
            </div>
        </div>';
    ?>
</div>