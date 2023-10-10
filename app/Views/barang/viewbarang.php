<?= $this->extend('main/layout') ?>

<?= $this->section('judul') ?>
Manajemen Data Barang
<?= $this->endSection('judul') ?>

<?= $this->section('subjudul') ?>
<button type="button" class="btn btn-primary" onclick="location.href=('/barang/tambah')">
    <i class="fa fa-plus-circle"></i> Tambah Barang
</button>
<?= $this->endSection('subjudul') ?>

<?= $this->section('isi') ?>
<table class="table table-striped table-bordered" style="width: 100%;">
    <thead>
        <tr>
            <th style="width: 5%;">No</th>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Kategori</th>
            <th>Satuan</th>
            <th>Harga</th>
            <th>Stok</th>
            <th style="width: 15%;">Aksi</th>
        </tr>
    </thead>

    <tbody>
        <?php 
        $nomor = 1;
        foreach ($tampildata->getResultArray() as $row):
        ?>
        <tr>
            <td><?= $nomor++;?></td>
            <td><?= $row['brgkode']?></td>
            <td><?= $row['brgnama']?></td>
            <td><?= $row['katnama']?></td>
            <td><?= $row['satnama']?></td>
            <td><?= number_format($row['brgharga'],0)?></td>
            <td><?= number_format($row['brgstok'],0)?></td>
            <td>
           

            </td>
        </tr>

        <?php endforeach; ?>
    </tbody>
</table>
<?= $this->endSection('isi') ?>