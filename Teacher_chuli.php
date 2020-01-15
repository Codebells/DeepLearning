<?php
    $sno=$_POST["name"];
    $place=$_POST["place"];
    $conn=oci_connect("west_sys","west123456","westorcl");
     $word="delete from west_signin where sno =$sno and signplace='$place'";
    $stat=oci_parse($conn,$word);
    oci_execute($stat,OCI_COMMIT_ON_SUCCESS);
    echo "
        <script>
        alert('操作成功！');
        window.location.href='Teacher_manager.php';
        </script>
        ";
?>