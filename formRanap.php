<h1>Tambah Rawat Inap</h1>
<form action="" method="post" class="mt-4">
    <div class="form-group">
        <label for="no_ranap">No Rawat Inap</label>
        <input type="number" class="form-control" name="no_ranap" value="" maxlength="6" required>
    </div>
    <div class="form-group">
        <?php
            $data_noreg = query("select noreg from pendaftaran where status_pasien='Rawat Inap'");
            $list_noreg = "";
            foreach($data_noreg as $noreg){
                if(query("select noreg from rawat_inap where noreg='{$noreg['noreg']}'")==NULL){
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
        <label for="cara_masuk">Cara Masuk</label>
        <select name="cara_masuk" class="form-control">
            <option value="Datang Sendiri">Datang Sendiri</option>
            <option value="Dirujuk">Dirujuk</option>
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
        <?php
            $data_kamar = query("select * from kamar");
            // $list_kamar = "";
            // foreach ($data_kamar as $kamar){
            //     if(query("select kode_kamar from rawat_inap where kode_kamar='{$kamar['kode_kamar']}'") == NULL){
            //         $list_kamar = "$list_kamar'{$kamar['kode_kamar']}',";
            //     }
            // }
            // if($list_kamar !== ""){
            //     $noKamar = substr($list_kamar, 0, strlen($list_kamar)-1);
            //     $noKamar = query("select * from kamar where kode_kamar in ($noKamar)");
            // } else {
            //     $noKamar = query("select * from kamar where kode_kamar in (NULL)");
            // }
        ?>
        <label for="kode_kamar">Kamar</label>
        <select name="kode_kamar" class="form-control">
            <?php foreach($data_kamar as $kamar) {?>
                <?php if($kamar['no_rm']==NULL) {?>
            <option value="<?= $kamar['kode_kamar'] ?>"><?= "{$kamar['kode_kamar']} -- {$kamar['nama_kamar']}" ?></option>
            <?php }} ?>
        </select>
    </div>
    <button type="submit" name="submit" class="btn btn-primary" style="width:150px">Submit</button>
</form>

<?php
    if(isset($_POST['submit'])){
        if(tambahInap()){
            echo "<script>alert('Tambah Rawat Inap Berhasil')
                    location.href = 'dashboard.php?tab=ranap'
            </script>";
        } else {
            echo "<script>alert('Tambah Rawat Inap Gagal')</script>";
        }
    }
?>