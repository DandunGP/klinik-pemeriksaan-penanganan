<h1>Tabel Pasien</h1>
<?php
$data = query('select * from pasien');
?>
<a href="dashboard.php?tab=formPasien" class="btn btn-primary pl-3 py-1 mt-4 mb-4"><i class="fa-solid fa-user-plus pr-2"></i>Tambah
    Pasien</a>
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">No Rekam Medis</th>
            <th scope="col">Nama Pasien</th>
            <th scope="col">Jenis Kelamin</th>
            <th scope="col">Tanggal Lahir</th>
            <th scope="col">Agama</th>
            <th scope="col">Status Perkawinan</th>
            <th scope="col">Alamat</th>
            <th scope="col">Telepon</th>
            <th scope="col">Keterangan</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $dt) { ?>
            <tr>
                <td> <?= $dt['no_rm'] ?></td>
                <td> <?= $dt['nama_pasien'] ?></td>
                <td> <?= $dt['jkel'] ?></td>
                <td> <?= $dt['tgl_lahir'] ?></td>
                <td> <?= $dt['agama'] ?></td>
                <td> <?= $dt['status_perkawinan'] ?></td>
                <td> <?= $dt['alamat'] ?></td>
                <td> <?= $dt['telepon'] ?></td>
                <td>
                    <a href="dashboard.php?tab=editPasien&norm=<?= $dt['no_rm'] ?>" class="btn btn-success pl-3 py-0"><i class="fa-solid fa-pen pr-2"></i>Edit</a>
                    <a href="dashboard.php?tab=deletePasien&id=<?= $dt['no_rm'] ?>" class="btn btn-danger pl-3 py-0" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa-solid fa-trash pr-2"></i>Delete</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>