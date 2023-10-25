<table class="table table-sm table-striped table-hover">
    <thead>
        <tr>
            <th>No</th>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Harga Jual</th>
            <th>Harga Beli</th>
            <th>Jumlah</th>
            <th>Sub. Total</th>
            <th>#</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $nomor = 1;
        foreach ($datatemp ->getResultArray() as $row) :?>
            <tr>
                <td><?= $nomor++; ?> </td>
                <td><?= $row['brgkode']; ?></td>
                <td><?= $row['brgnama']; ?></td>
                <td style="text-align: right;">
                <?= number_format($row['dethargajual'],0,",",".") ?>
                </td>
                <td style="text-align: right;">
                <?= number_format($row['dethargamasuk'],0,",",".") ?>
                </td>
                <td style="text-align: right;">
                <?= number_format($row['detjml'],0,",",".") ?>
                </td>
                <td style="text-align: right;">
                <?= number_format($row['detsubtotal'],0,",",".") ?>
                </td>
                <td>
                    <button type="button" class="btn btn-sm btn-outline-danger"
                    onclick="hapusItem('<?= $row['iddetail']?>')">
                        <i class="fa fa-trash-alt"></i>
                    </button>
                </td>
            </tr>
        <?php endforeach;?>
    </tbody>
</table>