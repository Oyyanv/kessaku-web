<div class="">
    <div class="flex flex-col lg:flex-row justify-start">
        <div class="w-full max-w-md px-6">
        <form action="proses_pemesanan.php" method="POST" class="bg-white shadow-lg shadow-butonredpink rounded-sm mt-12 px-8 py-12">
                <h1 class="text-gray-800 font-bold text-xl mb-9 flex justify-center">
                    <span class="">Alamat Pengiriman Barang</span>
                </h1>

                <label class="mb-2 ml-4 block font-medium text-sm text-gray-700">Nama Penerima</label>
                <div class="border-2 py-2 px-3 rounded-sm mb-4">
                    <input class="pl-2 outline-none border-none w-full" name="nama_penerima" type="text" />
                </div>

                <label class="mb-2 ml-4 block font-medium text-sm text-gray-700 mt-2">Nomor Telepon</label>
                <div class="flex items-center border-2 py-2 px-3 rounded-sm">
                    <input class="pl-2 outline-none border-none w-full" name="nomor_telepon" type="number" />
                </div>

                <label class="mb-2 ml-4 block font-medium text-sm text-gray-700 mt-2">Alamat Pengiriman</label>
                <div class="flex items-center border-2 py-2 px-3 rounded-sm">
                    <input class="pl-2 outline-none border-none w-full" type="text" name="alamat" />
                </div>

                <label class="mb-2 ml-4 block font-medium text-sm text-gray-700 mt-2">Kota</label>
                <select name="kota" class="w-full rounded-sm flex-1 px-2 py-2 focus:outline-none border border-BDBDBD">
                    <?php
                        $query = mysqli_query($koneksi, "SELECT * FROM kota");

                        while($row=mysqli_fetch_assoc($query)){
                            echo "<option value='$row[kota_id]' class='w-full flex-1 px-2 py-2 focus:outline-none border border-BDBDBD'>
                                        $row[kota] (".rupiah($row['tarif']).")
                                  </option>";
                        }
                    ?>
                </select>

                <div class="mt-8 flex">
                    <input type="submit" name="button" value="Beli" class="w-36 bg-gray-500 text-white font-semibold py-2 px-4 rounded-sm hover:bg-gray-600 focus:outline-none focus:bg-gray-600">
                </div>
            </form>
        </div>

        <div class="w-full flex-col px-6 h-screen">
            <div class="xs:hidden">
                <div>
                    <h3 class="text-gray-800 font-semibold text-xl mt-8">Detail Order</h3>
                </div>
                <div >
                    <table id='barangTable' class='mx-auto max-w-full w-[98%] whitespace-nowrap rounded-sm bg-white divide-y divide-gray-300'>
                        <thead class='bg-gray-600'>
                            <tr>
                                <th class='px-6 py-2 text-xs text-white'>Barang</th>
                                <th class='px-6 py-2 text-xs text-white'>Qty</th>
                                <th class='px-6 py-2 text-xs text-white'>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $subtotal = 0;
                                foreach($keranjang AS $key => $value){
                                    $barang_id = $key;
                                    $nama_barang = $value['nama_barang'];
                                    $quantity = $value['quantity'];
                                    $gambar   = $value['gambar'];
                                    $harga    = $value['harga'];
                                
                                    $total = $quantity * $harga;
                                    $subtotal = $subtotal + $total;

                                    echo "<tr>
                                            <td class='px-6 py-4 text-sm text-gray-500 text-center border'>$nama_barang</td>
                                            <td class='px-6 py-4 text-sm text-gray-500 text-center border'>$quantity</td>
                                            <td class='px-6 py-4 text-sm text-gray-500 text-center border'>".rupiah($total)."</td>
                                          </tr>";
                                          
                                }
                                     echo "<div class='md:container md:mx-auto'>
                                            <div class='flex justify-end  py-2 px-5'>
                                            <div cosplan='5' class=''><b>Sub Total&nbsp;</b></div>
                                            <div class=''><b></b>".rupiah($subtotal)."</div>
                                          </div>";
                                ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
