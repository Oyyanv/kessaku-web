<?php

    $pesanan_id = $_GET["pesanan_id"];

    $query = mysqli_query($koneksi, "SELECT status FROM pesanan WHERE pesanan_id='$pesanan_id'");
    $row = mysqli_fetch_assoc($query);
    $status = $row['status'];

?>

<div class="">
    <div class="flex flex-col lg:flex-row justify-center">
        <div class="w-full max-w-md px-6">
        <form action="<?php echo BASE_URL . "module/pesanan/action.php?pesanan_id=" . $pesanan_id; ?>.php" method="POST" class="bg-white shadow-lg shadow-butonredpink rounded-sm mt-12 px-8 py-12">
                <h1 class="text-gray-800 text-3xl font-semibold mb-9 flex justify-left">
                    <span>Status Pesanan</span>
                </h1>
                <label class="mb-2 ml-4 block font-medium text-sm text-gray-700">Faktur Id</label>
                <div class="border-2 py-2 px-3 rounded-sm mb-4">
                    <input class="pl-2 outline-none border-none w-full" name="pesanan_id"  value="<?php echo $pesanan_id ?>" type="number" />
                </div>

                <label class="mb-2 ml-4 block font-medium text-sm text-gray-700 mt-2">Status</label>
                <div class="flex items-center border-2 py-2 px-3 rounded-sm">
                    <select name="status" class='w-full flex-1 px-2 py-2 focus:outline-none'>
                        <?php
                        foreach($arrayStatusPesanan AS $key => $value){
                            if($status == $key){
                                echo "<option value='$key' selected='true' class='w-full flex-1 px-2 py-2 focus:outline-none border border-BDBDBD'>$value</option>";
                            }else{
                                echo "<option value='$key' class='w-full flex-1 px-2 py-2 focus:outline-none border border-BDBDBD'>$value</option>";
                            }
                        }
                        ?>
                    </select>
                </div>

                <div class="mt-8 flex">
                    <input type="submit" name="button" value="Update" class="w-36 bg-gray-500 text-white font-semibold py-2 px-4 rounded-sm hover:bg-gray-600 focus:outline-none focus:bg-gray-600">
                </div>
            </form>
        </div>

</form>