<?php
    $kode_tindakan = $_GET['id'];

    $query_delete = "delete from tindakan where kode_tindakan='$kode_tindakan'";
    $hasil = mysqli_query($conn,$query_delete);

    if($hasil){
        echo "<script>
            alert('Delete Tindakan Berhasil')
            location.href = 'dashboard.php?tab=tindakan'
        </script>";
    } else {
        echo "<script>
            alert('Delete Tindakan Gagal')
            location.href = 'dashboard.php?tab=tindakan'
        </script>";
    }
?>