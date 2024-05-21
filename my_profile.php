<?php
  if($user_id){
    $module = isset($_GET['module']) ? $_GET['module'] : false ;
    $action = isset($_GET['action']) ? $_GET['action'] : false ;
    $mode = isset($_GET['mode']) ? $_GET['mode'] : false ;
  }else {
    header("location: " .BASE_URL."login.php?page=login");
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kessaku</title>
  <link href="https://cdn.tailwindcss.com/2.2.19/tailwind.min.css" rel="stylesheet">
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            'bgrawr': '#ECF2FC',
            'BDBDBD': '#BDBDBD',
            'primary': '#161B40',
            'oren': '#efa500',
            'pink': '#f40058',
            'butonblue': '#43bee5',
            'hijo': '#41b853',
          },
        }
      }
    }
  </script>
  <style>
    .active {
      border-left: 4px solid yellow;
    }

    .sidebar-link:hover,
    .sidebar-link:focus {
      background-color: #F3F4F6;
      border-left-color: yellow;
    }

    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
      -webkit-appearance: none;
      margin: 0;
    }
  </style>

</head>

<body class='bg-bgrawr'>
  <!-- Wrapper -->
  <div class="flex ">
    <!-- Sidebar -->
    <div class='flex flex-col w-40 bg-white min-h-screen rounded-xs '>
      <div class='overflow-x-hidden '>  
        <ul class='flex flex-col py-4 space-y-1'>
          <!-- Sidebar items -->
          <li class='px-5'>
            <div class='flex flex-row items-center h-8'>
              <div class='text-sm text-gray-500 font-semibold'>Profile</div>
            </div>
          </li>
          <?php
            if($level == "superadmin"){
            ?>
          <li>
            <a href='index.php?page=my_profile&module=kategori&action=list'
              <?php if($module == "kategori"){echo "class='active'"; } ?>
              class='sidebar-link flex flex-row items-center h-11 focus:outline-none hover:bg-gray-50 text-gray-600 hover:text-gray-800 border-l-4 border-transparent hover:border-yellow-300 pr-6'>
              <span class='ml-2 text-sm tracking-wide truncate'>Kategori</span>
            </a>
          </li>
          <li>
            <a href='index.php?page=my_profile&module=barang&action=list'
              <?php if($module == "barang"){echo "class='active'"; } ?>
              class='sidebar-link flex flex-row items-center h-11 focus:outline-none hover:bg-gray-50 text-gray-600 hover:text-gray-800 border-l-4 border-transparent hover:border-yellow-300 pr-6'>
              <span class='ml-2 text-sm tracking-wide truncate'>Barang</span>
            </a>
          </li>
          <li>
            <a href='index.php?page=my_profile&module=kota&action=list'
              <?php if($module == "kota"){echo "class='active'"; } ?>
              class='sidebar-link flex flex-row items-center h-11 focus:outline-none hover:bg-gray-50 text-gray-600 hover:text-gray-800 border-l-4 border-transparent hover:border-yellow-300 pr-6'>
              <span class='ml-2 text-sm tracking-wide truncate'>Kota</span>
            </a>
          </li>
          <li>
            <a href='index.php?page=my_profile&module=user&action=list'
              <?php if($module == "user"){echo "class='active'"; } ?>
              class='sidebar-link flex flex-row items-center h-11 focus:outline-none hover:bg-gray-50 text-gray-600 hover:text-gray-800 border-l-4 border-transparent hover:border-yellow-300 pr-6'>
              <span class='ml-2 text-sm tracking-wide truncate'>User</span>
            </a>
          </li>
          <li>
            <a href='index.php?page=my_profile&module=banner&action=list'
              <?php if($module == "banner"){echo "class='active'"; } ?>
              class='sidebar-link flex flex-row items-center h-11 focus:outline-none hover:bg-gray-50 text-gray-600 hover:text-gray-800 border-l-4 border-transparent hover:border-yellow-300 pr-6'>
              <span class='ml-2 text-sm tracking-wide truncate'>Banner</span>
            </a>
          </li>
          <?php
            }
            ?>
          <li>
          <li>
            <a href='index.php?page=my_profile&module=pesanan&action=list'
              <?php if($module == "pesanan"){echo "class='active'"; } ?>
              class='sidebar-link flex flex-row items-center h-11 focus:outline-none hover:bg-gray-50 text-gray-600 hover:text-gray-800 border-l-4 border-transparent hover:border-yellow-300 pr-6'>
              <span class='ml-2 text-sm tracking-wide truncate'>Pesanan</span>
            </a>
          </li>
          <a href='logout.php'
            class='flex flex-row items-center h-11 focus:outline-none hover:bg-gray-50 text-gray-600 hover:text-gray-800 border-l-4 border-transparent hover:border-red-600 pr-6'>
            <span class='ml-2 text-sm tracking-wide truncate text-red-600'>LogOut</span>
          </a>
          </li>
        </ul>
      </div>
    </div>
    <!-- Content -->
    <div class="flex-grow">
      <?php
        $file = "module/$module/$action.php";
        if(file_exists($file)){
          include_once($file);
        }else{
          echo "<div class=' w-9/12 mx-auto'>
                      <img src='image/error.png' alt='Your Image' class=' flex justify-center items-center opacity-75'>
                  </div>";
        }
      ?>
    </div>
  </div>
</body>

</html>