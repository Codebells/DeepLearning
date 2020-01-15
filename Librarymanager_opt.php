
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BookManage</title>
    
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
                        <h1 class="tm-site-title mb-0">Library</h1>
                    <button class="navbar-toggler ml-auto mr-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link d-flex" href="Library_manager.php">
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
                            <form action="library_chuli.php"  method="POST">
                                <div class="input-group mb-3">
                                    <label for="name" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Book
                                        Sno
                                    </label>
                                    <input id="name" name="bookname" type="text" class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7">
                                </div>
                                <div class="input-group mb-3">
                                    <label for="uname" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">User
                                        Sno
                                    </label>
                                    <input id="uname" name="uname" type="text" class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7">
                                </div>
                                <div class="input-group mb-3">
                                    <label for="category" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Method</label>
                                    <select class="custom-select col-xl-9 col-lg-8 col-md-8 col-sm-7" id="category" name="option">
                                        <option selected>Select one</option>
                                        <option value="borr">Borrow Book</option>
                                        <option value="retu">Return Book</option>
                                    </select>
                                </div>
                                <div class="input-group mb-3">
                                    <label for="locate" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Locate</label>
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