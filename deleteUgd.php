<?php
    $no_ugd = $_GET['id'];

    $query_delete = "delete from ugd where no_ugd='$no_ugd'";
    $hasil = mysqli_query($conn,$query_delete);

    if($hasil){
        echo "<script>
            alert('Delete UGD Berhasil')
            location.href = 'dashboard.php?tab=ugd'
        </script>";
    } else {
        echo "<script>
            alert('Delete UGD Gagal')
            location.href = 'dashboard.php?tab=ugd'
        </script>";
    }
?>