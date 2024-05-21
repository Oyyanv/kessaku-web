<?php

    $user_id = isset($_GET['user_id']) ? $_GET['user_id'] : "";

    $button = "Update";
    $queryUser = mysqli_query($koneksi, "SELECT * FROM user WHERE user_id='$user_id'");

    $row    = mysqli_fetch_assoc($queryUser);

    $nama       = $row['nama'];
    $email      = $row['email'];
    $phone      = $row['phone'];
    $alamat     = $row['alamat'];
    $status     = $row['status'];
    $level      = $row['level'];
?>

<div class="flex justify-center mr-28 mt-1">
    <div class="w-[40%] p-8 bg-white rounded-lg">
            <form action="<?php echo BASE_URL."module/user/action.php?user_id=$user_id"; ?>" method="POST">
            <div class="font-semibold text-lg">User</div>
            <div class="mt-4">
                <label class="mb-1 ml-4 block font-medium text-sm text-gray-700">Nama</label>
                <input type="text" value="<?php echo $nama; ?>" name="nama" class="w-full rounded-sm flex-1 px-2 py-2 focus:outline-none border border-BDBDBD">
            </div>
            <div class="mt-1">
                <label class="mb-1 ml-4 block font-medium text-sm text-gray-700">Email</label>
                <input type="email" value="<?php echo $email; ?>" name="email" class="w-full rounded-sm flex-1 px-2 py-2 focus:outline-none border border-BDBDBD">
            </div>
            <div class="mt-1">
                <label class="mb-1 ml-4 block font-medium text-sm text-gray-700">No.Telp</label>
                <input type="number" value="<?php echo $phone; ?>" name="phone" class="w-full rounded-sm flex-1 px-2 py-2 focus:outline-none border border-BDBDBD">
            </div>
            <div class="mt-1">
                <label class="mb-1 ml-4 block font-medium text-sm text-gray-700">Alamat</label>
                <input type="text" value="<?php echo $alamat; ?>" name="alamat" class="w-full rounded-sm flex-1 px-2 py-2 focus:outline-none border border-BDBDBD">
            </div>
            <div class="mt-4">
                <label for="" class="mb-3 ml-4 block font-medium text-sm text-gray-700">Level</label>
                <div class="flex items-center mb-4">
                    <input type="radio" value="customer" <?php if ($level == "customer") { echo "checked"; } ?> name="level" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label class="ml-2 text-sm font-medium">Customer</label>
                </div>
                <div class="flex items-center">
                    <input type="radio" value="superadmin" <?php if ($level == "superadmin") { echo "checked"; } ?> name="level" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label class="ml-2 text-sm font-medium">SuperAdmin</label>
                </div>
            </div>
            <div class="mt-4">
                <label for="" class="mb-3 ml-4 block font-medium text-sm text-gray-700">Status</label>
                <div class="flex items-center mb-4">
                    <input type="radio" value="on" <?php if ($status == "on") { echo "checked='true'"; } ?> name="status" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label class="ml-2 text-sm font-medium">On</label>
                </div>
                <div class="flex items-center">
                    <input type="radio" value="off" <?php if ($status == "off") { echo "checked='true'"; } ?> name="status" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label class="ml-2 text-sm font-medium">Off</label>
                </div>
            </div>
            <div class="mt-6">
                <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                <input type="submit" name="button" value="<?php echo $button; ?>" class="w-40 bg-gray-500 text-white font-semibold py-2 px-4 rounded-sm hover:bg-gray-600 focus:outline-none focus:bg-gray-600">
            </div>
        </form>
    </div>
</div>