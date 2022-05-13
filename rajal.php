<h1>Tabel Rawat Jalan</h1>
<?php
$data = query('select rawat_jalan.*, dokter.nama_dok, poliklinik.nama_poli from rawat_jalan join dokter on rawat_jalan.kode_dok=dokter.kode_dok join poliklinik on rawat_jalan.kode_poli=poliklinik.kode_poli');
?>
<a href="dashboard.php?tab=formRajal" class="btn btn-primary pl-3 py-1 mt-4 mb-4"><i class="fa-solid fa-user-plus pr-2"></i>Tambah
    Rawat Jalan</a>
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">No Rawat Jalan</th>
            <th scope="col">No Registrasi</th>
            <th scope="col">Dokter</th>
            <th scope="col">Poliklinik</th>
            <th scope="col">Keterangan</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $dt) { ?>
            <tr>
                <td> <?= $dt['no_rajal'] ?></td>
                <td> <?= $dt['noreg'] ?></td>
                <td> <?= "{$dt['kode_dok']} -- {$dt['nama_dok']}" ?></td>
                <td> <?= "{$dt['kode_poli']} -- {$dt['nama_poli']}" ?></td>
                <td>
                    <a href="dashboard.php?tab=editRajal&id=<?= $dt['no_rajal'] ?>" class="btn btn-success pl-3 py-0"><i class="fa-solid fa-pen pr-2"></i>Edit</a>
                    <a href="dashboard.php?tab=deleteRajal&id=<?= $dt['no_rajal'] ?>" class="btn btn-danger pl-3 py-0" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa-solid fa-trash pr-2"></i>Delete</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>