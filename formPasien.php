<h1>Tambah Pasien</h1>
<form action="" method="post" class="mt-4">
    <div class="form-group">
        <label for="norm">No Rekam Medis</label>
        <input type="number" class="form-control" name="norm" value="" maxlength="6" required>
    </div>
    <div class="form-group">
        <label for="nama_pasien">Nama Pasien</label>
        <input type="text" class="form-control" name="nama_pasien" maxlength='36' required>
    </div>
    <div class="form-group">
        <label for="nama_pasien">Jenis Kelamin</label>
        <select name="jenis_kelamin" class="form-control">
            <option value="L">Laki-Laki</option>
            <option value="P">Perempuan</option>
        </select>
    </div>
    <div class="form-group">
        <label for="tanggal_lahir">Tanggal Lahir</label>
        <input type="date" class="form-control" name="tanggal_lahir" required>
    </div>
    <div class="form-group">
        <label for="agama">Agama</label>
        <select name="agama" class="form-control">
            <option value="Islam">Islam</option>
            <option value="Hindu">Hindu</option>
            <option value="Katolik">Katolik</option>
            <option value="Kristen">Kristen</option>
            <option value="Budha">Budha</option>
        </select>
    </div>
    <div class="form-group">
        <label for="status">Status Perkawinan</label>
        <select name="status" class="form-control">
            <option value="Belum Menikah">Belum Menikah</option>
            <option value="Menikah">Menikah</option>
        </select>
    </div>
    <div class="form-group">
        <label for="alamat">Alamat</label>
        <input type="text" class="form-control" name="alamat" maxlength='55' required>
    </div>
    <div class="form-group">
        <label for="telepon">Telepon</label>
        <div class="row">
            <div class="col-1">
                <input type="text" class="form-control" value="62" readonly>
            </div>
            <div class="col">
                <input type="number" class="form-control" name="telepon" placeholder="8123456789" maxlength='13' required>
            </div>
        </div>
    </div>
    <button type="submit" name="submit" class="btn btn-primary" style="width:150px">Submit</button>
</form>

<?php
    if(isset($_POST['submit'])){
        if(tambahPasien()){
            echo "<script>alert('Tambah Pasien Berhasil')
                    location.href = 'dashboard.php'
            </script>";
        } else {
            echo "<script>alert('Tambah Pasien Gagal')</script>";
        }
    }
?>