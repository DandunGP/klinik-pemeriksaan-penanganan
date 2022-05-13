<?php
    $kode_dok = $_GET['id'];
    $dokter = query("select * from dokter where kode_dok='$kode_dok'")[0];
?>
<h1>Tambah Dokter</h1>
<form action="" method="post" class="mt-4">
    <div class="form-group">
        <label for="kode_dok">Kode Dokter</label>
        <input type="number" class="form-control" name="kode_dok" value="<?= $dokter['kode_dok'] ?>" maxlength="5" required readonly>
    </div>
    <div class="form-group">
        <label for="nama_dok">Nama Pasien</label>
        <input type="text" class="form-control" name="nama_dok" value="<?= $dokter['nama_dok'] ?>" maxlength='36' required>
    </div>
    <div class="form-group">
        <label for="nip">NIP</label>
        <input type="number" class="form-control" name="nip" value="<?= $dokter['nip'] ?>" maxlength='25' required>
    </div>
    <div class="form-group">
        <label for="telepon">Telepon</label>
        <div class="row">
            <div class="col-1">
                <input type="text" class="form-control" value="62" readonly>
            </div>
            <div class="col">
                <?php
                    $telp = substr($dokter['telepon'],2);

                ?>
                <input type="number" class="form-control" name="telepon" placeholder="8123456789" value="<?= $telp ?>" maxlength='13' required>
            </div>
        </div>
    </div>
    <button type="submit" name="submit" class="btn btn-primary" style="width:150px">Submit</button>
</form>

<?php
    if(isset($_POST['submit'])){
        if(EditDokter()){
            echo "<script>alert('Edit Dokter Berhasil')
                    location.href = 'dashboard.php?tab=dokter'
            </script>";
        } else {
            echo "<script>alert('Edit Dokter Gagal')</script>";
        }
    }
?>