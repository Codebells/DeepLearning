
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Manager_Manager</title>
    
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600">
    <!-- https://fonts.google.com/specimen/Open+Sans -->
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="jquery-ui-datepicker/jquery-ui.min.css" type="text/css" />
    <!-- http://api.jqueryui.com/datepicker/ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="css/tooplate.css">
</head>

<body class="bg02">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="navbar navbar-expand-xl navbar-light bg-light">
                        <h1 class="tm-site-title mb-0">Manager_Manage</h1>
                    <button class="navbar-toggler ml-auto mr-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link d-flex" href="manager_manager.php">
                                    <span>返回</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!-- row -->
        <div class="row tm-mt-big">
            <div class="col-xl-8 col-lg-10 col-md-12 col-sm-12" style="margin:0 auto">
                <div class="bg-white tm-block">
                    <div class="row mt-4 tm-edit-product-row">
                        <div class="col-xl-7 col-lg-7 col-md-12" style="margin:0 auto">
                            <form action="add_manager_chuli.php"  method="POST">
                                <div class="input-group mb-3">
                                    <label for="sno" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Manager
                                        Sno
                                    </label>
                                    <input id="sno" name="sno" type="text" class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7">
                                </div>
                                <div class="input-group mb-3">
                                    <label for="name" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Manager name
                                    </label>
                                    <input id="name" name="name" type="text" class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7">
                                </div>
                                <div class="input-group mb-3">
                                    <label for="kind" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Kind</label>
                                    <select class="custom-select col-xl-9 col-lg-8 col-md-8 col-sm-7" id="kind" name="kind">
                                        <option selected>Select one</option>
                                        <option value="Teacher">Teacher</option>
                                        <option value="Sys">Sysmanager</option>
                                        <option value="Bookman">BookManager</option>
                                        <option value="Accessman">AccessManager</option>
                                        <option value="Saleman">SaleManager</option>
                                    </select>
                                </div>
                                <div class="input-group mb-3">
                                    <label for="pass" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Password
                                    </label>
                                    <input id="pass" name="pass" type="password" class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7">
                                </div>
                                <div class="input-group mb-3">
                                    <label for="locate" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Kind</label>
                                    <select class="custom-select col-xl-9 col-lg-8 col-md-8 col-sm-7" id="locate" name="locate">
                                        <option selected>Select one</option>
                                        <option value="West">West</option>
                                        <option value="East">East</option>
                                        <option value="South">South</option>
                                    </select>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="ml-auto col-xl-8 col-lg-8 col-md-8 col-sm-7 pl-0">
                                        <button type="submit" class="btn btn-primary">Submit
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
    <!-- https://jquery.com/download/ -->
    <script src="jquery-ui-datepicker/jquery-ui.min.js"></script>
    <!-- https://jqueryui.com/download/ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->
    <script>
        $(function () {
            $('#expire_date').datepicker();
        });
    </script>
</body>

</html>