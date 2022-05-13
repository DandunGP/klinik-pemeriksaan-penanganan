<?php
    $noreg = $_GET['id'];
    $reg = query("select * from pendaftaran where noreg = '$noreg'")[0];
?>
<h1>Edit Pendaftaran</h1>
<form action="" method="post" class="mt-4">
    <div class="form-group">
        <label for="noreg">No Register</label>
        <input type="number" class="form-control" name="noreg" value="<?= $reg['noreg'] ?>" maxlength="6" required readonly>
    </div>
    <div class="form-group">
        <label for="tglreg">Tanggal</label>
        <input type="date" class="form-control" name="tglreg" value="<?= $reg['tglreg'] ?>" required>
    </div>
    <div class="form-group">
        <?php
            $data_norm = query("SELECT * FROM pasien");
        ?>
        <label for="no_rm">NO Rekam Medis</label>
        <select name="no_rm" class="form-control">
            <?php foreach($data_norm as $norm) {?>
            <option value="<?= $norm['no_rm'] ?>"
            <?php
                if($reg['no_rm'] == $norm['no_rm']){
                    echo "selected";
                }
            ?>
            ><?= "{$norm['no_rm']} -- {$norm['nama_pasien']}" ?></option>
                <?php } ?>
        </select>
    </div>
    <div class="form-group">
        <label for="jenis_pasien">Jenis Pasien</label>
        <select name="jenis_pasien" class="form-control">
            <option value="Pasien Baru"
            <?php
                if($reg['jenis_pasien'] == "Pasien Baru"){
                    echo "selected";
                }
            ?>
            >Pasien Baru</option>
            <option value="Pasien Lama"
            <?php
                if($reg['jenis_pasien'] == "Pasien Lama"){
                    echo "selected";
                }
            ?>
            >Pasien Lama</option>
        </select>
    </div>
    <div class="form-group">
        <label for="status_pasien">Status Pasien</label>
        <select name="status_pasien" class="form-control">
            <option value="null"
            <?php
                if($reg['status_pasien'] == NULL){
                    echo "selected";
                }
            ?>
            > -- </option>
            <option value="Rawat Jalan"
            <?php
                if($reg['status_pasien'] == "Rawat Jalan"){
                    echo "selected";
                }
            ?>
            >Rawat Jalan</option>
            <option value="Rawat Inap"
            <?php
                if($reg['status_pasien'] == "Rawat Inap"){
                    echo "selected";
                }
            ?>
            >Rawat Inap</option>
            <option value="UGD"
            <?php
                if($reg['status_pasien'] == "UGD"){
                    echo "selected";
                }
            ?>
            >UGD</option>
        </select>
    </div>
    <button type="submit" name="submit" class="btn btn-primary" style="width:150px">Submit</button>
</form>

<?php
    if(isset($_POST['submit'])){
        if(editPendaftaran()){
            echo "<script>alert('Edit Pendaftaran Berhasil')
                    location.href = 'dashboard.php?tab=pendaftaran'
            </script>";
        } else {
            echo "<script>alert('Edit Pendaftaran Gagal')</script>";
        }
    }
?>