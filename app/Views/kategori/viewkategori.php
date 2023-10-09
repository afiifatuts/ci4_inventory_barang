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