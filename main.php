<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Include Swiper library -->
  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
  <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            'bgrawr': '#ECF2FC',
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

  <style>
    .swiper-container {
      overflow: hidden;
    }

    .swiper-slide {
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .swiper-slide img {
      width: 100%;
      max-height: 600px;
      /* Sesuaikan tinggi maksimum yang Anda inginkan */
      height: auto;
    }

    /* Custom styles for navigation buttons */
    .swiper-container .swiper-button-next,
    .swiper-container .swiper-button-prev {
      width: 40px;
      /* Adjust the button width */
      height: 40px;
      /* Adjust the button height */
      color: #fff;
      /* Change the button text color */
      --swiper-navigation-size: 20px;
      /* Change the button size */
    }
  </style>



</head>

<body>

  <!-- banner -->
  <div class="swiper-container relative z-0">
    <div class="swiper-wrapper">
      <?php
      $queryBanner = mysqli_query($koneksi, "SELECT * FROM banner WHERE status='on' ORDER BY banner_id DESC");
      while ($rowBanner = mysqli_fetch_assoc($queryBanner)) {
        echo "<div class='swiper-slide'><a href='" . BASE_URL . "$rowBanner[link]'><img src='" . BASE_URL . "image/slide/$rowBanner[gambar]' /></a></div>";
      }
      ?>
    </div>
    <!-- Navigation buttons -->
    <div class="swiper-button-next "></div>
    <div class="swiper-button-prev"></div>
  </div>
  <!-- Include Swiper library -->
  <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
  <!-- Initialize Swiper -->
  <script>
    var swiper = new Swiper('.swiper-container', {
      loop: true,
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
      autoplay: {
        delay: 5000, // Specify the delay between slides in milliseconds
        disableOnInteraction: false, // Allow autoplay to continue even when the user interacts with the slideshow
      },
    });
  </script>
  <!-- akhir banner -->

  <!-- filte kategori -->
  <div class="justify-between ">
    <div class="flex justify-center items-center py-8 px-1 space-x-1">
      <?php
      $query = mysqli_query($koneksi, "SELECT * FROM kategori WHERE status='on'");
      $kategori_id = @$_GET['kategori_id'];

      while ($row = mysqli_fetch_assoc($query)) {
        if ($kategori_id == $row['kategori_id']) {
          echo "<a href='" . BASE_URL . "index.php?kategori_id=$row[kategori_id]' class='bg-transparent hover:bg-red-500 text-butonredpink font-semibold hover:text-white py-3 px-4 border border-butonredpink hover:border-transparent rounded'>$row[kategori]</a>";
        } else {
          echo "<a href='" . BASE_URL . "index.php?kategori_id=$row[kategori_id]' class='bg-red-500 text-white font-bold py-4 px-5 border border-red-700 rounded md:1/2'>$row[kategori]</a>";
        }
      }
      ?>
    </div>
  </div>
  <!-- akhhir filter -->


<!-- search -->
<div class="px-4 py-4 flex justify-center items-center z-10">
  <div class="w-full md:w-auto">
    <div class="overflow-hidden z-0 rounded-md relative border border-BDBDBD">
      <form method="GET" class="relative flex bg-white">
        <input type="text" name="search" placeholder="cari apa tuan" class="px-6 py-4 focus:outline-none w-full md:w-64 lg:w-96">
        <button type="submit" class="bg-oren text-white font-semibold px-8 hover:bg-red-400 focus:bg-red-600 focus:outline-none">Cari</button>
      </form>
      <?php
      if (isset($_GET['search'])) {
        $search = $_GET['search'];

        $search_query = '%' . $search . '%';
        $query = mysqli_prepare($koneksi, "SELECT * FROM barang WHERE status='on' AND nama_barang LIKE ? ORDER BY rand() DESC");
        mysqli_stmt_bind_param($query, "s", $search_query);
        mysqli_stmt_execute($query);
        $result = mysqli_stmt_get_result($query);
      }
      ?>
    </div>
  </div>
</div>




<!--barang-->
<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4 flex flex-wrap p-12 md:justify-center md:items-center">
  <?php
  if (isset($_GET['search']) && isset($result)) {
    while ($row = mysqli_fetch_assoc($result)) {
      $style = false;
      ?>
      <div class="w-[100%] md:w-full py-4">
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
          <a href="<?php echo BASE_URL ?>index.php?page=detail&barang_id=<?php echo $row['barang_id'] ?>">
            <img class="w-full h-48 object-cover" src="<?php echo BASE_URL ?>image/barang/<?php echo $row['gambar'] ?>" alt="<?php echo $row['nama_barang'] ?>">
          </a>
          <div class="p-4">
            <h5 class="text-lg font-bold mb-2">
              <a href="<?php echo BASE_URL ?>index.php?page=detail&barang_id=<?php echo $row['barang_id'] ?>"><?php echo $row['nama_barang'] ?></a>
            </h5>

            <p class="mb-4"><?php echo rupiah($row['harga']) ?></p>

            <?php if ($user_id) { ?>
              <a href="<?php echo BASE_URL ?>tambah_keranjang.php?barang_id=<?php echo $row['barang_id'] ?>" class="bg-oren hover:opacity-75 text-white font-bold py-2 px-4 rounded">+ Keranjang</a>
            <?php } else { ?>
              <button class="bg-gray-300 text-gray-500 font-bold py-2 px-4 rounded cursor-not-allowed" disabled>+ Keranjang</button>
            <?php } ?>
          </div>
        </div>
      </div>
    <?php
    }
  } else {
    if ($kategori_id) {
      $query = mysqli_prepare($koneksi, "SELECT * FROM barang WHERE status='on' AND kategori_id=? ORDER BY rand() DESC");
      mysqli_stmt_bind_param($query, "i", $kategori_id);
      mysqli_stmt_execute($query);
      $result = mysqli_stmt_get_result($query);
    } else {
      $result = mysqli_query($koneksi, "SELECT * FROM barang WHERE status='on' ORDER BY rand() DESC");
    }

    while ($row = mysqli_fetch_assoc($result)) {
      $style = false;
      ?>
      <div class="w-[100%] md:w-full py-4">
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
          <a href="<?php echo BASE_URL ?>index.php?page=detail&barang_id=<?php echo $row['barang_id'] ?>">
            <img class="w-full h-48 object-cover" src="<?php echo BASE_URL ?>image/barang/<?php echo $row['gambar'] ?>" alt="<?php echo $row['nama_barang'] ?>">
          </a>
          <div class="p-4">
            <h5 class="text-sm font-bold mb-2">
              <a href="<?php echo BASE_URL ?>index.php?page=detail&barang_id=<?php echo $row['barang_id'] ?>"><?php echo $row['nama_barang'] ?></a>
            </h5>

            <p class="mb-4"><?php echo rupiah($row['harga']) ?></p>

            <?php if ($user_id) { ?>
              <a href="<?php echo BASE_URL ?>tambah_keranjang.php?barang_id=<?php echo $row['barang_id'] ?>" class="bg-oren hover:opacity-75 text-white font-bold py-2 px-4 rounded">+ Keranjang</a>
            <?php } else { ?>
              <button class="bg-gray-300 text-gray-500 font-bold py-2 px-4 rounded cursor-not-allowed" disabled>+ Keranjang</button>
            <?php } ?>
          </div>
        </div>
      </div>
    <?php
    }
  }
  ?>

</div>



</body>

</html>