<?php
session_start();
$book = $_POST["bookname"];
$opt = $_POST["option"];
$locate = $_POST["locate"];
$sno = $_POST["uname"];
var_dump($sno);
$conn = oci_connect("west_sys", "west123456", "westorcl");
if($locate=="West")
{
    if ($opt == "retu") {
        $word = "call GIVEBACK(:h_sno,:h_bno,:h_count)";
        $stat = oci_parse($conn, $word);
        if ($sno == null) {
            $hsno = $_SESSION["username"];
            var_dump($hsno);
        } else $hsno = $sno;
        $hbno = $book;
        
        settype($hsno,"integer");
        settype($hbno,"integer");
        oci_bind_by_name($stat, ":h_sno", $hsno, -1);
        oci_bind_by_name($stat, ":h_bno", $hbno, -1);
        oci_bind_by_name($stat, ":h_count", $hcount, 1);
        oci_execute($stat, OCI_COMMIT_ON_SUCCESS);
        if ($hcount != 0) {
            echo "  <script>
                            alert('还书成功！');
                        </script>";
        } else {
            echo "  <script>
                            alert('你没有借过这本书！');
                        </script>";
        }
    } else {
        $word = "call BORROW(:h_sno,:h_bno)";
        $stat = oci_parse($conn, $word);
        if ($sno == null) {
            $hsno = $_SESSION["username"];
            session_write_close();
            var_dump($hsno);
        } else $hsno = $sno;
        $hbno = $book;
        settype($hsno,"integer");
        settype($hbno,"integer");
        oci_bind_by_name($stat, "h_sno", $hsno, -1);
        oci_bind_by_name($stat, "h_bno", $hbno, -1);
        oci_execute($stat, OCI_COMMIT_ON_SUCCESS);
       
    }
}
else if($locate=="East")
{
    if ($sno == null) {
        echo "hello";
        $sno = $_SESSION["username"];
    } 
    
//     insert into borrbook values(b_sno,b_bno,sysdate);
//   delete retubook where b_sno=sno and b_bno=bno;
    $conne=oci_connect("east_sys","east123456","eastorcl");
    if($conne==false)
    {
        echo "$sno"." $book";
    }
    if($opt=="borr")
    {
        $word="insert into borrbook values($sno,$book,sysdate)";
        $statt=oci_parse($conne,$word);
        oci_execute($statt,OCI_COMMIT_ON_SUCCESS);
    }
    else 
    {
        $word="delete borrbook where $sno=sno and $book=bno";
        $statt=oci_parse($conne,$word);
        oci_execute($statt);
    }
}
else 
{
    if ($sno == null) {
        $sno = $_SESSION["username"];
    } 
    $conne=oci_connect("south_sys","south123456","southorcl");
    if($opt=="borr")
    {
        $word="insert into borrbook values($sno,$book,sysdate)";
        $statt=oci_parse($conne,$word);
        oci_execute($statt);
    }
    else 
    {
        $word="delete borrbook where $sno=sno and $book=bno";
        $statt=oci_parse($conne,$word);
        oci_execute($statt);
    }
}
echo "  <script>
alert('借阅成功！');
</script>";
if ($_POST["uname"] == null) {
    echo "
        <script>
        window.location.href='library.php';
        </script>
        ";
} else {
    echo "
        <script>
        window.location.href='Bookman_opt.php';
        </script>
        ";
}
