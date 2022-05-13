<h1>Tambah Pendaftaran</h1>
<form action="" method="post" class="mt-4">
    <div class="form-group">
        <label for="noreg">No Register</label>
        <input type="number" class="form-control" name="noreg" value="" maxlength="6" required>
    </div>
    <div class="form-group">
        <label for="tglreg">Tanggal</label>
        <input type="date" class="form-control" name="tglreg" required>
    </div>
    <div class="form-group">
        <?php
            $data_norm = query("SELECT * FROM pasien");
        ?>
        <label for="no_rm">NO Rekam Medis</label>
        <select name="no_rm" class="form-control">
            <?php foreach($data_norm as $norm) {?>
            <option value="<?= $norm['no_rm'] ?>"><?= "{$norm['no_rm']} -- {$norm['nama_pasien']}" ?></option>
                <?php } ?>
        </select>
    </div>
    <div class="form-group">
        <label for="jenis_pasien">Jenis Pasien</label>
        <select name="jenis_pasien" class="form-control">
            <option value="Pasien Baru">Pasien Baru</option>
            <option value="Pasien Lama">Pasien Lama</option>
        </select>
    </div>
    <div class="form-group">
        <label for="status_pasien">Status Pasien</label>
        <select name="status_pasien" class="form-control">
            <option value="null"> -- </option>
            <option value="Rawat Jalan">Rawat Jalan</option>
            <option value="Rawat Inap">Rawat Inap</option>
            <option value="UGD">UGD</option>
        </select>
    </div>
    <button type="submit" name="submit" class="btn btn-primary" style="width:150px">Submit</button>
</form>

<?php
    if(isset($_POST['submit'])){
        if(tambahPendaftaran()){
            echo "<script>alert('Tambah Pendaftaran Berhasil')
                    location.href = 'dashboard.php?tab=pendaftaran'
            </script>";
        } else {
            echo "<script>alert('Tambah Pendaftaran Gagal')</script>";
        }
    }
?>