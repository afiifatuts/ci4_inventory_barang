<?= $this->extend('main/layout') ?>

<?= $this->section('judul') ?>
Edit Transaksi Barang Keluar
<?= $this->endSection('judul') ?>

<?= $this->section('subjudul') ?>
<button type="button" class="btn btn-warning" onclick="location.href=('/barangkeluar/data')">
    <i class="fa fa-backward"></i> Kembali
</button>
<?= $this->endSection('subjudul') ?>

<?= $this->section('isi') ?>
<style>
    table#datadetail tbody tr:hover{
        cursor: pointer;
        background-color: red;
        color: white;
    }
</style>

<table class="table table-strioed table-sm">
    <tr>
        <input type="hidden" id="nofaktur" value="<?= $nofaktur?>">
        <td style="width: 20%;">No Faktur</td>
        <td style="width: 2%;">:</td>
        <td style="width: 28%;"><?= $nofaktur?></td>
        <td rowspan="3" style="width: 50%; font-weight:bold; color:red; font-size:20pt; text-align:center; vertical-align:middle;" id="lbTotalHarga">
       
    </td>
    </tr>
    <tr>
        <td>Tanggal</td>
        <td>:</td>
        <td><?= $tanggal?></td>
</tr>
    <tr>
        <td>Nama</td>
        <td>:</td>
        <td><?= $namapelanggan?></td>
    </tr>
</table>

<!-- form edit  -->

<div class="row mt-4">
     <div class="col-lg-2">
        <div class="form-group">
            <label for="">Kode Barang</label>
            <div class="input-group mb-3">
            <input type="text" class="form-control" name="kodebarang" id="kodebarang"/>
            <br>
            <div class="input-group-append">
                <button class="btn btn-outline-primary" id="tombolCariBarang" type="button">
                    <div class="fa fa-search"></div>
                </button>
            </div>
            <input type="hidden" id="iddetail"/>

            </div>
        </div>
     </div>
     
     <div class="col-lg-3">
        <div class="form-group">
            <label for="">Nama Barang</label>
            <input type="text" name="namabarang" id="namabarang" class="form-control" readonly>
        </div>
     </div>

     <div class="col-lg-3">
        <div class="form-group">
            <label for="">Harga Jual (Rp)</label>
            <input type="text" name="hargajual" id="hargajual" class="form-control" readonly>
        </div>
     </div>

     <div class="col-lg-2">
        <div class="form-group">
            <label for="">Qty</label>
            <input type="number" name="jml" id="jml" class="form-control" value="1">
        </div>
     </div>

     <div class="col-lg-2">
        <div class="form-group">
            <label for="">#</label>
            <div class="input-group mb-3">
            <button type="button" class="btn btn-success" title="Simpan Item" id="tombolSimpanItem">
                <i class="fa fa-save"></i>
            </button>&nbsp;
           <button type="button" style="display:none;" class="btn btn-primary" title="Edit Item" id="tombolEditItem">
            <i class="fa fa-edit"></i>
           </button>

           <button type="button" style="display:none;" class="btn btn-default" title="Batalkan" id="tombolBatal">
            <i class="fa fa-sync-alt"></i>
           </button>
            </div>
            
        </div>
     </div>
</div>

<div class="row">
    <div class="col-lg-12 tampilDataDetail">

    </div>
</div>

<div class="viewmodal" style="display: none;"></div>

<script>
    function ambilTotalHarga(){
        let nofaktur = $('#nofaktur').val();
        $.ajax({
            type: "post",
            url: "/barangkeluar/ambilTotalHarga",
            data: {
                nofaktur:nofaktur
            },
            dataType: "json",
            success: function (response) {
               $('#lbTotalHarga').html(response.totalharga) 
            },error:function(xhr,ajaxOptions, thrownError){
                alert(xhr.status + '\n' + thrownError)
                console.log(xhr.status + '\n' + thrownError)
            }
        });

    }
</script>
<!-- Edit detail barang keluar  -->
<script>
    $(document).ready(function () {
        ambilTotalHarga();
        tampilDataDetail();

        
        //  ketika klik tombol simpan Item 
        $('#tombolSimpanItem').click(function (e) { 
            e.preventDefault();
            simpanItem();
            
        });

        $('#tombolEditItem').click(function (e) { 
            e.preventDefault();
            $.ajax({
                type: "post",
                url: "/barangkeluar/editItem",
                data: {
                    iddetail : $('#iddetail').val(),
                    jml : $('#jml').val()
                },
                dataType: "json",
                success: function (response) {
                    if(response.sukses){
                        Swal.fire(
                        'Berhasil!',
                       response.sukses,
                        'success'
                        )

                        tampilDataDetail();
                        ambilTotalHarga();
                        kosong(); 
                        $('#kodebarang').prop('readonly',false);
                        $('#tombolCariBarang').prop('disabled',false);
                        $('#tombolSimpanItem').fadeIn();
                        $('#tombolBatal').fadeOut();
                        $('#tombolEditItem').fadeOut();
                    }
                },error:function(xhr,ajaxOptions, thrownError){
                alert(xhr.status + '\n' + thrownError)
                console.log(xhr.status + '\n' + thrownError)
            }
            });
        });
    });
