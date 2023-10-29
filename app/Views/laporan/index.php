<?= $this->extend('main/layout') ?>

<?= $this->section('judul') ?>
Cetak Laporan 
<?= $this->endSection('judul') ?>

<?= $this->section('subjudul') ?>
Silahkan Pilih Laporan Yang ingin dicetak
<?= $this->endSection('subjudul') ?>

<?= $this->section('isi') ?>
<div class="row">
    <div class="col-lg-4">
        <button type="button" style="padding-top: 50px;" class="btn btn-block btn-lg btn-success" onclick="window.location=('<?= base_url() ?>laporan/cetak_barang_masuk')">
            <i class="fa fa-file"></i> LAPORAN BARANG MASUK
        </button>
    </div>
    <div class="col-lg-4"></div>
    <div class="col-lg-4"></div>
</div>
<?= $this->endSection('isi') ?>