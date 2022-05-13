<h1>Tabel Kamar</h1>
<?php
$data = query('select kamar.*, pasien.nama_pasien from kamar left join pasien on kamar.no_rm=pasien.no_rm');
?>
<a href="dashboard.php?tab=formKamar" class="btn btn-primary pl-3 py-1 mt-4 mb-4"><i class="fa-solid fa-user-plus pr-2"></i>Tambah
    Kamar</a>
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">Kode Kamar</th>
            <th scope="col">Nama Kamar</th>
            <th scope="col">Fasilitas</th>
            <th scope="col">Tarif</th>
            <th scope="col">Pasien</th>
            <th scope="col">Keterangan</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $dt) { ?>
            <tr>
                <td> <?= $dt['kode_kamar'] ?></td>
                <td> <?= $dt['nama_kamar'] ?></td>
                <td> <?= $dt['fasilitas_kamar'] ?></td>
                <td> <?= $dt['tarif_kamar'] ?></td>
                <td> <?= "{$dt['no_rm']} -- {$dt['nama_pasien']}" ?></td>
                <td>
                    <a href="dashboard.php?tab=editKamar&id=<?= $dt['kode_kamar'] ?>" class="btn btn-success pl-3 py-0"><i class="fa-solid fa-pen pr-2"></i>Edit</a>
                    <a href="dashboard.php?tab=deleteKamar&id=<?= $dt['kode_kamar'] ?>" class="btn btn-danger pl-3 py-0" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa-solid fa-trash pr-2"></i>Delete</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>