<?= $this->extend('main/layout') ?>

<?= $this->section('judul') ?>
Cetak Laporan 
<?= $this->endSection('judul') ?>

<?= $this->section('subjudul') ?>

<button type="button" class="btn btn-warning" onclick="window.location=('/laporan/index')">
    Kembali
</button>

<?= $this->endSection('subjudul') ?>

<?= $this->section('isi') ?>

<div class="row">
    <div class="col-lg-4">
    <div class="card text-white bg-primary mb-3" >
    <div class="card-header">Pilih Periode</div>
    <div class="card-body bg-white">
        <p class="card-text">
            <?= form_open('laporan/cetak_barang_masuk_periode',['target'=>'_blank'])?>
            <div class="form-group">
                <label for="">Tanggal Awal</label>
                <input type="date" name="tglawal" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="">Tanggal Akhir</label>
                <input type="date" name="tglakhir" class="form-control" required>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-block btn-success">
                    <i class="fa fa-print"></i> Cetak Laporan
                </button>        
        </div>
        <?= form_close()?>
        </p>
    </div>
</div>

    </div>
    <div class="col-lg-8">
    <div class="card text-white bg-primary mb-3" >
    <div class="card-header">Laporan Grafik</div>
    <div class="card-body bg-white viewTampilGrafik">
    </div>
    </div>
    </div>
</div>

<!-- tampilkan grafik  -->
<script>
    function tampilGrafik(){
        $.ajax({
            type: "post",
            url: "/laporan/tampiGrafikBarangMasuk",
            data: {
                bulan: '11-2021'
            },
            dataType: "json",
            success: function (response) {
                
            },error:function(xhr,ajaxOptions, thrownError){
                alert(xhr.status + '\n' + thrownError)
                console.log(xhr.status + '\n' + thrownError)
            }
        });
    }
</script>

<?= $this->endSection('isi') ?>