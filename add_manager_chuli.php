<?php
    $conn = oci_connect("west_sys","west123456","westorcl");
    $sno=$_POST["sno"];
    $name=$_POST["name"];
    $kind=$_POST["kind"];
    $pass=$_POST["pass"];
    $locate=$_POST["locate"];
    $word="insert into manager values('$sno','$pass','$name','$kind','$locate')";
    $stat=oci_parse($conn,$word);
    oci_execute($stat,OCI_COMMIT_ON_SUCCESS);
    echo "
        <script>
        alert('添加成功！');
        window.location.href='Add_new_manager.php';
        </script>
        ";
?>