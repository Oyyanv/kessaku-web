<?php

    $pesanan_id = $_GET["pesanan_id"];

    $query =  mysqli_query($koneksi, "SELECT pesanan.nama_penerima, pesanan.nomor_telepon,
                                             pesanan.alamat, pesanan.tanggal_pemesanan, user.nama,
                                             kota.kota ,kota.tarif FROM pesanan JOIN user ON pesanan.user_id=user.user_id
                                             JOIN kota ON kota.kota_id=pesanan.kota_id WHERE pesanan.pesanan_id='$pesanan_id'");

$row = mysqli_fetch_assoc($query);

$tanggal_pemesanan = $row['tanggal_pemesanan'];
$nama_penerima     = $row['nama_penerima'];
$nomor_telepon     = $row['nomor_telepon'];
$alamat            = $row['alamat'];
$tarif             = $row['tarif'];
$nama              = $row['nama'];
$kota              = $row['kota'];

?>

<!-- Invoice -->
<div class="max-w-[85rem] px-4 sm:px-6 lg:px-8 mx-auto my-4 sm:my-10">
  <!-- Grid -->
  <div class="mb-5 pb-5 flex justify-between items-center border-b border-gray-200 dark:border-gray-700">
    <div>
      <h2 class="text-2xl font-semibold">Detail Pesanan</h2>
    </div>
  </div>
  <!-- End Grid -->

  <!-- Grid -->
  <div class="grid md:grid-cols-2 gap-3">
    <div>
      <div class="grid space-y-3">
        <dl class="grid sm:flex gap-x-3 text-sm">
          <dt class="min-w-[150px] max-w-[200px]">
            Nomor Faktur:
          </dt>
          <dd class="">
            <a class="inline-flex items-center gap-x-1.5 decoration-2  font-medium">
                <?php echo $pesanan_id ?>
            </a>
          </dd>
        </dl>

        <dl class="grid sm:flex gap-x-3 text-sm">
          <dt class="min-w-[150px] max-w-[200px]">
            Nama Pemesan:
          </dt>
          <dd class="font-medium">
            <span class="block font-semibold"><?php echo $nama ?></span>
          </dd>
        </dl>

        <dl class="grid sm:flex gap-x-3 text-sm">
          <dt class="min-w-[150px] max-w-[200px]">
          <p>Pembayaran :</p>
          </dt>
          <dd class="font-medium">
            <span class="block font-semibold underline">
                <a href="<?php echo BASE_URL."index.php?page=my_profile&module=pesanan&action=konfirmasi_pembayaran&pesanan_id=$pesanan_id"?>">Klik Disini</a>
            </span>
          </dd>
        </dl>
      </div>
    </div>
    
    
    <!-- Col -->

    <div>
      <div class="grid space-y-3">
        <dl class="grid sm:flex gap-x-3 text-sm">
          <dt class="min-w-[150px] max-w-[200px]">
            Nomor Telepon:
          </dt>
          <dd class="font-medium ">
            <?php echo $nomor_telepon ?>
          </dd>
        </dl>

        <dl class="grid sm:flex gap-x-3 text-sm">
          <dt class="min-w-[150px] max-w-[200px] ">
            Tanggal Pemesanan
          </dt>
          <dd class="font-medium">
          <?php echo $tanggal_pemesanan ?>
          </dd>
        </dl>

        <dl class="grid sm:flex gap-x-3 text-sm">
          <dt class="min-w-[150px] max-w-[200px]">
            Alamat:
          </dt>
          <dd class="font-medium">
            <?php echo $alamat ?>
          </dd>
        </dl>
      </div>
    </div>
    <!-- Col -->
  </div>
  <!-- End Grid -->

  <!-- Table -->
  <div class="mt-6 border border-gray-200 p-4 rounded-lg space-y-4 dark:border-gray-700">
  <table class="w-full">
    <thead>
      <tr>
        <th class="text-xs font-medium text-center text-black uppercase">No</th>
        <th class="text-xs justify-center font-medium text-center text-black uppercase">Barang</th>
        <th class="text-left text-xs font-medium text-center text-black uppercase">Qty</th>
        <th class="text-left text-xs font-medium text-center text-black uppercase">Harga Satuan</th>
        <th class="text-right text-xs font-medium r text-black uppercase">Total</th>
      </tr>
    </thead>
    <tbody>
    <?php
       $queryDetail = mysqli_query($koneksi, "SELECT pesanan_detail.*, barang.nama_barang FROM pesanan_detail JOIN barang ON pesanan_detail.barang_id=barang.barang_id WHERE pesanan_detail.pesanan_id='$pesanan_id'");

       $tarifpajak = 0.05;
       
       $no = 1;
       $subtotal = 0;
       
       while ($rowDetail = mysqli_fetch_assoc($queryDetail)) {
         $total = $rowDetail['harga'] * $rowDetail['quantity'];
         $subtotal += $total;
       
         echo "<tr>
                 <td class='text-center text-xs font-medium text-black uppercase'>$no</td>
                 <td class='text-center text-xs font-medium text-black uppercase'>$rowDetail[nama_barang]</td>
                 <td class='text-center text-xs font-medium text-black uppercase'>$rowDetail[quantity]</td>
                 <td class='text-center text-xs font-medium text-black uppercase'>" . rupiah($rowDetail['harga']) . "</td>
                 <td class='text-right text-xs font-medium text-black uppercase'>" . rupiah($total) . "</td>
               </tr>";
         $no++;
       }
       
       $pajak = $subtotal * $tarifpajak;
       $totalbelanja = $subtotal + $pajak + $tarif;
       ?>

    </tbody>
  </table>
</div>



        


  <!-- End Table -->

  <!-- Flex -->
  <div class="mt-8 flex sm:justify-end">
    <div class="w-full max-w-2xl sm:text-right space-y-2">
      <!-- Grid -->
      <div class="grid mt-4">
        <dl class="grid sm:grid-cols-5 gap-x-3 text-sm">
          <dt class="col-span-3 font-semibold">Ongkir:</dt>
          <dd class="col-span-2 font-medium "><?php echo rupiah($tarif) ?></dd>
        </dl>

        <div class="grid grid-cols-2 sm:grid-cols-1 gap-3 sm:gap-2">
        <dl class="grid sm:grid-cols-5 gap-x-3 text-sm">
          <dt class="col-span-3 font-semibold">PPN:</dt>
          <dd class="col-span-2 font-medium "><?php echo($tarifpajak * 100) ?>%</dd>
        </dl>

        <dl class="grid sm:grid-cols-5 gap-x-3 text-sm">
          <dt class="col-span-3 font-semibold">Subtotal:</dt>
          <dd class="col-span-2 font-medium "><?php echo rupiah($totalbelanja) ?></dd>
        </dl>
      </div>
      <!-- End Grid -->
    </div>
  </div>
  <!-- End Flex -->
</div>
<!-- End Invoice -->