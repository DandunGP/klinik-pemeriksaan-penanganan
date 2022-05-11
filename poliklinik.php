<h1>Tabel Poliklinik</h1>
<?php
$data = query('select * from poliklinik');
?>
<a href="dashboard.php?tab=formPoli" class="btn btn-primary pl-3 py-1 mt-4 mb-4"><i class="fa-solid fa-user-plus pr-2"></i>Tambah
    Poliklinik</a>
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">Kode Poli</th>
            <th scope="col">Nama Poli</th>
            <th scope="col">Keterangan</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $dt) { ?>
            <tr>
                <td> <?= $dt['kode_poli'] ?></td>
                <td> <?= $dt['nama_poli'] ?></td>
                <td>
                    <a href="dashboard.php?tab=editPoli&id=<?= $dt['kode_poli'] ?>" class="btn btn-success pl-3 py-0"><i class="fa-solid fa-pen pr-2"></i>Edit</a>
                    <a href="dashboard.php?tab=deletePoli&id=<?= $dt['kode_poli'] ?>" class="btn btn-danger pl-3 py-0" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa-solid fa-trash pr-2"></i>Delete</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>