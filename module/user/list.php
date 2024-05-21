<div class="flex justify-end p-4">
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
    $queryUser = "SELECT * FROM user";
    
    if(isset($_GET['cari'])){
        $cari = $_GET['cari'];
        $queryUser .= " WHERE nama LIKE '%$cari%' OR email LIKE '%$cari%'";
    }
    
    $queryUser .= " ORDER BY nama ASC";
    
    $resultUser = mysqli_query($koneksi, $queryUser);

    if (mysqli_num_rows($resultUser) == 0) {
       echo "<div class=' w-9/12 mx-auto'>
                <img src='image/error.png' alt='Your Image' class=' flex justify-center items-center opacity-75'>
            </div>";
    } else {
        echo "<div class='overflow-x-auto'>
        <table id='userTable' class='mx-auto max-w-full w-[98%] whitespace-nowrap rounded-sm bg-white divide-y divide-gray-300 overflow-hidden'>
        
        <thead class='bg-gray-600'>
        <tr class='text-white text-center'>
            <th class='py-2 text-xs text-white' style='font-size: 12px; width: 30px;'>No</th>
            <th class='px-6 py-2 text-xs text-white'>Nama</th>
            <th class='px-6 py-2 text-xs text-white'>Email</th>
            <th class='px-6 py-2 text-xs text-white'>No.Telp</th>
            <th class='px-6 py-2 text-xs text-white'>Alamat</th>
            <th class='px-6 py-2 text-xs text-white'>Level</th>
            <th class='px-6 py-2 text-xs text-white'>Status</th>
            <th class='px-6 py-2 text-xs text-white'>Opsi</th>
        </tr>
        </thead>
        
        <tbody>";

        while ($rowUser = mysqli_fetch_assoc($resultUser)) {
            echo "<tr> 
            <td class='px-6 py-4 text-sm text-gray-500 text-center border'>$no</td>
            <td class='px-6 py-4 text-sm text-gray-500 text-center border'>$rowUser[nama]</td>
            <td class='px-6 py-4 text-sm text-gray-500 text-center border'>$rowUser[email]</td>
            <td class='px-6 py-4 text-sm text-gray-500 text-center border'>$rowUser[phone]</td>
            <td class='px-6 py-4 text-sm text-gray-500 text-center border'>$rowUser[alamat]</td>
            <td class='px-6 py-4 text-sm text-gray-500 text-center border'>$rowUser[level]</td>
            <td class='px-6 py-4 text-sm text-gray-500 text-center border'>$rowUser[status]</td>
            <td class='px-6 py-4 text-sm text-gray-500 border'>
                <div class='flex justify-center item-center'>
                    <a href='".BASE_URL. "index.php?page=my_profile&module=user&action=form&user_id=$rowUser[user_id]' class='mr-2'>
                        <svg xmlns='http://www.w3.org/2000/svg' class='w-6 h-6 text-blue-600' fill='none'
                            viewBox='0 0 24 24' stroke='currentColor'>
                            <path stroke-linecap='round' stroke-linejoin='round' stroke-width='2'
                                d='M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z'/>
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
        var tableRows = document.querySelectorAll('#userTable tbody tr');

        for (var i = 0; i < tableRows.length; i++) {
            var row = tableRows[i];
            var nama = row.cells[1].textContent.toLowerCase();
            var email = row.cells[2].textContent.toLowerCase();

            if (nama.includes(searchInput) || email.includes(searchInput)) {
                row.style.display = 'table-row';
            } else {
                row.style.display = 'none';
            }
        }
    });
</script>
