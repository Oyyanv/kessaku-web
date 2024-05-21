<div class="flex justify-between p-4">
    <button class="text-white bg-butonblue font-semibold rounded-sm text-sm px-5 py-2 text-center" type="button">
        <a href="<?php echo BASE_URL. "index.php?page=my_profile&module=banner&action=form"; ?>">+ Tambah Banner</a>
    </button>
    <!-- searching -->
    <form class="flex bg-white rounded-sm h-10">
        <input type="text" id="search-input" placeholder="Cari apa di tabel" class="rounded-sm flex-1 px-5 py-2 focus:outline-none" style="width: 350px;">
        <button id="search-button" class="bg-pink text-white rounded-sm font-semibold py-2 w-20 hover:bg-red-400 focus:outline-none">
            Cari
        </button>                  
    </form>
</div>

<?php
    $no = 1;

    $queryBanner = "SELECT * FROM banner";
    
    if(isset($_GET['cari'])){
        $cari = $_GET['cari'];
        $queryBanner .= " WHERE banner LIKE '%$cari%'";
    }

    $queryBanner .= " ORDER BY banner_id DESC";
    
    $resultBanner = mysqli_query($koneksi, $queryBanner);

    if (mysqli_num_rows($resultBanner) == 0) {
        echo "<div class=' w-9/12 mx-auto'>
                      <img src='image/error.png' alt='Your Image' class=' flex justify-center items-center opacity-75'>
                  </div>";
    } else {
        echo "<div class='overflow-x-auto'>
        <table id='banner-table' class='mx-auto max-w-full w-[98%] whitespace-nowrap rounded-sm bg-white divide-y divide-gray-300 overflow-hidden'>
        
        <thead class='bg-gray-600'>
        <tr class='text-white text-center'>
            <th class='py-2 text-xs text-white' style='font-size: 12px; width: 30px;'>No</th>
            <th class='px-6 py-2 text-xs text-white'>Banner</th>
            <th class='px-6 py-2 text-xs text-white'>Link</th>
            <th class='px-6 py-2 text-xs text-white'>Status</th>
            <th class='px-6 py-2 text-xs text-white'>Opsi</th>
        </tr>
        </thead>
        
        <tbody>";

        while ($rowBanner = mysqli_fetch_assoc($resultBanner)) {
            echo "<tr>
            <td class='px-6 py-4 text-sm text-gray-500 text-center border'>$no</td>
            <td class='px-6 py-4 text-sm text-gray-500 text-center border'>$rowBanner[banner]</td>
            <td class='px-6 py-4 text-sm text-gray-500 text-center border'><a target='blank' href='".BASE_URL."$rowBanner[link]'>$rowBanner[link]</td>
            <td class='px-6 py-4 text-sm text-gray-500 text-center border'>$rowBanner[status]</td>
            <td class='px-6 py-4 text-sm text-gray-500 border'>
                <div class='flex justify-center'>
                    <a href='".BASE_URL."index.php?page=my_profile&module=banner&action=form&banner_id=$rowBanner[banner_id]' class='mr-2'>
                        <svg xmlns='http://www.w3.org/2000/svg' class='w-6 h-6 text-blue-600' fill='none' viewBox='0 0 24 24' stroke='currentColor'>
                            <path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z'/>
                        </svg>
                    </a>
                    <a href='index.php?page=my_profile&module=banner&action=delete&banner_id=$rowBanner[banner_id]'>
                        <svg xmlns='http://www.w3.org/2000/svg' class='w-6 h-6 text-red-600' fill='none' viewBox='0 0 24 24' stroke='currentColor'>
                            <path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16' />
                        </svg>
                    </a>
                </div>
            </td>
        </tr>";
            $no++;
        }
        echo "</tbody></table></div>";
    }
?>

<script>
    document.getElementById('search-button').addEventListener('click', function(event) {
        event.preventDefault(); // Prevent the default form submission

        var searchInput = document.getElementById('search-input').value.toLowerCase();
        var tableRows = document.querySelectorAll('#banner-table tbody tr');

        for (var i = 0; i < tableRows.length; i++) {
            var row = tableRows[i];
            var bannerName = row.cells[1].textContent.toLowerCase();

            if (bannerName.includes(searchInput)) {
                row.style.display = 'table-row';
            } else {
                row.style.display = 'none';
            }
        }
    });
</script>

