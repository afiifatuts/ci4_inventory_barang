<?= $this->extend('main/layout') ?>

<?= $this->section('judul') ?>
Manajemen User
<?= $this->endSection('judul') ?>

<?= $this->section('subjudul') ?>

Manajemen User

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

<table class="table table-sm table-bordered" id="datauser" style="width:100%;">
    <thead>
        <tr>
            <th>No</th>
            <th>ID User</th>
            <th>Nama User</th>
            <th>Level</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>

    </tbody>
</table>
<script>
    $(document).ready(function () {
        let dataUser = $('#datauser').DataTable({
        processing: true,
        serverSide: true,
        ajax: '<?= base_url()?>/users/listData',
        columns: [
            {
                data: 'nomor',
                width:10,
            },
            {data: 'userid'},
            {data: 'username'},
            {data: 'levelnama'},
            {
                data: 'status',
                orderable:false,
                width:25,
            },
            {
                data: 'aksi',
                orderable:false,
                width:25,
            },
        ]
    });
    });
</script>

<?= $this->endSection('isi') ?>