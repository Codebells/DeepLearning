<?php
session_start();
?>
<?php
$name = $_POST["username"];
$_SESSION["username"]=$name;
session_write_close();
$pass = $_POST["password"];
// echo($name."  ".$pass);
// $conn=oci_connect("scott","tiger","westorcl");
// $word="select * from emp";
// $stat=oci_parse($conn,$word);
// oci_execute($stat,OCI_DEFAULT);
// $res=oci_fetch_assoc($stat);
// var_dump($res);
// print $res["EMPNO"];
// $conn = oci_connect("west_sys", "west123456", "westorcl");
$conn=oci_connect("wucaiyi","wucaiyi","westorcl");
$word = "select sno,spw from west_sys.student where $name=sno";
// print_r($word);
$stat=oci_parse($conn,$word);
oci_execute($stat,OCI_DEFAULT);
$res=oci_fetch_assoc($stat);
if ($res==true) {
    if ($res["SPW"] == $pass) {
        echo "  <script>
						alert('登陆成功！');
						window.location.href='index.php';
					</script>";
    } else {
        echo "  <script>
						alert('密码错误！');
						window.location.href='login.html';
					</script>";
    }
} else {
    echo "  <script>
						alert('没有这个学生！也许他是个老师！');
						window.location.href='login.html';
					</script>";
}
