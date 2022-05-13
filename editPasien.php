<?php
    $norm = $_GET['norm'];
    $pasien = query("select * from pasien where no_rm='$norm'")[0];
?>
<h1>Edit Pasien</h1>
<form action="" method="post" class="mt-4">
    <div class="form-group">
        <label for="norm">No Rekam Medis</label>
        <input type="number" class="form-control" name="norm" value="<?= $pasien['no_rm'] ?>" maxlength="6" required readonly>
    </div>
    <div class="form-group">
        <label for="nama_pasien">Nama Pasien</label>
        <input type="text" class="form-control" name="nama_pasien" value="<?= $pasien['nama_pasien'] ?>" maxlength='36' required>
    </div>
    <div class="form-group">
        <label for="nama_pasien">Jenis Kelamin</label>
        <select name="jenis_kelamin" class="form-control">
            <option value="L"
            <?php
                if($pasien['jkel'] == 'L'){
                    echo 'selected';
                }
            ?>>Laki-Laki</option>
            <option value="P"
            <?php
                if($pasien['jkel'] == 'P'){
                    echo 'selected';
                }
            ?>>Perempuan</option>
        </select>
    </div>
    <div class="form-group">
        <label for="tanggal_lahir">Tanggal Lahir</label>
        <input type="date" class="form-control" name="tanggal_lahir" value="<?= $pasien['tgl_lahir'] ?>" required>
    </div>
    <div class="form-group">
        <label for="agama">Agama</label>
        <select name="agama" class="form-control">
            <option value="Islam"
            <?php
                if($pasien['agama'] == 'Islam'){
                    echo 'selected';
                }
            ?>>Islam</option>
            <option value="Hindu"
            <?php
                if($pasien['agama'] == 'Hindu'){
                    echo 'selected';
                }
            ?>>Hindu</option>
            <option value="Katolik"
            <?php
                if($pasien['agama'] == 'Katolik'){
                    echo 'selected';
                }
            ?>>Katolik</option>
            <option value="Kristen"
            <?php
                if($pasien['agama'] == 'Kristen'){
                    echo 'selected';
                }
            ?>>Kristen</option>
            <option value="Budha"
            <?php
                if($pasien['agama'] == 'Budha'){
                    echo 'selected';
                }
            ?>>Budha</option>
        </select>
    </div>
    <div class="form-group">
        <label for="status">Status Perkawinan</label>
        <select name="status" class="form-control">
            <option value="Belum Menikah"
            <?php
                if($pasien['status_perkawinan'] == 'Belum Menikah'){
                    echo 'selected';
                }
            ?>>Belum Menikah</option>
            <option value="Menikah"
            <?php
                if($pasien['status_perkawinan'] == 'Menikah'){
                    echo 'selected';
                }
            ?>>Menikah</option>
        </select>
    </div>
    <div class="form-group">
        <label for="alamat">Alamat</label>
        <input type="text" class="form-control" name="alamat" value="<?= $pasien['alamat'] ?>" maxlength='55' required>
    </div>
    <div class="form-group">
        <label for="telepon">Telepon</label>
        <div class="row">
            <div class="col-1">
                <input type="text" class="form-control" value="62" readonly>
            </div>
            <div class="col">
                <?php
                    $telp = substr($pasien['telepon'],2);

                ?>
                <input type="number" class="form-control" name="telepon" placeholder="8123456789" value="<?= $telp ?>" maxlength='13' required>
            </div>
        </div>
    </div>
    <button type="submit" name="submit" class="btn btn-primary" style="width:150px">Submit</button>
</form>

<?php
    if(isset($_POST['submit'])){
        if(editPasien()){
            echo "<script>alert('Edit Pasien Berhasil')
                    location.href = 'dashboard.php?tab=pasien'
            </script>";
        } else {
            echo "<script>alert('Edit Pasien Gagal')</script>";
        }
    }
?>