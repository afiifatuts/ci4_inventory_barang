<?= $this->extend('main/layout') ?>

<?= $this->section('judul') ?>
Data Transaksi Barang Masuk
<?= $this->endSection('judul') ?>

<?= $this->section('subjudul') ?>
<button type="button" class="btn btn-primary" onclick="location.href=('/barangmasuk/index')">
    <i class="fa fa-plus-circle"></i> Input Transaksi
</button>
<?= $this->endSection('subjudul') ?>

<?= $this->section('isi') ?>
<?= form_open('barangmasuk/data')?>
<div class="input-group mb-3">
  <input type="text" class="form-control" placeholder="Cari Berdasarkan Faktur..." name="cari" autofocus="true">
  <button type="button" class="btn btn-outline-primary" name="tombolcari">
    <i class="fa fa-search"></i>
  </button>
</div>
<?= form_close();?>

<table class>
    <thead>
        <tr>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
    </thead>
</table>


<?= $this->endSection('isi') ?>