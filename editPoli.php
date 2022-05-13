<?php
    $kode_poli = $_GET["id"];
    $poliklinik = query("select * from poliklinik where kode_poli = '$kode_poli'")[0];
?>
<h1>Tambah Poli</h1>
<form action="" method="post" class="mt-4">
    <div class="form-group">
        <label for="kode_poli">Kode Poli</label>
        <input type="number" class="form-control" name="kode_poli" value="<?= $poliklinik['kode_poli'] ?>" maxlength="5" required readonly>
    </div>
    <div class="form-group">
        <label for="nama_poli">Nama Poli</label>
        <input type="text" class="form-control" name="nama_poli" value="<?= $poliklinik['nama_poli'] ?>" maxlength='36' required>
    </div>
    <button type="submit" name="submit" class="btn btn-primary" style="width:150px">Submit</button>
</form>

<?php
    if(isset($_POST['submit'])){
        if(editPoli()){
            echo "<script>alert('Edit Poli Berhasil')
                    location.href = 'dashboard.php?tab=poliklinik'
            </script>";
        } else {
            echo "<script>alert('Edit Poli Gagal')</script>";
        }
    }
?>