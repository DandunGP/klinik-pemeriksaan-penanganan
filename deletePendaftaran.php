<?php
    $noreg = $_GET['id'];

    $query_delete = "delete from pendaftaran where noreg='$noreg'";
    $hasil = mysqli_query($conn,$query_delete);

    if($hasil){
        echo "<script>
            alert('Delete Pendaftaran Berhasil')
            location.href = 'dashboard.php?tab=pendaftaran'
        </script>";
    } else {
        echo "<script>
            alert('Delete Pendaftaran Gagal')
            location.href = 'dashboard.php?tab=pendaftaran'
        </script>";
    }
?>