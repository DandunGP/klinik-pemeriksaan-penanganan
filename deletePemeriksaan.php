<?php
    $no_periksa = $_GET['id'];

    $query_delete = "delete from pasien where no_periksa='$no_periksa'";
    $hasil = mysqli_query($conn,$query_delete);

    if($hasil){
        echo "<script>
            alert('Delete Pemeriksaan Berhasil')
            location.href = 'dashboard.php?tab=pemeriksaan'
        </script>";
    } else {
        echo "<script>
            alert('Delete Pemeriksaan Gagal')
            location.href = 'dashboard.php?tab=pemeriksaan'
        </script>";
    }
?>