<?php
    $kota_id = isset($_GET['kota_id']) ? $_GET['kota_id'] : false;

    $kota = "";
    $tarif = "";
    $status= "";
    $button = "Tambah";

    if($kota_id){
        $queryKota = mysqli_query($koneksi, "SELECT * FROM kota WHERE kota_id='$kota_id'");
        $row = mysqli_fetch_assoc($queryKota);

        $kota = $row['kota'];
        $tarif = $row['tarif'];
        $status = $row['status'];
        $button = "Update";
    }
?>
<div class="flex justify-center mr-28 mt-12">
    <div class="w-[40%] p-8 bg-white rounded-lg">
        <form action="<?php echo BASE_URL."module/kota/action.php?kota_id=$kota_id"; ?>" method="POST">
            <div class="font-semibold text-lg">Kota</div>
            <div class="mt-4">
                <label class="mb-3 ml-4 block font-medium text-sm text-gray-700">Kota</label>
                <input type="text" value="<?php echo $kota; ?>" name="kota" class="w-full rounded-sm flex-1 px-2 py-2 focus:outline-none border border-BDBDBD">
            </div>
            <div class="mt-4">
                <label class="mb-3 ml-4 block font-medium text-sm text-gray-700">Tarif</label>
                <input type="number" value="<?php echo $tarif; ?>" name="tarif" class="w-full rounded-sm flex-1 px-2 py-2 focus:outline-none border border-BDBDBD">
            </div>
            <div class="mt-4">
                <label for="" class="mb-3 ml-4 block font-medium text-sm text-gray-700">Status</label>
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