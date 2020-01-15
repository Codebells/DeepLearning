<?php
    $check=$_POST["check"];
    $len=count($check);
    $conn=oci_connect("west_sys","west123456","westorcl");
    for($i=0;$i<$len;$i++)
    {
        $sno=$check[$i];
        $word="delete student where sno=$sno";
        $stat=oci_parse($conn,$word);
        oci_execute($stat,OCI_COMMIT_ON_SUCCESS);
    }
    echo "
        <script>
        alert('已删除');
        window.location.href='student_manager.php';
        </script>
        ";
?>