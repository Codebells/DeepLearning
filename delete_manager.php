<?php
    $check=$_POST["check"];
    $len=count($check);
    $conn=oci_connect("west_sys","west123456","westorcl");
    for($i=0;$i<$len;$i++)
    {
        $sno=$check[$i];
        $word="delete manager where mname='$sno'";
        $stat=oci_parse($conn,$word);
        oci_execute($stat,OCI_COMMIT_ON_SUCCESS);
    }
    echo "
        <script>
        alert('已删除');
        window.location.href='manager_manager.php';
        </script>
        ";
?>