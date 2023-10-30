<?= $this->extend('main/layout') ?>

<?= $this->section('judul') ?>
Cek Transaksi Status Midtrans 
<?= $this->endSection('judul') ?>

<?= $this->section('subjudul') ?>
<button type="button" class="btn btn-warning" onclick="location.href=('<?= base_url() ?>/barangkeluar/data')">
     Kembali
</button>
<?= $this->endSection('subjudul') ?>

<?= $this->section('isi') ?>

<table class="table table-sm table-striped">
    <tr>
        <td style="width:30%; text-align:left;">No Faktur</td>
        <td style="width: 2%;">:</td>
        <td><?= $nofaktur?></td>
    </tr>
    <tr>
        <td>Tgl. Faktur</td>
        <td>:</td>
        <td><?= $tglfaktur?></td>
    </tr>
    <tr>
        <td>Nama Pelanggan</td>
        <td>:</td>
        <td><?= $namapelanggan?></td>
    </tr>
    <tr>
        <td>Telp Pelanggan</td>
        <td>:</td>
        <td><?= $telp?></td>
    </tr>
    <tr>
        <td>Order ID</td>
        <td>:</td>
        <td><?= $order_id?></td>
    </tr>
    <tr>
        <td>Status Transaksi</td>
        <td>:</td>
        <td><?php 
        if($status_transaksi =='pending'){
            echo '<span class="badge bg-gray">Pending</span>';
        }
        if($status_transaksi =='settlement'){
            echo '<span class="badge badge-success">Sukses Pembayaran</span>';
        }
        if($status_transaksi =='expire'){
            echo '<span class="badge badge-danger">Expire</span>';
        }
        ?></td>
    </tr>
</table>

<?= $this->endSection('isi') ?>