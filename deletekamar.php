<?php
    $kode_kamar = $_GET['id'];

    $query_delete = "delete from kamar where kode_kamar='$kode_kamar'";
    $hasil = mysqli_query($conn,$query_delete);

    if($hasil){
        echo "<script>
            alert('Delete Kamar Berhasil')
            location.href = 'dashboard.php?tab=kamar'
        </script>";
    } else {
        echo "<script>
            alert('Delete Kmamar Gagal')
            location.href = 'dashboard.php?tab=kamar'
        </script>";
    }
?>