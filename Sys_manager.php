<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard Admin Template </title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600">
    <!-- https://fonts.google.com/specimen/Open+Sans -->
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="css/fullcalendar.min.css">
    <!-- https://fullcalendar.io/ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="css/tooplate.css">
</head>

<body id="reportsPage">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="navbar navbar-expand-xl navbar-light bg-light">
                    <a class="navbar-brand" href="Sys_manager.php">
                        <h1 class="tm-site-title mb-0">MainWindows</h1>
                    </a>
                    <button class="navbar-toggler ml-auto mr-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mx-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="Sys_manager.php">MainWindows
                                    <span class="sr-only">(current)</span>
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="#">Manager</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="#">Student</a>
                            </li>
                        </ul>
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link d-flex" href="login.html">
                                    <span>Logout</span>
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
                <div class="bg-white tm-block h-100">
                    <h2 class="tm-block-title">Manager</h2>
                    <div class="col-12 text-right">
                        <a href="manager_manager.php" class="tm-link-black">管理员管理</a>
                    </div>
                    <ol class="tm-list-group tm-list-group-alternate-color tm-list-group-pad-big">
                        <li class="tm-list-group-item">
                            管理员号 管理员密码 管理员姓名 管理类型 管理地区
                        </li>
                        <?php
                        $conn = oci_connect("west_sys", "west123456", "westorcl");
                        $word = "select * from Manager";
                        $stat = oci_parse($conn, $word);
                        oci_execute($stat, OCI_DEFAULT);
                        while ($row = oci_fetch_array($stat)) {
                            ?>
                            <li class="tm-list-group-item">
                                <?php echo ($row["MNO"]. ' ' . $row["MPW"] . ' ' . $row["MNAME"] . ' ' . $row["MKIND"]  . ' ' . $row["MLOCATE"]) ?>
                            </li>
                        <?php
                        }
                        ?>
                    </ol>
                </div>
            </div>
            <div class="tm-col tm-col-big">
                <div class="bg-white tm-block h-100">
                    <h2 class="tm-block-title">Library</h2>
                    <div class="col-12 text-right">
                        <a href="Library_manager" class="tm-link-black">图书馆管理</a>
                    </div>
                    <ol class="tm-list-group tm-list-group-alternate-color tm-list-group-pad-big">
                        <li class="tm-list-group-item">
                            借阅人学号 借阅书号 借阅时间 归还时间
                        </li>
                        <?php
                        $conn = oci_connect("west_sys", "west123456", "westorcl");
                        $word = "select * from Borrbook";
                        $stat = oci_parse($conn, $word);
                        oci_execute($stat, OCI_DEFAULT);
                        while ($row = oci_fetch_array($stat)) {
                            ?>
                            <li class="tm-list-group-item">
                                <?php 
                                $ssno=$row["SNO"];
                                $nowword = "select Retudate from retubook where $ssno=sno";
                                $stattt = oci_parse($conn, $nowword);
                                oci_execute($stattt, OCI_DEFAULT);
                                $now=oci_fetch_assoc($stattt);
                                if($now==null) $now = "Not return ";
                                
                                echo ($row["SNO"]. ' ' . $row["BNO"] . '  ' . substr_replace($row["BORRDATE"],"月",5,2) . '   ' . substr_replace($now["RETUDATE"],"月",5,2)) ;
                                ?>
                            </li>
                        <?php
                        }
                        ?>
                    </ol>
                </div>
            </div>
            <div class="tm-col tm-col-small">
                <div class="bg-white tm-block h-100">
                <h2 class="tm-block-title">Sign</h2>
                    <ol class="tm-list-group">
                        <li class="tm-list-group-item">签到学生学号  签到地点</li>
                        <?php
                        $conn = oci_connect("west_sys", "west123456", "westorcl");
                        $word = "select * from WEST_SIGNIN";
                        $stat = oci_parse($conn, $word);
                        oci_execute($stat, OCI_DEFAULT);
                        while ($row = oci_fetch_array($stat)) {
                            ?>
                            <li class="tm-list-group-item">
                                <?php echo ($row["SNO"].' '.$row["SIGNPLACE"] ) ?>
                            </li>
                        <?php
                        } ?>
                    </ol>
                </div>
            </div>

            <div class="tm-col tm-col-big">
                <div class="bg-white tm-block h-100">
                    <div class="row">
                        <div class="col-8">
                            <h2 class="tm-block-title d-inline-block">StudentList</h2>
                        </div>
                        <div class="col-4 text-right">
                            <a href="student_manager.php" class="tm-link-black">学生管理</a>
                        </div>
                    </div>
                    <ol class="tm-list-group tm-list-group-alternate-color tm-list-group-pad-big">
                        <li class="tm-list-group-item">
                            学号 姓名 卡号 卡密码 卡状态 卡余额
                        </li>
                        <?php
                        $conn = oci_connect("west_sys", "west123456", "westorcl");
                        $word = "select sno,sname,cno,spw,csta,money from student";
                        $stat = oci_parse($conn, $word);
                        oci_execute($stat, OCI_DEFAULT);
                        while ($row = oci_fetch_array($stat)) {
                            ?>
                            <li class="tm-list-group-item">
                                <?php echo ($row["SNO"] . ' ' . $row["SNAME"] . ' ' . $row["CNO"] . ' ' . $row["SPW"] . ' ' . $row["CSTA"] . ' ' . $row["MONEY"]) ?>
                            </li>
                        <?php
                        }
                        ?>
                    </ol>
                </div>
            </div>
            <div class="tm-col tm-col-big">
                <div class="bg-white tm-block h-100">
                    <h2 class="tm-block-title">Access Privilege</h2>
                    <div class="row mt-4">
                        <div class="col-12 text-right">
                            <a href="Accessman_manager.php" class="tm-link-black">Set Privilege</a>
                        </div>
                    <ol class="tm-list-group">
                        <li class="tm-list-group-item">学号 门禁权限</li>
                        <?php
                        $word = "select sno,accplace from WEST_ACCESS";
                        $stat = oci_parse($conn, $word);
                        oci_execute($stat, OCI_DEFAULT);
                        while ($row = oci_fetch_array($stat)) {
                            ?>
                            <li class="tm-list-group-item">
                                <?php echo ($row["SNO"] . ' ' . $row["ACCPLACE"]) ?>
                            </li>
                        <?php
                        } ?>
                    </ol>
                    </div>

                </div>
            </div>
            <div class="tm-col tm-col-small">
                <div class="bg-white tm-block h-100">
                    <h2 class="tm-block-title">Access Privilege</h2>
                    <ol class="tm-list-group">
                        <li class="tm-list-group-item">各管理员的界面</li>
                        <li class="tm-list-group-item"><a href="Teacher_manager.php" class="tm-link-black">Teacher</a></li>
                        <li class="tm-list-group-item"><a href="Accessman_manager.php" class="tm-link-black">AccessMan</a></li>
                        <li class="tm-list-group-item"><a href="Saleman_manager.php" class="tm-link-black">SaleMan</a></li>
                        <li class="tm-list-group-item"><a href="Bookman_manager.php" class="tm-link-black">BookMan</a></li>
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
    </div>
    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- https://jquery.com/download/ -->
    <script src="js/moment.min.js"></script>
    <!-- https://momentjs.com/ -->
    <script src="js/utils.js"></script>
    <script src="js/Chart.min.js"></script>
    <!-- http://www.chartjs.org/docs/latest/ -->
    <script src="js/fullcalendar.min.js"></script>
    <!-- https://fullcalendar.io/ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->
    <script src="js/tooplate-scripts.js"></script>
    
</body>

</html>