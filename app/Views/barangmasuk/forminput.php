<?= $this->extend('main/layout') ?>

<?= $this->section('judul') ?>
Input Barang Masuk
<?= $this->endSection('judul') ?>

<?= $this->section('subjudul') ?>
<button type="button" class="btn btn-warning" onclick="location.href=('/barangmasuk/index')">
    <i class="fa fa-backward"></i> Kembali
</button>
<?= $this->endSection('subjudul') ?>

<?= $this->section('isi') ?>
<div class="form-row">
    <div class="form-group col-md-6">
        <label for="">Input Faktur Barang Masuk</label>
      <input type="text" class="form-control" placeholder="No.Faktur" id="faktur" name="faktur">
    </div>
    <div class="form-group col-md-6">
    <label for="">Tanggal Faktur</label>
      <input type="date" class="form-control" name="tglfaktur" id="tglfaktur" value="<?= date('Y-m-d')?>">
    </div>
  </div>

  <div class="card">
  <div class="card-header bg-primary">
    Input Barang
  </div>
  <div class="card-body">
  <div class="form-row">
    <div class="form-group col-md-3">
        <label for="">Kode Barang</label>
        <div class="input-group mb-3">
  <input type="text" class="form-control" placeholder="Input Kode Barang" id="kdbarang" name="kdbarang">
  <div class="input-group-append">
    <button class="btn btn-outline-primary" type="button" id="tombolCariBarang">
        <i class="fa fa-search"></i>
    </button>
  </div>
</div>
    </div>
    <div class="form-group col-md-3">
    <label for="">Nama Barang</label>
      <input type="text" class="form-control" name="namabarang" id="namabarang" readonly>
    </div>
    <div class="form-group col-md-2">
    <label for="">Harga Jual</label>
      <input type="number" class="form-control" name="hargajual" id="hargajual" >
    </div>
    <div class="form-group col-md-2">
    <label for="">Harga Beli</label>
      <input type="number" class="form-control" name="hargabeli" id="hargabeli" >
    </div>
    <div class="form-group col-md-1">
    <label for="">Jumlah</label>
      <input type="number" class="form-control" name="jumlah" id="jumlah" >
    </div>
    <div class="form-group col-md-1">
    <label for="">Aksi</label>
    <div class="input-group">
    <button type="button" class="btn btn-sm btn-info" title="Tambah Item" id="tombolTambahItem">
        <i class="fa fa-plus-square"></i>
    </button> &nbsp;
    <button type="button" class="btn btn-sm btn-warning" title="Reload data" id="tombolReload">
        <i class="fa fa-sync-alt"></i>
    </button>
    </div>
     
    </div>

  </div>

  <div class="row" id="tampilDataTemp"></div>

</div>
</div>

<script>
    function dataTemp(){
        let faktur = $('#faktur').val();

        $.ajax({
            type: "post",
            url: "/barangmasuk/dataTemp",
            data: {
                faktur:faktur
            },
            dataType: "json",
            success: function (response) {
                console.log(response)
                if(response.data){
                    
                    $('#tampilDataTemp').html(response.data);
                }
            },
            error: function(xhr, ajaxOption, thrownError){
                console.log(xhr, ajaxOption, thrownError)

                alert(xhr.status ,thrownError);
            }
        });
    }
</script>

<script>
function kosong(){
  $('#kdbarang').val('');
  $('#namabarang').val('');
  $('#hargajual').val('');
  $('#hargabeli').val('');
  $('#jumlah').val('');
  $('#kdbarang').focus();
}
</script>

<script>
    $(document).ready(function () {
        dataTemp()
    

    $('#kdbarang').keydown(function (e) { 
        if(e.keyCode==13){
            e.preventDefault();
            let kodebarang = $('#kdbarang').val();
            // alert("hello");
            $.ajax({
                type: "post",
                url: "<?= base_url()?>/barangmasuk/ambilDataBarang",
                data: {
                    kodebarang :kodebarang
                },
                dataType: "json",
                success: function (response) {
                    if(response.sukses){
                        let data =response.sukses;
                        $('#namabarang').val(data.namabarang);
                        $('#hargajual').val(data.hargajual);

                        $('#hargabeli').focus();
                    }

                    if (response.error){
                      alert(response.error)
                      kosong();
                    }
                },
                error: function(xhr, ajaxOption, thrownError){
                console.log(xhr, ajaxOption, thrownError)

                alert(xhr.status ,thrownError);
            }
            });
        }
    });

    $('#tombolTambahItem').click(function (e) { 
      e.preventDefault();
      let faktur = $('#faktur').val();
      let kdbarang = $('#kdbarang').val();
      let hargabeli = $('#hargabeli').val();
      let hargajual = $('#hargajual').val();
      let jumlah = $('#jumlah').val();

      if (faktur.length===0){
        Swal.fire({
          icon: 'error',
          title: 'Error',
          text: 'Maaf, faktur wajib diisi'
        })
      }
      else if(kdbarang.length === 0){
        alert("Maaf , kodebarang tidak boleh kosong")
      }else if(hargabeli.length === 0){
        alert("Maaf , harga beli tidak boleh kosong")
      }else if(jumlah.length === 0){
        alert("Maaf , jumlah tidak boleh kosong")
      }else{
          $.ajax({
            type: "post",
            url: "<?= base_url()?>/barangmasuk/simpanTemp",
            data: {
              faktur:faktur,
              kdbarang:kdbarang,
              hargabeli:hargabeli,
              hargajual:hargajual,
              jumlah:jumlah,
            },
            dataType: "json",
            success: function (response) {
              if(response.sukses){
                alert(response.sukses);
                kosong();
                dataTemp();
              }
            }, error: function(xhr, ajaxOption, thrownError){
                console.log(xhr, ajaxOption, thrownError)

                alert(xhr.status ,thrownError);
            }
          });
      }
    });

    $('#tombolReload').click(function (e) { 
      e.preventDefault();
      dataTemp();
      
    });
  });
</script>
<?= $this->endSection('isi') ?>