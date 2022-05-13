<?php
    $no_rajal = $_GET['id'];
    $rajal = query("select * from rawat_jalan where no_rajal='$no_rajal'")[0];
?>
<h1>Edit Rawat Jalan</h1>
<form action="" method="post" class="mt-4">
    <div class="form-group">
        <label for="no_rajal">No Rawat Jalan</label>
        <input type="number" class="form-control" name="no_rajal" value="<?= $rajal['no_rajal'] ?>" maxlength="6" required>
    </div>
    <div class="form-group">
        <?php
            $data_noreg = query("select noreg from pendaftaran where status_pasien='Rawat Jalan'");
            $list_noreg = "";
            foreach($data_noreg as $noreg){
                if(query("select noreg from rawat_jalan where noreg='{$noreg['noreg']}'")==NULL or $noreg['noreg'] == $rajal['noreg']){
                    $list_noreg = "$list_noreg'{$noreg['noreg']}',";
                }
            }
            if($list_noreg !== ""){
                $noreg = substr($list_noreg, 0, strlen($list_noreg)-1);
                $noreg = query("select noreg from pendaftaran where noreg in ($noreg)");
            } else {
                $noreg = query("select noreg from pendaftaran where noreg in (NULL)");
            }
        ?>
        <label for="noreg">No Register</label>
        <select name="noreg" class="form-control">
            <?php foreach ($noreg as $reg) {?>
            <option value="<?= $reg['noreg'] ?>"
            <?php
                if($reg['noreg'] == $rajal['noreg']){
                    echo "selected";
                }
            ?>
            ><?= $reg['noreg'] ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="form-group">
        <?php
            $data_dokter = query("select * from dokter");
        ?>
        <label for="kode_dok">Dokter</label>
        <select name="kode_dok" class="form-control">
            <?php foreach($data_dokter as $dokter) {?>
            <option value="<?= $dokter['kode_dok'] ?>"
            <?php
                if($dokter['kode_dok'] == $rajal['kode_dok']){
                    echo "selected";
                }
            ?>
            ><?= "{$dokter['kode_dok']} -- {$dokter['nama_dok']}" ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="form-group">
        <?php
            $data_poliklinik = query("select * from poliklinik");
        ?>
        <label for="kode_poli">Dokter</label>
        <select name="kode_poli" class="form-control">
            <?php foreach($data_poliklinik as $poliklinik) {?>
            <option value="<?= $poliklinik['kode_poli'] ?>"
            <?php
                if($poliklinik['kode_poli'] == $rajal['kode_poli']){
                    echo "selected";
                }
            ?>
            ><?= "{$poliklinik['kode_poli']} -- {$poliklinik['nama_poli']}" ?></option>
            <?php } ?>
        </select>
    </div>
    <button type="submit" name="submit" class="btn btn-primary" style="width:150px">Submit</button>
</form>

<?php
    if(isset($_POST['submit'])){
        if(editRajal()){
            echo "<script>alert('Edit Rawat Jalan Berhasil')
                    location.href = 'dashboard.php?tab=rajal'
            </script>";
        } else {
            echo "<script>alert('Edit Rawat Jalan Gagal')</script>";
        }
    }
?>