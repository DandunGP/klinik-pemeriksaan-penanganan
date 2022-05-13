<h1>Tambah Dokter</h1>
<form action="" method="post" class="mt-4">
    <div class="form-group">
        <label for="kode_dok">Kode Dokter</label>
        <input type="number" class="form-control" name="kode_dok" value="" maxlength="5" required>
    </div>
    <div class="form-group">
        <label for="nama_dok">Nama Pasien</label>
        <input type="text" class="form-control" name="nama_dok" maxlength='36' required>
    </div>
    <div class="form-group">
        <label for="nip">NIP</label>
        <input type="number" class="form-control" name="nip" maxlength='25' required>
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
        if(tambahDokter()){
            echo "<script>alert('Tambah Dokter Berhasil')
                    location.href = 'dashboard.php?tab=dokter'
            </script>";
        } else {
            echo "<script>alert('Tambah Dokter Gagal')</script>";
        }
    }
?>