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

<?= form_open('kategori/index')?>
<div class="input-group mb-3">
  <input type="text" name="cari" value="<?= $cari;?>" class="form-control" placeholder="Cari data kategori" aria-label="Recipient's username" aria-describedby="basic-addon2">
  <div class="input-group-append">
    <button class="btn btn-outline-primary" type="submit" id="tombolcari" name="tombolcari">
        <div class="fa fa-search"></div>
    </button>
  </div>
</div>
<?=form_close()?>
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
        $nomor = 1 +(($nohalaman -1)*5);
        foreach ($tampildata as $row):
        ?>
        <tr>
            <td><?= $nomor++;?></td>
            <td><?= $row['katnama']?></td>
            <td>
            <button type="button" class="btn btn-info" title="Edit Data" 
            onclick="edit(`<?= $row['katid']?>`)">
                <i class="fa fa-edit"></i>
            </button>
            <form method="POST" action="/kategori/hapus/<?= $row['katid']?>" style="display:inline;" onsubmit="hapus()">
            <input type="hidden" value="DELETE" name="_method">
            <button type="submit" class="btn btn-danger" title="Hapus Data">
                <i class="fa fa-trash-alt"></i>
            </button>
        </form>

            </td>
        </tr>

        <?php endforeach; ?>
    </tbody>
</table>
<div class="float-center">
    <?= $pager->links('kategori','paging');?>
</div>

<script>
    function edit(id) { 
        window.location=('/kategori/formedit/'+id);
 }
 function hapus() { 
    pesan =confirm('Yakin data kategori dihapus?');

    if (pesan) {
        return true;
    } else {
        return false;
    }
 }
</script>




<?= $this->endSection('isi') ?>