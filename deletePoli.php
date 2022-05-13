<?php
    $kode_poli = $_GET['id'];

    $query_delete = "delete from poliklinik where kode_poli='$kode_poli'";
    $hasil = mysqli_query($conn,$query_delete);

    if($hasil){
        echo "<script>
            alert('Delete Poliklinik Berhasil')
            location.href = 'dashboard.php?tab=poliklinik'
        </script>";
    } else {
        echo "<script>
            alert('Delete Poliklinik Gagal')
            location.href = 'dashboard.php?tab=poliklinik'
        </script>";
    }
?>