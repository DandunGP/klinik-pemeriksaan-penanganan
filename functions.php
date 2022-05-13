<?php
$conn = mysqli_connect('localhost', 'root', '', 'klinik-ida');

function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function set_and_enum_values(&$conn, $table, $field)
{
    $query = "SHOW COLUMNS FROM `$table` LIKE '$field'";
    $result = mysqli_query($conn, $query) or die('Error getting Enum/Set field ' . mysqli_error($conn));
    $row = mysqli_fetch_row($result);

    if (stripos($row[1], 'enum') !== false || stripos($row[1], 'set') !== false) {
        $values = str_ireplace(array('enum(', 'set('), '', trim($row[1], ')'));
        $values = explode(',', $values);
        $values = array_map(function ($str) {
            return trim($str, '\'"');
        }, $values);
    }

    return $values;
}

function tambahPasien(){
    global $conn;

    $norm = $_POST['norm'];
    $nama_pasien = $_POST['nama_pasien'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $agama = $_POST['agama'];
    $status = $_POST['status'];
    $alamat = $_POST['alamat'];
    $telepon = $_POST['telepon'];

    if(substr($telepon,0,1) == '0'){
        $telepon = substr($telepon,1);
        $telepon = "62$telepon";
    } else if(substr($telepon,0,2) != '62'){
        $telepon = "62$telepon";
    }

    $query_insert = "insert into pasien values ('$norm', '$nama_pasien', '$jenis_kelamin', '$tanggal_lahir', '$agama', '$status', '$alamat', '$telepon')";

    $hasil = mysqli_query($conn,$query_insert);
    return $hasil;
}

function editPasien(){
    global $conn;

    $norm = $_POST['norm'];
    $nama_pasien = $_POST['nama_pasien'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $agama = $_POST['agama'];
    $status = $_POST['status'];
    $alamat = $_POST['alamat'];
    $telepon = $_POST['telepon'];

    if(substr($telepon,0,1) == '0'){
        $telepon = substr($telepon,1);
        $telepon = "62$telepon";
    } else if(substr($telepon,0,2) != '62'){
        $telepon = "62$telepon";
    }
    
    $query_edit = "update pasien set nama_pasien='$nama_pasien', jkel='$jenis_kelamin', tgl_lahir='$tanggal_lahir', agama='$agama', status_perkawinan='$status', alamat='$alamat', telepon='$telepon' where no_rm='$norm'";

    $hasil = mysqli_query($conn, $query_edit);
    return $hasil;
}

function tambahDokter(){
    global $conn;

    $kode_dok = $_POST['kode_dok'];
    $nama_dok = $_POST['nama_dok'];
    $nip = $_POST['nip'];
    $telepon = $_POST['telepon'];

    if(substr($telepon,0,1) == '0'){
        $telepon = substr($telepon,1);
        $telepon = "62$telepon";
    } else if(substr($telepon,0,2) != '62'){
        $telepon = "62$telepon";
    }

    $query_insert = "insert into dokter values('$kode_dok', '$nama_dok', '$nip', '$telepon')";

    $hasil = mysqli_query($conn,$query_insert);
    return $hasil;
}

function editDokter(){
    global $conn;

    $kode_dok = $_POST['kode_dok'];
    $nama_dok = $_POST['nama_dok'];
    $nip = $_POST['nip'];
    $telepon = $_POST['telepon'];

    if(substr($telepon,0,1) == '0'){
        $telepon = substr($telepon,1);
        $telepon = "62$telepon";
    } else if(substr($telepon,0,2) != '62'){
        $telepon = "62$telepon";
    }

    $query_edit = "update dokter set nama_dok='$nama_dok', nip='$nip', telepon='$telepon' where kode_dok='$kode_dok'";

    $hasil = mysqli_query($conn,$query_edit);
    return $hasil;
}

function tambahPoli(){
    global $conn;

    $kode_poli = $_POST['kode_poli'];
    $nama_poli = $_POST['nama_poli'];

    $query_insert = "insert into poliklinik values('$kode_poli', '$nama_poli')";

    $hasil = mysqli_query($conn,$query_insert);
    return $hasil;
}

function editPoli(){
    global $conn;

    $kode_poli = $_POST['kode_poli'];
    $nama_poli = $_POST['nama_poli'];

    $query_edit = "update poliklinik set nama_poli = '$nama_poli' where kode_poli = '$kode_poli'";

    $hasil = mysqli_query($conn,$query_edit);
    return $hasil;
}

function tambahDiagnosa(){
    global $conn;

    $kode_diagnosa = $_POST['kode_diagnosa'];
    $nama_diagnosa = $_POST['nama_diagnosa'];

    $query_insert = "insert into diagnosa values('$kode_diagnosa', '$nama_diagnosa')";

    $hasil = mysqli_query($conn,$query_insert);
    return $hasil;
}

function editDiagnosa(){
    global $conn;

    $kode_diagnosa = $_POST['kode_diagnosa'];
    $nama_diagnosa = $_POST['nama_diagnosa'];

    $query_edit = "update diagnosa set nama_diagnosa = '$nama_diagnosa' where kode_diagnosa = '$kode_diagnosa'";

    $hasil = mysqli_query($conn,$query_edit);
    return $hasil;
}

function tambahKamar(){
    global $conn;

    $kode_kamar = $_POST['kode_kamar'];
    $nama_kamar = $_POST['nama_kamar'];
    $fasilitas = $_POST['fasilitas'];
    $tarif = $_POST['tarif'];
    
    $query_insert = "insert into kamar values('$kode_kamar','$nama_kamar','$fasilitas', '$tarif', null)";

    $hasil = mysqli_query($conn,$query_insert);
    return $hasil;
}

function editKamar(){
    global $conn;

    $kode_kamar = $_POST['kode_kamar'];
    $nama_kamar = $_POST['nama_kamar'];
    $fasilitas = $_POST['fasilitas'];
    $tarif = $_POST['tarif'];
    $pasien = $_POST['pasien'];

    if($pasien == 'null'){
        $pasien = "NULL";; 
    } else {
        $pasien = "'$pasien'";
    }

    $query_edit = "update kamar set nama_kamar='$nama_kamar', fasilitas_kamar='$fasilitas', tarif_kamar='$tarif', no_rm=$pasien where kode_kamar='$kode_kamar'";

    $hasil = mysqli_query($conn,$query_edit);
    return $hasil;
}

function tambahTindakan(){
    global $conn;

    $kode_tindakan = $_POST['kode_tindakan'];
    $nama_tindakan = $_POST['nama_tindakan'];

    $query_insert = "insert into tindakan values('$kode_tindakan', '$nama_tindakan')";

    $hasil = mysqli_query($conn,$query_insert);
    return $hasil;
}

function editTindakan(){
    global $conn;

    $kode_tindakan = $_POST['kode_tindakan'];
    $nama_tindakan = $_POST['nama_tindakan'];

    $query_edit = "update tindakan set nama_tindakan='$nama_tindakan' where kode_tindakan='$kode_tindakan'";

    $hasil = mysqli_query($conn,$query_edit);
    return $hasil;
}

function tambahPendaftaran(){
    global $conn;

    $noreg = $_POST['noreg'];
    $tglreg = $_POST['tglreg'];
    $no_rm = $_POST['no_rm'];
    $nama_pasien = query("select nama_pasien from pasien where no_rm='$no_rm'")[0]['nama_pasien'];
    $jenis_pasien = $_POST['jenis_pasien'];
    $status_pasien = $_POST['status_pasien'];

    if($status_pasien == 'null'){
        $status_pasien = "NULL";
    } else {
        $status_pasien = "'$status_pasien'";
    }

    $query_insert = "insert into pendaftaran values ('$noreg', '$tglreg', '$no_rm', '$nama_pasien', '$jenis_pasien', $status_pasien)";

    $hasil = mysqli_query($conn,$query_insert);
    return $hasil;
}

function editPendaftaran(){
    global $conn;

    $noreg = $_POST['noreg'];
    $tglreg = $_POST['tglreg'];
    $no_rm = $_POST['no_rm'];
    $nama_pasien = query("select nama_pasien from pasien where no_rm='$no_rm'")[0]['nama_pasien'];
    $jenis_pasien = $_POST['jenis_pasien'];
    $status_pasien = $_POST['status_pasien'];

    if($status_pasien == 'null'){
        $status_pasien = "NULL";
    } else {
        $status_pasien = "'$status_pasien'";
    }

    $query_edit = "update pendaftaran set tglreg='$tglreg', no_rm='$no_rm', nama_pasien='$nama_pasien', jenis_pasien='$jenis_pasien', status_pasien=$status_pasien where noreg='$noreg'";

    var_dump($query_edit);

    $hasil = mysqli_query($conn,$query_edit);
    return $hasil;
}

function tambahRajal(){
    global $conn;

    $no_rajal = $_POST['no_rajal'];
    $noreg = $_POST['noreg'];
    $kode_dok = $_POST['kode_dok'];
    $kode_poli = $_POST['kode_poli'];

    $query_insert = "insert into rawat_jalan values ('$no_rajal', '$noreg', '$kode_dok', '$kode_poli')";

    $hasil = mysqli_query($conn,$query_insert);
    return $hasil;
}

function editRajal(){
    global $conn;

    $no_rajal = $_POST['no_rajal'];
    $noreg = $_POST['noreg'];
    $kode_dok = $_POST['kode_dok'];
    $kode_poli = $_POST['kode_poli'];

    $query_edit = "update rawat_jalan set kode_dok='$kode_dok', kode_poli='$kode_poli' where no_rajal='$no_rajal'";

    $hasil = mysqli_query($conn,$query_edit);
    return $hasil;
}

function tambahInap(){
    global $conn;

    $no_ranap = $_POST['no_ranap'];
    $noreg = $_POST['noreg'];
    $cara_masuk = $_POST['cara_masuk'];
    $kode_dok = $_POST['kode_dok'];
    $kode_kamar = $_POST['kode_kamar'];
    $norm = query("select no_rm from pendaftaran where noreg='$noreg'")[0]['no_rm'];

    $query_insert = "insert into rawat_inap values ('$no_ranap', '$noreg', '$cara_masuk', '$kode_dok', '$kode_kamar')";
    $query_edit_kamar = "update kamar set no_rm='$norm' where kode_kamar='$kode_kamar'";

    $hasil = mysqli_query($conn,$query_insert);
    $hasil_kamar = mysqli_query($conn,$query_edit_kamar);

    if($hasil and $hasil_kamar){
        return true;
    } else {
        return false;
    }
}

function editInap(){
    global $conn;

    $no_ranap = $_POST['no_ranap'];
    $noreg = $_POST['noreg'];
    $cara_masuk = $_POST['cara_masuk'];
    $kode_dok = $_POST['kode_dok'];
    $kode_kamar = $_POST['kode_kamar'];
    $norm = query("select no_rm from pendaftaran where noreg='$noreg'")[0]['no_rm'];

    $kamar_lama = query("select kode_kamar from rawat_inap where no_ranap='$no_ranap'")[0]['kode_kamar'];

    $query_edit = "update rawat_inap set noreg='$noreg', cara_masuk='$cara_masuk', kode_dok='$kode_dok', kode_kamar='$kode_kamar' where no_ranap='$no_ranap'";
    if($kamar_lama !== $kode_kamar){
        $query_change_kamar1= "update kamar set no_rm=NULL where kode_kamar='$kamar_lama'";
        $query_change_kamar2= "update kamar set no_rm='$norm' where kode_kamar='$kode_kamar'";

        $kamar1 = mysqli_query($conn, $query_change_kamar1);
        $kamar2 = mysqli_query($conn, $query_change_kamar2);

        if($kamar1 and $kamar2){

        } else {
            return false;
        }
    }

    $hasil = mysqli_query($conn,$query_edit);
    return $hasil;
}

function tambahUgd(){
    global $conn;

    $no_ugd = $_POST['no_ugd'];
    $noreg = $_POST['noreg'];
    $cara_masuk = $_POST['cara_masuk'];
    $kode_dok = $_POST['kode_dok'];

    $query_insert = "insert into ugd values ('$no_ugd', '$noreg', '$cara_masuk', '$kode_dok')";

    $hasil = mysqli_query($conn,$query_insert);
    return $hasil;
}

function editUgd(){
    global $conn;

    $no_ugd = $_POST['no_ugd'];
    $noreg = $_POST['noreg'];
    $cara_masuk = $_POST['cara_masuk'];
    $kode_dok = $_POST['kode_dok'];

    $query_edit = "update ugd set noreg = '$noreg', cara_masuk='$cara_masuk', kode_dok='$kode_dok' where no_ugd='$no_ugd'";

    $hasil = mysqli_query($conn,$query_edit);
    return $hasil;
}

function tambahPemeriksaan(){
    global $conn;

    $no_pemeriksaan = $_POST['no_periksa'];
    $tgl_periksa = $_POST['tgl_periksa'];
    $noreg = $_POST['noreg'];
    $no_rm = query("select no_rm from pendaftaran where noreg='$noreg'")[0]['no_rm'];
    $kode_dok = $_POST['kode_dok'];
    $anamnesa = $_POST['anamnesa'];
    $tb = $_POST['tb'];
    $bb = $_POST['bb'];
    $td = $_POST['td'];
    $sh = $_POST['sh'];
    $nd = $_POST['nd'];
    $diagnosa = $_POST['kode_diagnosa'];
    $tindakan = query("select status_pasien from pendaftaran where noreg='$noreg'")[0]['status_pasien'];

    $query_insert = "insert into pemeriksaan values ('$no_pemeriksaan', '$tgl_periksa', '$noreg', '$no_rm', '$kode_dok', '$anamnesa', '$tb', '$bb', '$td', '$sh', '$nd', '$diagnosa', '$tindakan')";

    $hasil = mysqli_query($conn,$query_insert);
    return $hasil;
}

function editPemeriksaan(){
    global $conn;

    $no_pemeriksaan = $_POST['no_periksa'];
    $tgl_periksa = $_POST['tgl_periksa'];
    $noreg = $_POST['noreg'];
    $no_rm = query("select no_rm from pendaftaran where noreg='$noreg'")[0]['no_rm'];
    $kode_dok = $_POST['kode_dok'];
    $anamnesa = $_POST['anamnesa'];
    $tb = $_POST['tb'];
    $bb = $_POST['bb'];
    $td = $_POST['td'];
    $sh = $_POST['sh'];
    $nd = $_POST['nd'];
    $diagnosa = $_POST['kode_diagnosa'];
    $tindakan = query("select status_pasien from pendaftaran where noreg='$noreg'")[0]['status_pasien'];

    $query_edit = "update pemeriksaan set tgl_periksa='$tgl_periksa', noreg='$noreg', no_rm='$no_rm', kode_dok='$kode_dok', anamnesa='$anamnesa', tb='$tb', bb='$bb', td='$td', sh='$sh', nd='$nd', diagnosa='$diagnosa', tindakan='$tindakan' where no_periksa='$no_pemeriksaan'";
    var_dump($query_edit);

    $hasil = mysqli_query($conn,$query_edit);
    return $hasil;
}