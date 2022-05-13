<h1>Tambah Diagnosa</h1>
<form action="" method="post" class="mt-4">
    <div class="form-group">
        <label for="kode_diagnosa">Kode Diagnosa</label>
        <input type="number" class="form-control" name="kode_diagnosa" value="" maxlength="5" required>
    </div>
    <div class="form-group">
        <label for="nama_diagnosa">Nama Diagnosa</label>
        <input type="text" class="form-control" name="nama_diagnosa" maxlength='36' required>
    </div>
    <button type="submit" name="submit" class="btn btn-primary" style="width:150px">Submit</button>
</form>

<?php
    if(isset($_POST['submit'])){
        if(tambahDiagnosa()){
            echo "<script>alert('Tambah Diagnosa Berhasil')
                    location.href = 'dashboard.php?tab=diagnosa'
            </script>";
        } else {
            echo "<script>alert('Tambah Diagnosa Gagal')</script>";
        }
    }
?>