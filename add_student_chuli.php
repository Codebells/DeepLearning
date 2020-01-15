<?php
    $conn = oci_connect("west_sys","west123456","westorcl");
    $sno=$_POST["sno"];
    $name=$_POST["name"];
    $cno=$_POST["cno"];
    $pass=$_POST["pass"];
    $word="insert into student values($sno,'$name',$cno,$pass,0,0)";
    $stat=oci_parse($conn,$word);
    oci_execute($stat,OCI_COMMIT_ON_SUCCESS);
    echo "
        <script>
        alert('添加成功！');
        window.location.href='Add_new_student.php';
        </script>
        ";
?>