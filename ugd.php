<h1>Tabel UGD</h1>
<?php
$data = query('select ugd.*, pasien.no_rm, pasien.nama_pasien, dokter.nama_dok from ugd join dokter on ugd.kode_dok=dokter.kode_dok join (pendaftaran join pasien on pendaftaran.no_rm=pasien.no_rm) on pendaftaran.noreg=ugd.noreg');
?>
<a href="dashboard.php?tab=formUgd" class="btn btn-primary pl-3 py-1 mt-4 mb-4"><i class="fa-solid fa-user-plus pr-2"></i>Tambah UGD</a>
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">No UGD</th>
            <th scope="col">No Registrasi</th>
            <th scope="col">Pasien</th>
            <th scope="col">Cara Masuk</th>
            <th scope="col">Dokter</th>
            <th scope="col">Keterangan</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $dt) { ?>
            <tr>
                <td> <?= $dt['no_ugd'] ?></td>
                <td> <?= $dt['noreg'] ?></td>
                <td> <?= "{$dt['no_rm']} -- {$dt['nama_pasien']}" ?></td>
                <td> <?= $dt['cara_masuk'] ?></td>
                <td> <?= "{$dt['kode_dok']} -- {$dt['nama_dok']}" ?></td>
                <td>
                    <a href="dashboard.php?tab=editUgd&id=<?= $dt['no_ugd'] ?>" class="btn btn-success pl-3 py-0"><i class="fa-solid fa-pen pr-2"></i>Edit</a>
                    <a href="dashboard.php?tab=deleteUgd&id=<?= $dt['no_ugd'] ?>" class="btn btn-danger pl-3 py-0" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa-solid fa-trash pr-2"></i>Delete</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>