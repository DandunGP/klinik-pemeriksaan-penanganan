<h1>Tambah Tindakan</h1>
<form action="" method="post" class="mt-4">
    <div class="form-group">
        <label for="kode_tindakan">Kode Tindakan</label>
        <input type="number" class="form-control" name="kode_tindakan" value="" maxlength="5" required>
    </div>
    <div class="form-group">
        <label for="nama_tindakan">Nama Tindakan</label>
        <input type="text" class="form-control" name="nama_tindakan" maxlength='36' required>
    </div>
    <button type="submit" name="submit" class="btn btn-primary" style="width:150px">Submit</button>
</form>

<?php
    if(isset($_POST['submit'])){
        if(tambahTindakan()){
            echo "<script>alert('Tambah Tindakan Berhasil')
                    location.href = 'dashboard.php?tab=tindakan'
            </script>";
        } else {
            echo "<script>alert('Tambah Tindakan Gagal')</script>";
        }
    }
?>