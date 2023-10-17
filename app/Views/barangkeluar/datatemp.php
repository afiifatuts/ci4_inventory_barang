<table class="table table-sm table-hover table-bordered" style="width: 100%;">
<thead>
    <tr>
        <th>No</th>
        <th>Kode Barang</th>
        <th>Nama Barang</th>
        <th>Harga Jual</th>
        <th>Jml</th>
        <th>Sub.Total</th>
        <th>#</th>
    </tr>
</thead>
<tbody>
    <?php 
    $nomor =1;
    foreach ($tampildata->getResultArray() as $row):
    ?>
    <tr>
        <td><?= $nomor++?></td>
        <td><?= $row['detbrgkode']?></td>
        <td><?= $row['brgnama']?></td>
        <td style="text-align:right;"><?= number_format($row['dethargajual'],0,",",".")?></td>
        <td><?= number_format($row['detjml'],0,",",".")?></td>
        <td style="text-align:right;"><?= number_format($row['detsubtotal'],0,",",".")?></td>
      
    </tr>
    <?php 
    endforeach;
    ?>
</tbody>

</table>