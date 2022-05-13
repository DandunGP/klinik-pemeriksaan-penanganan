<?php
    $no_ugd = $_GET['id'];
    $ugd = query("select * from ugd where no_ugd = '$no_ugd'")[0];
?>
<h1>Tambah UGD</h1>
<form action="" method="post" class="mt-4">
    <div class="form-group">
        <label for="no_ugd">No UGD</label>
        <input type="number" class="form-control" name="no_ugd" value="<?= $ugd['no_ugd'] ?>" maxlength="6" required readonly>
    </div>
    <div class="form-group">
        <?php
            $data_noreg = query("select noreg from pendaftaran where status_pasien='UGD'");
            $list_noreg = "";
            foreach($data_noreg as $noreg){
                if(query("select noreg from ugd where noreg='{$noreg['noreg']}'")==NULL or $noreg['noreg'] == $ugd['noreg']){
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
                if($reg['noreg'] == $ugd['noreg']){
                    echo "selected";
                }
            ?>
            ><?= $reg['noreg'] ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="form-group">
        <label for="cara_masuk">Cara Masuk</label>
        <select name="cara_masuk" class="form-control">
            <option value="Datang Sendiri"
            <?php
                if($ugd['cara_masuk'] == 'Datang Sendiri'){
                    echo 'selected';
                }
            ?>
            >Datang Sendiri</option>
            <option value="Dirujuk"
            <?php
                if($ugd['cara_masuk'] == 'Dirujuk'){
                    echo 'selected';
                }
            ?>
            >Dirujuk</option>
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
                if($dokter['kode_dok'] == $ugd['kode_dok']){
                    echo 'selected';
                }
            ?>
            ><?= "{$dokter['kode_dok']} -- {$dokter['nama_dok']}" ?></option>
            <?php } ?>
        </select>
    </div>
    <button type="submit" name="submit" class="btn btn-primary" style="width:150px">Submit</button>
</form>

<?php
    if(isset($_POST['submit'])){
        if(editUgd()){
            echo "<script>alert('Edit UGD Berhasil')
                    location.href = 'dashboard.php?tab=ugd'
            </script>";
        } else {
            echo "<script>alert('Edit UGD Gagal')</script>";
        }
    }
?>