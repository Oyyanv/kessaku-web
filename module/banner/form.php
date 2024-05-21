<?php

    $banner_id = isset($_GET['banner_id']) ? $_GET['banner_id'] : "";

    $banner = "";
    $link   = "";
    $gambar = "";
    $keterangan_gambar = "";
    $status = "";

    $button = "Tambah";

    if($banner_id != ""){

        $button = "Update";

        $queryBanner = mysqli_query($koneksi, "SELECT * FROM banner WHERE banner_id='$banner_id'");
        $row=mysqli_fetch_assoc($queryBanner);

        $banner = $row['banner'];
        $link = $row['link'];
        $gambar = "<img src ='".BASE_URL."image/slide/$row[gambar]' style='height:160px;float:right;margin-right:20px;'/>";
        $status = $row['status'];
    }
?>

<div class="flex justify-center mr-28 mt-10">
    <div class="w-[40%] p-8 bg-white rounded-lg">
        <form action="<?php echo BASE_URL . "module/banner/action.php?banner_id=" . $banner_id; ?>" method="POST" enctype="multipart/form-data">
            <div class="font-semibold text-lg">Banner</div>
            <div class="mt-1">
                <label class="mb-1 ml-4 block font-medium text-sm text-gray-700">Banner</label>
                <input type="text" value="<?php echo $banner; ?>" name="banner" class="w-full rounded-sm flex-1 px-2 py-2 focus:outline-none border border-BDBDBD">
            </div>
            <div class="mt-1">
                <label class="mb-1 ml-4 block font-medium text-sm text-gray-700">Link</label>
                <input type="text" value="<?php echo $link; ?>" name="link" class="w-full rounded-sm flex-1 px-2 py-2 focus:outline-none border border-BDBDBD">
            </div>
            <div class="mt-4">
                <label class="mb-1 font-medium text-sm text-gray-700"><?php echo $keterangan_gambar; ?></label>
                <input type="file" name="file"> <?php echo $gambar; ?>
            </div>
            <div class="mt-4">
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