<?php
    $sno=$_POST["name"];
    $place=$_POST["Place"];
    $conn=oci_connect("west_sys","west123456","westorcl");
    $word="Insert into west_signin values($sno,'$place',sysdate)";
    $stat=oci_parse($conn,$word);
    oci_execute($stat,OCI_COMMIT_ON_SUCCESS);
    echo "
        <script>
        alert('签到成功！');
        window.location.href='signin.php';
        </script>
        ";
?>