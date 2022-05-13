<?php
    $no_rajal = $_GET['id'];

    $query_delete = "delete from rawat_jalan where no_rajal='$no_rajal'";
    $hasil = mysqli_query($conn,$query_delete);

    if($hasil){
        echo "<script>
            alert('Delete Rawat Jalan Berhasil')
            location.href = 'dashboard.php?tab=rajal'
        </script>";
    } else {
        echo "<script>
            alert('Delete Rawat Jalan Gagal')
            location.href = 'dashboard.php?tab=rajal'
        </script>";
    }
?>