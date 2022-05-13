<?php
    $kode_diagnosa = $_GET["id"];
    $diagnosa = query("select * from diagnosa where kode_diagnosa = '$kode_diagnosa'")[0];
?>
<h1>Tambah Poli</h1>
<form action="" method="post" class="mt-4">
    <div class="form-group">
        <label for="kode_diagnosa">Kode Diagnosa</label>
        <input type="number" class="form-control" name="kode_diagnosa" value="<?= $diagnosa['kode_diagnosa'] ?>" maxlength="5" required readonly>
    </div>
    <div class="form-group">
        <label for="nama_diagnosa">Nama Diagnosa</label>
        <input type="text" class="form-control" name="nama_diagnosa" value="<?= $diagnosa['nama_diagnosa'] ?>" maxlength='36' required>
    </div>
    <button type="submit" name="submit" class="btn btn-primary" style="width:150px">Submit</button>
</form>

<?php
    if(isset($_POST['submit'])){
        if(editDiagnosa()){
            echo "<script>alert('Edit Diagnosa Berhasil')
                    location.href = 'dashboard.php?tab=diagnosa'
            </script>";
        } else {
            echo "<script>alert('Edit Diagnosa Gagal')</script>";
        }
    }
?>