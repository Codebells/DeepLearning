<?php
session_start();
$conn = oci_connect("west_sys", "west123456", "westorcl");
$date = $_POST["date"];
$place = $_POST["option"];
$sno = $_SESSION["username"];
$money = $_POST["money"];
if($place!="income") $money*=-1;
// var_dump($place);
settype($sno, "integer");
settype($money, "integer");
// $word="insert into Consumption values($sno,'$place',sysdate,$money)";
$word = " 
begin
consume(:xsno,:xmoney,:xcsta,:xplace,:xspend);
end;";
$stat = oci_parse($conn, $word);
oci_bind_by_name($stat,":xsno",$sno);
oci_bind_by_name($stat,":xmoney",$money);
oci_bind_by_name($stat,":xplace",$place);
oci_bind_by_name($stat,":xcsta",$sta);
oci_bind_by_name($stat,":xspend",$spend);

//  declare
//  num_C Number;
//  csta_c varchar2(1);
//  begin
//  consume(1704010622,35,csta_c,'Center',num_C);
//   dbms_output.put_line('outs: '|| num_C||' '||csta_c );
// end;
oci_execute($stat);
if ($sta == 0) {
    echo "
        <script>
        alert('消费成功！');
        </script>
        ";
} else {
    echo "
        <script>
        alert('交易失败，已欠费$spend 元!');
        
        </script>
        ";
}
    echo "window.location.href='consume.php';"
?>