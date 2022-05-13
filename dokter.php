<h1>Tabel Dokter</h1>
<?php
$data = query('select * from dokter');
?>
<a href="dashboard.php?tab=formDokter" class="btn btn-primary pl-3 py-1 mt-4 mb-4"><i class="fa-solid fa-user-plus pr-2"></i>Tambah
    Dokter</a>
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">Kode Dokter</th>
            <th scope="col">Nama Dokter</th>
            <th scope="col">NIP</th>
            <th scope="col">Telepon</th>
            <th scope="col">Keterangan</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $dt) { ?>
            <tr>
                <td> <?= $dt['kode_dok'] ?></td>
                <td> <?= $dt['nama_dok'] ?></td>
                <td> <?= $dt['nip'] ?></td>
                <td> <?= $dt['telepon'] ?></td>
                <td>
                    <a href="dashboard.php?tab=editDokter&id=<?= $dt['kode_dok'] ?>" class="btn btn-success pl-3 py-0"><i class="fa-solid fa-pen pr-2"></i>Edit</a>
                    <a href="dashboard.php?tab=deleteDokter&id=<?= $dt['kode_dok'] ?>" class="btn btn-danger pl-3 py-0" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa-solid fa-trash pr-2"></i>Delete</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>