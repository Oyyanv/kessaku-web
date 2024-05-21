<?php

    $barang_id = isset($_GET['barang_id']) ? $_GET['barang_id'] : false;

    $nama_barang = "";
    $kategori_id = "";
    $spesifikasi = "";
    $gambar      = "";
    $stok        = "";
    $harga       = "";
    $status      = "";
    $keterangan_gambar = "";
    $button      = "Tambah";

    if($barang_id){
        $query = mysqli_query($koneksi, "SELECT * FROM barang WHERE barang_id='$barang_id'");
        $rowBarang = mysqli_fetch_assoc($query);

        $nama_barang     = $rowBarang['nama_barang'];
        $kategori_id     = $rowBarang['kategori_id'];
        $spesifikasi     = $rowBarang['spesifikasi'];
        $gambar          = $rowBarang['gambar'];
        $stok            = $rowBarang['stok'];
        $harga           = $rowBarang['harga'];
        $status          = $rowBarang['status'];
        $button          = "Update";

        $keterangan_gambar = "(Klik pilih gambar jika ingin mengganti gambar)";
        $gambar            = "<img src ='".BASE_URL."image/barang/$gambar' style='height:160px;float:right;margin-right:20px;'/>";
    }
?>

<div class="flex justify-center mr-28 mt-4">
    <div class="w-[40%] p-8 bg-white">
        <form action="<?php echo BASE_URL . "module/barang/action.php?barang_id=" . $barang_id; ?>" method="POST" enctype="multipart/form-data">
            <div class="font-semibold text-lg">Barang</div>
            <div class="mt-1">
                <label class="mb-3 ml-4 block font-medium text-sm text-gray-700">Kategori</label>
                <select name="kategori_id" class="w-full rounded-sm flex-1 px-2 py-2 focus:outline-none border border-BDBDBD">
                    <?php
                        $query = mysqli_query($koneksi, "SELECT  kategori_id, kategori FROM kategori WHERE status='on' ORDER BY kategori ASC");
                        while($row=mysqli_fetch_assoc($query)){
                            if($kategori_id = $row['kategori_id']){
                                echo "<option value='$row[kategori_id]' selected='true' class='w-full flex-1 px-2 py-2 focus:outline-none border border-BDBDBD'>
                                        $row[kategori]
                                    </option>";
                            }else{
                                echo "<option value='$row[kategori_id]' class='w-full flex-1 px-2 py-2 focus:outline-none border border-BDBDBD'>
                                            $row[kategori]
                                        </option>";
                            }
                        }
                    ?>
                </select>
            </div>
            <div class="mt-1">
                <label class="mb-1 ml-4 block font-medium text-sm text-gray-700">Barang</label>
                <input type="text" value="<?php echo $nama_barang; ?>" name="nama_barang" class="w-full rounded-sm flex-1 px-2 py-2 focus:outline-none border border-BDBDBD">
            </div>
            <div class="mt-1">
                <label class="mb-1 ml-4 block font-medium text-sm text-gray-700">Spesifikasi</label>
                <input type="text" value="<?php echo $spesifikasi; ?>" name="spesifikasi" class="w-full rounded-sm flex-1 px-2 py-2 focus:outline-none border border-BDBDBD">
            </div>
            <div class="mt-1">
                <label class="mb-1 ml-4 block font-medium text-sm text-gray-700">Stok</label>
                <input type="number" value="<?php echo $stok; ?>" name="stok" class="w-full rounded-sm flex-1 px-2 py-2 focus:outline-none border border-BDBDBD">
            </div>
            <div class="mt-1">
                <label class="mb-1 ml-4 block font-medium text-sm text-gray-700">Harga</label>
                <input type="number" value="<?php echo $harga; ?>" name="harga" class="w-full rounded-sm flex-1 px-2 py-2 focus:outline-none border border-BDBDBD">
            </div>
            <div class="mt-1">
                <label class="mb-1 font-medium text-sm text-gray-700"><?php echo $keterangan_gambar; ?></label>
                <input type="file" name="file"> <?php echo $gambar; ?>
            </div>
            <div class="mt-1">
                <label for="" class="mb-1 ml-4 block font-medium text-sm text-gray-700">Status</label>
                <div class="flex items-center mb-4">
                    <input type="radio" value="on" <?php if ($status == "on") {echo "checked='true'";} ?> name="status" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label class="ml-2 text-sm font-medium">On</label>
                </div>
                <div class="flex items-center">
                    <input type="radio" value="off" <?php if ($status == "off") {echo "checked='true'";} ?> name="status" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label class="ml-2 text-sm font-medium">Off</label>
                </div>
            </div>
            <div class="mt-6">
                <input type="submit" name="button" value="<?php echo $button; ?>" class="w-40 bg-gray-500 text-white font-semibold py-2 px-4 rounded-sm hover:bg-gray-600 focus:outline-none focus:bg-gray-600">
            </div>
        </form>
    </div>
</div>