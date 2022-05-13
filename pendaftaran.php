<h1>Tabel Pasien</h1>
<?php
$data = query('select pendaftaran.*, pasien.nama_pasien from pendaftaran join pasien on pendaftaran.no_rm=pasien.no_rm');
?>
<a href="dashboard.php?tab=formPendaftaran" class="btn btn-primary pl-3 py-1 mt-4 mb-4"><i class="fa-solid fa-user-plus pr-2"></i>Tambah
    Pendaftaran</a>
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">No Register</th>
            <th scope="col">Tanggal</th>
            <th scope="col">No Rekam Medis</th>
            <th scope="col">Nama Pasien</th>
            <th scope="col">Jenis Pasien</th>
            <th scope="col">Status Pasien</th>
            <th scope="col">Keterangan</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $dt) { ?>
            <tr>
                <td> <?= $dt['noreg'] ?></td>
                <td> <?= $dt['tglreg'] ?></td>
                <td> <?= $dt['no_rm'] ?></td>
                <td> <?= $dt['nama_pasien'] ?></td>
                <td> <?= $dt['jenis_pasien'] ?></td>
                <td> <?= $dt['status_pasien'] ?></td>
                <td>
                    <a href="dashboard.php?tab=editPendaftaran&id=<?= $dt['noreg'] ?>" class="btn btn-success pl-3 py-0"><i class="fa-solid fa-pen pr-2"></i>Edit</a>
                    <a href="dashboard.php?tab=deletePendaftaran&id=<?= $dt['noreg'] ?>" class="btn btn-danger pl-3 py-0" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa-solid fa-trash pr-2"></i>Delete</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>