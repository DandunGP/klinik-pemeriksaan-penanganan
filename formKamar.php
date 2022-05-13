<h1>Tambah Kamar</h1>
<form action="" method="post" class="mt-4">
    <div class="form-group">
        <label for="kode_kamar">Kode Kamar</label>
        <input type="number" class="form-control" name="kode_kamar" value="" maxlength="5" required>
    </div>
    <div class="form-group">
        <label for="nama_kamar">Nama Kamar</label>
        <input type="text" class="form-control" name="nama_kamar" maxlength='36' required>
    </div>
    <div class="form-group">
        <label for="fasilitas">Fasilitas</label>
        <input type="text" class="form-control" name="fasilitas" maxlength='36' required>
    </div>
    <div class="form-group">
        <label for="tarif">Tarif</label>
        <input type="number" class="form-control" name="tarif" maxlength='36' required>
    </div>
    <button type="submit" name="submit" class="btn btn-primary" style="width:150px">Submit</button>
</form>

<?php
    if(isset($_POST['submit'])){
        if(tambahKamar()){
            echo "<script>alert('Tambah Kamar Berhasil')
                    location.href = 'dashboard.php?tab=kamar'
            </script>";
        } else {
            echo "<script>alert('Tambah Kamar Gagal')</script>";
        }
    }
?>