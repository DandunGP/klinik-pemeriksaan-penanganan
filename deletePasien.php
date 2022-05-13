<?php
    $no_rm = $_GET['id'];

    $query_delete = "delete from pasien where no_rm='$no_rm'";
    $hasil = mysqli_query($conn,$query_delete);

    if($hasil){
        echo "<script>
            alert('Delete Pasien Berhasil')
            location.href = 'dashboard.php?tab=pasien'
        </script>";
    } else {
        echo "<script>
            alert('Delete Pasien Gagal')
            location.href = 'dashboard.php?tab=pasien'
        </script>";
    }
?>