<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Products Page - Dashboard Template</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600">
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/tooplate.css">
</head>

<body id="reportsPage" class="bg02">
    <div class="" id="home">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="navbar navbar-expand-xl navbar-light bg-light">
                        <a class="navbar-brand" href="Sys_manager.php">
                            <h1 class="tm-site-title mb-0">StudentPage</h1>
                        </a>
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
                <div class="col-xl-8 col-lg-12 tm-md-12 tm-sm-12 tm-col"  style="margin:0 auto;">
                    <div class="bg-white tm-block h-100">
                        <div class="row">
                            <div class="col-md-8 col-sm-12">
                                <h2 class="tm-block-title d-inline-block">Studnet</h2>

                            </div>
                            <div class="col-md-4 col-sm-12 text-right">
                                <a href="Add_new_student.php" class="btn btn-small btn-primary">Add New Student</a>
                            </div>
                        </div>
                        <form action="delete_student.php" method="POST">
                        <div class="table-responsive">
                            <table class="table table-hover table-striped tm-table-striped-even mt-3">
                                <thead>
                                    <tr class="tm-bg-gray">
                                        <th scope="col">&nbsp;</th>
                                        <th scope="col">Studnet sno</th>
                                        <th scope="col" class="text-center">Student name</th>
                                        <th scope="col" class="text-center">Student password</th>
                                        <th scope="col">money</th>
                                        <th scope="col">&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $conn = oci_connect("west_sys", "west123456", "westorcl");
                                    $word = "select * from student";
                                    $stat = oci_parse($conn, $word);
                                    $cnt=0;
                                    oci_execute($stat, OCI_DEFAULT);
                                    while ($row = oci_fetch_array($stat)) {
                                        ?>
                                        <tr id="trow<?php echo $cnt++;?>" >
                                            <th scope="row">
                                                <input type="checkbox" value="<?php echo $row["SNO"]; ?>" name="check[]" aria-label="Checkbox">
                                            </th>
                                            <td class="tm-product-name"><?php
                                                                            echo $row["SNO"];
                                                                            ?></td>
                                            <td class="text-center"><?php
                                                                        echo $row["SNAME"];
                                                                        ?></td>
                                            <td class="text-center"><?php
                                                                        echo $row["SPW"];
                                                                        ?></td>
                                            <td class="text-center"><?php
                                                                        echo $row["MONEY"];
                                                                        ?></td>
                                            <td><i class="fas fa-trash-alt tm-trash-icon"  onclick="run(<?php echo $cnt-1; ?>)"></i></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>

                        <div class="tm-table-mt tm-table-actions-row">
                            <div class="tm-table-actions-col-left">
                                <button class="btn btn-danger" type="submit" value="">Delete Selected Student</button>
                            </div>

                        </div>
                        </form>
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
    <script src="js/bootstrap.min.js"></script>
    <script> 
        var run = function(num)
        {
            console.log("click");
            alert("已删除");
            var row = document.getElementById("trow"+num);
            var name =row.childNodes[3].textContent;
            row.parentElement.removeChild(row);
        }
    </script>
</body>

</html>