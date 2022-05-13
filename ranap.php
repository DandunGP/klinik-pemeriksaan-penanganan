<h1>Tabel Rawat Inap</h1>
<?php
$data = query('select rawat_inap.*, dokter.nama_dok, kamar.nama_kamar from rawat_inap join dokter on rawat_inap.kode_dok=dokter.kode_dok join kamar on rawat_inap.kode_kamar=kamar.kode_kamar');
?>
<a href="dashboard.php?tab=formRanap" class="btn btn-primary pl-3 py-1 mt-4 mb-4"><i class="fa-solid fa-user-plus pr-2"></i>Tambah
    Rawat Inap</a>
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">No Rawat Inap</th>
            <th scope="col">No Registrasi</th>
            <th scope="col">Cara Masuk</th>
            <th scope="col">Dokter</th>
            <th scope="col">Kamar</th>
            <th scope="col">Keterangan</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $dt) { ?>
            <tr>
                <td> <?= $dt['no_ranap'] ?></td>
                <td> <?= $dt['noreg'] ?></td>
                <td> <?= $dt['cara_masuk'] ?></td>
                <td> <?= "{$dt['kode_dok']} -- {$dt['nama_dok']}" ?></td>
                <td> <?= "{$dt['kode_kamar']} -- {$dt['nama_kamar']}" ?></td>
                <td>
                    <a href="dashboard.php?tab=editRanap&id=<?= $dt['no_ranap'] ?>" class="btn btn-success pl-3 py-0"><i class="fa-solid fa-pen pr-2"></i>Edit</a>
                    <a href="dashboard.php?tab=deleteRanap&id=<?= $dt['no_ranap'] ?>" class="btn btn-danger pl-3 py-0" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa-solid fa-trash pr-2"></i>Delete</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>