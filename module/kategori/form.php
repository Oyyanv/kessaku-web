<?php

    $kategori_id = isset($_GET['kategori_id']) ? $_GET['kategori_id'] : false;

    $kategori = "";
    $status = "";
    $button = "Tambah";

    if ($kategori_id) {
        $queryKategori = mysqli_query($koneksi, "SELECT * FROM kategori WHERE kategori_id='$kategori_id'");
        $row = mysqli_fetch_assoc($queryKategori);

        $kategori = $row['kategori'];
        $status = $row['status'];
        $button = "Update";
    }
?>

<div class="flex justify-center mr-28 mt-12">
    <div class="w-[40%] p-8 bg-white rounded-lg">
        <form action="<?php echo BASE_URL . "module/kategori/action.php?kategori_id=" . $kategori_id; ?>" method="POST">
            <div class="font-semibold text-lg">Kategori</div>
            <div class="mt-4">
                <label class="mb-3 ml-4 block font-medium text-sm text-gray-700">Kategori</label>
                <input type="text" value="<?php echo $kategori; ?>" name="kategori" class="w-full rounded-sm flex-1 px-2 py-2 focus:outline-none border border-BDBDBD">
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




