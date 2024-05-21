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
                        'hijo': '#41b853',
                    },
                }
            }
        }
    </script>
</head>

<body class="bg-primary">
    <div class="h-screen md:flex overflow-y-hidden">
        <!-- login -->
        <div class="flex md:w-1/2 justify-center items-center bg-primary">
            <form action="proses_login.php" method="POST"
                class="bg-white shadow-lg shadow-butonredpink rounded-xl px-10 py-12 w-72 mt-5">
                <h1 class="text-gray-800 font-bold text-2xl mb-9 flex justify-center items-center"><span
                        class="mr-2">KESSAKU </span> <span class="text-oren mr-2">|</span> Log In</h1>
                <?php
                $notif = isset($_GET['notif']) ? $_GET['notif'] : false;

                if ($notif == true) {
                    echo "<div class='text-red-500 text-sm mb-4'>Email atau Password yang anda masukan salah</div>";
                }
                ?>
                <div class="border-2 py-2 px-3 rounded-full mb-4">
                    <input class="pl-2 outline-none border-none w-full" type="email" name="email" id=""
                        placeholder="Email" />
                </div>
                <div class="flex items-center border-2 py-2 px-3 rounded-full">
                    <input class="pl-2 outline-none border-none w-full" type="password" name="password" id=""
                        placeholder="Kata Sandi" />
                </div>
                <button type="submit"
                    class="block w-full bg-butonblue mt-10 py-2 rounded-full text-white font-semibold flex justify-center items-center">Masuk</button>
                <div class="lg:hidden">
                    <!-- hp -->
                    <a href="register.php"
                        class="block w-full bg-butonredpink text-white mt-4 py-2 rounded-full font-bold mb-2 flex justify-center items-center">Daftar</a>
                </div>
            </form>


        </div>
        <!-- pelengkap -->
        <div class="md:w-1/2 flex justify-center items-center md:ml-5 mb-2 mt-16">
            <div class="md:mt-5 md:block hidden">
                <h1 class="text-white font-bold text-4xl font-sans">Welcome at KESSAKU <span
                        class="font-bold text-4xl font-sans text-oren">!</span></h1>
                <p class="text-white mt-4 md:mx-0 md:w-9/12"> Kessaku, kami menyediakan beragam pilihan gitar dari merek terkemuka di industri. Dengan koleksi kami yang luas
                    , Anda dapat menemukan gitar yang sesuai dengan gaya musik Anda dan menciptakan karya seni musikal yang tak terlupakan.</p>
                <p class="text-white mt-4">Belum punya akun?</p>
                <button>
                    <a href="register.php"
                        class="block w-28 bg-butonredpink text-white mt-3 py-2 rounded-2xl font-bold mb-2 flex justify-center items-center">Daftar</a>
                </button>
                <div class="hidden md:block">
                    <img src="image/quadrakessoku.png" alt="" class="w-10/12 -mt-5">
                </div>
            </div>
        </div>
    </div>

</body>

</html>