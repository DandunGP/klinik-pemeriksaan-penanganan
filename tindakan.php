<h1>Tabel Tindakan</h1>
<?php
$data = query('select * from tindakan');
?>
<a href="dashboard.php?tab=formTindakan" class="btn btn-primary pl-3 py-1 mt-4 mb-4"><i class="fa-solid fa-user-plus pr-2"></i>Tambah
    Tindakan</a>
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">Kode Tindakan</th>
            <th scope="col">Nama Tindakan</th>
            <th scope="col">Keterangan</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $dt) { ?>
            <tr>
                <td> <?= $dt['kode_tindakan'] ?></td>
                <td> <?= $dt['nama_tindakan'] ?></td>
                <td>
                    <a href="dashboard.php?tab=editTindakan&id=<?= $dt['kode_tindakan'] ?>" class="btn btn-success pl-3 py-0"><i class="fa-solid fa-pen pr-2"></i>Edit</a>
                    <a href="dashboard.php?tab=deleteTindakan&id=<?= $dt['kode_tindakan'] ?>" class="btn btn-danger pl-3 py-0" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa-solid fa-trash pr-2"></i>Delete</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>