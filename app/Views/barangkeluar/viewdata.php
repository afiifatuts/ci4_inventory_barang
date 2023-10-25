<?= $this->extend('main/layout') ?>

<?= $this->section('judul') ?>
Data Transaksi Barang Keluar
<?= $this->endSection('judul') ?>

<?= $this->section('subjudul') ?>
<button type="button" class="btn btn-primary" onclick="location.href=('/barangkeluar/input')">
    <i class="fa fa-plus-circle"></i> Input Transaksi
</button>
<?= $this->endSection('subjudul') ?>

<?= $this->section('isi') ?>
 <!-- DataTables -->
 <link rel="stylesheet" href="<?= base_url()?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url()?>/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<!-- DataTables  & Plugins -->
<script src="<?= base_url()?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url()?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url()?>/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url()?>/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

<div class="row">
    <div class="col">
        <label for="">Filter Data</label>
    </div>
    <div class="col">
        <input type="date" name="tglawal" id="tglawal" class="form-control">
    </div>
    <div class="col">
        <input type="date" name="tglakhir" id="tglakhir"  class="form-control">
    </div>
    <div class="col">
       <button id="tombolTampil" type="button" class="btn btn-block btn-primary" >
        Tampilkan
       </button>
    </div>
</div>
<br>
<table id="databarangkeluar" class="table table-bordered table-striped dataTable dtr-inline collapsed" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Faktur</th>
                    <th>Tanggal</th>
                    <th>Pelanggan</th>
                    <th>Total Harga</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
      </table>


      <!-- untuk menampilkan list data barang keluar  -->
<script>
    function listDataBarangKeluar() { 
        var table = $('#databarangkeluar').DataTable({
            destroy:true,
            "processing":true,
            "serverSide":true,
            "order":[],
            "ajax":{
                "url":"/barangkeluar/listData",
                "type":"POST",
                "data":{
                    tglawal:$('#tglawal').val(),
                    tglakhir:$('#tglakhir').val()
                }
            },
            "columnDefs":[{
                "targets":[0,5],
                "orderable":false,
            }]
        })
     }
</script>
<script>
    $(document).ready(function () {
      listDataBarangKeluar();  

      $('#tombolTampil').click(function (e) { 
        e.preventDefault();
      listDataBarangKeluar();  
        
      });
    });
</script>
<!-- Cetak  -->
<script>
    function cetak(faktur) { 
        window.location.href = ('/barangkeluar/cetakFaktur/')+faktur
     }
</script>
<!-- Hapus  -->
<script>
    function hapus(faktur){
        Swal.fire({
        title: 'Hapus Transaksi',
        text: "Yakin hapus ?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Hapus!'
        }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "post",
                url: "/barangkeluar/hapusTransaksi",
                data: {
                    faktur:faktur 
                },
                dataType: "json",
                success: function (response) {
                    if(response.sukses){
                        Swal.fire(
                        'Sukses!',
                        'Data Barang Keluar Berhasil Dihapus!',
                        'success'
                        )

                        listDataBarangKeluar()
                    }
                },error:function(xhr,ajaxOptions, thrownError){
                alert(xhr.status + '\n' + thrownError)
                console.log(xhr.status + '\n' + thrownError)
            }
            });
        }
        })
    }
</script>

<!-- edit  -->
<script>
    function edit(faktur) {
        window.location.href=('/barangkeluar/edit/')+faktur
    }
</script>
<?= $this->endSection('isi') ?>

