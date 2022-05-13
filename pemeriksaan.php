<h1>Tabel Pemeriksaan</h1>
<?php
$data = query('select pemeriksaan.*, pasien.nama_pasien, dokter.nama_dok from pemeriksaan join pasien on pasien.no_rm=pemeriksaan.no_rm join dokter on dokter.kode_dok=pemeriksaan.kode_dok');
?>
<a href="dashboard.php?tab=formPemeriksaan" class="btn btn-primary pl-3 py-1 mt-4 mb-4"><i class="fa-solid fa-user-plus pr-2"></i>Tambah
    Pemeriksaan</a>
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">Tanggal Periksa</th>
            <th scope="col">No Register</th>
            <th scope="col">Pasien</th>
            <th scope="col">Dokter</th>
            <th scope="col">Anamnesa</th>
            <th scope="col">TB</th>
            <th scope="col">BB</th>
            <th scope="col">SH</th>
            <th scope="col">ND</th>
            <th scope="col">Diagnosa</th>
            <th scope="col">Keterangan</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $dt) { ?>
            <tr>
                <td> <?= $dt['tgl_periksa'] ?></td>
                <td> <?= $dt['noreg'] ?></td>
                <td> <?= "{$dt['no_rm']} -- {$dt['nama_pasien']}" ?></td>
                <td> <?= "{$dt['kode_dok']} -- {$dt['nama_dok']}" ?></td>
                <td> <?= $dt['anamnesa'] ?></td>
                <td> <?= $dt['tb'] ?></td>
                <td> <?= $dt['bb'] ?></td>
                <td> <?= $dt['sh'] ?></td>
                <td> <?= $dt['nd'] ?></td>
                <td> <?= $dt['diagnosa'] ?></td>
                <td>
                    <a href="dashboard.php?tab=editPemeriksaan&id=<?= $dt['no_periksa'] ?>" class="btn btn-success pl-3 py-0"><i class="fa-solid fa-pen pr-2"></i>Edit</a>
                    <a href="dashboard.php?tab=deletePemeriksaan&id=<?= $dt['no_periksa'] ?>" class="btn btn-danger pl-3 py-0" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa-solid fa-trash pr-2"></i>Delete</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>