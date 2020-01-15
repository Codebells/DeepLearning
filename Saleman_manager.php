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
                    <h1 class="tm-site-title mb-0">Consumption</h1>
                    <button class="navbar-toggler ml-auto mr-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link d-flex" href="login_for_manager.html">
                                    <span>退出</span>
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
                            <h2 class="tm-block-title d-inline-block">Record</h2>
                        </div>
                    </div>
                    <ol class="tm-list-group tm-list-group-alternate-color tm-list-group-pad-big">
                        <?php
                        $conn = oci_connect("west_sys", "west123456", "westorcl");
                        $word = "select * from Consumption";
                        $stat = oci_parse($conn, $word);
                        oci_execute($stat, OCI_DEFAULT);
                        while ($row = oci_fetch_array($stat)) {
                            ?>
                            <li class="tm-list-group-item">
                                <?php
                                    echo $row["SNO"] . " " . $row["CONPLACE"]. " " . $row["EXPEND"]. " " . $row["CONDATE"];
                                    ?>
                            </li>
                        <?php
                        }
                        ?>
                    </ol>
                </div>
                
            </div>
            <div class="tm-col tm-col-big">
                <div class="bg-white tm-block">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="tm-block-title">Edit record</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <form action="Sign_chuli.php" class="tm-signup-form">
                                <div class="form-group">
                                    <label for="name">Stu sno</label>
                                    <input placeholder="1704010622" id="name" name="name" type="text" class="form-control validate">
                                </div>
                                
                                <div class="form-group">
                                    <label for="place">AccPlace</label>
                                    <input placeholder="CenterBuilding" id="place" name="place" type="text" class="form-control validate">
                                </div>
                                <div class="form-group">
                                    <label for="Money">Cost</label>
                                    <input placeholder="100" id="Money" name="money" type="text" class="form-control validate">
                                </div>
                                <div class="row">
                                    <div class="col-12 col-sm-4">
                                        <button type="submit" class="btn btn-primary">Update
                                        </button>
                                    </div>
                                    <div class="col-12 col-sm-8 tm-btn-right">
                                        <button type="submit" class="btn btn-danger">Delete data
                                        </button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
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