<?php
    $loc=$_POST["location"];
    $kind=$_POST["manager"];
    $name=$_POST["username"];
    $pass=$_POST["password"];
    // print_r($loc." ".$kind." ".$name." ".$pass);
    $conn=oci_connect("wucaiyi","wucaiyi","westorcl");
    // if($conn) echo"ok";
    $word="select * from west_sys.manager where '$name'=mno and '$kind'=mkind and '$loc'=mlocate";
    $stat=oci_parse($conn,$word);
    oci_execute($stat,OCI_DEFAULT);
    $res=oci_fetch_assoc($stat);
    // print_r($res);
    $where="_manager.php";
    $kind=$kind.$where;
    if($res==true)
    {
        if($pass==$res["MPW"])
        {
            echo "  <script>
						alert('登陆成功！');
                        window.location.href='$kind';
					</script>";
        }
        else 
        {
            echo "  <script>
						alert('密码错误！');
						window.location.href='login_for_manager.html';
					</script>";
        }
    }
    else 
    {
        echo "  <script>
						alert('输入信息有误！');
						window.location.href='login_for_manager.html';
					</script>";
    }
?>