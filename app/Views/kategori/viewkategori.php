<?= $this->extend('main/layout') ?>

<?= $this->section('judul') ?>
Manajemen Data Kategori
<?= $this->endSection('judul') ?>

<?= $this->section('subjudul') ?>

<?= form_button('','<i class="fa fa-plus-circle"></i> Tambah Data',[
    'class'=> 'btn btn-primary',
    'onclick'=> "location.href=(`".site_url('/kategori/formtambah')."`)"
])

?>

<?= $this->endSection('subjudul') ?>

<?= $this->section('isi') ?>

<?= session()->getFlashdata('sukses'); ?>

<table class="table table-striped table-bordered" style="width: 100%;">
    <thead>
        <tr>
            <th style="width: 5%;">No</th>
            <th>Nama Kategori</th>
            <th style="width: 15%;">Aksi</th>
        </tr>
    </thead>

    <tbody>
        <?php 
        $nomor = 1;
        foreach ($tampildata as $row):
        ?>
        <tr>
            <td><?= $nomor++;?></td>
            <td><?= $row['katnama']?></td>
            <td></td>
        </tr>

        <?php endforeach; ?>
    </tbody>
</table>







<?= $this->endSection('isi') ?>