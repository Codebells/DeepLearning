<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <META http-equiv=Content-Type content="text/html; charset=gbk">
    <title>StudentHome</title>

    <link rel="stylesheet" href="css/fontstyle.css">
    <!-- https://fonts.google.com/specimen/Open+Sans -->
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="css/fullcalendar.min.css">
    <!-- https://fullcalendar.io/ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="css/tooplate.css">
    <link rel="stylesheet" href="css/tablesty.css">
</head>

<body id="reportsPage">
    <div class="" id="home">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="navbar navbar-expand-xl navbar-light bg-light">
                        <h1 class="tm-site-title mb-0">数据查看</h1>
                        <a class="nav-link d-flex" href="login.html" style="display: block; float: right;">
                            <span>退出</span>
                        </a>
                    </nav>
                </div>
            </div>
            <!-- row -->
            <div class="row tm-content-row tm-mt-big">
                <div class="tm-col tm-col-big">
                    <div class="bg-white tm-block h-100">
                        <h2 class="tm-block-title">消费信息<a href="consume.php" style="text-decoration: none; float:right">去消费</a></h2>
                        <table>
                            <tr>
                                <th style="padding: 20px 100px 20px 0px;">消费时间</th>
                                <th style="padding: 20px 70px 20px 0px;">消费地点</th>
                                <th style="padding: 20px 50px 20px 0px;">消费金额</th>
                            </tr>
                            <?php
                            $name = $_SESSION["username"];
                            $conn = oci_connect("west_sys", "west123456", "westorcl");
                            $word = "select conplace,condate,expend from consumption where sno=$name";
                            $stat = oci_parse($conn, $word);
                            oci_execute($stat, OCI_DEFAULT);
                            while ($row = oci_fetch_array($stat)) {
                                ?>
                                <tr>
                                    <td>
                                        <?php echo (substr_replace($row["CONDATE"],"月",5,2)) ?>
                                    </td>
                                    <td>
                                        <?php echo ($row["CONPLACE"]) ?>
                                    </td>
                                    <td>
                                        
                                        <?php echo ($row["EXPEND"]) ?>
                                    </td>
                                </tr>
                            <?php } ?>
                            <?php
                            $name = $_SESSION["username"];
                            $conn = oci_connect("east_sys", "east123456", "eastorcl");
                            $word = "select conplace,condate,expend from consumption where sno=$name";
                            $stat = oci_parse($conn, $word);
                            oci_execute($stat, OCI_DEFAULT);
                            while ($row = oci_fetch_array($stat)) {
                                ?>
                                <tr>
                                    <td>
                                        <?php echo (substr_replace($row["CONDATE"],"月",5,2)) ?>
                                    </td>
                                    <td>
                                        <?php echo ($row["CONPLACE"]) ?>
                                    </td>
                                    <td>
                                        <?php echo ($row["EXPEND"]) ?>
                                    </td>
                                </tr>
                            <?php } ?>
                            <?php
                            $name = $_SESSION["username"];
                            $conn = oci_connect("south_sys", "south123456", "southorcl");
                            $word = "select conplace,condate,expend from consumption where sno=$name";
                            $stat = oci_parse($conn, $word);
                            oci_execute($stat, OCI_DEFAULT);
                            while ($row = oci_fetch_array($stat)) {
                                ?>
                                <tr>
                                    <td>
                                        <?php echo (substr_replace($row["CONDATE"],"月",5,2)) ?>
                                    </td>
                                    <td>
                                        <?php echo ($row["CONPLACE"]) ?>
                                    </td>
                                    <td>
                                        <?php echo ($row["EXPEND"]) ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        </table>
                    </div>
                </div>
                <div class="tm-col tm-col-big">
                    <div class="bg-white tm-block h-100">
                        <h2 class="tm-block-title">图书借阅信息<a href="library.php" style="text-decoration: none; float:right">去看看书</a></h2>
                        <table>
                            <tr>
                                <th style="padding: 20px 50px 20px 0px;">借阅书号</th>
                                <th style="padding: 20px 100px 20px 0px;">借阅时间</th>
                                <th style="padding: 20px 50px 20px 0px;">归还时间</th>
                                <th style="padding: 20px 50px 20px 0px;">地点</th>
                            </tr>
                            <?php
                            $name = $_SESSION["username"];
                            $conn = oci_connect("west_sys", "west123456", "westorcl");
                            $word = "select bno,borrdate from borrbook where sno=$name";
                            $stat = oci_parse($conn, $word);
                            oci_execute($stat, OCI_DEFAULT);
                            while ($row = oci_fetch_array($stat)) {
                                ?>
                                <tr>
                                    <td>
                                        <?php echo ($row["BNO"]) ?>
                                    </td>
                                    <td>
                                    
                                        <?php echo (substr_replace($row["BORRDATE"],"月",5,2)) ?>
                                    </td>
                                    <?php
                                        $bb = $row["BNO"];
                                        $ww = "select retudate from retubook where sno=$name and $bb=bno";
                                        $ss = oci_parse($conn, $ww);
                                        oci_execute($ss, OCI_DEFAULT);
                                        ?>
                                    <td>
                                        <?php
                                            $sco = oci_fetch_assoc($ss);
                                            if ($sco == 0) echo ("Not return");
                                            else echo ( substr_replace($sco["RETUDATE"],"月",5,2)) ?>
                                    </td>
                                    <td>
                                        West
                                    </td>
                                </tr>
                            <?php } ?>
                            <?php
                            $name = $_SESSION["username"];
                            $conn = oci_connect("east_sys", "east123456", "eastorcl");
                            $word = "select bno,borrdate from borrbook where sno=$name";
                            $stat = oci_parse($conn, $word);
                            oci_execute($stat, OCI_DEFAULT);
                            while ($row = oci_fetch_array($stat)) {
                                ?>
                                <tr>
                                    <td>
                                        <?php echo ($row["BNO"]); ?>
                                    </td>
                                    <td>
                                        <?php echo (substr_replace($row["BORRDATE"],"月",5,2)); ?>
                                    </td>
                                    <?php
                                        $bb = $row["BNO"];
                                        $ww = "select retudate from retubook where sno=$name and $bb=bno";
                                        $ss = oci_parse($conn, $ww);
                                        oci_execute($ss, OCI_DEFAULT);
                                        ?>
                                    <td>
                                        <?php
                                            $sco = oci_fetch_assoc($ss);
                                            if ($sco == 0) echo ("Not return");
                                            else echo ( substr_replace($sco["RETUDATE"],"月",5,2)); ?>
                                    </td>
                                    <td>
                                        East
                                    </td>
                                </tr>
                            <?php } ?>
                            <?php
                            $name = $_SESSION["username"];
                            $conn = oci_connect("south_sys", "south123456", "southorcl");
                            $word = "select bno,borrdate from borrbook where sno=$name";
                            $stat = oci_parse($conn, $word);
                            oci_execute($stat, OCI_DEFAULT);
                            while ($row = oci_fetch_array($stat)) {
                                ?>
                                <tr>
                                    <td>
                                        <?php echo ($row["BNO"]) ?>
                                    </td>
                                    <td>
                                        <?php echo (substr_replace($row["BORRDATE"],"月",5,2)) ?>
                                    </td>
                                    <?php
                                        $bb = $row["BNO"];
                                        $ww = "select retudate from retubook where sno=$name and $bb=bno";
                                        $ss = oci_parse($conn, $ww);
                                        oci_execute($ss, OCI_DEFAULT);
                                        ?>
                                    <td>
                                        <?php
                                            $sco = oci_fetch_assoc($ss);
                                            if ($sco == 0) echo ("Not return");
                                            else echo ( substr_replace($sco["RETUDATE"],"月",5,2)); ?> 
                                    </td>
                                    <td>
                                        South
                                    </td>
                                </tr>
                            <?php } ?>
                        </table>
                    </div>
                </div>


                <div class="tm-col tm-col-big">
                    <div class="bg-white tm-block h-100">
                                <h2 class="tm-block-title ">签到信息<a href="signin.php" style="text-decoration: none; float:right">去签到</a></h2>
                                <table>
                                    <tr>
                                        <th style="padding: 20px 100px 20px 0px;">签到地点</th>
                                        <th style="padding: 20px 10px 20px 0px;">签到时间</th>
                                    </tr>
                                    <?php
                                    $name = $_SESSION["username"];
                                    $conn = oci_connect("west_sys", "west123456", "westorcl");
                                    $word = "select signplace,signdate from west_signin where sno=$name";
                                    $stat = oci_parse($conn, $word);
                                    oci_execute($stat, OCI_DEFAULT);
                                    while ($row = oci_fetch_array($stat)) {
                                        ?>
                                        <tr>
                                            <td>
                                                <?php echo ($row["SIGNPLACE"]) ?>
                                            </td>
                                            <td>
                                            
                                                <?php echo (substr_replace($row["SIGNDATE"],"月",5,2)) ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    <?php
                                    $name = $_SESSION["username"];
                                    $conn = oci_connect("east_sys", "east123456", "eastorcl");
                                    $word = "select signplace,signdate from east_signin where sno=$name";
                                    $stat = oci_parse($conn, $word);
                                    oci_execute($stat, OCI_DEFAULT);
                                    while ($row = oci_fetch_array($stat)) {
                                        ?>
                                        <tr>
                                            <td>
                                                <?php echo ($row["SIGNPLACE"]) ?>
                                            </td>
                                            <td>
                                                <?php echo (substr_replace($row["SIGNDATE"],"月",5,2)) ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    <?php
                                    $name = $_SESSION["username"];
                                    $conn = oci_connect("south_sys", "south123456", "southorcl");
                                    $word = "select signplace,signdate from south_signin where sno=$name";
                                    $stat = oci_parse($conn, $word);
                                    oci_execute($stat, OCI_DEFAULT);
                                    while ($row = oci_fetch_array($stat)) {
                                        ?>
                                        <tr>
                                            <td>
                                                <?php echo ($row["SIGNPLACE"]) ?>
                                            </td>
                                            <td>
                                                <?php echo (substr_replace($row["SIGNDATE"],"月",5,2)) ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </table>
                            </div>

                </div>
                <div class="tm-col tm-col-big">
                    <div class="bg-white tm-block h-100">
                        <h2 class="tm-block-title">门禁权限信息</h2>
                        <table>
                                    <tr>
                                        <th style="padding: 20px 0px 20px 0px;">门禁地点</th>
                                    </tr>
                                    <?php
                                    $name = $_SESSION["username"];
                                    $conn = oci_connect("west_sys", "west123456", "westorcl");
                                    $word = "select accplace from west_access where sno=$name";
                                    $stat = oci_parse($conn, $word);
                                    oci_execute($stat, OCI_DEFAULT);
                                    while ($row = oci_fetch_array($stat)) {
                                        ?>
                                        <tr>
                                            <td>
                                                <?php echo ($row["ACCPLACE"]) ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    <?php
                                    $name = $_SESSION["username"];
                                    $conn = oci_connect("east_sys", "east123456", "eastorcl");
                                    $word = "select accplace from east_access where sno=$name";
                                    $stat = oci_parse($conn, $word);
                                    oci_execute($stat, OCI_DEFAULT);
                                    while ($row = oci_fetch_array($stat)) {
                                        ?>
                                        <tr>
                                            <td>
                                                <?php echo ($row["ACCPLACE"]) ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    <?php
                                    $name = $_SESSION["username"];
                                    $conn = oci_connect("south_sys", "south123456", "southorcl");
                                    $word = "select accplace from south_access where sno=$name";
                                    $stat = oci_parse($conn, $word);
                                    oci_execute($stat, OCI_DEFAULT);
                                    while ($row = oci_fetch_array($stat)) {
                                        ?>
                                        <tr>
                                            <td>
                                                <?php echo ($row["ACCPLACE"]) ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </table>
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
    <script>
        let ctxLine,
            ctxBar,
            ctxPie,
            optionsLine,
            optionsBar,
            optionsPie,
            configLine,
            configBar,
            configPie,
            lineChart;
        barChart, pieChart;
        // DOM is ready
        $(function() {
            updateChartOptions();
            drawLineChart(); // Line Chart
            drawBarChart(); // Bar Chart
            drawPieChart(); // Pie Chart
            drawCalendar(); // Calendar

            $(window).resize(function() {
                updateChartOptions();
                updateLineChart();
                updateBarChart();
                reloadPage();
            });
        })
    </script>
</body>

</html>