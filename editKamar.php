<?php
    $kode_kamar = $_GET['id'];
    $kamar = query("select * from kamar where kode_kamar = '$kode_kamar'")[0];
?>
<h1>Edit Kamar</h1>
<form action="" method="post" class="mt-4">
    <div class="form-group">
        <label for="kode_kamar">Kode Kamar</label>
        <input type="number" class="form-control" name="kode_kamar" value="<?= $kamar['kode_kamar'] ?>" maxlength="5" required readonly>
    </div>
    <div class="form-group">
        <label for="nama_kamar">Nama Kamar</label>
        <input type="text" class="form-control" name="nama_kamar" value="<?= $kamar['nama_kamar'] ?>" maxlength='36' required>
    </div>
    <div class="form-group">
        <label for="fasilitas">Fasilitas</label>
        <input type="text" class="form-control" name="fasilitas" value="<?= $kamar['fasilitas_kamar'] ?>" maxlength='36' required>
    </div>
    <div class="form-group">
        <label for="tarif">Tarif</label>
        <input type="number" class="form-control" name="tarif" value="<?= $kamar['tarif_kamar'] ?>" maxlength='36' required>
    </div>
    <div class="form-group">
        <label for="pasien">Pasien</label>
        <?php
            $data_pasien = query("select no_rm from pasien");
            $norm = "";
            foreach ($data_pasien as $pasien){
                if(query("select no_rm from kamar where no_rm='{$pasien['no_rm']}'") == null or query("select no_rm from kamar where no_rm='{$pasien['no_rm']}'")[0]['no_rm'] == $kamar['no_rm']){
                    $norm = "$norm'{$pasien['no_rm']}',";
                }
            }
            $norm = substr($norm,0, strlen($norm)-1);
            $pasien = query("select * from pasien where no_rm in ($norm)");
        ?>
        <select name="pasien" class="form-control">
            <option value="null">Kosong</option>
            <?php
                foreach ($pasien as $data):
            ?>
            <option value="<?= $data['no_rm'] ?>"
            <?php
                if($kamar['no_rm'] == $data['no_rm']){
                    echo "selected";
                }
            ?> > <?php echo "{$data['no_rm']} -- {$data['nama_pasien']}";?>
            <?php endforeach; ?>
        </select>
    </div>
    <button type="submit" name="submit" class="btn btn-primary" style="width:150px">Submit</button>
</form>

<?php
    if(isset($_POST['submit'])){
        if(editKamar()){
            echo "<script>alert('Tambah Kamar Berhasil')
                    location.href = 'dashboard.php?tab=kamar'
            </script>";
        } else {
            echo "<script>alert('Tambah Kamar Gagal')</script>";
        }
    }
?>