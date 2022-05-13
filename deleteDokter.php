<?php
    $kode_dok = $_GET['id'];

    $query_delete = "delete from dokter where kode_dok='$kode_dok'";
    $hasil = mysqli_query($conn,$query_delete);

    if($hasil){
        echo "<script>
            alert('Delete Dokter Berhasil')
            location.href = 'dashboard.php?tab=dokter'
        </script>";
    } else {
        echo "<script>
            alert('Delete Dokter Gagal')
            location.href = 'dashboard.php?tab=dokter'
        </script>";
    }
?>