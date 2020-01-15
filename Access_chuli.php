<?php
    $sno=$_POST["name"];
    $place=$_POST["place"];
    $kind=$_POST["submit"];
    $conn=oci_connect("west_sys","west123456","westorcl");
    if($kind=="del")
    {
        $word="delete from west_access where $sno=sno and '$place' = accplace";
    }
    else 
    {
        $word="insert into west_access values($sno,'$place')";
    }
    $stat=oci_parse($conn,$word);
    oci_execute($stat);
    echo "
        <script>
        alert('操作成功！');
        window.location.href='Accessman_manager.php';
        </script>
        ";
?>