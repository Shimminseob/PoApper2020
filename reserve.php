<?php
    include('conn.php');
    $end = date('Y-m-d H:i:s', strtotime('+2 hour'));
    $sql = "UPDATE laundry SET end_time='$end' WHERE no='1'";
    mysqli_query($conn, $sql);
    echo "<script>
    window.location.replace('./laundry.html');
    </script>";
?>