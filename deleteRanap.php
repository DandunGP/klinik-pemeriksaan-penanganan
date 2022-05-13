<?php
    $no_ranap = $_GET['id'];

    $query_delete = "delete from rawat_inap where no_ranap='$no_ranap'";
    $hasil = mysqli_query($conn,$query_delete);

    if($hasil){
        echo "<script>
            alert('Delete Rawat Inap Berhasil')
            location.href = 'dashboard.php?tab=ranap'
        </script>";
    } else {
        echo "<script>
            alert('Delete Rawat Inap Gagal')
            location.href = 'dashboard.php?tab=ranap'
        </script>";
    }
?>