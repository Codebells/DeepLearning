
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Accounts Page - Dashboard Template</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600">
    <!-- https://fonts.google.com/specimen/Open+Sans -->
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="css/tooplate.css">
    <style>
        .tm-col-big {
            width: 39%;
            margin: auto;
        }
    </style>
</head>

<body class="bg03">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="navbar navbar-expand-xl navbar-light bg-light">
                    <h1 class="tm-site-title mb-0">LibraryManage</h1>
                    <button class="navbar-toggler ml-auto mr-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link d-flex" href="Sys_manager.php">
                                    <span>返回</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!-- row -->
        <div class="row tm-content-row tm-mt-big">
            <div class="tm-col tm-col-big">
                <div class="bg-white tm-block">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="tm-block-title d-inline-block">Record 
                                <a href="Librarymanager_opt.php" style="text-decoration: none; float:right">管理信息</a></h2>
                        </div>
                    </div>
                    <ol class="tm-list-group tm-list-group-alternate-color tm-list-group-pad-big">
                        <li>书号 借阅人 借阅时间 归还时间</li>
                        <?php
                        $name = $_SESSION["username"];
                        session_write_close();
                        $conn = oci_connect("west_sys", "west123456", "westorcl");
                        $word = "select bno,borrdate from borrbook where sno=$name";
                        $stat = oci_parse($conn, $word);
                        oci_execute($stat, OCI_DEFAULT);
                        while ($row = oci_fetch_array($stat)) {
                            ?>
                            
                            <li><?php echo ($row["BNO"]." " .$name. " " . substr_replace($row["BORRDATE"],"月",5,2)) ?>

                            <?php
                                $bb = $row["BNO"];
                                $ww = "select retudate from retubook where sno=$name and $bb=bno";
                                $ss = oci_parse($conn, $ww);
                                oci_execute($ss, OCI_DEFAULT);
                                ?>
                            <?php
                                    $sco = oci_fetch_assoc($ss);
                                    if ($sco == 0) echo (" Not return");
                                    echo " " . (substr_replace($sco["RETUDATE"],"月",5,2)) ?>
                            </li>
                        <?php } ?>
                    </ol>
                </div>
            </div>
        </div>
        <footer class="row tm-mt-big">
            <div class="col-12 font-weight-light text-center">
                <p class="d-inline-block tm-bg-black text-white py-2 px-4">
                    Copyright &copy; 2019.11.16 StudentDBMS Created by Codebells
                </p>
            </div>
        </footer>
    </div>

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>