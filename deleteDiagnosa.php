<?php
    $kode_diagnosa = $_GET['id'];

    $query_delete = "delete from diagnosa where kode_diagnosa='$kode_diagnosa'";
    $hasil = mysqli_query($conn,$query_delete);

    if($hasil){
        echo "<script>
            alert('Delete Diagnosa Berhasil')
            location.href = 'dashboard.php?tab=diagnosa'
        </script>";
    } else {
        echo "<script>
            alert('Delete Diagnosa Gagal')
            location.href = 'dashboard.php?tab=diagnosa'
        </script>";
    }
?>