</script>

<!-- function untuk mengosongkan form  -->
<script>
function kosong(){
    $('#kodebarang').val('');
    $('#kodebarang').focus();
    $('#hargajual').val('');
    $('#namabarang').val('');
    $('#jml').val(1);
}
</script>
<!-- untuk menampilkan data temp yang akan disimpan-->
<script>
function tampilDataDetail() { 
    let nofaktur = $('#nofaktur').val();
    $.ajax({
        type: "post",
        url: "/barangkeluar/tampilDataDetail",
        data: {
            nofaktur:nofaktur 
        },
        dataType: "json",
        beforeSend:function(){
            $('.tampilDataDetail').html("<i class='fa fa-spin fa-spinner'></i>")  
        },
        success: function (response) {
          if (response.data){
            $('.tampilDataDetail').html(response.data);
          }
        },error:function(xhr,ajaxOptions, thrownError){
                alert(xhr.status + '\n' + thrownError)
                console.log(xhr.status + '\n' + thrownError)
            }
    });
 }

</script>
<script>
    $().click(function (e) { 
        e.preventDefault();
        
    });
</script>

<!-- untuk ambil data barang  -->
<script>
    function ambilDataBarang(){
        let kodebarang = $('#kodebarang').val();
        if(kodebarang.length==0){
            Swal.fire('error','Kode barang harus diinputkan','error')
            kosong();
        }else{
        $.ajax({
            type: "post",
            url: "<?= base_url() ?>/barangkeluar/ambilDataBarang",
            data: {
                kodebarang:kodebarang 
            },
            dataType: "json",
            success: function (response) {
                if(response.error){
                    Swal.fire('error',response.error,'error')
                    kosong();
                }

                if(response.sukses){
                    let data =response.sukses;

                    $('#namabarang').val(data.namabarang);
                    $('#hargajual').val(data.hargajual);
                    $('#jml').focus();
                }
            },error:function(xhr,ajaxOptions, thrownError){
                alert(xhr.status + '\n' + thrownError)
                console.log(xhr.status + '\n' + thrownError)
            }
        });
    }
    }

          // Tombol cari barang 
          $('#tombolCariBarang').click(function (e) { 
            e.preventDefault();
            $.ajax({
                url: "<?= base_url() ?>/barangkeluar/modalCariBarang",
                dataType: "json",
                success: function (response) {
                   
                    if(response.data){
                        $('.viewmodal').html(response.data).show();
                        $('#modalcaribarang').modal('show');
                    }
                },error:function(xhr,ajaxOptions, thrownError){
                alert(xhr.status + '\n' + thrownError)
                console.log(xhr.status + '\n' + thrownError)
            }
            });
         })

</script>

<!-- Membuat function untuk simpan data ke table temporary  -->
<script>
    function simpanItem(){
        let nofaktur = $('#nofaktur').val();
        let kodebarang = $('#kodebarang').val();
        let namabarang = $('#namabarang').val();
        let hargajual = $('#hargajual').val();
        let jml = $('#jml').val();

        if(kodebarang.length ==0){
            Swal.fire('error','Kode barang harus diinputkan','error')
            kosong()
        }else{
            $.ajax({
                type: "post",
                url: "<?= base_url() ?>/barangkeluar/simpanItemDetail",
                data: {
                    nofaktur:nofaktur,
                    kodebarang:kodebarang,
                    namabarang:namabarang,
                    hargajual:hargajual,
                    jml:jml,
                },
                dataType: "json",
                success: function (response) {
                    if(response.error){
                        Swal.fire('Error',response.error,'error')
                    }

                    if(response.sukses){
                        Swal.fire('Sukses',response.sukses,'success')
                        tampilDataDetail()
                        ambilTotalHarga()
                        kosong()
                    }
                    
                },error:function(xhr,ajaxOptions, thrownError){
                alert(xhr.status + '\n' + thrownError)
                console.log(xhr.status + '\n' + thrownError)
            }
            });
        }
    }
</script>


<?= $this->endSection('isi') ?>