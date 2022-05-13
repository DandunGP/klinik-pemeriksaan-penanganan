<h1>Tambah Pemeriksaan</h1>
<form action="" method="post" class="mt-4">
    <div class="form-group">
        <label for="no_periksa">No Pemeriksaan</label>
        <input type="number" class="form-control" name="no_periksa" value="" maxlength="6" required>
    </div>
    <div class="form-group">
        <label for="tgl_periksa">Tanggal Periksa</label>
        <input type="date" class="form-control" name="tgl_periksa" required>
    </div>
    <div class="form-group">
        <?php
            $data_noreg = query("select noreg from pendaftaran");
            $list_noreg = "";
            foreach($data_noreg as $noreg){
                if(query("select noreg from pemeriksaan where noreg='{$noreg['noreg']}'")==NULL){
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
            <option value="<?= $reg['noreg'] ?>"><?= $reg['noreg'] ?></option>
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
            <option value="<?= $dokter['kode_dok'] ?>"><?= "{$dokter['kode_dok']} -- {$dokter['nama_dok']}" ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="form-group">
        <label for="anamnesa">Anamnesa</label>
        <input type="text" class="form-control" name="anamnesa" value="" maxlength="" required>
    </div>
    <div class="form-group">
        <label for="tb">Tinggi Badan</label>
        <input type="number" class="form-control" name="tb" value="" maxlength="6" required>
    </div>
    <div class="form-group">
        <label for="bb">Berat Badan</label>
        <input type="number" class="form-control" name="bb" value="" maxlength="6" required>
    </div>
    <div class="form-group">
        <label for="td">TD</label>
        <input type="number" class="form-control" name="td" value="" maxlength="6" required>
    </div>
    <div class="form-group">
        <label for="sh">Suhu</label>
        <input type="number" class="form-control" name="sh" value="" maxlength="6" required>
    </div>
    <div class="form-group">
        <label for="nd">Nadi</label>
        <input type="number" class="form-control" name="nd" value="" maxlength="6" required>
    </div>
    <div class="form-group">
        <?php
            $data_diagnosa = query("select * from diagnosa");
        ?>
        <label for="kode_diagnosa">Diagnosa</label>
        <select name="kode_diagnosa" class="form-control">
            <?php foreach($data_diagnosa as $diagnosa) {?>
            <option value="<?= $diagnosa['kode_diagnosa'] ?>"><?= "{$diagnosa['kode_diagnosa']} -- {$diagnosa['nama_diagnosa']}" ?></option>
            <?php } ?>
        </select>
    </div>
    <button type="submit" name="submit" class="btn btn-primary" style="width:150px">Submit</button>
</form>

<?php
    if(isset($_POST['submit'])){
        if(tambahPemeriksaan()){
            echo "<script>alert('Tambah Pemeriksaan Berhasil')
                    location.href = 'dashboard.php?tab=pemeriksaan'
            </script>";
        } else {
            echo "<script>alert('Tambah Pemeriksaan Gagal')</script>";
        }
    }
?>