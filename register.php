<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kessaku</title>
    <link rel="icon" href="image/btr.jfif" type="jfif">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'ECF2FC': '#ECF2FC',
                        'BDBDBD': '#BDBDBD',
                        'primary': '#161B40',
                        'oren': '#efa500',
                        'butonredpink': '#f40058',
                        'butonblue': '#43bee5',
                    },
                }
            }
        }
    </script>
</head>

<body class="bg-primary">
    <div class="h-screen md:flex overflow-y-auto">
        <!-- login -->
        <div class="flex md:w-1/2 justify-center items-center max-w-4xl p-6 mx-auto">
            <form class="bg-white shadow-lg shadow-butonredpink rounded-xl px-10 py-12" action="proses_register.php" method="POST">
                <h1 class="text-gray-800 font-bold text-2xl mb-9"><span class="mr-2">KESSAKU </span> <span class="text-oren mr-2">|</span> Daftar</h1>
                <!-- notif required -->
                <?php
                $notif = isset($_GET['notif']) ? $_GET['notif'] : false;
                $nama = isset($_GET['nama']) ? $_GET['nama'] : false;
                $email = isset($_GET['email']) ? $_GET['email'] : false;
                $phone = isset($_GET['phone']) ? $_GET['phone'] : false;
                $alamat = isset($_GET['alamat']) ? $_GET['alamat'] : false;

                if ($notif == "require") {
                    echo "<div class='text-red-500'> Lengkapi form ini </div>";
                } else if ($notif == "password") {
                    echo "<div class='text-red-500'> Password tidak sama </div>";
                } else if ($notif == "email") {
                    echo "<div class='text-red-500'> Email sudah ada </div>";
                }
                ?>
                <div class="grid gap-6 sm:grid-cols-2 mt-4">
                    <div class="border-2 py-2 px-3 rounded-full mb-4">
                        <input class="pl-2 outline-none border-none w-full" type="nama" name="nama" id="" placeholder="Nama Pengguna" />
                    </div>
                    <div class="flex items-center border-2 py-2 px-3 rounded-full mb-4">
                        <input class="pl-2 outline-none border-none w-full" type="email" name="email" id="" placeholder="Email" />
                    </div>
                    <div class="flex items-center border-2 py-2 px-3  rounded-full mb-4">
                        <input class="pl-2 outline-none border-none w-full" type="alamat" name="alamat" id="" placeholder="Alamat" />
                    </div>
                    <div class="flex items-center border-2 py-2 px-3  rounded-full mb-4">
                        <input class="pl-2 outline-none border-none w-full" type="phone" name="phone" id="" placeholder="Nomor Hp" />
                    </div>
                    <div class="flex items-center border-2 py-2 px-3  rounded-full mb-4">
                        <input class="pl-2 outline-none border-none w-full" type="password" name="password" id="" placeholder="Kata Sandi" />
                    </div>
                    <div class="flex items-center border-2 py-2 px-3  rounded-full mb-4">
                        <input class="pl-2 outline-none border-none w-full" type="re_password" name="re_password" id="" placeholder="Konfimasi Kata Sandi" />
                    </div>
                </div>
                <div class="flex justify-between mt-4">
                    <p class="text-gray-500 font-semibold flex items-center underline"><a href="login.php">Sudah punya akun?</a></p>
                    <button type="submit" class="w-28 bg-butonblue py-2 rounded-full text-white font-semibold flex justify-center items-center">
                        Daftar
                    </button>
                </div>

            </form>
        </div>
    </div>
</body>

</html>